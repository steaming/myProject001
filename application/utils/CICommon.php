<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CICommon {

	public function codeDebug($str) {
		print "<pre>";
		print_r($str);
		print "</pre>";
	}

}