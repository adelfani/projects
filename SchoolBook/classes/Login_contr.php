<?php

class Login_contr extends Login
{
    private $pwd;
    private $uid;

    public function __construct( $pwd, $uid) {
        $this->pwd = $pwd;
        $this->uid = $uid;
    }

    public function loginUser() {
        if ($this->emptyInput() === false) {
            header('location: ../index.php?error=emptyinput');
            exit();
        }

        $this->getUser($this->pwd, $this->uid);
    }

    private function emptyInput() {
        if (empty($this->pwd) || empty($this->uid)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


}