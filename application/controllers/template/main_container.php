<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Main_container class 
 * 
 * This class set default main_container template display
 * 
 * @package   	CodeIgniter
 * @subpackage	Controller
 * @author    	Rungsun Somanat <rungunsomanat@gmail.com>
 * @link 		http://www.war1ock.com
 */
 
class Main_container extends MY_Controller
{
	var $templateDir = "template/main_container/";
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function header( $data = array() )
	{
		$this->template->write_view('header', $this->templateDir.'header', $data);		
	}
	
	public function sidebar( $data = array() )
	{
		$this->template->write_view('sidebar', $this->templateDir.'sidebar', $data);
	}
	
	public function footer( $data = array() )
	{
		$this->template->write_view('footer', $this->templateDir.'footer', $data);
	}
	
}