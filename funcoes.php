<?php

function carregar_pagina($config, $rotas)
{
    $pagina = array();

    $url_atual = ltrim($_SERVER['REQUEST_URI'], '/');

    if($url_atual != "")
    {
        if(array_key_exists($url_atual, $rotas))
        {
            if(file_exists($rotas[$url_atual]))
            {
                $pagina = array('pagina' => $rotas[$url_atual], 'status-rota' => TRUE, 'uri' => $url_atual);
            }
            else {
                header('Location:'. $config['erro-404']);
            }
        }
        else {
            header('Location:'. $config['erro-404']);
        }
    }
    else {
        $pagina = array('pagina' => $rotas['home'], 'status-rota' => TRUE, 'uri' => 'home');
    }

    return $pagina;
}