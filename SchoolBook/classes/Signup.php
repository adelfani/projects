<?php

class Signup extends Connection
{
    protected function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO schoolbook.users (uid, pwd, email) VALUE (?, ?, ?);');

//        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $pwd ,$email))) {
            $stmt = null;
            header('Location: ../index.php?error=stmtfailed');
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT uid FROM schoolbook.users WHERE uid = ? OR email = ?;');

        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header('Location: ../index.php?error=stmtfailed');
            exit();
        }

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

}