<?php

namespace Core;
/**
 * Classe de conexão ao banco de dados usando PDO no padrão Singleton.
 *
 * @author   Willian Rodrigues <willian.crodrigues90@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/williudo
 *
 * Modo de Usar:
 * require_once 'Db.php';
 * $db = Database::conexao();
 * E agora use as funções do PDO (prepare, query, exec) em cima da variável $db.
 */
class Db
{
    //Variável que guarda a conexão PDO.
    protected static $db;

    //Constrói a conexão.
    private function __construct($database_config)
    {
        //Pega a conexão no "config/database.php", referenciado no parametro:
        include_once __DIR__."/../Config/database.php";
        //Se não estiver passando o nome da conexão, conectará a primeira definida em "Config/database.php"
        $name_database = ($database_config) ? $database_config  : key($config["databases"]);
        $db_host = $config["databases"][$name_database]["host"];
        $db_nome = $config["databases"][$name_database]["database_name"];
        $db_usuario = $config["databases"][$name_database]["user"];
        $db_senha = $config["databases"][$name_database]["password"];
        $db_driver = $config["databases"][$name_database]["driver"];

        try
        {
            # Atribui o objeto PDO à variável $db.
            self::$db = new \PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
            # Garante que o PDO lance exceções durante erros.
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            # Garante que os dados sejam armazenados com codificação UFT-8.
            self::$db->exec('SET NAMES utf8');
        }
        catch (PDOException $e)
        {
            # Termina a execução mostrando o erro obtido na conexão.
            die("Connection Error: " . $e->getMessage());
        }
    }

    //Método estático - acessível sem instanciação.
    public static function conexao($database_config)
    {
        # Garante uma única instância. Se não existe uma conexão, criamos uma nova.
        if (!self::$db)
        {
            new Db($database_config);
        }
        # Retorna a conexão.
        return self::$db;
    }
}