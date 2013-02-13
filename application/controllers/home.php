<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __consruct() {
		parent::__construct();	
	}

	public function index() {
		echo CIUrl::getSiteUrl();
                echo '444444445';
	}

	public function get_content() {
		
	}
}