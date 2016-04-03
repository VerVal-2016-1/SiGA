<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."/exception/StudentRegistrationException.php");

class Student_model extends CI_Model {

	const COURSE_STUDENT_TABLE = "course_student";
	const ID_COURSE_COLUMN = "id_course";
	const ID_STUDENT_COLUMN = "id_user";
	const ENROLLMENT_COLUMN = "enrollment";

	const COULDNT_UPDATE_ENROLLMENT = "Não foi possível atualizar a matrícula informada. Cheque os dados informados e tente novamente";

	public function saveRegistration($course, $student, $registration){
			
		$this->db->trans_start();

		$this->db->where(self::ID_COURSE_COLUMN, $course);
		$this->db->where(self::ID_STUDENT_COLUMN, $student);
		$this->db->update(self::COURSE_STUDENT_TABLE, array(
			self::ENROLLMENT_COLUMN => $registration->getRegistration()
		));

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE){
			throw new StudentRegistrationException(self::COULDNT_UPDATE_ENROLLMENT);
		}
	}
}