<?php

$query = mysqli_query($conn, "SELECT 
*,
parking_transactions.id, 
members.name as member_name, 
users.name as user_name 
FROM parking_transactions 
JOIN members ON members.id = parking_transactions.member_id
JOIN users ON users.id = parking_transactions.handled_by
");
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $deleteQuery = mysqli_query($conn, "DELETE FROM parking_transactions WHERE id='$id'");

    if ($deleteQuery) {
        echo "
        <script>
            location.href = 'index.php?page=transaction/index&status=dihapus'
        </script>
        ";
    }
}

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title" style="float:left">Data transaction</h2>
                <a style="float:right" href="index.php?page=transaction/create" class="btn btn-primary"> <i class="nav-icon bi bi-plus"></i> Tambah Data</a>
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
                                <th>Waktu Masuk</th>
                                <th>Waktu Keluar</th>
                                <th>Durasi (Jam)</th>
                                <th>Total</th>
                                <th>Pembayaran</th>
                                <th>Status Pembayaran</th>
                                <th>Ditangani Oleh</th>
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
                                    <td><?= $data['entry_time'] ?></td>
                                    <td><?= $data['exit_time'] ?></td>
                                    <td><?= $data['duration'] ?></td>
                                    <td><?= number_format($data['amount'], 0, '', '.') ?></td>
                                    <td><?= $data['payment_type'] ?></td>
                                    <td><?= $data['payment_status'] ?></td>
                                    <td><?= $data['user_name'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="index.php?page=transaction/edit&id=<?= $data['id'] ?>" class="btn btn-warning">
                                                <i class="nav-icon bi bi-pencil-square"></i> Edit
                                            </a>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="index.php?page=transaction/index&action=delete&id=<?= $data['id'] ?>" class="btn btn-danger">
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
