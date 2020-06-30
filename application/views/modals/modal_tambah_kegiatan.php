<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Kegiatan</h3>

  <form id="form-tambah-kegiatan" method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-book"></i>
      </span>
      <input type="text" class="form-control" name="urusan" aria-describedby="sizing-addon2" value="Perencanaan" disabled>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-inbox"></i>
      </span>   
      <input type="text" class="form-control" name="program" aria-describedby="sizing-addon2" value="Program Perencanaan Pembangunan Daerah" disabled>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-envelope"></i>
      </span>
      <input type="text" class="form-control" name="indikator_program" aria-describedby="sizing-addon2" value="Konsistensi Dokumen Perencanaan" disabled>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-flag"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Nama Kegiatan" name="kegiatan" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-volume-up"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Indikator Keluaran Kegiatan" name="indikator_kegiatan" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-volume-up"></i>
      </span>
      <input type="text" class="form-control" placeholder="Masukkan Indikator Keluaran Kegiatan" name="indikator_kegiatan" aria-describedby="sizing-addon2">
    </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>