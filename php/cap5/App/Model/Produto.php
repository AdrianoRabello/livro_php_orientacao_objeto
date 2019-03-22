<?php 


namespace App\Model;
use Livro\Database\Record;
require_once("../../Lib/Livro/DataBase/Record.php");

class Produto extends Record
{
    const TABLENAME = "produto";
}
