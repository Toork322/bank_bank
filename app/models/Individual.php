<?php

class Individual extends Customer
{
    private $phys_inn;
    private $surname;
    private $first_name;
    private $patronymic;
    private $birthday;
    private $is_ceo;
    private $passport_id;

    function __construct($phys_inn, $surname, $first_name, $patronymic, $birthday, $is_ceo)
    {
        $this->idividual_data['phys_inn'] = $this->phys_inn = $phys_inn;
        $this->idividual_data['surname'] = $this->surname = $surname;
        $this->idividual_data['first_name'] = $this->first_name = $first_name;
        $this->idividual_data['patronymic'] = $this->patronymic = $patronymic;
        $this->idividual_data['birthday'] = $this->birthday = $birthday;
        $this->idividual_data['is_ceo'] = $this->is_ceo = $is_ceo;
    }

    function add_passport($passport_id) {
        $this->idividual_data['passport_id'] = $this->passport_id = $passport_id[0]->passport_id;
    }

    function insert() {
        parent::customer_insert($this->idividual_data['phys_inn']);

        $prepared_data = Customer::prepare_data($this->idividual_data);
        $query = "insert into ".get_class($this)." (".$prepared_data['columns'].") values (:".$prepared_data['values'].");";
        $this->query($query, $this->idividual_data);
    }
}