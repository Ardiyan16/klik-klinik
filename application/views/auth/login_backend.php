<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Log In</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/logo-klik.png" />

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/back/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>assets/back/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url() ?>assets/back/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url() ?>assets/back/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>assets/back/build/css/custom.min.css" rel="stylesheet">

    <script src="<?= base_url() ?>assets/back/sweetalert2-all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="post" action="<?= base_url('Auth/action_login') ?>">
                        <img src="<?= base_url() ?>assets/img/logo-klik-klinik.png" height="150" width="400">
                        <h1>Login Form</h1>
                        <div>
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            <input type="text" class="form-control" name="username" placeholder="Username" />
                        </div>
                        <div>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            <input type="password" class="form-control" name="password" placeholder="Password" />
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Log In</button>
                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-healt"></i> Klik Klinik!</h1>
                                <p>copyright klik klinik ©2022 website by bikea tech</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
<script>
    <?php if ($this->session->flashdata('gagal')) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Anda gagal untuk login!',
            text: 'Role anda tidak ditemukan!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('password_salah')) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Anda gagal untuk login!',
            text: 'password anda salah!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('tidak_aktif')) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Anda gagal untuk login!',
            text: 'akun anda belum dikonfirmasi!',
            showConfirmButton: true,
            // timer: 1500
        })


    <?php elseif ($this->session->flashdata('username_salah')) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Anda gagal untuk login!',
            text: 'username anda salah!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('logout')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Anda berhasil logout!',
            text: 'silahkan login untuk masuk kembali!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>

</html>