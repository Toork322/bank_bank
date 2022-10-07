<?php


class Deposit extends Product
{
    public function prepare_data($data, $pk = null) {
        $prepared_data['deposit_id'] = $pk;
        $prepared_data['rate'] = $data['rate'];
        $prepared_data['capitalization_period_type'] = $data['capitalization_period_type'];

        return $prepared_data;
    }

    public static function get_info_for_individual() {
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

    public static function get_info_for_organization() {
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