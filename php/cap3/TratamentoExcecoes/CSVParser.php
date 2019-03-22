<?php

  /**
   *
   */
  class CSVParser
  {

    function __construct()
    {
      // code...
    }

    public function parse()
    {
      if (!file_exists($this->filename)) {
        // code...
        throw new \Exception("Erro {$this->filename} não encontrado ");

      }
    }
  }


 ?>
