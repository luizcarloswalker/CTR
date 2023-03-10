<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Page
{
    /**
     * motodo responsavel por retornar o conteudo (view) da nossa pagina generica
     *
     * @return string
     */
    public static function getPage($title, $content)
    {
        return View::render('pages/page', [
            'title' => $title,
            'content' => $content
        ]);
    }
}
