<?php

class Logout extends Controller {
    public function index() {
        session_unset();
        session_destroy();
        redirect('home');
    }
}


