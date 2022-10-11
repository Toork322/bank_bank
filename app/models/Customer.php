<?php

abstract class Customer extends Model
{
    function customer_insert($customer_inn) {
        $query = "insert into ".get_parent_class($this)." (customer_inn) values (".$customer_inn.")";
        $this->query($query);
    }
}