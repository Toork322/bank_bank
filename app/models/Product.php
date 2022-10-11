<?php

abstract class Product extends Model
{
    private $date_opening;
    private $date_closing;
    private $period;

    function __construct($date_opening, $date_closing, $period)
    {
        $this->date_opening = $date_opening;
        $this->date_closing = $date_closing;
        $this->period = $period;
    }

    function product_insert_and_get_last_pk() {
        $this->general_data['date_opening'] = $this->date_opening;
        $this->general_data['date_closing'] = $this->date_closing;
        $this->general_data['period'] = $this->period;

        $prepared_data = $this->prepare_data($this->general_data);
        $query = "insert into ".get_parent_class($this)." (".$prepared_data['columns'].") values (:".$prepared_data['values'].") RETURNING product_id;";
        return $this->query($query, $this->general_data);
    }
}

