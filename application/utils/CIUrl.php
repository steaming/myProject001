<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CIUrl {
		
	public $CI;

	public function __construct() {
		$this->CI =& get_instance();
	}

	public function getSiteUrl($url='') {
		return site_url($url);
	}
	
	public function getSiteAssetUrl($url = '') {
		return site_assets_url($url);
	}
	
}