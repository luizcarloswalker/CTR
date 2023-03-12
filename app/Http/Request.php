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


    /**
     * Get uRI da pagina
     *
     * @return  string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set uRI da pagina
     *
     * @param  string  $uri  URI da pagina
     *
     * @return  self
     */
    public function setUri(string $uri)
    {
        $this->uri = $uri;

        return $this;
    }

       /**
        * Get parametros da URL ($_GET)
        *
        * @return  array
        */
    public function getQueryParams()
    {
           return $this->queryParams;
    }

       /**
        * Set parametros da URL ($_GET)
        *
        * @param  array  $queryParams  Parametros da URL ($_GET)
        *
        * @return  self
        */
    public function setQueryParams(array $queryParams)
    {
           $this->queryParams = $queryParams;

           return $this;
    }

    /**
     * Get variaveis recebidos no POST da pagina ($_POST)
     *
     * @return  array
     */
    public function getPostVars()
    {
        return $this->postVars;
    }

    /**
     * Set variaveis recebidos no POST da pagina ($_POST)
     *
     * @param  array  $postVars  Variaveis recebidos no POST da pagina ($_POST)
     *
     * @return  self
     */
    public function setPostVars(array $postVars)
    {
        $this->postVars = $postVars;

        return $this;
    }

     /**
      * Get cabeçalho da requisição
      *
      * @return  array
      */
    public function getHeaders()
    {
         return $this->headers;
    }

     /**
      * Set cabeçalho da requisição
      *
      * @param  array  $headers  Cabeçalho da requisição
      *
      * @return  self
      */
    public function setHeaders(array $headers)
    {
         $this->headers = $headers;

         return $this;
    }
}
