<?php

abstract class Customer extends Model
{
    function customer_insert($customer_inn) {
        $query = "insert into ".get_parent_class($this)." (customer_inn) values (".$customer_inn.")";
        $this->query($query);
    }

    static function prepare_data($data) {
        $prepared_data['keys'] = array_keys($data);
        $prepared_data['columns'] = implode(',', $prepared_data['keys']);
        $prepared_data['values'] = implode(',:', $prepared_data['keys']);
        return $prepared_data;
    }

}