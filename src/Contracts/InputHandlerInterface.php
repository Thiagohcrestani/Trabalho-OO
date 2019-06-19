<?php

namespace Contracts;

interface InputHandlerInterface {
	public function handleRequest($post);
	public function getNext();
	public function	setNext(InputHandlerInterface $handler);



}

?>