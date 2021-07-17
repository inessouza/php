<?php

class Rest {
    public static function open($requisicao) 
    {
        $url = explode('/', $_REQUEST['url']);
        
        $classe = $url[0]
    }
}

// Leitura de Requisição
if (isset($_REQUEST)) {
    Rest::open($_REQUEST); 
}