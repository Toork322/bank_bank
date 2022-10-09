<?php

abstract class Product extends Model
{
    private $product_id;
    private $date_opening;
    private $date_closing;
    private $period;

    function __construct($date_opening, $date_closing, $period)
    {
        $this->general_data['date_opening'] = $this->date_opening = $date_opening;
        $this->general_data['date_closing'] = $this->date_closing = $date_closing;
        $this->general_data['period'] = $this->period = $period;
    }

    abstract function insert();

    function prepare_data($data) {
        $prepared_data['keys'] = array_keys($data);
        $prepared_data['columns'] = implode(',', $prepared_data['keys']);
        $prepared_data['values'] = implode(',:', $prepared_data['keys']);
        return $prepared_data;
    }

    function product_insert_and_get_last_pk() {
        $prepared_data = $this->prepare_data($this->general_data);
        $query = "insert into ".get_parent_class($this)." (".$prepared_data['columns'].") values (:".$prepared_data['values'].") RETURNING product_id;";
        return $this->query($query, $this->general_data);
    }
}

