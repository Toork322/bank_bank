<?php

abstract class Model extends Database
{
    function prepare_data($data) {
        $prepared_data['keys'] = array_keys($data);
        $prepared_data['columns'] = implode(',', $prepared_data['keys']);
        $prepared_data['values'] = implode(',:', $prepared_data['keys']);
        return $prepared_data;
    }
}
