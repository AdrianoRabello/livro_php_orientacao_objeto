<?php
// Lib loader
require_once 'Lib/Livro/Core/ClassLoader.php';
$al= new Livro\Core\ClassLoader;
$al->addNamespace('Livro', 'Lib/Livro');
$al->register();

// App loader
require_once 'Lib/Livro/Core/AppLoader.php';
$al= new Livro\Core\AppLoader;
$al->addDirectory('App/Control');
$al->addDirectory('App/Model');
$al->addDirectory('App/Services');
$al->register(); 

class LivroSoapServer
{
    public function __call($method, $parameters)
    {
        // lê o parâmetro class da URL
        $class = isset($_REQUEST['class']) ? $_REQUEST['class']   : '';

        // aqui você deve implementar algum mecanismo de controle !!
        if (!in_array($class, array('PessoaServices'))) {
            throw new SoapFault('server', 'Permission denied');
        }

        try {
            // verifica se a classe selecionada existe
            if (class_exists($class)) {
               // verifica se o método requerido existe
                if (method_exists($class, $method)) {
                    return call_user_func_array(array(new $class($_GET), $method),$parameters);
                }
                else {
                    // lança uma exeção SoapFault, com a mensagem a ser recebida do lado client
                    throw new SoapFault('server', "Método $class::$method não encontrado");
                }
            }
            else {
                // lança uma exeção SoapFault, com a mensagem a ser recebida do lado client
                throw new SoapFault('server', "Classe $class não encontrada");
            }
        }
        catch (Exception $e) {
            throw new SoapFault('server', $e->getMessage());
        }
    }
}

$server = new SoapServer(NULL, array('encoding' => 'UTF-8', 'uri' => 'http://test-uri/'));
$server->setClass('LivroSoapServer');
$server->handle();
