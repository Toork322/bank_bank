<?php

namespace app\models\Customer;

use app\core\Model;

abstract class Customer extends Model {
    function customer_insert($customer_inn) {
        $query = "insert into ".$this->get_class_name_without_ns(get_parent_class($this))." (customer_inn) values (".$customer_inn.")";
        var_dump($query);
        $this->query($query);
    }
}