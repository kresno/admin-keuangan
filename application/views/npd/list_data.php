<?php
  $no = 1;
  foreach ($dataNpd as $npd) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $npd->nama_kegiatan; ?></td>
      <td><?php echo $npd->nomor_rek; ?></td>
      <td><?php echo $npd->keterangan; ?></td>
      <td align="right"><?php echo number_format($npd->anggaran); ?></td>
      <td><?php echo $npd->tanggal_trx; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-datanpd" data-id="<?php echo $npd->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-npd" data-id="<?php echo $npd->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
        <button class="btn btn-info detail-datanpd" data-id="<?php echo $npd->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
        <?php if ($npd->status == 0) { echo "
          <button class='btn btn-success konfirmasiVerif-npd' data-id='$npd->id' data-toggle='modal' data-target='#konfirmasiVerif'><i class='glyphicon glyphicon-check'></i> Verifikasi</button> "; } else {
          echo " <button class='btn btn-default' disable><i class='glyphicon glyphicon-check'></i> Sudah diVerifikasi</button>  ";
          }
        ?>

        <?php if ($npd->status_valid == 0) { echo "
          <button class='btn btn-primary konfirmasiValid-npd' data-id='$npd->id' data-toggle='modal' data-target='#konfirmasiValid'><i class='glyphicon glyphicon-tag'></i> Validasi </button> "; } else {
          echo " <button class='btn btn-default' disable><i class='glyphicon glyphicon-tag'></i> Sudah diValidasi</button>  ";
          }
        ?>
      </td>
    </tr>
    <?php
    $no++;
  }
?>