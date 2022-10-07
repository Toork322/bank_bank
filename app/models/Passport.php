<?php

class Passport extends Model
{
    public function prepare_data($data) {
        $prepared_data['passport_series'] = $data['passport_series'];
        $prepared_data['passport_number'] = $data['passport_number'];
        $prepared_data['passport_issue_date'] = $data['passport_issue_date'];

        return $prepared_data;
    }
}