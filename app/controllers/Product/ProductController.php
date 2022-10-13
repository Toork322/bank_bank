<?php
namespace app\controllers\Product;

use app\core\Controller;
use app\models\Customer\Passport;
use app\models\Customer\Individual;
use app\models\Customer\Organization;

class ProductController extends Controller {
    function index() {
        $this->redirect('');
    }

    function success() {
        echo $this->view('product/success');
    }

    static function add_individual_information() {
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

    static function add_organization_information() {
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
}