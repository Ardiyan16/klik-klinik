<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/logo-klik.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register</h2>
                        <form action="<?= base_url('Auth/action_register') ?>" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="fa fa-id-card"></i></label>
                                <input type="text" name="nik" id="name" placeholder="NIK (No Induk Kependudukann)" />
                                <?php echo form_error('nik', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="fa fa-user"></i></label>
                                <input type="text" name="name" id="name" placeholder="Nama Lengkap" />
                                <?php echo form_error('name', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tempat-lahir"><i class="fa fa-map-marker"></i></label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" />
                                <?php echo form_error('tempat_lahir', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tempat-lahir"><i class="fa fa-calendar"></i></label>
                                <input type="date" name="tgl_lahir" id="tgl_lahir" placeholder="Tempat Lahir" />
                                <?php echo form_error('tgl_lahir', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tempat-lahir"><i class="fa fa-envelope"></i></label>
                                <input type="text" name="email" id="email" placeholder="Email" />
                                <?php echo form_error('email', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tempat-lahir"><i class="fa fa-map-marker"></i></label>
                                <input type="text" name="alamat" id="alamat" placeholder="Alamat" />
                                <?php echo form_error('alamat', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tempat-lahir"><i class="fa fa-phone"></i></label>
                                <input type="text" name="no_telp" id="no_telp" placeholder="No Telepon" />
                                <?php echo form_error('no_telp', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" class="password" placeholder="Password" />
                                <?php echo form_error('password', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="agree-term" class="agree-term form-checkbox" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>Lihat Password</label>
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" id="signup" class="form-submit" >Simpan</button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?= base_url() ?>assets/img/logo-klik.png" alt="sing up image"></figure>
                        <a href="<?= base_url('Auth/login') ?>" class="signup-image-link">Sudah memiliki akun</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="<?= base_url() ?>assets/auth/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/auth/js/main.js"></script>
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
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>