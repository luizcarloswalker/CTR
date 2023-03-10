<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Home extends Page
{
    /**
     * motodo responsavel por retornar o conteudo (view) da nossa home
     *
     * @return string
     */
    public static function getHome()
    {
        $content View::render('pages/home', [
            'name' => 'WDEV - Canal',
            'description' => 'site: https://www.google.com.br'
        ]);
        //retorna a view da pagina
        return parent::getPage('CTR - Clube de Tiro Realeza', $content)
    }
}
