<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH."libraries/extlibs/facebook/facebook".EXT;

class Fbauth {
	
	public $appId;
	public $secretCode;
	public $userScope;
	public $allowFileUpload = false;

	public $facebook;
	
	public function __construct($config=array()) {
		$this->initialize($config);
	}
	
	public function initialize($config) {
		if ( sizeof($config) ) { return false; }

		$this->appId = $config['app_id'];
		$this->secretCode = $config['secret_code'];
		$this->userScope = $config['user_scope'];
		if ( isset($config['file_upload']) ) { $this->allowFileUpload = $config['file_upload']; }

		$this->facebook = new Facebook(array(
				'appId' => $this->appId,
				'secret' => $this->secretCode,
				'fileUpload' => $this->allowFileUpload,
				'cookie' => true
			));
	}

	public function chkAuth($redirectUrl = '') {
		$chkUserAuth = $this->facebook->getUser();
		if ( !$chkUserAuth ) {
			$params = array(
					'scope' => $this->userScope,
					'redirect_uri' => $redirectUrl
				);
			$loginUrl = $this->facebook->getLoginUrl($params);
			echo '<script>window.top.location="'.$loginUrl.'"</script>';
			exit;
		}
		return true;
	}
	
	public function getUserProfile() {
		$userProfile = $this->facebook->api('/me', 'GET');
		return $userProfile;
	}

	public function getAccessToken() {
		return $this->facebook->getAccessToken();
	}

	public function uploadPhoto($imgPath, $msg) {
		$uploadPhoto = $this->facebook->api('/me/photos', 
			'POST', 
			array('source' => '@'.$imgPath, 'message'=>$msg)
		);
		return $uploadPhoto['id'];
	}

}

?>