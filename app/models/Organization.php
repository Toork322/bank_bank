<?php

class Organization extends Customer
{
    private $jur_inn;
    private $orgn;
    private $name;
    private $address;
    private $kpp;

    function __construct($jur_inn, $orgn, $name, $address, $kpp, $phys_inn)
    {
        $this->organization_data['jur_inn'] = $this->jur_inn = $jur_inn;
        $this->organization_data['orgn'] = $this->orgn = $orgn;
        $this->organization_data['name'] = $this->name = $name;
        $this->organization_data['address'] = $this->address = $address;
        $this->organization_data['kpp'] = $this->kpp = $kpp;
        $this->organization_data['phys_inn'] = $this->phys_inn = $phys_inn;
    }

    function insert() {
        parent::customer_insert($this->organization_data['jur_inn']);

        $prepared_data = Customer::prepare_data($this->organization_data);
        $query = "insert into ".get_class($this)." (".$prepared_data['columns'].") values (:".$prepared_data['values'].");";
        $this->query($query, $this->organization_data);
    }

}