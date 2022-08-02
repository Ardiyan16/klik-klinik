<?php $this->load->view('partials/header_kasir.php') ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Konfirmasi Payment</h3>
            <a href="<?= base_url('Kasir/pengobatan') ?>" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Pembayaran Pasien</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- <button type="button" onclick="cari_resep()" class="btn btn-success" style="margin-bottom: 30px;"><i class="fa fa-search"></i> Cari Resep</button> -->
            <br>
            <form action="<?= base_url('Kasir/save_payment_nonPasien') ?>" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Kode Transaksi</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fas fa-credit-card"></span> </span>
                            </div>
                            <?php
                            $date = date('dmY');
                            $random = rand(10, 1000);
                            ?>
                            <input type="hidden" name="kd_payment" value="Payment-<?= $date . '-' . $random ?>">
                            <input type="text" value="<?= $view->kd_trans ?>" name="id_trans" id="no_trans" readonly class="form-control no_trans">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php
                        $tgl = date('Y/m/d');
                        ?>
                        <label for="">Tanggal</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fa fa-calendar"></span> </span>
                            </div>
                            <input type="text" value="<?= $tgl ?>" readonly name="tgl_trans" class="form-control datepicker">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Apoteker</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fas fa-address-book"></span> </span>
                            </div>
                            <input type="hidden" name="apoteker" value="<?= $this->session->userdata('id') ?>" class="form-control">
                            <input type="text" name="kasir" readonly value="<?= $this->session->userdata('nama') ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row" id="formPayment">

                    <div class="col-md-4">
                        <label for="">Biaya Transaksi Obat</label>
                        <div class="input-group mb-3">
                            <input type="text" value="<?= $view->total_biaya ?>" name="biaya_total" id="biaya_trans_obat" readonly class="form-control biaya_trans_obat">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Jumlah di Bayarkan</label>
                        <div class="input-group mb-3">
                            <input type="text" name="jml_dibayarkan" id="jml_dibayarkan" class="form-control jml_dibayarkan">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="">Kembalian</label>
                        <div class="input-group mb-3">
                            <input type="text" name="kembalian" id="kembalian" readonly class="form-control kembalian">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Pembayaran</button>
                </div>
                <!-- <span id="datanya"></span> -->
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="list_tarif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tabel_tarif" class="tabel_tarif">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Layanan Kesehatan</td>
                            <td>Diagnosa</td>
                            <td>Tarif</td>
                            <td>opsi</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    let dataTarif;

    function detail_tarif() {
        // getdataObat()
        $('#list_tarif').modal('show');
        table2 = $('#tabel_tarif').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "bDestroy": true,
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() ?>Kasir/list_data_tarif",
                "type": "POST"
            },

            order: [1, 'asc']

        })
        table2.ajax.reload();
    }


    function pencarian_kode(tarif) {
        $('.tarif').val(tarif);
        $('#list_tarif').modal('hide');
        // console.log('checkbox', chekbox1);
    }

    function getDataTarif() {
        $.ajax({
            url: "<?php echo base_url() ?>Kasir/getDataTarif",
            method: 'POST',
            dataType: 'JSON',
            success: function(json) {
                console.log(json);
                dataTarif = json.datanya;
            }
        })
    }

    $(document).ready(function() {

        $('#biaya_trans_obat, #jml_dibayarkan').keyup(function() {
            var TotalBiaya = $('#biaya_trans_obat').val();
            var JmlDibayar = $('#jml_dibayarkan').val();

            var Kembalian = parseInt(JmlDibayar) - parseInt(TotalBiaya);
            if (Kembalian > 0) {
                var HasilKembalian = Kembalian;
                Kembalian = to_rupiah(Kembalian);
            } else {
                Kembalian = '';
                var HasilKembalian = 0;
            }

            var Kembalian = parseInt(JmlDibayar) - parseInt(TotalBiaya);
            if (Kembalian > 0) {
                var HasilKembalian = Kembalian;
                Kembalian = to_rupiah(Kembalian);
            } else {
                Kembalian = '';
                var HasilKembalian = 0;
            }
            $('#kembalian').val(HasilKembalian);
            console.log(TransObat);
            // $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) span').html(SubTotal2);
            HitungTotalBayar();
        })
    });


    function HitungTotalBayar() {
        var Total = 0;
        var TotalBayar = 0;
        var TotalPotongan = 0;
        //var TotalDiskon = 0;
        $('#tabeltransaksi tbody tr').each(function() {
            if ($(this).find('td:nth-child(6) input#subtotal').val() > 0) {
                var SubTotal = $(this).find('td:nth-child(6) input#subtotal').val();
                Total = parseInt(Total) + parseInt(SubTotal);
            }
        });

        $('#total_transaksi').val(Total);
        $('#total_transaksi2').html(to_rupiah(Total));

        // $('#TotalOngkir').val(TotalOngkos);
        //$('#TotalDiskon').val(TotalDiskon);

        $('#terbilang').val(sayit(Total));


    }

    function to_rupiah(angka) {
        var rev = parseInt(angka, 10).toString().split('').reverse().join('');
        var rev2 = '';
        for (var i = 0; i < rev.length; i++) {
            rev2 += rev[i];
            if ((i + 1) % 3 === 0 && i !== (rev.length - 1)) {
                rev2 += '.';
            }
        }
        return rev2.split('').reverse().join('');
    }

    var thoudelim = ".";
    var decdelim = ",";
    var curr = "Rp ";
    var d = document;

    function format(s, r) {
        s = Math.round(s * Math.pow(10, r)) / Math.pow(10, r);
        s = String(s);
        s = s.split(".");
        var l = s[0].length;
        var t = "";
        var c = 0;
        while (l > 0) {
            t = s[0][l - 1] + (c % 3 == 0 && c != 0 ? thoudelim : "") + t;
            l--;
            c++;
        }
        s[1] = s[1] == undefined ? "0" : s[1];
        for (i = s[1].length; i < r; i++) {
            s[1] += "0";
        }
        return curr + t + decdelim + s[1];
    }

    function threedigit(word) {
        eja = Array("Nol", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan");
        while (word.length < 3) word = "0" + word;
        word = word.split("");
        a = word[0];
        b = word[1];
        c = word[2];
        word = "";
        word += (a != "0" ? (a != "1" ? eja[parseInt(a)] : "Se") : "") + (a != "0" ? (a != "1" ? " Ratus" : "ratus") : "");
        word += " " + (b != "0" ? (b != "1" ? eja[parseInt(b)] : "Se") : "") + (b != "0" ? (b != "1" ? " Puluh" : "puluh") : "");
        word += " " + (c != "0" ? eja[parseInt(c)] : "");
        word = word.replace(/Sepuluh ([^ ]+)/gi, "$1 Belas");
        word = word.replace(/Satu Belas/gi, "Sebelas");
        word = word.replace(/^[ ]+$/gi, "");

        return word;
    }

    function sayit(s) {
        var thousand = Array("", "Ribu", "Juta", "Milyar", "Trilyun");
        s = Math.round(s * Math.pow(10, 2)) / Math.pow(10, 2);
        s = String(s);
        s = s.split(".");
        var word = s[0];
        var cent = s[1] ? s[1] : "0";
        if (cent.length < 2) cent += "0";

        var subword = "";
        i = 0;
        while (word.length > 3) {
            subdigit = threedigit(word.substr(word.length - 3, 3));
            subword = subdigit + (subdigit != "" ? " " + thousand[i] + " " : "") + subword;
            word = word.substring(0, word.length - 3);
            i++;
        }
        subword = threedigit(word) + " " + thousand[i] + " " + subword;
        subword = subword.replace(/^ +$/gi, "");

        word = (subword == "" ? "NOL" : subword.toUpperCase()) + " RUPIAH";
        subword = threedigit(cent);
        cent = (subword == "" ? "" : " ") + subword.toUpperCase() + (subword == "" ? "" : " SEN");
        return word + cent;
    }

    $("input[data-type='currency']").on({
        keyup: function() {
            formatCurrency($(this));
        },
        blur: function() {
            formatCurrency($(this), "blur");
        }
    });


    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }
</script>
<?php $this->load->view('partials/footer.php') ?>