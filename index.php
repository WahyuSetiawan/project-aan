<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>.:: LOGIN ADMIN ::.</title>

        <link href="include/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="include/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
        <link href="include/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="include/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="include/css/jquery.ui.theme.css" rel="stylesheet" type="text/css"/>
        <script src="include/js/control-javascript.js" type=text/javascript></script>
        <script src="include/js/jQuery/jquery.js" type="text/javascript"></script>
        <script src="include/js/jQuery/jquery-ui.min.js" type="text/javascript"></script>
        <script src="include/js/jquery.validate.js" type="text/javascript"></script>
        <script src="include/js/jquery.validate.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        if (session_status() == 1) {
            session_start();
        }

        if (!isset($_SESSION['admin'])) {
            include './control/login.php';
        } else {
            include './layout/header.php';
            include './koneksi/koneksi.php';

            if (isset($_SESSION['user_level'])) {
                if ($_SESSION['user_level'] == 'admin') {
                    include './layout/sidebar.php';
                    ?>
                    <div class="col-md-10">
                        <?php
                        if (!isset($_GET['page'])) {
                            include './control/kendaraan.php';
                            include './route/home.php';
                        } else {
                            switch ($_GET['page']) {
                                case "home":
                                    include './control/kendaraan.php';
                                    include './route/home.php';
                                    break;
                                case "supplier":
                                    include './route/supplier.php';
                                    break;
                                case "admin";
                                    include './control/admin.php';
                                    include './route/admin.php';
                                    break;
                                case "tonase":
                                    include './control/Perusahaan.php';
                                    include './control/sopir.php';
                                    include './control/tonase.php';
                                    include './route/tonase.php';
                                    break;
                                case "logout":
                                    include './control/logout.php';
                                    break;
                                case "statuskendaraan":
                                    include './control/Perusahaan.php';
                                    include './control/kendaraan.php';
                                    include './route/statuskendaraan.php';
                                    break;
                                case "sopir":
                                    include './control/sopir.php';
                                    include './control/kendaraan.php';
                                    include './route/sopir.php';
                                    break;
                                case "kendaraan":
                                    include './control/kendaraan.php';
                                    include './control/pemilikkendaraan.php';
                                    include './route/kendaraan.php';
                                    break;
                                case "pemilikmobil":
                                    include './control/pemilikkendaraan.php';
                                    include './route/pemilikkendaraan.php';
                                    break;
                                case "perusahaan":
                                    include './control/Perusahaan.php';
                                    include './route/perusahaan.php';
                                    break;
                                default :
                                    include './page/error/error.php';
                                    break;
                            }
                        }
                    } elseif ($_SESSION['user_level'] == 'manajer') {
                        include './layout/sidebar-manajer.php';
                        ?>
                        <div class="col-md-10">
                            <?php
                            if (!isset($_GET['page'])) {
                                include './route/manajer/homemanajer.php';
                            } else {
                                switch ($_GET['page']) {
                                    case "home":
                                        include './route/manajer/home.php';
                                        break;
                                    case "admin";
                                        include './control/admin.php';
                                        include './route/manajer/admin.php';
                                        break;
                                    case "tonase":
                                        include './control/Perusahaan.php';
                                        include './control/kendaraan.php';
                                        include './control/sopir.php';
                                        include './control/pemilikkendaraan.php';
                                        include './route/manajer/tonase.php';
                                        break;
                                    case "logout":
                                        include './control/logout.php';
                                        break;
                                    case "sopir":
                                        include './control/sopir.php';
                                        include './route/manajer/sopir.php';
                                        break;
                                    case "kendaraan":
                                        include './control/pemilikkendaraan.php';
                                        include './control/kendaraan.php';
                                        include './route/manajer/kendaraan.php';
                                        break;
                                    case "pemilikmobil":
                                        include './control/pemilikkendaraan.php';
                                        include './route/manajer/pemilikkendaraan.php';
                                        break;
                                    case "perusahaan":
                                        include './control/Perusahaan.php';
                                        include './route/manajer/perusahaan.php';
                                        break;
                                    default :
                                        include './page/error/error.php';
                                        break;
                                }
                            }
                        }
                    }
                    ?>
                </div>

                <?php
                include './layout/footer.php';
            }
            ?>

    </body>
</html>