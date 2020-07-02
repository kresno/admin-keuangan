<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-12">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-kegiatan"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Urusan</th>
          <th>Nama Program</th>
          <th>Nama Kegiatan</th>
          <th>Indikator Kegiatan</th>
          <th>Anggaran</th>
        </tr>
      </thead>
      <tbody id="data-kegiatan">
      
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_kegiatan; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-datakegiatan', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'kegiatan';
  $data['url'] = 'kegiatan/import';
  echo show_my_modal('modals/modal_import', 'import-kegiatan', $data);
?>