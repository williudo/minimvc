<?php
/**
 * Created by PhpStorm.
 * User: Willian
 * Date: 08/06/2019
 * Time: 12:28
 */

namespace Core;

abstract class Model
{
    protected $db;
    protected $table;
    protected $primary_key;
    protected $soft_delete = false;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function fetchAll()
    {
        if($this->soft_delete){
            $query = "select * from {$this->table} WHERE {$this->soft_delete} IS :nulo";
            $stmt = $this->db->prepare($query);
            $null = null;
            $stmt->bindParam(":nulo", $null);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }else{
            $query = "select * from {$this->table}";
            $q = $this->db->query($query);
            return $q->fetchAll(\PDO::FETCH_ASSOC);
        }

    }

    public function find($id)
    {
        $query = "select * from {$this->table} WHERE {$this->primary_key} = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);


    }

    public function insert($data)
    {
        $concat_string_fields = '';
        $concat_string_values = '';
        $i = 0;
        foreach($data as $key => $value){
            $i++;
            $concat_string_fields .= $key;
            $concat_string_values .= ":".$key;
            if($i < count($data)){
                $concat_string_fields .= ', ';
                $concat_string_values .= ', ';
            }
        }
        $query = "INSERT INTO {$this->table} ($concat_string_fields) VALUES ($concat_string_values)";
        $stmt = $this->db->prepare($query);

        foreach($data as $key => $value){
            $params[':'.$key] = $value;
        }

        $stmt->execute($params);
        return $this->db->lastInsertId();
    }

    public function update($data)
    {
        $concat_string = '';
        $i = 0;
        foreach($data as $key => $value){
            $i++;
            $concat_string .= $key ." = ";
            $concat_string .= ":".$key;
            if($i < count($data)){
                $concat_string .= ', ';
            }
        }
        $query = "UPDATE {$this->table} SET $concat_string WHERE {$this->primary_key} = :{$this->primary_key}";
        $stmt = $this->db->prepare($query);

        foreach($data as $key => $value){
            $params[':'.$key] = $value;
        }

        $stmt->execute($params);
        return $data;


    }

    public function delete($data, $id)
    {
        $concat_string = '';
        $i = 0;
        foreach($data as $key => $value){
            $i++;
            $concat_string .= $key ." = ";
            $concat_string .= ":".$key;
            if($i < count($data)){
                $concat_string .= ', ';
            }
        }
        $query = "UPDATE {$this->table} SET $concat_string WHERE {$this->primary_key} = :{$this->primary_key}";
        $stmt = $this->db->prepare($query);
        $params[':'.$this->primary_key] = $id;
        foreach($data as $key => $value){
            $params[':'.$key] = $value;
        }

        $stmt->execute($params);
        return $data;


    }
}