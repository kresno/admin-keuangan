<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-Npd"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-6">
        <a href="<?php echo base_url('Npd/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Download Data Excel</a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nomor Rekening</th>
          <th>Nomor Keterangan</th>
          <th>Anggaran</th>
          <th>Tanggal Transaksi</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-npd">

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_npd; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataNpd', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php show_my_confirm('konfirmasiVerif', 'verif-dataNpd', 'Verifikasi Data Ini?', 'Ya, Verifikasi Data Ini'); ?>
<?php show_my_confirm('konfirmasiValid', 'valid-dataNpd', 'Validasi Data Ini?', 'Ya, Verifikasi Data Ini'); ?>

<?php
  $data['judul'] = 'Npd';
  echo show_my_modal('modals/modal_import', 'import-Npd', $data);
?>