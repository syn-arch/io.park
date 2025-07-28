<?php

$query = mysqli_query($conn, "SELECT * FROM users");

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $deleteQuery = mysqli_query($conn, "DELETE FROM users WHERE id='$id'");

    if ($deleteQuery) {
        echo "
        <script>
            location.href = 'index.php?page=user/index&status=dihapus'
        </script>
        ";
    }
}

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title" style="float:left">Data User</h2>
                <a style="float:right" href="index.php?page=user/create" class="btn btn-primary"> <i class="nav-icon bi bi-plus"></i> Tambah Data</a>
            </div>
            <div class="card-body">
                <?php if (isset($_GET['status'])): ?>
                    <div class="alert alert-success">
                        <strong>Berhasil</strong>
                        <p>Data berhasil <?= $_GET['status'] ?></p>
                    </div>
                <?php endif ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($query)) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data['name'] ?></td>
                                    <td><?= $data['address'] ?></td>
                                    <td><?= $data['gender'] ?></td>
                                    <td><?= $data['phone'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td><?= $data['role'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="index.php?page=user/edit&id=<?= $data['id'] ?>" class="btn btn-warning">
                                                <i class="nav-icon bi bi-pencil-square"></i> Edit
                                            </a>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="index.php?page=user/index&action=delete&id=<?= $data['id'] ?>" class="btn btn-danger">
                                                <i class="nav-icon bi bi-trash"></i> Hapus
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
