<?php

class OrganizationController extends Controller {
    static function add_general_information() {
        $ceo_passport = new Passport(
            $_POST['passport_series'],
            $_POST['passport_number'],
            $_POST['passport_issue_date']
        );
        $ceo = new Individual(
            $_POST['phys_inn'],
            $_POST['surname'],
            $_POST['first_name'],
            $_POST['patronymic'],
            $_POST['birthday'],
            1
        );
        $ceo_passport->insert();
        $ceo->add_passport($ceo_passport->get_passport_id());
        $ceo->insert();

        $organization = new Organization(
            $_POST['jur_inn'],
            $_POST['orgn'],
            $_POST['name'],
            $_POST['address'],
            $_POST['kpp']
        );
        $organization->add_ceo($ceo->get_inn());
        $organization->insert();
    }

    function credit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credit = new Credit(
                date("Y-m-d"),
                date('Y-m-d', strtotime("+".$_POST['period']." month", strtotime(date("Y-m-d")))),
                $_POST['period'],
                $_POST['credit_sum']
            );
            $credit->insert();

            OrganizationController::add_general_information();

            echo $this->view('/success');
       } else {
            $data = Credit::get_info_for_organization();
            echo $this->view('organization/credit', ['data'=>$data]);
       }
    }

    function deposit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $deposit = new Deposit(
                date("Y-m-d"),
                date('Y-m-d', strtotime("+".$_POST['period']." month", strtotime(date("Y-m-d")))),
                $_POST['period'],
                $_POST['rate'],
                $_POST['capitalization_period_type']
            );
            $deposit->insert();
        
            OrganizationController::add_general_information();

            echo $this->view('/success');

        } else {
            $data = Deposit::get_info_for_organization();
            echo $this->view('organization/deposit', ['data'=>$data]);
        }
        
    }
}