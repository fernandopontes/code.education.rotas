<?php

function verifica_rota($config, $rotas)
{
    $rota = array();

    $uri = str_replace($config['url-site'], '', "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

    if($uri != "")
    {
        if(file_exists($config['diretorio-site'] . '/' . $rotas[$uri]) && $rotas[$uri] != "")
        {
            $rota = array('arquivo' => $rotas[$uri], 'status-rota' => TRUE, 'uri' => $uri);
        }
        else {
            header('Location:'.$config['url-site'] . $config['erro-404']);
        }
    }
    else {
        $rota = array('arquivo' => 'home', 'status-rota' => FALSE);
    }

    return $rota;
}