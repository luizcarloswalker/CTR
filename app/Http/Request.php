<?php

namespace App\Http;

class Request
{
    /**
     * Metodo http da requisicao
     *
     * @var string
     */
    private $httpMethod;

    /**
     * URI da pagina
     *
     * @var string
     */
    private $uri;

    /**
    * Parametros da URL ($_GET)
    *
    * @var array
    */
       private $queryParams = [];

    /**
    * Variaveis recebidos no POST da pagina ($_POST)
    *
    * @var array
    */
    private $postVars = [];

    /**
    * Cabeçalho da requisição
    *
    * @var array
    */
     private $headers = [];

    public function __construct()
    {
        $this->queryParams  = $_GET ?? [];
        $this->postVars     = $_POST ?? [];
        $this->headers      = getallheaders();
        $this->httpMethod   = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri          = $_SERVER['REQUEST_URI'] ?? '';
    }
}
