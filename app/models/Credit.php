<?php


class Credit extends Product
{
    public function prepare_data($data) {
        $prepared_data['credit_id'] = $data["credit_id"];
        $prepared_data['credit_sum'] = $data['credit_sum'];

        return $prepared_data;
    }

    public static function get_info_for_individual() {
        return [
            [
                'name'=>'«Автокредит»',
                'describe1'=>'До 4 500 000 рублей..',
                'describe2'=>'Срок от 13 до 96 месяцев.',
                'describe3'=>'Кредит на покупку новых и подержанных автомобилей.',
                'data-bs-target'=>'autocredit_form',
                'period-min'=>13,
                'period-max'=>96,
            ],
            [
                'name'=>'Потребительский кредит',
                'describe1'=>'До 299 000 рублей.',
                'describe2'=>'Срок от 13 до 240 месяцев.',
                'describe3'=>'Возобновляемый кредит на непредвиденные расходы.',
                'data-bs-target'=>'potreb_form',
                'period-min'=>13,
                'period-max'=>240,
            ]
        ];
    }

    public static function get_info_for_organization() {
        return [
            [
                'name'=>'Кредит «ОБОРОТ»',
                'describe1'=>'От 500 000 до 15 000 000 рублей.',
                'describe2'=>'Срок от 3 до 12 месяцев.',
                'describe3'=>'Кредит «ОБОРОТ» предоставляется на цели пополнения оборотных средств для производства, торговли или сферы услуг.',
                'data-bs-target'=>'oborot_form',
                'period-min'=>3,
                'period-max'=>12,

            ],
            [
                'name'=>'Кредит «ИНВЕСТ»',
                'describe1'=>'От 500 000 до 15 000 000 рублей.',
                'describe2'=>'Срок от 6 до 36 месяцев.',
                'describe3'=>'Кредит предназначен для приобретения оборудования, недвижимости, транспортных средств, 
                капитального ремонта помещений, модернизации и расширения производства и других капитальных затрат.',
                'data-bs-target'=>'invest_form',
                'period-min'=>6,
                'period-max'=>36,

            ]
        ];
    }
}