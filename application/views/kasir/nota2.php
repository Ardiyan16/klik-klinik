<style>
    table {
        max-width: 100%;
        max-height: 100%;
    }

    body {
        padding: 5px;
        position: relative;
        width: 100%;
        height: 100%;
    }

    table th,
    table td {
        padding: .625em;
        text-align: center;
    }

    table .kop:before {
        content: ': ';
    }

    .left {
        text-align: left;
    }

    table #caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
    }

    table.border {
        width: 100%;
        border-collapse: collapse
    }

    table.border tbody th,
    table.border tbody td {
        border: thin solid #000;
        padding: 2px
    }

    .ttd td,
    .ttd th {
        padding-bottom: 4em;
    }

    @media print {

        .hidden-print,
        .hidden-print * {
            display: none !important;
        }

        .hidden-back,
        .hidden-back * {
            display: none !important;
        }
    }
</style>

<div id="printable" class="container">
    <table border="0" cellpadding="0" cellspacing="0" width="485" class="border" style="overflow-x:auto;">
        <thead>
            <tr>
                <td colspan="6" width="485" id="caption">Klik Klinik</td>
            </tr>
            <tr>
                <td colspan="1">Kode Pembayaran</td>
                <td class="left kop"><?= $view->kd_payment ?></td>
                <td></td>
                <td>Tanggal Transaksi</td>
                <td class="left kop"><?= $view->tgl_trans ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Sub Total</th>
            </tr>
            <?php 
            $no = 1;
            foreach ($list_obat as $get) { ?>
                <tr>
                    <td align="right"><?= $no++ ?></td>
                    <td><?= $get->nama_obat ?></td>
                    <td><?= number_format($get->harga) ?></td>
                    <td align="right"><?= $get->qty ?></td>
                    <td><?= $get->subtotal ?></td>
                </tr>
            <?php } ?>
            <!-- <tr>
                <th colspan="3"> TOTAL</th>
                <td><?= $view->total_biaya ?></td>
                <td colspan="2"></td>
            </tr> -->
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>
    <button id="btnPrint" class="hidden-print">Cetak</button>
    <a href="<?= base_url('Kasir/payment_non_pasien') ?>" class="hidden-back">Kembali</a>
</div>
<script>
    // $('body').on('click', function() {
    //     //pop_print('printable');
    //     window.open(document.URL, 'printer');
    // });

    // function pop_print(id) {
    //     w = window.open('', 'Print_Page', 'scrollbars=yes');
    //     var myStyle = '<link rel="stylesheet" href="https://codepen.io/dimaslanjaka/pen/mozZPX.css?ver=' + window.btoa(Math.random()) + '" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css" media="all" />';
    //     w.document.write(myStyle + $('#' + id).html());
    //     w.document.close();
    //     w.print();
    //     w.close();
    // }
    const $btnPrint = document.querySelector("#btnPrint");
    $btnPrint.addEventListener("click", () => {
        window.print();
    });
</script>