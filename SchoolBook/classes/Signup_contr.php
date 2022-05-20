<?php

class Signup_contr extends Signup
{
    private $uid;
    private $pwd;
    private $re_pwd;
    private $email;

    public function __construct($uid, $pwd, $re_pwd, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->re_pwd = $re_pwd;
        $this->email = $email;
    }

    public function signupUser() {
        if ($this->emptyInput() === false) {
            header('location: ../index.php?error=emptyinput');
            exit();
        }

        if ($this->invalidUid() === false) {
            header('location: ../index.php?error=username');
            exit();
        }

        if ($this->invalidEmail() === false) {
            header('location: ../index.php?error=email');
            exit();
        }

        if ($this->pwdMatch() === false) {
            header('location: ../index.php?error=pwdmatch');
            exit();
        }

        if ($this->uidTakenCheck() === false) {
            header('location: ../index.php?error=uidTaken');
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function emptyInput() {
        if (empty($this->uid) || empty($this->pwd) || empty($this->re_pwd) || empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidUid() {
        if (!preg_match("/^[a-zA-Z-' ]*$/",$this->uid)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch() {
        if ($this->pwd !== $this->re_pwd) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck() {
        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


}






















