<?php

namespace Site;

use Helpers\ViewModel;
use Symfony\Component\HttpFoundation\Request;


class Home
{
    public function helloWorld(Request $req)
    {
        return new ViewModel('base',['hello'=>'Olá Mundão véio']);
    }
}
