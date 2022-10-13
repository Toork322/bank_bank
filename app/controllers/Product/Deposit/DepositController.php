<?php

namespace app\controllers\Product\Deposit;

use app\controllers\Product\ProductController;
use app\models\Product\Deposit;

class DepositController extends ProductController {
    function individual() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $deposit = new Deposit(
                date('Y-m-d'),
                date('Y-m-d', strtotime("+".$_POST['period']." month", strtotime(date('Y-m-d')))),
                $_POST['period'],
                $_POST['rate'],
                $_POST['capitalization_period_type']
            );
            $deposit->insert();

            ProductController::add_individual_information();

            $this->redirect('product/success');
        } else {
            $data = Deposit::get_info_for_individual();
            echo $this->view('product/deposit/individual', ['data'=>$data]);
        }  
    }

    function organization() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $deposit = new Deposit(
                date('Y-m-d'),
                date('Y-m-d', strtotime("+".$_POST['period']." month", strtotime(date('Y-m-d')))),
                $_POST['period'],
                $_POST['rate'],
                $_POST['capitalization_period_type']
            );
            $deposit->insert();
        
            ProductController::add_organization_information();

            $this->redirect('product/success');
        } else {
            $data = Deposit::get_info_for_organization();
            echo $this->view('product/deposit/organization', ['data'=>$data]);
        }
        
    }
}