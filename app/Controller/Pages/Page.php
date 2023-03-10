<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Page
{
    /**
     * Metodo responsavel por rendenizar o topo da pagina
     *
     * @return string
     */
    private static function getHeader()
    {
        return View::render('pages/header');
    }

    private static function getFooter()
    {
        return View::render('pages/footer');
    }

    /**
     * motodo responsavel por retornar o conteudo (view) da nossa pagina generica
     *
     * @return string
     */
    public static function getPage($title, $content)
    {
        return View::render('pages/page', [
            'title' => $title,
            'header' => self::getHeader(),
            'content' => $content,
            'footer' => self::getFooter()
        ]);
    }
}
