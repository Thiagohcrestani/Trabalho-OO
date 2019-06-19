<?php
namespace Services;

use Contracts\InputHandlerInterface;


class StringInputFilter implements InputHandlerInterface {
	
	private $next = null;

	public function handleRequest($post) {
		$newInput = \preg_replace("/[^A-Za-z\s]+/","",$post);
		if (!$this->getNext()) {
			return $newInput;

		}
		return $this->getNext()->handleRequest($newInput);
	}
	public function getNext(){
		return $this->next!=null?$this->next:false;
	}
	public function setNext(InputHandlerInterface $handler){
		$this->next = $handler;
		
	}
}

?>