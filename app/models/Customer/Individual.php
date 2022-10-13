<?php

namespace app\models\Customer;

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
        $this->phys_inn = $phys_inn;
        $this->surname = $surname;
        $this->first_name = $first_name;
        $this->patronymic = $patronymic;
        $this->birthday = $birthday;
        $this->is_ceo = $is_ceo;
    }

    function add_passport($passport_id) {
        $this->passport_id = $passport_id[0]->passport_id;
    }

    function get_inn() {
        return $this->phys_inn;
    }

    function insert() {
        parent::customer_insert($this->phys_inn);

        $this->idividual_data['phys_inn'] = $this->phys_inn;
        $this->idividual_data['surname'] = $this->surname;
        $this->idividual_data['first_name'] = $this->first_name;
        $this->idividual_data['patronymic'] = $this->patronymic;
        $this->idividual_data['birthday'] = $this->birthday;
        $this->idividual_data['is_ceo'] = $this->is_ceo;

        $this->idividual_data['passport_id'] = $this->passport_id;

        $prepared_data = $this->prepare_data($this->idividual_data);
        $query = "insert into ".$this->get_class_name_without_ns(get_class($this))." (".$prepared_data['columns'].") values (:".$prepared_data['values'].")";
        var_dump($query);
        $this->query($query, $this->idividual_data);
    }
}