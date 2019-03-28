<?php


class TableHead extends Element
{
    /**
     * Instancia uma nova linha
     */
    public function __construct()
    {
        parent::__construct('thead');
    }
    
    /**
     * Agrega um novo objeto célula (TTableCell) à linha
     * @param $value = conteúdo da célula
     */
    public function addCell($value)
    {
        // instancia objeto célula
        $cell = new TableTh($value);
        parent::add($cell);
        
        // retorna o objeto instanciado
        return $cell;
    }
}