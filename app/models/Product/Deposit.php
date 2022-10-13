<?php

namespace app\models\Product;

class Deposit extends Product
{
    private $rate;
    private $capitalization_period_type;

    function __construct($date_opening, $date_closing, $period, $rate, $capitalization_period_type)
    {
        parent::__construct($date_opening, $date_closing, $period);
        $this->rate = $rate;
        $this->capitalization_period_type = $capitalization_period_type;
    }

    function insert() {
        $product_pk = parent::product_insert_and_get_last_pk();
        $this->deposit_data['deposit_id'] = $product_pk[0]->product_id;
        $this->deposit_data['rate'] = $this->rate;
        $this->deposit_data['capitalization_period_type'] = $this->capitalization_period_type;

        $prepared_data = $this->prepare_data($this->deposit_data);
        $query = "insert into ".$this->get_class_name_without_ns(get_class($this))." (".$prepared_data['columns'].") values (:".$prepared_data['values'].")";
        $this->query($query, $this->deposit_data);
    }

    static function get_info_for_individual() {
        return [
            [
                'name'=>'«Удобный плюс»',
                'describe1'=>'Ставка по депозиту 5%.',
                'describe2'=>'Срок от 6 до 9 месяцев.',
                'describe3'=>'Пополняемый вклад с возможностью частичного снятия или досрочного расторжения без потери процентов.',
                'data-bs-target'=>'comfy_form',
                'period-min'=>6,
                'period-max'=>9,
                'rate'=>4

            ],
            [
                'name'=>'«Доходный плюс»',
                'describe1'=>'Ставка по депозиту 7.5%.',
                'describe2'=>'Срок от 1 до 24 месяцев.',
                'describe3'=>'Вклад с повышенной ставкой и возможностью выбора срока вложения с точностью до дня.',
                'data-bs-target'=>'income_form',
                'period-min'=>1,
                'period-max'=>24,
                'rate'=>7.5
            ]
        ];
    }

    static function get_info_for_organization() {
        return [
            [
                'name'=>'Депозит «Срочный»',
                'describe1'=>'Ставка по депозиту 5%.',
                'describe2'=>'Срок от 1 до 90 месяцев.',
                'describe3'=>'Депозит с повышенной ставкой, возможностью выбора валюты депозита и срока с точностью до дня. 
                Удобен для размещения средств на определенный срок под более высокую ставку (новогодняя неделя, майские праздники и т. п.). 
                Депозит нельзя пополнить, а также снять без потери процентов.',
                'data-bs-target'=>'fast_form',
                'period-min'=>1,
                'period-max'=>90,
                'rate'=>5

            ],
            [
                'name'=>'Депозит «Счет-копилка»',
                'describe1'=>'Ставка по депозиту 4%.',
                'describe2'=>'Срок от 6 до 9 месяцев.',
                'describe3'=>'Пополняемый депозит с возможностью частичного снятия или досрочного расторжения без потери процентов. 
                Средства хранятся на отдельном депозитном счете, разрешено пополнение/снятие ежедневно в рамках установленных лимитов.',
                'data-bs-target'=>'kopilka_form',
                'period-min'=>6,
                'period-max'=>9,
                'rate'=>4
            ]
        ];
    }
}