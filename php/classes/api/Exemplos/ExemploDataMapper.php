<?php


require_once "../autoload.php";

require_once "../DataMapper/Produto.php";
require_once "../DataMapper/VendaMapper.php";
require_once "../DataMapper/Venda.php";
require_once "../Connection.php";

use Api\DataMapper\Produto;
use Api\DataMapper\Venda;
use Api\DataMapper\VendaMapper;
use Api\Connection;

try {

    $conn = Connection::open('estoque');
    VendaMapper::setConnection($conn);
    $venda = new Venda();
    
    $p1 = new Produto();
    $p1->preco = 10;
    $p1->id = 8;
    
    $venda->addItem(10,$p1);
    VendaMapper::save($venda);

} catch (\Exception $e) {
    print $e->getMessage();
}
