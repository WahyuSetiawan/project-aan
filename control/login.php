<?php
define('INCLUDE_CHECK', 1);

$con = mysql_connect("localhost", "root", "");
$rs = mysql_select_db("db_perusahaan_aan");

if (isset($_SESSION['admin'])) {
    header("location:index.php");
} else {
// Jika user ingin login
    if (isset($_POST['login']) && $_POST['mode']) {
        switch ($_POST['mode']) {
            case "admin":
                $nama = htmlentities($_POST['user']);
                $pass = htmlentities($_POST['pass']);
                $result = mysql_query("SELECT * FROM admin WHERE username = '$nama' and password=md5('$pass') and user_level = 'admin'");
                $user_data = mysql_fetch_array($result);
                $data_ada = mysql_num_rows($result);
                if ($data_ada == 1) {
                    $_SESSION['admin'] = true;
                    $_SESSION['username'] = $user_data['username'];
                    $_SESSION['password'] = $user_data['password'];
                    $_SESSION['user_level'] = $user_data['user_level'];

                    // Login sukses
                    header("location: index.php");
                } else {
                    // Login gagal
                    ?>
                    <script language="javascript">
                        alert("Maaf, Username atau Password Anda salah!!");
                        document.location = "index.php";
                    </script>
                    <?php
                }
                break;
            case "manajer":
                $nama = htmlentities($_POST['user']);
                $pass = htmlentities($_POST['pass']);
                $result = mysql_query("SELECT * FROM admin WHERE username = '$nama' and password=md5('$pass') and user_level = 'manajer'");
                $user_data = mysql_fetch_array($result);
                $data_ada = mysql_num_rows($result);
                if ($data_ada == 1) {
                    $_SESSION['admin'] = true;
                    $_SESSION['username'] = $user_data['username'];
                    $_SESSION['password'] = $user_data['password'];
                    $_SESSION['user_level'] = $user_data['user_level'];
                    // Login sukses
                    header("location: index.php");
                } else {
                    // Login gagal
                    ?>
                    <script language="javascript">
                        alert("Maaf, Username atau Password Anda salah!!");
                        document.location = "index.php";
                    </script>
                    <?php
                }
                break;
            case "administrator":
                $nama = htmlentities($_POST['user']);
                $pass = htmlentities($_POST['pass']);
                $result = mysql_query("SELECT * FROM admin WHERE username = '$nama' and password=md5('$pass')");
                $user_data = mysql_fetch_array($result);
                $data_ada = mysql_num_rows($result);
                if ($data_ada == 1) {
                    $_SESSION['admin'] = true;
                    $_SESSION['username'] = $user_data['username'];
                    $_SESSION['password'] = $user_data['password'];

                    // Login sukses
                    header("location: index.php");
                } else {
                    // Login gagal
                    ?>
                    <script language="javascript">
                        alert("Maaf, Username atau Password Anda salah!!");
                        document.location = "index.php";
                    </script>
                    <?php
                }
                break;
            default:
                break;
        }
    }
}
?>

<div style="left: 50%;top: 50%;margin-right: -50%;transform: translate(-50%,-50%);position: absolute">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h1 class="panel-title">Please Login Here</h1>
        </div>
        <div class="panel-footer">
            <form id="cocok" method="post" role="form" action="<?php $_SERVER['PHP_SELF'] ?>">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="user" type="text" 
                           class="username form-control" id="username" value="admin" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="pass" type="password"
                           class="password form-control" id="password" value="admin" />
                </div>
                <div class="form-group" style="font-size: smaller">
                    <label for="password">Login As</label>
                    <select name="mode"
                            class="password form-control" id="password" >
                        <option value="admin">Admin</option>
                        <option value="manajer">Manajer</option>
                        <option value="administrator">Administrator</option>
                    </select>
                </div>

                <div style="text-align: center">
                    <input class="btn btn-primary" name="login" type="submit" value="Submit" />
                    <input type=button value=Batal class="btn btn-danger" onclick='self.history.back()'>
                </div>
            </form>
        </div>  <!-- end og leftside-->
    </div>
</div>  <!-- end of container-->
