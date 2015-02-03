<?php
class Discipline_model extends CI_Model {

	/**
	 * Function to list in an array all the disciplines registered in the database
	 * @return array $registeredDisciplines
	 */
	public function listAllDisciplines(){
		$this->db->select('*');
		$this->db->from('discipline');
		$this->db->order_by("discipline_name", "asc");
		$registeredDisciplines = $this->db->get()->result_array();
		
		return $registeredDisciplines;
	}
	
	/**
	 * Function to save in the database a new discipline
	 * @param array $disciplineToRegister
	 * @return boolean $insertionStatus - TRUE for inserted discipline, FALSE for error
	 */
	public function saveNewDiscipline($disciplineToRegister){
		$insertNew = $this->db->insert("discipline", $disciplineToRegister);
		if($insertNew){
			$insertionStatus = TRUE;
		}else{
			$insertionStatus = FALSE;
		}
		return $insertionStatus;
	}
	
	/**
	 * Function to get updating data for one discipline and pass it to pdating function on db
	 * @param int $disciplineCode
	 * @param array $disciplineToUpdate
	 * @throws DisciplineNameException
	 * @throws DisciplineException
	 * @return boolean $updated - TRUE for updated discipline, FALSE for error
	 */
	public function updateDisciplineData($disciplineCode,$disciplineToUpdate){
		$disciplineExists = $this->getDisciplineByCode($disciplineCode);
		
		if($disciplineExists){
			//verify is names has changed
			$updatedName = $disciplineToUpdate['discipline_name'];
			$lastName = $disciplineExists['discipline_name'];
			if($updatedName != $lastName){
				$nameAlreadyExists = $this->checkDisciplineNameExists($updatedName);
				if(!$nameAlreadyExists){
					$updated = $this->updateDisciplineOnDB($disciplineCode,$disciplineToUpdate);
				}else{
					throw new DisciplineNameException("A disciplina '".$updatedName."' já existe.");
				}
			}else{
				$updated = $this->updateDisciplineOnDB($disciplineCode,$disciplineToUpdate);
			}
		}else{
			throw new DisciplineException("Impossível alterar disciplina. O código informado não existe.");
		}
		return $updated;
	}
	
	/**
	 * Function to update a discipline data on database
	 * @param int $disciplineCode
	 * @param array $disciplineToUpdate
	 * @return boolean $updated - TRUE for updated discipline, FALSE for error
	 */
	private function updateDisciplineOnDB($disciplineCode,$disciplineToUpdate){
		$this->db->where('discipline_code',$disciplineCode);
		$updated = $this->db->update("discipline", $disciplineToUpdate);
		return $updated;
	}
	
	/**
	 * Function to drop some discipline from database
	 * @param int $disciplineCode
	 * @return boolean $disciplinWasDeleted - TRUE for deleted discipline
	 */
	public function deleteDiscipline($disciplineCode){
		$disciplineCodeExists = $this->disciplineExists($disciplineCode);
		
		if ($disciplineCodeExists['code']){
			$this->db->delete('discipline', array('discipline_code' => $disciplineCode));
			$disciplinWasDeleted = TRUE;
		}else{
			$disciplinWasDeleted = FALSE;
		}
		
		return $disciplinWasDeleted;
	}

	/**
	 * Function to get an specific discipline on database
	 * @param int $discipline_code
	 * @return array $discipline case it exists, boolean FALSE case not
	 */
	public function getDisciplineByCode($discipline_code){
		$empty = empty($discipline_code);
	
		if(!$empty){
			$this->db->where('discipline_code',$discipline_code);
			$discipline = $this->db->get('discipline')->row_array();
		}else{
			$discipline = FALSE;
		}
		return $discipline;
	}
	
	/**
	 * Function to check if one discipline name exists
	 * @param string $askedName
	 * @return boolean $disciplineNameAlreadyExists - TRUE if it exists, FALSE if not
	 */
	private function checkDisciplineNameExists($askedName){
		
		$this->db->select('discipline_name');
		$this->db->from('discipline');
		$this->db->where('discipline_name', $askedName);
		$searchResult = $this->db->get();
		
		if($searchResult->num_rows() > 0){
			$disciplineNameAlreadyExists = TRUE;
		}else{
			$disciplineNameAlreadyExists = FALSE;
		}
		
		return $disciplineNameAlreadyExists;
		
	}
	
	/**
	 * Function to check if onde discipline already exists
	 * @param int $disciplineCode
	 * @param string $disciplineName
	 * @return multitype:boolean $exists
	 */
	public function disciplineExists($disciplineCode=NULL, $disciplineName=NULL){
		if($disciplineCode){
			$this->db->where('discipline_code',$disciplineCode);
			$disciplineCodeExists = $this->db->get('discipline')->row_array();
		}else{
			$disciplineCodeExists = FALSE;
		}
		if($disciplineName){
			$this->db->where('discipline_name',$disciplineName);
			$disciplineNameExists = $this->db->get('discipline')->row_array();
		}else{
			$disciplineNameExists = FALSE;
		}
		
		
		if($disciplineCodeExists && $disciplineNameExists){
			$existsCode = TRUE;
			$existsName = TRUE;
		}else if ($disciplineNameExists){
			$existsName = TRUE;
			$existsCode = FALSE;
		}else if ($disciplineCodeExists){
			$existsCode= TRUE;
			$existsName = FALSE;
		}else{
			$existsCode = FALSE;
			$existsName = FALSE;
		}
		$exists = array('code'=>$existsCode,'name'=>$existsName);
		return $exists;
	}
}