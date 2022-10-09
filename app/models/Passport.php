<?php

class Passport extends Model
{
    public $passport_id;
    private $passport_series;
    private $passport_number;
    private $passport_issue_date;

    function __construct($passport_series, $passport_number, $passport_issue_date) {
        $this->passport_data['passport_series'] = $this->passport_series = $passport_series;
        $this->passport_data['passport_number'] = $this->passport_number = $passport_number;
        $this->passport_data['passport_issue_date'] = $this->passport_issue_date = $passport_issue_date;
    }

    function prepare_data($data) {
        $prepared_data['keys'] = array_keys($data);
        $prepared_data['columns'] = implode(',', $prepared_data['keys']);
        $prepared_data['values'] = implode(',:', $prepared_data['keys']);
        return $prepared_data;
    }

    function insert() {
        $prepared_data = $this->prepare_data($this->passport_data);
        $query = "insert into ".get_class($this)." (".$prepared_data['columns'].") values (:".$prepared_data['values'].") RETURNING passport_id;";
        $this->passport_id = $this->query($query, $this->passport_data);
    }

    function get_passport_id() {
        return $this->passport_id;
    }
}