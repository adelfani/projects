<?php

class Login extends Connection
{
    protected function getUser($pwd, $uid) {
        $stmt = $this->connect()->prepare('SELECT pwd FROM schoolbook.users WHERE uid = ? OR email = ?;');


        if (!$stmt->execute(array($uid ,$pwd))) {
            $stmt = null;
            header('Location: ../index.php?error=stmtfailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('location: ../index.php?error=usernotfound');
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = $pwd === $pwdHashed[0]["pwd"];
        $stmt = null;

        if ($checkPwd == false) {
            $stmt = null;
            header('location: ../index.php?error=wrongpwd');
            exit();

        } else if ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM schoolbook.users WHERE uid = ? OR email = ? AND pwd = ?;');
            if (!$stmt->execute(array($uid, $uid ,$pwd))) {
                $stmt = null;
                header('Location: ../index.php?error=stmtfailed');
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header('location: ../index.php?error=usernotfound');
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['userid'] = $user[0]['id'];
            $_SESSION['useruid'] = $user[0]['uid'];

            $stmt = null;
        }
    }

}