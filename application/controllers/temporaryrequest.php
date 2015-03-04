<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('offer.php');
require_once('discipline.php');
require_once('semester.php');

/**
 * In this class, consider where is written 'temp' equals to 'temporary'
 */
class TemporaryRequest extends CI_Controller {

	public function getUserTempRequest($userId, $courseId, $semesterId){

		$this->load->model('temporaryrequest_model');

		$request = $this->temporaryrequest_model->getUserTempRequest($userId, $courseId, $semesterId);

		return $request;
	}

	public function addTempDisciplinesToRequest(){

		$this->load->model('temporaryrequest_model');

		$courseId = $this->input->post('courseId');
		$userId = $this->input->post('userId');

		$dataIsOk = $this->validateTempDisciplineData();

		if($dataIsOk){

			$disciplineCode = $this->input->post('discipline_code_search');

			$discipline = new Discipline();
			$disciplineExists = $discipline->checkIfDisciplineExists($disciplineCode);

			if($disciplineExists){

				$disciplineClass = $this->input->post('discipline_class_search');

				$semester = new Semester();
				$currentSemester = $semester->getCurrentSemester();

				$offer = new Offer();
				$classExists = $offer->checkIfClassExistsInDiscipline($disciplineCode, $courseId, $currentSemester['id_semester'], $disciplineClass);

				if($classExists){
					
					$offerDiscipline = $offer->getCourseOfferDisciplineByClass($disciplineCode, $courseId, $currentSemester['id_semester'], $disciplineClass);
					
					if($offerDiscipline !== FALSE){
						$requestWasSaved = $this->saveTempRequest($userId, $courseId, $currentSemester['id_semester'], $disciplineCode, $offerDiscipline['id_offer_discipline']);
					}else{
						$requestWasSaved = FALSE;
					}

					if($requestWasSaved){
						$status = "suscess";
						$message = "Disciplina adicionada com sucesso à solicitação";
					}else{
						$status = "danger";
						$message = "Não foi possível adicionar a disciplina informada. Cheque os dados informados e tente novamente.";
					}
				}else{
					$status = "danger";
					$message = "Turma não encontrada para disciplina informada.";
				}

			}else{
				$status = "danger";
				$message = "Disciplina não encontrada.";
			}

		}else{
			$status = "danger";
			$message = "Dados na forma incorreta. Informe apenas números para o código e letras para a turma.";
		}
		
		$this->session->set_flashdata($status, $message);

		redirect("request/studentEnrollment/{$courseId}/{$userId}");
	}

	private function saveTempRequest($userId, $courseId, $semesterId, $disciplineCode, $idOfferDiscipline){

		$tempRequest = array(
			'id_student' => $userId,
			'id_course' => $courseId,
			'id_semester' => $semesterId,
			'discipline_class' => $idOfferDiscipline
		);

		$this->load->model('temporaryrequest_model');

		$requestWasSaved = $this->temporaryrequest_model->saveTempRequest($tempRequest);

		return $requestWasSaved;
	}

	private function validateTempDisciplineData(){

		$this->load->library("form_validation");
		$this->form_validation->set_rules("discipline_code_search", "Código da disciplina", "required");
		$this->form_validation->set_rules("discipline_class_search", "Turma da disciplina", "required|alpha");
		$this->form_validation->set_error_delimiters("<p class='alert-danger'>", "</p>");
		$status = $this->form_validation->run();

		return $status;
	}
}