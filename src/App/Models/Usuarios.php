<?php
/**
 * Created by PhpStorm.
 * User: Willian
 * Date: 09/06/2019
 * Time: 11:14
 */

namespace App\Models;
use Core\Model;

class Usuarios extends Model
{
    protected $table = "usuarios";
    protected $primary_key = "id_usuario";

    public function logar($usuario, $senha){
        $query = "select * from {$this->table} WHERE usuario = :usuario AND senha = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->bindParam(":senha", $senha);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}