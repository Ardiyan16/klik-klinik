<?php $this->load->view('partials/header_admin2.php') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <h2 style="color: #07A1C8;">
            Selamat Datang, <?php echo $this->session->userdata('nama') ?>
        </h2>
        <h4 style=" margin-left: 80%;">
            <script type='text/javascript'>
                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

                var date = new Date();

                var day = date.getDate();

                var month = date.getMonth();

                var thisDay = date.getDay(),

                    thisDay = myDays[thisDay];
                var yy = date.getYear();


                var year = (yy < 1000) ? yy + 1900 : yy;

                document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
            </script>
        </h4>
    </div>
    <br>
    <!-- top tiles -->
    <div class="row" style="display: inline-block;">
        <div class="top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                    <div class="count">179</div>
                    <h3>New Sign ups</h3>
                    <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-comments-o"></i></div>
                    <div class="count">179</div>
                    <h3>New Sign ups</h3>
                    <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                    <div class="count">179</div>
                    <h3>New Sign ups</h3>
                    <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-check-square-o"></i></div>
                    <div class="count">179</div>
                    <h3>New Sign ups</h3>
                    <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->
</div>
<?php $this->load->view('partials/footer.php') ?>