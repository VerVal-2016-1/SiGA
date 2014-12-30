<?php

require_once(APPPATH."/exception/CourseNameException.php");
require_once(APPPATH."/exception/CourseException.php");
require_once(APPPATH."/exception/MasterDegreeException.php");

class MasterDegree_model extends CI_Model {

	public function saveCourseCommonAttributes($commonAttributes, $secretary){
		
		// Save on the course table the common attributes
		$this->load->model('course_model');
		$this->course_model->saveCourse($commonAttributes);

		$courseName = $commonAttributes['course_name'];

		$this->saveCourseSecretary($courseName, $secretary);

		$insertedCourseId = $this->course_model->getCourseIdByCourseName($courseName);

		return $insertedCourseId;
	}

	public function saveAcademicCourseSpecificAttributes($courseId, $specificAttributes){

		$masterDegreeId = $this->saveMasterDegreeAcademicProgram($specificAttributes);

		$courseWasSaved = $this->associateMasterDegreeCourseToAcademicProgram($courseId, $masterDegreeId);

		return $courseWasSaved;
	}
	
	public function saveProfessionalCourseSpecificAttributes($courseId, $specificAttributes){
	
		$course_id = array('id_course' => $courseId);
	
		$attributes = array_merge($course_id, $specificAttributes);
	
		$programWasSaved = $this->saveMasterDegreeProfessionalProgram($attributes);
	
		$courseWasSaved = $this->associateMasterDegreeCourseToProfessionalProgram($courseId);
	
		$masterDegreeWasSaved = $programWasSaved && $courseWasSaved;
	
		return $masterDegreeWasSaved;
	}
	
	/**
	 * Update the common attributes of a course on the course table
	 * @param $courseId - The course id to be updated
	 * @param $commonAttributes - The new common attributes 
	 * @throws CourseNameException, CourseException
	 */
	public function updateCourseCommonAttributes($courseId, $commonAttributes){

		try{	
			// Save on the course table the common attributes
			$this->load->model('course_model');
			$this->course_model->updateCourse($courseId, $commonAttributes);

		}catch(CourseNameException $caughtException){
			throw $caughtException;
		}catch(CourseException $caughtException){
			throw $caughtException;
		}
	}

	/**
	 * Update the specifics attributes of a master degree course
	 * @param $courseId - The course id to be updated
	 * @param $specificsAttributes - The new specifics attributes
	 * @throws CourseExceptions
	 */
	public function updateAcademicCourseSpecificsAttributes($courseId, $specificsAttributes){
		$this->load->model('course_model');
		$idExists = $this->course_model->checkExistingId($courseId);

		if($idExists){
			// If the course were not an academic program, it will be created as one
			$isAnAcademicProgram = $this->checkIfIsAcademicProgram($courseId);
			if($isAnAcademicProgram){
				$this->updateMasterDegreeAcademicCourse($courseId, $specificsAttributes);
			}else{
				$this->saveAcademicCourseSpecificAttributes($courseId, $specificsAttributes);
			}
		}else{
			throw new CourseException("Cannot update this course. The informed ID does not exists.");
		}
	}
	
	public function updateProfessionalCourseSpecificsAttributes($courseId, $specificsAttributes){
		$this->load->model('course_model');
		$idExists = $this->course_model->checkExistingId($courseId);
	
		if($idExists){
			// If the course were not an academic program, it will be created as one
			$isAnProfessionalProgram = $this->checkIfIsProfessionalProgram($courseId);
			if($isAnProfessionalProgram){
				$this->updateMasterDegreeProfessionalCourse($courseId, $specificsAttributes);
			}else{
				$this->saveProfessionalCourseSpecificAttributes($courseId, $specificsAttributes);
			}
		}else{
			throw new CourseException("Cannot update this course. The informed ID does not exists.");
		}
	}

	public function deleteAcademicMasterDegreeByCourseId($courseId){
		$thereIsMasterDegree = $this->checkIfExistsAcademicMasterDegreeForThisCourse($courseId);

		if($thereIsMasterDegree){

			$this->deleteAcademicMasterDegree($courseId);

		}else{

			throw new MasterDegreeException("Não há mestrados registrados para esse curso.");
		}
	}

	private function deleteAcademicMasterDegree($courseId){
		$this->db->where('id_academic_program', $courseId);
		$this->db->delete('master_degree');
	}
	
	private function checkIfIsAcademicProgram($courseId){
		$foundProgram = $this->db->get_where('academic_program', array('id_course' => $courseId));
		$foundProgram = $foundProgram->row_array();

		$programExists = sizeof($foundProgram) > 0;

		return $programExists;
	}
	
