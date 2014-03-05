<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// application/controllers/account.php

class AccountController extends BaseController {

    public function index() {
        echo " This is the profile page.";
    }

    public function login() {
        echo "This is the login form.";
    }

    public function logout() {
        echo "This is the logout action.";
    }

}
