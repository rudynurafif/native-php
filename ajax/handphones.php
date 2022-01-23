<?php 

  require '../functions.php';
  $keyword = $_GET['keyword'];
  $query = "SELECT * FROM handphones
              WHERE
            Nama LIKE '%$keyword%' OR
            Produsen LIKE '%$keyword%' OR
            OS LIKE '%$keyword%' OR
            Harga LIKE '%$keyword%'
            ";
  $handphones = query($query);

?>

<table class="table table-striped container" style="width: 100%; overflow: auto;">
      <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Produsen</th>
        <th>OS</th>
        <th>Harga</th>
      </tr>

      <?php $i = 1 ?>
      <?php foreach ($handphones as $row) : ?>
        <tr>
          <td><?= $i; ?></td>
          <td>
            <a href="ubah.php?id=<?= $row['ID']; ?>" class="badge bg-warning text-light" style="text-decoration: none;">Ubah</a> 
            <a href="hapus.php?id=<?= $row['ID']; ?>" onclick="return confirm('Yakin ingin menghapus data handphone ini?');" class="badge bg-danger" style="text-decoration: none;">Hapus</a>
          </td>
          <td><img src="img/<?= $row['Gambar']; ?>" alt="pocox3pro" width="75px"></td>
          <td><?= $row['Nama']; ?></td>
          <td><?= $row['Produsen']; ?></td>
          <td><?= $row['OS']; ?></td>
          <td><?= $row['Harga']; ?></td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
    </table>