<?php

class IndividualController extends Controller {
    function credit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = new Product();
            $product_data = $product->prepare_data($_POST);
            $last_pk = $product->insert_with_last_pk($product_data, "product_id");

            $credit = new Credit();
            $_POST["credit_id"] = $last_pk[0]->product_id;
            $credit_data = $credit->prepare_data($_POST);
            $credit->insert($credit_data);

            $customer_phys = new Customer();
            $customer_data = $customer_phys->prepare_data($_POST['phys_inn']);
            $customer_phys->insert($customer_data);

            $passport = new Passport();
            $passport_data = $passport->prepare_data($_POST);
            $last_pk = $passport->insert_with_last_pk($passport_data, "passport_id");
    
            $individual = new Individual();
            $_POST['passport_id'] = $last_pk[0]->passport_id;
            $individual_data = $individual->prepare_data($_POST, 0);
            $individual->insert($individual_data);

            echo $this->view('/success');
        } else {
            $data = Credit::get_info_for_individual();
            echo $this->view('/individual/credit', ['data'=>$data]);
        }    
    }

    function deposit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = new Product();
            $product_data = $product->prepare_data($_POST);
            $last_pk = $product->insert_with_last_pk($product_data, "product_id");
            
            $deposit = new Deposit();
            $deposit_data = $deposit->prepare_data($_POST, $last_pk[0]->product_id);
            $deposit->insert($deposit_data);

            $customer_phys = new Customer();
            $customer_data = $customer_phys->prepare_data($_POST['phys_inn']);
            $customer_phys->insert($customer_data);

            $passport = new Passport();
            $passport_data = $passport->prepare_data($_POST);
            $last_pk = $passport->insert_with_last_pk($passport_data, "passport_id");

            $individual = new Individual();
            $_POST['passport_id'] = $last_pk[0]->passport_id;
            $individual_data = $individual->prepare_data($_POST, 0);
            $individual->insert($individual_data);
            echo $this->view('/success');
        } else {
            $data = Deposit::get_info_for_individual();

            echo $this->view('/individual/deposit', ['data'=>$data]);
        }  
    }
}