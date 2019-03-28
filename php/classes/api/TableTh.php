<?php

class TableTh extends Element
{
    /**
     * instancia uma nova célula
     * @param $value = conteúdo da célula
     */
    public function __construct($value)
    {
        parent::__construct('th');
        parent::add($value);
    }
}