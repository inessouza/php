<?php

class Rest {
    public static function open($requisicao) 
    {
        $url = explode('/', $_REQUEST['url']);
        
        $classe = ucfirst($url[0]);
        array_shift($url);

        $metodo = $url[0];
        array_shift($url);
        
        $parametros = array();
        $parametros = $url;

        if(class_exists($classe)) {
            if(method_exists($classe, $metodo)) {
                $ retorno = call_user_func_array(array(new $classe, $metodo), $parametros);

                return json_encode(array('status' => 'sucesso', 'dados' => $retorno));
            } else {
                return json_encode(array('status' => 'erro', 'dados' => 'Método Inexistente!'));
            }
        } else {
            return json_encode(array('status' => 'erro', 'dados' => 'Classe Inexistente!'));
        }
    }
}

// Leitura de Requisição
if (isset($_REQUEST)) {
    Rest::open($_REQUEST); 
}