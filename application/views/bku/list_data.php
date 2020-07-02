<?php
  $no = 1;
  foreach ($dataBku as $bku) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $bku->no_bukti; ?></td>
      <td><?php echo $bku->keterangan; ?></td>
      <td><?php echo $bku->kode_rek; ?></td>
      <td><?php echo $bku->penerimaan; ?></td>
      <td><?php echo $bku->pengeluaran; ?></td>
      <td><?php echo $bku->tanggal_trx; ?></td>
    </tr>
    <?php
    $no++;
  }
?>