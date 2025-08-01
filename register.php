<?php

require 'config/conn.php';

if (isset($_SESSION['user'])) {
    header('Location: index.php?page=dashboard');
    exit();
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $vehicle_type = $_POST['vehicle_type'];
    $plat_number = $_POST['plat_number'];
    $rf_id = $_POST['rf_id'];
    $chat_id = $_POST['chat_id'];

    $row = mysqli_query($conn, "INSERT INTO members VALUES(
    '',
    '$name',
    '$address',
    '$gender',
    '$phone',
    '$email',
    '$password',
    0,
    '$vehicle_type',
    '$plat_number',
    0,
    '$rf_id',
    '$chat_id',
    NOW()
    )");

    $id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT LAST_INSERT_ID() AS id"))['id'];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM members WHERE id = $id"));
    $_SESSION['user'] = $user;
    $_SESSION['role'] = 'member';
    header('Location: index.php?page=dashboard');
    exit();
}

?>

<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Register</title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE 4 | Login Page" />
    <meta name="author" content="ColorlibHQ" />
    <meta
        name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance." />
    <meta
        name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant" />
    <!--end::Primary Meta Tags-->
    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="node_modules/admin-lte/dist/css/adminlte.css" as="style" />
    <!--end::Accessibility Features-->
    <!--begin::Fonts-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous"
        media="print"
        onload="this.media='all'" />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="node_modules/admin-lte/dist/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="login-logo">
            <a href="node_modules/admin-lte/dist/index2.html"><b>io.</b>PARK</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger">
                        <strong>Error</strong>
                        <p><?php echo $error; ?></p>
                    </div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input name="name" type="text" class="form-control" placeholder="Nama" />
                    </div>
                    <div class="input-group mb-3">
                        <input name="address" type="text" class="form-control" placeholder="Alamat" />
                    </div>
                    <div class="input-group mb-3">
                        <select name="gender" class="form-control">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input name="phone" type="text" class="form-control" placeholder="No. Telepon" />
                    </div>
                    <div class="input-group mb-3">
                        <input name="address" type="text" class="form-control" placeholder="Alamat" />
                    </div>
                    <div class="input-group mb-3">
                        <select name="vehicle_type" class="form-control">
                            <option value="Roda Dua">Roda Dua</option>
                            <option value="Roda Empat">Roda Empat</option>
                            <option value="Roda Enam">Roda Enam</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input name="plat_number" type="text" class="form-control" placeholder="Plat Nomor" />
                    </div>
                    <div class="input-group mb-3">
                        <input name="rf_id" type="text" class="form-control" placeholder="RF ID" />
                    </div>
                    <div class="input-group mb-3">
                        <input name="chat_id" type="text" class="form-control" placeholder="ID Chat" />
                    </div>
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Email" />
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Password" />
                    </div>
                    <div class="input-group mb-3">
                        <input name="password_confirmation" type="password" class="form-control" placeholder="Konfirmasi Password" />
                    </div>
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                <label class="form-check-label" for="flexCheckDefault"> Remember Me </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
        src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="node_modules/admin-lte/dist/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
        password = document.querySelector('input[name="password"]')
        password_confirmation = document.querySelector('input[name="password_confirmation"]')

        password.addEventListener('input', function() {
            if (password.value !== password_confirmation.value) {
                password_confirmation.setCustomValidity('Passwords do not match');
            } else {
                password_confirmation.setCustomValidity('');
            }
        });

        password_confirmation.addEventListener('input', function() {
            if (password.value !== password_confirmation.value) {
                password_confirmation.setCustomValidity('Passwords do not match');
            } else {
                password_confirmation.setCustomValidity('');
            }
        });
    </script>

    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
</body>
<!--end::Body-->

</html>
