<?php

namespace Site; //Indica o namespace da classe

use Helpers\ViewModel; // Informa ao PHP que utilizaremos_
                       // a classe ViewModel do namespace Helpers
use Config\Post\ProviderFactoryConfig as Pfc;
use Symfony\Component\HttpFoundation\Request;
use Services\SearchHandler;
use Services\StringInputFilter;
use Services\LowerHandler;


class Blog  //Apenas o nome da classe, deve ser igual ao Nome do Arquivo
{
    /**
     *  Este método tem a responsabilidade de listar as últimas postagens
     */
    public function ultimasPostagens() 
    {
        // Retorna um novo objeto ViewModel com informarções
        // que serão utilizadas na renderização blog.lista é o nome do template
        // o array são variáveis que serão enviadas para o template
        $provider = Pfc::getPostProviderFactory()->getPostProvider();
        return new ViewModel('blog.lista',['posts'=>$provider->getUltimos()]);
    }
	public function viewPost(Request $req) {
		$idp = $req->attributes->get('post',0);
		$provider = Pfc::getPostProviderFactory()->getPostProvider();
		$res = $provider->getById($idp);
		return new ViewModel('blog.detail',['post'=>$res]);
	}
	public function pesquisar(Request $req){
		$h1 = new SearchHandler();
		$h2 = new StringInputFilter();
		$h1->setNext($h2);

		$h3 = new LowerHandler();
		$h2->setNext($h3);

		$retorno = ($h1->handleRequest($_POST));

		$provider = Pfc::getPostProviderFactory()->getPostProvider();
        return new ViewModel('blog.lista',['posts'=>$provider->getPesquisa($retorno)]);
		
	}



}