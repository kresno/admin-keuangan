<?php
  $no = 1;
  foreach ($dataKegiatan as $kegiatan) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kegiatan->urusan; ?></td>
      <td><?php echo $kegiatan->program; ?></td>
      <td><?php echo $kegiatan->nama_kegiatan; ?></td>
      <td><?php echo $kegiatan->indikator_kegiatan; ?></td>
      <td><?php echo $kegiatan->anggaran; ?></td>
    </tr>
    <?php
    $no++;
  }
?>