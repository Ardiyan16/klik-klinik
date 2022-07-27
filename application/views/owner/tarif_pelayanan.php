<?php $this->load->view('partials/header.php') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tarif Pelayanan</h3>
            <a href="#create_tarif" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Tarif</a>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Data Tarif Pelayanan</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Layanan Kesehatan</th>
                                        <th>Diagnosa</th>
                                        <th>Tarif</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tarif_pelayanan as $show) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $show->nama_poli ?></td>
                                            <td><?= $show->diagnosa ?></td>
                                            <td><?= 'Rp. ' . number_format($show->tarif) ?></td>
                                            <td>
                                                <a href="#edit_tarif<?= $show->id ?>" data-toggle="modal" title="edit" class="badge bg-primary" style="color: white;"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('Owner/delete_tarif_pelayanan/' . $show->id) ?>" onclick="return confirm('apakah anda yakin menghapus data ?')" title="Hapus" class="badge bg-danger" style="color: white;"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create_tarif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tarif Pelayanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Owner/save_tarif') ?>" method="post">
                    <label>Poliklinik</label>
                    <select name="id_poli" class="form-control">
                        <?php foreach ($poli as $view) { ?>
                            <option value="<?= $view->id ?>"><?= $view->nama_poli ?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <label>Diagnosa</label>
                    <input type="text" class="form-control" required name="diagnosa">
                    <br>
                    <label>Tarif</label>
                    <input type="text" id="currency-field" value="" data-type="currency" class="form-control" required name="tarif">
                    <br>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<?php foreach ($tarif_pelayanan as $edit) { ?>
    <div class="modal fade" id="edit_tarif<?= $edit->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tarif Pelayanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Owner/update_tarif') ?>" method="post">
                        <label>Poliklinik</label>
                        <input type="hidden" name="id" value="<?= $edit->id ?>">
                        <select name="id_poli" class="form-control">
                            <?php foreach ($poli as $view) { ?>
                                <option <?php if ($view->id == $edit->id_poli) {
                                            echo "selected=\"selected\"";
                                        } ?> value="<?= $view->id ?>"><?= $view->nama_poli ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <label>Diagnosa</label>
                        <input type="text" class="form-control" value="<?= $edit->diagnosa ?>" required name="diagnosa">
                        <br>
                        <label>Tarif</label>
                        <input type="text" id="currency-field" value="<?= $edit->tarif ?>" data-type="currency" class="form-control" required name="tarif">
                        <br>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    <?php if ($this->session->flashdata('success_create')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data berhasil ditambahkan!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('failed_create')) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Data gagal ditambahkan!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data berhasil diubah!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('failed_update')) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Data gagal diubah!',
            showConfirmButton: true,
            // timer: 1500
        })


    <?php elseif ($this->session->flashdata('success_delete')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data berhasil dihapus!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>

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
            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);

            // join number by .
            input_val = left_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            // input_val = "$" + input_val;

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