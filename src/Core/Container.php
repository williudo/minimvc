<?php
/**
 * Created by PhpStorm.
 * User: Willian
 * Date: 09/06/2019
 * Time: 11:34
 */

namespace Core;


class Container
{
    public static function getModel($model, $database = false)
    {
        $class = "\\App\\Models\\".ucfirst($model);
        return new $class(Db::conexao($database));
    }
}