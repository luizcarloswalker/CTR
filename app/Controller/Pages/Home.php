<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Model\Entity\Organization;

class Home extends Page
{
    /**
     * motodo responsavel por retornar o conteudo (view) da nossa home
     *
     * @return string
     */
    public static function getHome()
    {

        $obOrganization = new Organization();

        $content = View::render('pages/home', [
            'name' => $obOrganization->name,
            'description' => $obOrganization->description,
            'site' => $obOrganization->site
        ]);
        //retorna a view da pagina
        return parent::getPage('CTR - Clube de Tiro Realeza', $content);
    }
}
