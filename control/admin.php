<?php

function ubahpasswordadmin($username, $username2, $password1, $password2, $password3) {
    if (md5($password1) == getadmin($username)['password']) {
        if ($password2 === $password3) {
            if ($username2 == "") {
                $sql = "UPDATE `db_perusahaan_aan`.`admin` SET "
                        . "`username`='" . $username . "', "
                        . "`password`=md5('" . $password2 . "') "
                        . "WHERE  `username`='" . $username . "' AND `password`= md5('" . $password1 . "') AND `user_level`='admin';";
            } else {
                $sql = "UPDATE `db_perusahaan_aan`.`admin` SET "
                        . "`username`='" . $username2 . "', "
                        . "`password`=md5('" . $password2 . "') "
                        . "WHERE  `username`='" . $username . "' AND `password`= md5('" . $password1 . "') AND `user_level`='admin';";
            }

            if (mysql_query($sql) or exit($sql)) {
                ?>
                <script type="text/javascript">alert('Data Berhasil Diubah');</script>
                <?php

            }
        } else {
            ?>
            <script type="text/javascript">alert('Password Baru tidak sama');</script>
            <?php

        }
    } else {
        ?>
        <script type="text/javascript">alert('Password dan Username Salah!');</script>
        <?php

    }
}

function ubahpasswordmanajer($username, $username2, $password1, $password2, $password3) {
    if (md5($password1) == getmanajer($username)['password']) {
        if ($password2 === $password3) {
            if ($username2 == "") {
                $sql = "UPDATE `db_perusahaan_aan`.`admin` SET "
                        . "`username`='" . $username . "', "
                        . "`password`=md5('" . $password2 . "') "
                        . "WHERE  `username`='" . $username . "' AND `password`= md5('" . $password1 . "') AND `user_level`='manajer';";
            } else {
                $sql = "UPDATE `db_perusahaan_aan`.`admin` SET "
                        . "`username`='" . $username2 . "', "
                        . "`password`=md5('" . $password2 . "') "
                        . "WHERE  `username`='" . $username . "' AND `password`= md5('" . $password1 . "') AND `user_level`='manajer';";
            }

            if (mysql_query($sql) or exit($sql)) {
                ?>
                <script type="text/javascript">alert('Data Berhasil Diubah');</script>
                <?php

            }
        } else {
            ?>
            <script type="text/javascript">alert('Password Baru tidak sama');</script>
            <?php

        }
    } else {
        ?>
        <script type="text/javascript">alert('Password dan Username Salah!');</script>
        <?php

    }
}

function getadmin($id) {
    $result = null;
    $sql = "select * from `db_perusahaan_aan`.`admin` where user_level = 'admin' and username = '" . $id . "'";

    $result = mysql_query($sql) or exit(mysql_error());
    $result = mysql_fetch_assoc($result);
    return $result;
}

function getmanajer($id) {
    $result = null;
    $sql = "select * from `db_perusahaan_aan`.`admin` where user_level = 'manajer' and username = '" . $id . "'";

    $result = mysql_query($sql) or exit(mysql_error());
    $result = mysql_fetch_assoc($result);
    return $result;
}

function ambilsemuaadmin() {
    $result = null;
    $sql = "select * from `db_perusahaan_aan`.`admin` where user_level = 'admin'";

    $data = mysql_query($sql) or exit(mysql_error());
    while ($value = mysql_fetch_assoc($data)) {
        $result[] = $value;
    }
    return $result;
}

function tambahadmin($username, $password) {
    $sql = "INSERT INTO `db_perusahaan_aan`.`admin` (`username`, `password`, `user_level`) VALUES ('" . $username . "', '" . md5($password) . "', 'admin');";

    mysql_query($sql) or exit(mysql_error());
}

function ubahadmin($id, $username, $password) {
    $sql = "UPDATE `db_perusahaan_aan`.`admin` SET `username`='" . $username . "', `password`='" . md5($password) . "' WHERE  `username`='" . $id . "' AND `user_level`='admin';";
    
    mysql_query($sql) or exit(mysql_error());
}

function deleteAdmin($username){
    $sql = "delete from `db_perusahaan_aan`.`admin` WHERE  `username`='" . $username . "' AND `user_level`='admin';";

    mysql_query($sql) or exit(mysql_error());
}
