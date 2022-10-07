<?php

class Product extends Model
{
    public function prepare_data($data) {
        $prepared_data['date_opening'] = date("Y-m-d");
        $prepared_data['date_closing'] = date(
            'Y-m-d', 
            strtotime(
                "+".$data['period']." month", 
                strtotime($prepared_data['date_opening'])
            )
        );
        $prepared_data['period'] = $data['period'];

        return $prepared_data;
    }

    #private $pk;
    #private $date_opening;
    #private $date_closing;
    #private $period;
    #private function __construct(string $date_opening, string $date_closing, int $period)
    #{
    #    parent::__construct();
    #    $this->date_opening = $date_opening;
    #    $this->date_closing = $date_closing;
    #    $this->period = $period;
    #}

        #public function prepare_data() {
    #    $assoc_array = [
    #        'date_opening' => $this->date_opening, 
    #        'date_closing' => $this->date_closing, 
    #        'period' => $this->period
    #    ];
    #    
    #    print_r($assoc_array);
    #    return $assoc_array;
    #}
}

