<?php

namespace app\controllers\Product\Credit;

use app\controllers\Product\ProductController as ProductController;
use app\models\Product\Credit as Credit;

class CreditController extends ProductController {
    function individual() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credit = new Credit(
                date('Y-m-d'),
                date('Y-m-d', strtotime("+".$_POST['period']." month", strtotime(date('Y-m-d')))),
                $_POST['period'],
                $_POST['credit_sum']
            );
            $credit->insert();
            ProductController::add_individual_information();

            $this->redirect('product/success');
            
        } else {
            $data = Credit::get_info_for_individual();
            echo $this->view('product/credit/individual', ['data'=>$data]);
        }    
    }

    function organization() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credit = new Credit(
                date('Y-m-d'),
                date('Y-m-d', strtotime("+".$_POST['period']." month", strtotime(date('Y-m-d')))),
                $_POST['period'],
                $_POST['credit_sum']
            );
            $credit->insert();

            ProductController::add_organization_information();

            $this->redirect('product/success');
       } else {
            $data = Credit::get_info_for_organization();
            echo $this->view('product/credit/organization', ['data'=>$data]);
       }
    }
}