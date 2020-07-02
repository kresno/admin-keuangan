<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <!-- <div class="col-md-6" style="padding: 0;">
      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-Bku"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div> -->
    <div class="col-md-12">
        <a href="<?php echo base_url('Bku/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Download Data Excel</a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nomor Bukti</th>
          <th>Keterangan</th>
          <th>Kode Rekening</th>
          <th>Penerimaan</th>
          <th>Pengeluaran</th>
          <th>Tanggal Transaksi</th>
        </tr>
      </thead>
      <tbody id="data-Bku">

      </tbody>
    </table>
  </div>
</div>

<!-- <?php echo $modal_tambah_Bku; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataBku', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Bku';
  $data['url'] = 'Bku/import';
  echo show_my_modal('modals/modal_import', 'import-Bku', $data);
?> -->