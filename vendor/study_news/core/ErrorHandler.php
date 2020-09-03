<?php
namespace study_news;

class ErrorHandler {
	public function __construct() {
		if(DEBUG){
			error_reporting(E_ALL);
		} else {
			error_reporting(0);
		}
		set_exception_handler([$this, "exceptionHandler"]);
	}

	public function exceptionHandler($e) {
		$this->writeExceptionInFileLog("exception", $e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine());
		$this->displayException("exception", $e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine());
	}
	private function displayException($typeError, $message, $codeResponse, $file, $line) {
		http_response_code($codeResponse);
		if($codeResponse == 404 && !DEBUG) {
			require WWW . "/errors/404.php";
			die;
		}
		if(DEBUG) {
			require WWW . "/errors/dev.php";
		} else {
			require WWW . "/errors/prod.php";
		}
		die;
	}
	private function writeExceptionInFileLog($typeError, $message, $codeResponse, $file, $line) {
		error_log("[".date('Y:m:d H:i:s')." | typeError: $typeError | message: $message | code: $codeResponse | file: $file | line: $line] \n=================\n", 3, TMP . "/error.log");
	} 
}

?>