	private function checkIfIsProfessionalProgram($courseId){
		$foundProgram = $this->db->get_where('professional_program', array('id_course' => $courseId));
		$foundProgram = $foundProgram->row_array();
	
		$programExists = sizeof($foundProgram) > 0;
	
		return $programExists;
	}
	
	/**
	 * Update the specifics attributes of a master degree on DB
	 * @param $courseId - The course id to be updated
	 * @param $newMasterDegree - The new master degree attributes
	 */
	private function updateMasterDegreeAcademicCourse($courseId, $newMasterDegree){
		$this->db->where('id_course', $courseId);
		$this->db->update('academic_program', $newMasterDegree);
	}
	
	private function updateMasterDegreeProfessionalCourse($courseId, $newMasterDegree){
		$this->db->where('id_course', $courseId);
		$this->db->update('professional_program', $newMasterDegree);
	}

	public function getRegisteredMasterDegreeForThisCourseId($courseId){
		// Validate $courseId
		$registeredMasterDegree = $this->getRegisteredMasterDegree($courseId);

		return $registeredMasterDegree;
	}

	/**
	 * Get the registered master degree course, if it exists
	 * @param $courseId - The course to look for master degree program
	 * @return  an array with the attributes of the found master degree course if it exists
	 * @return FALSE if there is no master degree course for this course id
	 */
	private function getRegisteredMasterDegree($courseId){
		$thereIsMasterDegree = $this->checkIfExistsAcademicMasterDegreeForThisCourse($courseId);

		if($thereIsMasterDegree){	
			$searchResult = $this->db->get_where('academic_program', array('id_course' => $courseId));
			$foundMasterDegree = $searchResult->row_array();
		}else{
			$foundMasterDegree = FALSE;
		}

		return $foundMasterDegree;
	}

	/**
	 * Check if there is a master degree associated to the given course id
	 * @param $courseId - The course to look for master degree courses
	 * @return TRUE if there is a master degree course associated to this course id or FALSE if does not
	 */
	public function checkIfExistsAcademicMasterDegreeForThisCourse($courseId){
		$this->db->select('id_master_degree');
		$searchResult = $this->db->get_where('master_degree', array('id_academic_program' => $courseId));
		$searchResult = $searchResult->row_array();

		$existsMasterDegree = sizeof($searchResult) > 0;

		return $existsMasterDegree;
	}

	private function saveCourseSecretary($courseName, $courseSecretary){
		$this->load->model('course_model');
		$this->course_model->saveSecretary($courseSecretary, $courseName);
	}

	private function associateMasterDegreeCourseToAcademicProgram($courseId, $masterDegreeId){

		$academicProgramAttributes = array(
			'id_course' => $courseId,
			'id_master_degree' => $masterDegreeId
		);

		$insertionWasMade = $this->db->insert('academic_program', $academicProgramAttributes);

		return $insertionWasMade;
	}
	
	private function associateMasterDegreeCourseToProfessionalProgram($courseId){
	
		$masterDegreeAttributes = array(
				'id_professional_program' => $courseId
		);
	
		$insertionWasMade = $this->db->insert('master_degree', $masterDegreeAttributes);
	
		return $insertionWasMade;
	}

	/**
	 * Save a master degree course
	 * @param $masterDegreeAttibutes - Array with the master degree attributes to be saved
	 * @return the master degree id that was saved
	 */
	private function saveMasterDegreeAcademicProgram($masterDegreeAttributes){
		$this->db->insert('master_degree', $masterDegreeAttributes);

		$masterDegreeName = $masterDegreeAttributes['master_degree_name'];
		$masterDegree = $this->getMasterDegreeByName($masterDegreeName);
		$masterDegreeId = $masterDegree['id_master_degree'];

		return $masterDegreeId;
	}

	/**
	 * Search for a master degree by its name
	 * @param $masterDegreeName - String with the master degree name to seach for
	 * @return an Array with all attributes of the found master degree
	 */
	private function getMasterDegreeByName($masterDegreeName){
		$searchResult = $this->db->get_where('master_degree', array('master_degree_name' => $masterDegreeName));

		$foundMasterDegree = $searchResult->row_array();

		return $foundMasterDegree;
	}
	
	private function saveMasterDegreeProfessionalProgram($courseAttributes){
		$insertionWasMade = $this->db->insert('professional_program', $courseAttributes);
	
		return $insertionWasMade;
	}
	
}
	
