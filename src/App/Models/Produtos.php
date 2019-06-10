<?php
/**
 * Created by PhpStorm.
 * User: Willian
 * Date: 09/06/2019
 * Time: 11:14
 */

namespace App\Models;
use Core\Model;

class Produtos extends Model
{
    protected $table = "produtos";
    protected $primary_key = "id_produto";
    protected $soft_delete = "data_hora_exclusao";


}