<?php

class Organization extends Customer
{
    private $jur_inn;
    private $orgn;
    private $name;
    private $address;
    private $kpp;

    function __construct($jur_inn, $orgn, $name, $address, $kpp)
    {
        $this->jur_inn = $jur_inn;
        $this->orgn = $orgn;
        $this->name = $name;
        $this->address = $address;
        $this->kpp = $kpp;
    }

    function add_ceo($phys_inn) {
        $this->phys_inn = $phys_inn;
    }

    function insert() {
        parent::customer_insert($this->jur_inn);

        $this->organization_data['jur_inn'] = $this->jur_inn;
        $this->organization_data['orgn'] = $this->orgn;
        $this->organization_data['name'] = $this->name;
        $this->organization_data['address'] = $this->address;
        $this->organization_data['kpp'] = $this->kpp;
        $this->organization_data['phys_inn'] = $this->phys_inn;

        $prepared_data = $this->prepare_data($this->organization_data);
        $query = "insert into ".get_class($this)." (".$prepared_data['columns'].") values (:".$prepared_data['values'].");";
        $this->query($query, $this->organization_data);
    }

}