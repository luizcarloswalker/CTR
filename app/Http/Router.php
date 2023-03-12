<?php

namespace App\Http;

use Closure;
use Exception;

class Router
{
    /**
     * url completa do projeto (raiz)
     *
     * @var string
     */
    private $url = '';

    /**
     * Prefixo de todas as rotas
     *
     * @var string
     */
    private $prefix = '';

    /**
     * Indice de Rotas
     *
     * @var array
     */
    private $routes = [];

    /**
     * Instancia de request
     *
     * @var Request
     */
    private $request;

    /**
     * metodo responsavel por iniciar a classe
     *
     * @param string $url
     */
    public function __construct($url = '')
    {
        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();
    }

    /**
     * metodo responsavel por definir o prefixo das rotas
     *
     * @return void
     */
    private function setPrefix()
    {
        //informacoes da url atual
        $parseUrl = parse_url($this->url);

        //Define o prefixo
        $this->prefix = $parseUrl['path'] ?? '';
    }

    /**
     * Metodo responsavel por definir o prefixo das rotas na classe
     *
     * @param string $method
     * @param string $route
     * @param array $params
     */
    private function addRoute($method, $route, $params = [])
    {
        //Validação dos parametros
        foreach ($params as $key => $value) {
            if ($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
            }
        }

        //padrao de validacao da URl
        $patternRoute = '/^' . str_replace('/', '\/', $route) . '$/';

        //adiciona a rota dentro da classe
        $this->routes[$patternRoute][$method] = $params;
    }

    /**
     * Metodo responsavel por definir uma rota de GET
     *
     * @param string $route
     * @param array $params
     */
    public function get($route, $params = [])
    {
        return $this->addRoute('GET', $route, $params);
    }


    /**
     * metodo responsavel por executar a rota atual
     *
     * @return Response
     */
    public function run()
    {
        try {
            throw new Exception("Pagina nao encontrada", 404);
        } catch (Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }
}
