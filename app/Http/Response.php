<?php

namespace App\Http;

class Response
{
    /**
     * Codigo do Status HTTP
     *
     * @var integer
     */
    private $httpCode = 200;

    /**
     * cabecalho do Response
     *
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de conteudo que esta sendo retornado
     *
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Conteudo do Response
     *
     * @var mixed
     */
    private $content;

    /**
     * Metodo responsavel por iniciar a classe e definir os valores
     *
     * @param integer $httpCode
     * @param mixed $content
     * @param string $contentType
     */
    public function __construct($httpCode, $content, $contentType = 'text/html')
    {
        $this->$httpCode = $httpCode;
        $this->$content = $content;
        $this->setContentType($contentType);
    }

    /**
     * metodo responsavel por alterar o contenttype do response
     *
     * @param [type] $contentType
     * @return string
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * metodo responsavel por adicionar um registro no cabeçalho do response
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }


    /**
     * Metodo responsavel por enviar os headers para o navegador
     *
     */
    private function sendHeaders()
    {
        //STATUS
        http_response_code($this->httpCode);

        //ENVIAR HEADERS
        foreach ($this->headers as $key => $value) {
            header($key . ':  ' . $value);
        }
    }


    /**
     * Metodo responsavel por enviar a resposta para o usuario
     *
     */
    public function sendResponse()
    {
        //envia os headers
        $this->sendHeaders();

        //imprime o conteudo
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;
        }
    }
}
