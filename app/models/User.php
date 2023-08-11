<?php

class User
{
    use Model;

    protected $table = 'users';

    protected $allowedColumns = [
        'name', 'email', 'password'
    ];

    public function register($data) {
        $this->errMsg = [];

 
        $blank = "field is required.";

        if (empty($data['name'])) {
            $this->errMsg['name'] = "Name " . $blank;
        }
        if (empty($data['email'])) {
            $this->errMsg['email'] = "Email " . $blank;
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errMsg['email'] = "Invalid Email";
        }
        if (empty($data['phone'])) {
            $this->errMsg['phone'] = "Phone " . $blank;
        }
        if (empty($data['password'])) {
            $this->errMsg['password'] = "Password " . $blank;
        } elseif (strlen($data['password']) < 4) {
            $this->errMsg['password'] = "Passwords min 4 characters.";
        } elseif ($data['verifyPass'] != $data['password']) {
               $this->errMsg['password'] = "Passwords do not match";
        }
        // Check if email or phone already exist
        $arr['email'] = $data['email'];
        $arr['phone'] = $data['phone'];
        $res = ($this->find_any($arr));
        if ($res) {
            if ($arr['email'] == $res->email) {
                $this->errMsg['email'] = "Email already in use";
                } elseif ($arr['phone'] == $res->phone) {
                    $this->errMsg['phone'] = "Phone already in use";
                }
            }
        
        // Proceed after validation checks
        if (empty($this->errMsg)) {
            return true;
        } return  false;

    }


}