<?php
class Vuln extends Controller {
	private $vuln_model;

	function __construct() {
		$this->vuln_model = $this->model('VulnModel');
	}

	function Index() {
		$this->view('vuln/index');
	}

	function OSCommandInjection() {
		$res = '';
		if(isset($_POST['Ping'])) 
			$res = $this->vuln_model->ExecuteCommand($_POST['Ping']);
		else $this->view('vuln/os-command-injection');

		$this->view('vuln/os-command-injection', ['ip'=> $res]);
	}

	function PathTraversal() {
		$this->view('vuln/path-traversal');
	}
}