<?php
class Router
{
    private $routes = array();

    // Adiciona uma rota para o roteador
    public function addRoute($method, $path, $handler)
    {
        $this->routes[] = array('method' => $method, 'path' => $path, 'handler' => $handler);
    }

    // Roteia a requisição atual
    public function useRoute()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestPath = $_SERVER['PATH_INFO'] ?? '/';

        foreach ($this->routes as $route) {
            // Verifica se o método da requisição e o caminho da rota correspondem
            if ($route['method'] == $requestMethod && $route['path'] == $requestPath) {
                $body = file_get_contents('php://input');

                // Converter o conteúdo em um objeto PHP
                $data = json_decode($body);

                // Verificar se houve algum erro na decodificação do JSON
                if (json_last_error() !== JSON_ERROR_NONE) {
                    // Lidar com o erro, se necessário
                }
                // Chama o manipulador da rota e obtém a resposta
                $response = call_user_func($route['handler'], $data);

                // Verifica se a resposta é um array (JSON) ou uma string (PHP)
                if (is_array($response)) {
                    // Transforma a resposta em JSON
                    $json = json_encode($response);

                    // Define o tipo de conteúdo da resposta como JSON e envia a resposta
                    header('Content-Type: application/json');
                    echo $json;
                } else {
                    // Define o tipo de conteúdo da resposta como HTML e envia a resposta
                    header('Content-Type: text/html');
                    include($response);
                }

                // Encerra a execução do script
                exit();
            }
        }

        // Se a rota não for encontrada, envia uma resposta 404
        header('HTTP/1.0 404 Not Found');
        echo '404 Not Found';
    }

    function __construct()
    {

        $this->addRoute('GET', '/', function () {
            return ("src/views/home/index.php");
        });
        $this->addRoute('GET', '/order', function () {
            return ("src/views/order/index.php");
        });
        $this->addRoute('GET', '/api/data', function () {
            return ("src/views/products/index.php");
        });

        $this->addRoute('POST', '/api/product/insert', function ($data) {
            $product = new Products();
            return $product->insertProduct($data);
        });

        $this->addRoute('PUT', '/api/product', function ($data) {
            $product = new Products();
            $product->changeProduct($data);
            return array('test' => true);
        });


        $this->addRoute('GET', '/api/product', function () {
            $product = new Products();
            return $product->getProducts();
        });
    }
}
