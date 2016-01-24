<?php
class BrowserDetective {
	public $userAgent;
	public $platform;
	public $browserName;

	public function __construct() {
		$this->setUserAgent();
		$this->setReset();
	}

	public function setUserAgent(){
		if(isset($_SERVER['HTTP_USER_AGENT'])){
			return($this->userAgent = $_SERVER['HTTP_USER_AGENT']);
		} else {
			return($this->userAgent = '');
		}
	}

	public function setReset(){
		$this->platform = 'Unknown';
		$this->browserName = 'Unknown';
	}
	//need to set detect variable here.
	public function detectPlatform() {
		if(preg_match("/windows/i|/win32/i", $this->userAgent)){
			return($this->platform = "Windows");
		} elseif (preg_match("/linux/i", $this->userAgent)){
			return($this->platform = "Linux");
		} elseif (preg_match("/macintosh/i"|"/mac/i", $this->userAgent)) {
			return ($this->platform = "Mac");
		}


	}
	public function detectBrowserName(){
		if(preg_match())


	}
}