<?php

class Signup extends Controller
{
    public function index() {
        $data = [];
        if (!empty($_SESSION['user'])) {
            redirect('home');
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $user = new User;
            if ($user->register($_POST)) {
                $user->insert($_POST);
                redirect('login');
                }
                $data['errMsg'] = $user->errMsg;
                // show($_POST);
            }
        $this->view('signup', $data);

        }

}
