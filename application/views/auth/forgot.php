<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lupa Password</title>

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
                        <a href="<?= base_url('Auth/login') ?>" class="signup-image-link">Sudah memiliki akun ?</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Ubah Password</h2>
                        <form method="POST" action="<?= base_url('Auth/action_forgot') ?>" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nik" id="your_name" placeholder="NIK (Nomor Induk Kependudukan)" />
                                <?php echo form_error('nik', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" class="password" placeholder="Password Baru" />
                                <?php echo form_error('password', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="konfir_password" id="your_pass" class="password" placeholder="Ulangi Password" />
                                <?php echo form_error('konfir_password', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term form-checkbox" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Lihat Password</label>
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" class="form-submit">Change Password</button>
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

        <?php if ($this->session->flashdata('fail_change_password')) : ?>
            Swal.fire({
                icon: 'warning',
                title: 'Anda gagal merubah password!',
                text: 'silahkan coba lagi',
                showConfirmButton: true,
                // timer: 1500
            })
        <?php elseif ($this->session->flashdata('wrong_email')) : ?>
            Swal.fire({
                icon: 'warning',
                title: 'Email anda tidak terdaftar atau belum terverifikasi!',
                text: 'silahkan tunggu varifikasi akun dari admin',
                showConfirmButton: true,
                // timer: 1500
            })
        <?php endif ?>
    </script>
    <script src="<?= base_url() ?>assets/auth/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/auth/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>