<?php
class CaptchaComponent extends Component{

	var $components = array('Session');

	protected $controller = null;

	public function startup(Controller $controller) {
		$this->controller = $controller;
		//$this->controller->helpers[] = "Captcha";
	}

	function render(){
		$this->Session->write('captcha', true); // 激活Session
		App::import('Vendor', 'kcaptcha/kcaptcha');
		$kcaptcha = new KCAPTCHA();
		$this->Session->write('captcha', $kcaptcha->getKeyString());	
	}
}
?>
