<?php

class Organization extends Customer
{
    public function prepare_data($data) {
        $prepared_data['jur_inn'] = $data['jur_inn'];
        $prepared_data['orgn'] = $data['orgn'];
        $prepared_data['name'] = $data['name'];
        $prepared_data['address'] = $data['address'];
        $prepared_data['kpp'] = $data['kpp'];
        $prepared_data['phys_inn'] = $data['phys_inn'];

        return $prepared_data;
    }
}