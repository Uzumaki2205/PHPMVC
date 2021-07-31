<?php
class Question extends Controller {
	private $question_model;

	function __construct() {
		$this->question_model = $this->model('QuestionModel');
	}

	function Quizz() {
		//$pdo = $this->model('QuestionModel');
		$questions = $this->question_model->Question();
		$this->view('quizz', ['questions' => $questions]);
	}

	function SubmitQuestion() {
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			header('Location: ../Question/Quizz');
		}

		if (isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {
			$result = $this->question_model->SubmitQuestion($_POST, $_POST['mssv'], $_POST['name'], $_POST['email']);

			if ($result) {
				echo '<div class="modal is-active" id="modalResult">
				<div class="modal-background"></div>
				<div class="modal-card">
				<header class="modal-card-head">
				<p class="modal-card-title">Modal title</p>
				<button class="delete" onclick="closeModal()" aria-label="close"></button>
				</header>
				<section class="modal-card-body">
				<!-- Content ... -->
				<aside class="menu">
				<ul class="menu-list">
				<li>
				<a class="is-active">Score</a>
				<ul>
				<li>'. $_POST['mssv'] . ' - ' . $_POST['name'] .'</li>
				<li>'. $_POST['email'] .'</li>
				<li>Result: '. $result .'</li>
				</ul>
				</li>
				</ul>
				</aside>
				</section>
				<footer class="modal-card-foot">
				<button class="button is-success" onclick="closeModal()">Save changes</button>
				</footer>
				</div>
				</div> 
				<script>
				function closeModal() {
					var element = document.getElementById("modalResult");
					element.classList.remove("is-active");
				}
				</script> ' ;
			}
		}
	}
}