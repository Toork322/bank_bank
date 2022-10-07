<?php

class Individual extends Customer
{
    public function prepare_data($data, $is_ceo = true) {
        $prepared_data['phys_inn'] = $data['phys_inn'];
        $prepared_data['surname'] = $data['surname'];
        $prepared_data['first_name'] = $data['first_name'];
        $prepared_data['patronymic'] = $data['patronymic'];
        $prepared_data['birthday'] = $data['birthday'];
        $prepared_data['is_ceo'] = $is_ceo;
        $prepared_data['passport_id'] = $data['passport_id'];

        return $prepared_data;
    }
}