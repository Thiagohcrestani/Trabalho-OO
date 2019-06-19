<?php

namespace Contracts;

interface PostProviderInterface {
    /**
     * @return PostInterface[] //diz para o PhpDoc que retorna Posts
     */
    public function getUltimos();
    
	public function getById($id);
	
	public function getPesquisa($parametro);

	
}