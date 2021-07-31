<?php

class Home extends Controller {
	function Index() {
		$this->view('common/welcome');
	}
}