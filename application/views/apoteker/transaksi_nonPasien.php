<?php $this->load->view('partials/header_apoteker.php') ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Transaksi Obat Non Pasien</h3>
            <a href="<?= base_url('Apoteker/resep') ?>" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Transaksi Non Pasien</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- <button type="button" onclick="cari_resep()" class="btn btn-success" style="margin-bottom: 30px;"><i class="fa fa-search"></i> Cari Resep</button> -->
            <br>
            <form action="<?= base_url('Apoteker/save_transaksi_nonPasien') ?>" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">No Transaksi</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><span class="fas fa-credit-card"></span> </span>
                            </div>
                            <input type="text" name="kd_trans" readonly id="no_trans" class="form-control no_trans">
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
                <div class="row">
                    <div class="table-responsive">
                        <table class="table text-center" id="tabeltransaksi">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Obat</th>
                                    <th scope="col">Nama Obat</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Sub Total</th>
                                    <th scope="col">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <button type="button" style="margin-top: 25px;" class="btn-sm btn-primary" id="BarisBaru">
                            <i class="fa fa-plus-circle"></i> Baris Baru
                        </button>
                        <!-- <a href="<?= base_url() . "transaksi/addDetailPenjualan" ?>" class="btn btn-default addDetail"><span class="fa fa-plus"></span> Tambah Item</a> -->
                    </div>
                    <div class="col-auto ml-auto">
                    </div>
                    <div class="col-auto ml-auto">
                        <h4 class="total" style="color: orange;">Total : <span id='total_transaksi2'>0</span></h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <label for="">Total Transaksi</label>
                        <div class="input-group mb-3">
                            <input type="text" name="total_trans" id="total_transaksi" readonly class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Transaksi</button>
                </div>
                <!-- <span id="datanya"></span> -->
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="list_obat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tabel_obat" class="tabel_obat">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kode Obat</td>
                            <td>Nama Obat</td>
                            <td>Harga</td>
                            <td>Stok</td>
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
    let dataObat;

    $(document).ready(function() {
        getDataObat();
        //detail_barang();
        $('html, body').animate({
            scrollTop: 0
        }, 0);
        $.ajax({
            url: "<?php echo base_url() . 'Apoteker/max_no_trans'; ?>",
            dataType: 'json',
            method: 'POST',
            success: function(json) {
                var d = "<?php echo date('d') ?>";
                var m = "<?php echo date('m') ?>";
                var y = "<?php echo date('Y') ?>";

                if (json.maxs == null) {
                    max = 'TAKK' + '' + y + '' + m + '' + d + '-' + '0000';
                } else {
                    max = json.maxs;
                }

                var ambil_tanggal = max.substring(10, 12);
                console.log('max', max);
                console.log('ambil_tanggal', ambil_tanggal);

                if (d == ambil_tanggal) {
                    // urut = max.substring(18, 20);
                    urut = max.split('-')[1];
                } else {
                    urut = "000";
                }

                urut++;
                console.log(urut);
                var kodene = sprintf("%05s", urut);

                var invoice = 'TAKK' + '' + y + '' + m + '' + d + '-' + kodene;
                console.log('invoice', invoice);
                $('#no_trans').val(invoice);
            }
        });
    });

    function getDataObat() {
        $.ajax({
            url: "<?php echo base_url() ?>Apoteker/getDataObat",
            method: 'POST',
            dataType: 'JSON',
            success: function(json) {
                console.log(json);
                dataObat = json.datanya;
            }
        })
    }

    function detail_obat(id) {
        // getdataObat()
        $('#list_obat').modal('show');
        table2 = $('#tabel_obat').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "bDestroy": true,
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() ?>Apoteker/list_data_obat/" + id,
                "type": "POST"
            },

            order: [1, 'asc']

        }).fnDestroy();
        table2.ajax.reload();
    }

    $('#BarisBaru').on('click', function() {
        BarisBaru();
    });

    function runningFormatter(value, row, index) {
        return index + 1;
    }

    $(document).on('click', '#HapusBaris', function(e) {
        e.preventDefault();
        if ($(this).parent().parent().find("#pencarian_kode").val() == "") {
            $(this).parent().parent().remove();
            var nomor = 1;
            $('#tabeltransaksi tbody tr').each(function() {
                $(this).find('td:nth-child(1)').html(nomor);
                nomor++;
            })
            HitungTotalBayar();
        } else {
            $(this).parent().parent().remove();
            var nomor = 1;
            $('#tabeltransaksi tbody tr').each(function() {
                $(this).find('td:nth-child(1)').html(nomor);
                nomor++;
            })
            HitungTotalBayar();
        }
    });

    function BarisBaru() {
        var nomor = $('#tabeltransaksi tbody tr').length + 1;
        console.log(nomor);
        //0
        var baris = "<tr>";
        baris += "<td>" + nomor + "</td>";

        //1
        baris += "<td style='display: flex;height: 58px;'>";
        baris += "<input autocomplete='off' required  type='text' class='form-control kd_obat" + nomor + "' name='kode_obat[]' id='pencarian_kode' placeholder='Ketik Kode / Nama Obat'><button type='button' class='btn-sm btn-success' onclick='detail_obat(" + nomor + ")' style='margin-left: 4px;'> <i class='ace-icon fa fa-search'></i></button>";
        baris += "<div id='hasil_pencarian' class='hasil_pencarian'></div>";
        baris += "</td>";


        //3
        baris += "<td><input type='text' name='nama_obat[]' id='nama_obat' class='form-control nama_obat" + nomor + "' readonly></td>";

        //4
        baris += "<td><input type='number' name='qty[]' id='qty' value'0' class='form-control qty" + nomor + "'></td>";


        //5
        baris += "<td><input type='number' name='harga[]' id='harga' class='form-control harga" + nomor + "' readonly></td>";


        //6
        baris += "<td><input type='text' name='subtotal[]' id='subtotal' class='form-control subtotal" + nomor + "' readonly></td>";

        //hapus
        baris += "<td><button  class='btn btn-danger' id='HapusBaris'><i class='fa fa-times' style='color:white;'></i></button></td>";
        baris += "</tr>";

        $('#tabeltransaksi').append(baris);
        // Fokus Input
        $('#tabeltransaksi tbody tr').each(function() {
            $(this).find('td:nth-child(2) input').focus();
        });
    }


    function pencarian_kode(id, kd_obat, nama_obat, harga, nomor) {
        $('.kd_obat' + nomor).val(kd_obat);
        $('.nama_obat' + nomor).val(nama_obat);
        $('.harga' + nomor).val(harga);
        $('#list_obat').modal('hide');
        // console.log('checkbox', chekbox1);
    }

    let intervalPress;

    function cariObat(keyword, Indexnya, foundItem) {
        let htmlFoundItem = "<ul id='daftar-autocomplete' class='daftar-autocomplete'>";
        foundItem.forEach((b, i) => {
            //	var b.stok_gudang = 0;
            if (i == 0) {
                htmlFoundItem += '<li class="--focus">';
            } else {
                htmlFoundItem += '<li>';
            }

            htmlFoundItem += `
                <b>Kode</b> : 
                `
                // <span id='kodenya'>` + b.kode_barang + `</span> <br />
                +
                `
                <span id='kode'>` + b.kd_obat + `</span> <br />
                <span id='nama_obat'>` + b.nama_obat + `</span><br />
                <span id='harga' style='display:none;'>` + b.harga + `</span>
            </li>
        `;
        })
        htmlFoundItem += "</ul>";

        if (foundItem.length > 0 && keyword != "") {
            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').show('fast');
            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').html(htmlFoundItem);
        } else {
            let tidakAda = '<ul class="daftar-autocomplete"><li> <span>Obat Tidak Ditemukan</span></li><ul>'
            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').html(tidakAda);
            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').show('fast');
        }
        // console.log(foundItem);
        return foundItem.length;
    }

    let tempKeyword = false;
    $(document).on('keyup', '#pencarian_kode', function(e) {
        var keyword = $(this).val();
        // console.log(keyword);
        var Indexnya = $(this).parent().parent().index();
        var key = e.which || e.keyCode;
        if (e.which == 40) {
            $(this).select();
            $(this).parent().find("#hasil_pencarian > #daftar-autocomplete li").each(function(i, e) {
                if ($(this).hasClass("--focus") && i < $(this).parent().find('li').length - 1) {
                    $(this).removeClass("--focus");
                    $(this).parent().find('li').each(function(ii, e) {
                        if (ii == (i + 1)) {
                            $(this).addClass("--focus");
                            if ($(this).position().top > 350) {
                                $(this).parent().parent().scrollTop($(this).parent().parent().scrollTop() + 71);
                            }
                        }
                    })
                    return false;
                }
            })
            e.preventDefault();
            return false;
        } else if (e.which == 38) {
            $(this).select();
            $(this).parent().find("#hasil_pencarian > #daftar-autocomplete li").each(function(i, e) {
                if ($(this).hasClass("--focus") && i != 0) {
                    $(this).removeClass("--focus");
                    $(this).parent().find('li').each(function(ii, e) {
                        if (ii == (i - 1)) {
                            $(this).addClass("--focus");
                            if ($(this).position().top < 0) {
                                $(this).parent().parent().scrollTop($(this).parent().parent().scrollTop() - 71);
                            }
                        }
                    })
                    return false;
                }
            })
            e.preventDefault();
            return false;
        } else if (e.which == 13) {
            $(this).select();
            let foundItem = [];
            for (let i = 0; i < dataObat.length; i++) {
                let reg = new RegExp('^' + keyword + '.*$', 'i');
                if (
                    // dataObat[i].kode_barcode_varian == keyword ||
                    // dataObat[i].kode_barang.match(reg) || 
                    // dataObat[i].nama_barang.includes(keyword) || 
                    ((dataObat[i].kd_obat ? dataObat[i].kd_obat : '').toLowerCase()).includes(keyword.toLowerCase()) ||
                    ((dataObat[i].id ? dataObat[i].id : '').toLowerCase()).includes(keyword.toLowerCase()) ||
                    ((dataObat[i].nama_obat ? dataObat[i].nama_obat : '').toLowerCase()).includes(keyword.toLowerCase())
                ) {
                    foundItem.push(dataObat[i])
                }
            }

            // foundItem = [foundItem[0]];

            if (foundItem.length > 1) {
                if ($(this).parent().find('#hasil_pencarian > #daftar-autocomplete').is(':visible') && tempKeyword) {
                    $(this).parent().find("#hasil_pencarian > #daftar-autocomplete li").each(function(i, e) {
                        if ($(this).hasClass('--focus')) {
                            $(this).parent().parent().parent().find('input').val($(this).find('span#kode').html());

                            var Indexnya = $(this).parent().parent().parent().parent().index();
                            var KodeObat = $(this).find('span#kode_obat').html();
                            var NamaObat = $(this).find('span#nama_obat').html();
                            var IdBarang = $(this).find('span#id_brg').html();
                            var Harga = $(this).find('span#harga').html();


                            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').hide();
                            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(3) input#nama_obat').val(NamaObat);
                            // $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input#qty').val(0);
                            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input#harga').val(Harga);

                            var IndexIni = Indexnya + 1;
                            var TotalIndex = $('#tabeltransaksi tbody tr').length;
                            if (IndexIni == TotalIndex) {
                                //BarisBaru();
                                $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input').focus();
                                // $('html, body').animate({ scrollTop: $(document).height() }, 0);
                            } else {
                                $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input').focus();
                            }
                            //HitungTotalBayar();
                        }
                    })
                } else {
                    cariObat(keyword, Indexnya, foundItem);
                    tempKeyword = true;
                }
            } else {
                cariObat(keyword, Indexnya, foundItem);
                $(this).parent().find("#hasil_pencarian > #daftar-autocomplete li").each(function(i, e) {
                    if ($(this).hasClass('--focus')) {
                        $(this).parent().parent().parent().find('input').val($(this).find('span#kode').html());

                        var Indexnya = $(this).parent().parent().parent().parent().index();
                        var KodeObat = $(this).find('span#kode_obat').html();
                        var NamaObat = $(this).find('span#nama_obat').html();
                        var IdBarang = $(this).find('span#id_brg').html();
                        var Harga = $(this).find('span#harga').html();


                        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').hide();
                        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(3) input#nama_obat').val(NamaObat);
                        // $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input#qty').val(0);
                        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input#harga').val(Harga);

                        var IndexIni = Indexnya + 1;
                        var TotalIndex = $('#tabeltransaksi tbody tr').length;
                        if (IndexIni == TotalIndex) {
                            //BarisBaru();
                            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input').focus();
                            // $('html, body').animate({ scrollTop: $(document).height() }, 0);
                        } else {
                            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input').focus();
                        }
                        //HitungTotalBayar();

                    }
                })
            }
        } else {
            tempKeyword = false;
        }
    })

    $(document).on('click', '#daftar-autocomplete li', function() {
        $(this).parent().find(".--focus").each(function() {
            $(this).removeClass("--focus");
        })
        $(this).addClass("--focus");
        $(this).parent().parent().parent().find('input').val($(this).find('span#kode').html());

        var Indexnya = $(this).parent().parent().parent().parent().index();
        var KodeObat = $(this).find('span#kode_obat').html();
        var NamaObat = $(this).find('span#nama_obat').html();
        var IdBarang = $(this).find('span#id_brg').html();
        var Harga = $(this).find('span#harga').html();


        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').hide();
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(3) input#nama_obat').val(NamaObat);
        // $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input#qty').val(0);
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input#harga').val(Harga);

        var IndexIni = Indexnya + 1;
        var TotalIndex = $('#tabeltransaksi tbody tr').length;
        if (IndexIni == TotalIndex) {
            //BarisBaru();
            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input').focus();
            // $('html, body').animate({ scrollTop: $(document).height() }, 0);
        } else {
            $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input').focus();
        }
        //HitungTotalBayar();	

    });


    $(window).click(function() {
        var Indexnya = $(this).parent().parent().index();
        $('.hasil_pencarian').hide();
    });
    $(document).on('click', '#pencarian_kode', function() {
        $('.hasil_pencarian').hide();
        var Indexnya = $(this).parent().parent().index();
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(2)').find('div#hasil_pencarian').show();
    });
    $(document).on('keypress', '#tabeltransaksi', function(e) {
        var key = e.which || e.keyCode;
        if (key == 13) {
            return false;
        }
    });

    $(document).on('keypress', '#tabeltransaksi', function(e) {
        var key = e.which || e.keyCode;
        if (key == 13) {
            return false;
        }
    });

    $(document).on('keydown', 'body', function(e) {
        var charCode = (e.which) ? e.which : event.keyCode;

        if (charCode == 118) //F7
        {
            BarisBaru();
            return false;
        }

        if (charCode == 119) //F8
        {
            $('#UangCash').focus();
            return false;
        }
        if (charCode == 121) //F10
        {
            $('#Simpan').click();
            return false;
        }
    });

    $(document).on('keyup', '#qty', function() {
        var Indexnya = $(this).parent().parent().index();
        var Qty = $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input#qty').val();
        var Harga = $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input#harga').val();

        var SubTotal = parseInt(Harga) * parseInt(Qty);
        if (SubTotal > 0) {
            var SubTotalVal = SubTotal;
            SubTotal = to_rupiah(SubTotal);
        } else {
            SubTotal = '';
            var SubTotalVal = 0;
        }

        var SubTotal2 = parseInt(Harga) * parseInt(Qty);
        if (SubTotal2 > 0) {
            var SubTotalVal2 = SubTotal2;
            SubTotal2 = to_rupiah(SubTotal2);
        } else {
            SubTotal2 = '';
            var SubTotalVal2 = 0;
        }
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) input#subtotal').val(SubTotalVal);
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) span').html(SubTotal2);
        // console.log(SubTotal);
        // console.log(SubTotal2);
        HitungTotalBayar();
    })

    $(document).on('each', '#harga', function() {
        var Indexnya = $(this).parent().parent().index();
        var Qty = $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(4) input#qty').val();
        var Harga = $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(5) input#harga').val();

        var SubTotal = parseInt(Harga) * parseInt(Qty);
        if (SubTotal > 0) {
            var SubTotalVal = SubTotal;
            SubTotal = to_rupiah(SubTotal);
        } else {
            SubTotal = '';
            var SubTotalVal = 0;
        }

        var SubTotal2 = parseInt(Harga) * parseInt(Qty);
        if (SubTotal2 > 0) {
            var SubTotalVal2 = SubTotal2;
            SubTotal2 = to_rupiah(SubTotal2);
        } else {
            SubTotal2 = '';
            var SubTotalVal2 = 0;
        }
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) input#subtotal').val(SubTotalVal);
        $('#tabeltransaksi tbody tr:eq(' + Indexnya + ') td:nth-child(6) span').html(SubTotal2);
        // console.log(SubTotal);
        // console.log(SubTotal2);
        HitungTotalBayar();
    })


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


    function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.

        // get input value
        var input_val = input.val();

        // don't validate empty input
        if (input_val === "") {
            return;
        }

        // original length
        var original_len = input_val.length;

        // initial caret position 
        var caret_pos = input.prop("selectionStart");

        // check for decimal
        if (input_val.indexOf(".") >= 0) {

            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");

            // split number by decimal point
            // var left_side = input_val.substring(0, decimal_pos);
            // var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);

            // On blur make sure 2 numbers after decimal
            // if (blur === "blur") {
            //     right_side += "00";
            // }

            // Limit decimal to only 2 digits
            // right_side = right_side.substring(0, 2);

            // join number by .
            input_val = left_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            // input_val = "$" + input_val;

            // final formatting
            // if (blur === "blur") {
            //     input_val += ".00";
            // }
        }

        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
</script>
<?php $this->load->view('partials/footer.php') ?>