<?php

namespace Services;

use Contracts\InputHandlerInterface;

class SearchHandler implements InputHandlerInterface {
	
	private $next = null;

	public function handleRequest($post) {
		if(!isset($post['pesquisa'])|| !$this->getNext()){
			return false;

		}

		return $this->getNext()->handleRequest($post['pesquisa']);

	}
	public function getNext(){
		return $this->next!=null?$this->next:false;
	}
	public function setNext(InputHandlerInterface $handler){
		$this->next = $handler;

	}	

}


?>