<?php
use Livro\Control\Page;
use Livro\Widgets\Base\Element;

class MeuExemplo extends Page
{
    public function __construct()
    {
        parent::__construct();



        $card = new Element('div');
        $card->class = 'card';



        $div = new Element('div');
        $div->class = "card header";

        $p = new Element("p");
        $p->class = "text-info text-center";
        $p->add("texto do paragrafo adicionado no card-header");

        $div->add($p);

        $div2 = new Element("div");
        $div2->class = "card-body";
        $div2->add("<div class = 'form-group'><input type='text' class = 'form-control'></div>");
        $div2->add("<div class = 'form-group'><input type='text' class = 'form-control'></div>");
        $div2->add("<div class = 'form-group'><button class='btn btn-primary btn-block'>ok</button></div>");


        $card->add($div);
        $card->add($div2);

        parent::add($card);


    }
}
