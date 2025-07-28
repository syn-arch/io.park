<?php

$query = mysqli_query($conn, "SELECT 
*,member_topups.status,
member_topups.id, 
members.name as member_name, 
users.name as user_name 
FROM member_topups 
JOIN members ON members.id = member_topups.member_id
JOIN users ON users.id = member_topups.topup_by
");

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $deleteQuery = mysqli_query($conn, "DELETE FROM member_topups WHERE id='$id'");

    if ($deleteQuery) {
        echo "
        <script>
            location.href = 'index.php?page=topup/index&status=dihapus'
        </script>
        ";
    }
}

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title" style="float:left">Data topup</h2>
                <a style="float:right" href="index.php?page=topup/create" class="btn btn-primary"> <i class="nav-icon bi bi-plus"></i> Tambah Data</a>
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
                                <th>Member</th>
                                <th>Kode</th>
                                <th>Jumlah</th>
                                <th>Metode</th>
                                <th>Status</th>
                                <th>Topup Oleh</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($query)) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data['member_name'] ?></td>
                                    <td><?= $data['code'] ?></td>
                                    <td><?= number_format($data['amount'], 0, '', '.') ?></td>
                                    <td><?= $data['payment_method'] ?></td>
                                    <td><?= $data['status'] ?></td>
                                    <td><?= $data['user_name'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="index.php?page=topup/edit&id=<?= $data['id'] ?>" class="btn btn-warning">
                                                <i class="nav-icon bi bi-pencil-square"></i> Edit
                                            </a>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="index.php?page=topup/index&action=delete&id=<?= $data['id'] ?>" class="btn btn-danger">
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
