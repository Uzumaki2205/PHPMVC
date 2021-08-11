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
		if(isset($_POST['Ping'])) {
			$patterm = '/^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$' . '/';
			$ip = $_POST['ip'];
			if (preg_match($patterm, $ip))
				$res = $this->vuln_model->ExecuteCommand($ip);
			else $res = 'Invalid Ip';
		}
		else $this->view('vuln/os-command-injection');

		$this->view('vuln/os-command-injection', ['ip'=> $res]);
	}

	function PathTraversal() {
		$this->view('vuln/path-traversal');
	}
}