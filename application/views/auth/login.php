<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/logo-klik.png" />
    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/css/style.css">
    <script src="<?= base_url() ?>assets/back/sweetalert2-all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>

    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="<?= base_url() ?>assets/img/logo-klik.png" alt="sing up image"></figure>
                        <a href="<?= base_url('Auth/register') ?>" class="signup-image-link">Belum memiliki akun ?</a>
                        <a href="<?= base_url('Auth/forgot') ?>" class="signup-image-link">Lupa password ?</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log In</h2>
                        <form method="POST" action="<?= base_url('Auth/login_action') ?>" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nik" id="your_name" placeholder="NIK (Nomor Induk Kependudukan)" />
                                <?php echo form_error('nik', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" class="password" placeholder="Password" />
                                <?php echo form_error('password', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term form-checkbox" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Lihat Password</label>
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" class="form-submit">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.form-checkbox').click(function() {
                if ($(this).is(':checked')) {
                    $('.password').attr('type', 'text');
                } else {
                    $('.password').attr('type', 'password');
                }
            });
        });
    </script>
    <script>
        <?php if ($this->session->flashdata('success_register')) : ?>
            Swal.fire({
                icon: 'success',
                title: 'Anda berhasil mendaftarkan akun',
                text: 'silahkan tunggu konfirmasi dari admin kurang dari 24 jam',
                showConfirmButton: true,
                // timer: 1500
            })
        <?php elseif ($this->session->flashdata('belum_terverifikasi')) : ?>
            Swal.fire({
                icon: 'warning',
                title: 'Mohon maaf akun anda belum diverifikasi!',
                text: 'silahkan tunggu varifikasi akun dari admin',
                showConfirmButton: true,
                // timer: 1500
            })
        <?php elseif ($this->session->flashdata('password_salah')) : ?>
            Swal.fire({
                icon: 'warning',
                title: 'Password yang anda masukkan salah!',
                text: 'silahkan coba lagi',
                showConfirmButton: true,
                // timer: 1500
            })
        <?php elseif ($this->session->flashdata('nik_salah')) : ?>
            Swal.fire({
                icon: 'warning',
                title: 'NIK yang anda masukkan salah!',
                text: 'silahkan coba lagi',
                showConfirmButton: true,
                // timer: 1500
            })
        <?php elseif ($this->session->flashdata('logout')) : ?>
            Swal.fire({
                icon: 'success',
                title: 'Anda berhasil logout',
                showConfirmButton: true,
                // timer: 1500
            })
        <?php elseif ($this->session->flashdata('success_change_password')) : ?>
            Swal.fire({
                icon: 'success',
                title: 'Anda berhasil merubah password!',
                showConfirmButton: true,
                // timer: 1500
            })
        <?php endif ?>
    </script>
    <script src="<?= base_url() ?>assets/auth/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/auth/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>