<?php
class CaptchaComponent extends Component{

	var $components = array('Session');

	function initialize(&$controller){
		$this->controller = $controller;
	}

	function startup(&$controller){
		//$this->controller = $controller;
	}

	function render(){
		$this->Session->write('captcha', true); // 激活Session
		App::import('Vendor', 'kcaptcha/kcaptcha');
		$kcaptcha = new KCAPTCHA();
		$this->Session->write('captcha', $kcaptcha->getKeyString());	
	}
}
?>