<?php

namespace Api\DataMapper;
class VendaMapper
{
    private static $conn;

    public static function setConnection(\PDO $conn)
    {
        self::$conn = $conn;
    }

    public static function save(Venda $venda)
    {
        $data = date("Y-m-d");
        $sql = "INSERT INTO venda (data_venda) VALUES('$data')";
        print $sql;
        self::$conn->query($sql);


        $id = self::getLastId();
        $venda->setId($id);

        // percorre os itens vendidos
        // recebe a quantidade de itens da canda em um loop e armazena nas variaveis o valor de cada posição  de um array de aray, 
        //persintindo no fonal do loop
        foreach ($venda->getItens() as $item) {
            $quantidade = $item[0];
            $produto    = $item[1];
            $preco      = $produto->preco;

            $sql = "INSERT INTO item_venda (id_produto,id_venda,quantidade,preco) VALUES($produto->id,$id,$quantidade,$preco)";
            print $sql;

            self::$conn->query($sql);
        }
    }

    private static function getLastId()
    {
        $sql = "SELECT MAX(id) as max FROM venda";
        $result = self::$conn->query($sql);
        $data = $result->fetch(\PDO::FETCH_OBJ);
        return $data->max;
    }
}
