<?php
	//require_once "autoload.php";
	require_once "Element.php";
	require_once "TableRow.php";
	require_once "TableCell.php";
	require_once "Table.php";
	require_once "Transaction.php";
	require_once "Connection.php";
	require_once "Criteria.php";
    require_once "Repository.php";
    require_once "Record.php";
	require_once "Produto.php";
	

	try {

		Transaction::open('estoque');
		//Transaction::setLogger(new LoggerTXT("../tmp/log_venda.txt"));
		//Transaction::log('Inserindo uma nova venda ');




        $criteria = new Criteria();
		
	
		$criteria->add(new Filter('id','>',0),Expression::OR_OPERATOR);
		
        $repository = new Repository('Produto');
        $produtos = $repository->load($criteria);
        
        $tabela = new Table();
        $tabela->width = 600;
        $tabela->border = 1;
        // add row trorna uma tag tr 
        $cabecalho = $tabela->addRow();
        $cabecalho->addCell('id');
        $cabecalho->addCell('Preço de custo');
        $cabecalho->addCell('Preço de cenda');




        foreach ($produtos as $produto) {
            $linha = $tabela->addRow();
            $linha->addCell($produto->id);
            $linha->addCell($produto->preco_custo);
            $linha->addCell($produto->preco_venda);
            //print $produto->id;
        }


        $tabela->show();


        /*echo "<pre>";
        print_r($produtos);*/


        Transaction::close();
	} catch (Exception $e) {
		Transaction::rollback();
		print $e->getMessage();
	}
 ?>
