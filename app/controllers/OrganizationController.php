<?php

class OrganizationController extends Controller {
    function credit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = new Product();
            $product_data = $product->prepare_data($_POST);
            $last_pk = $product->insert_with_last_pk($product_data, "product_id");

            $credit = new Credit();
            $_POST["credit_id"] = $last_pk[0]->product_id;
            $credit_data = $credit->prepare_data($_POST);
            $credit->insert($credit_data);

            $customer_jur = new Customer();
            $customer_data = $customer_jur->prepare_data($_POST['jur_inn']);
            $customer_jur->insert($customer_data);

            $customer_phys = new Customer();
            $customer_data = $customer_phys->prepare_data($_POST['phys_inn']);
            $customer_phys->insert($customer_data);

            $ceo_passport = new Passport();
            $ceo_passport_data = $ceo_passport->prepare_data($_POST);
            $last_pk = $ceo_passport->insert_with_last_pk($ceo_passport_data, "passport_id");

            $ceo = new Individual();
            $_POST['passport_id'] = $last_pk[0]->passport_id;
            $ceo_data = $ceo->prepare_data($_POST, true);
            $ceo->insert($ceo_data);

            $organization = new Organization();
            $organization_data = $organization->prepare_data($_POST);
            $organization->insert($organization_data);
            echo $this->view('/success');
       } else {
            $data = Credit::get_info_for_organization();
            echo $this->view('organization/credit', ['data'=>$data]);
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

            $customer_jur = new Customer();
            $customer_data = $customer_jur->prepare_data($_POST['jur_inn']);
            $customer_jur->insert($customer_data);

            $customer_phys = new Customer();
            $customer_data = $customer_phys->prepare_data($_POST['phys_inn']);
            $customer_phys->insert($customer_data);

            $ceo_passport = new Passport();
            $ceo_passport_data = $ceo_passport->prepare_data($_POST);
            $last_pk = $ceo_passport->insert_with_last_pk($ceo_passport_data, "passport_id");

            $ceo = new Individual();
            $_POST['passport_id'] = $last_pk[0]->passport_id;
            $ceo_data = $ceo->prepare_data($_POST, true);
            $ceo->insert($ceo_data);

            $organization = new Organization();
            $organization_data = $organization->prepare_data($_POST);
            $organization->insert($organization_data);
            echo $this->view('/success');
        } else {
            $data = Deposit::get_info_for_organization();
            echo $this->view('organization/deposit', ['data'=>$data]);
        }
    }

}