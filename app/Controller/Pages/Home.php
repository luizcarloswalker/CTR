<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Home
{
    /**
     * motodo responsavel por retornar o conteudo (view) da nossa home
     *
     * @return string
     */
    public static function getHome()
    {
        return View::render('pages/page', [
            'name' => 'WDEV - Canal',
            'description' => 'site: https://www.google.com.br'
        ]);
    }
}
