<?php

class IndividualController extends Controller {
    static function add_general_information() {
        $passport = new Passport(
            $_POST['passport_series'],
            $_POST['passport_number'],
            $_POST['passport_issue_date']
        );
        $individual = new Individual(
            $_POST['phys_inn'],
            $_POST['surname'],
            $_POST['first_name'],
            $_POST['patronymic'],
            $_POST['birthday'],
            0
        );
        $passport->insert();
        $individual->add_passport($passport->get_passport_id());
        $individual->insert();
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

            IndividualController::add_general_information();

            echo $this->view('/success');
        } else {
            $data = Credit::get_info_for_individual();
            echo $this->view('/individual/credit', ['data'=>$data]);
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

            IndividualController::add_general_information();

            echo $this->view('/success');
  
        } else {
            $data = Deposit::get_info_for_individual();
            echo $this->view('/individual/deposit', ['data'=>$data]);
        }  
    }
}