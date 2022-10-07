<?php

class Customer extends Model
{
    public function prepare_data($data) {
        $prepared_data['customer_inn'] = $data;

        return $prepared_data;
    }

}