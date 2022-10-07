<?php

class Model extends Database
{
    function __construct()
    {
        if(!property_exists($this, 'table')) {
            $this->table = strtolower($this::class);
        }
    }

    public function where($column, $value) {
        $column = addslashes($column);
        $query = "select * from $this->table where $column = :value";
        return $this->query($query,[
            'value'=>$value
        ]);
    }

    public function findAll() {
        $query = "select * from ".$this->table;
        return $this->query($query);
    }

    public function insert($data) {
        $keys = array_keys($data);
        $columns = implode(',',$keys);
        $values = implode(',:',$keys);

        $query = "insert into $this->table ($columns) values (:$values)";
        $this->query($query, $data);
    }

    public function select_last() {
        $query = "SELECT SCOPE_IDENTITY()";
        return $this->query($query);
    }
        
    public function insert_with_last_pk($data, $pk) {
        $keys = array_keys($data);
        $columns = implode(',',$keys);
        $values = implode(',:',$keys);

        $query = "insert into $this->table ($columns) values (:$values) RETURNING $pk;";
        return $this->query($query, $data);
    }
}
