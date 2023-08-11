<?php

class Login extends Controller
{
    public function index() {
        $data = [];
        if (!empty($_SESSION['user'])) {
            redirect('home');
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $user = new User;
            $arr['email'] = $_POST['email'];
            $result = $user->find_any($arr);
            if ($result && $result->password === $_POST['password']) {
                        $_SESSION['user'] = $result;
                        redirect ('home');
            }
            $user->errMsg['email'] = "Invalid login credentials";
            $data['errMsg'] = $user->errMsg;
        }
        $this->view('login', $data);
    }
}
