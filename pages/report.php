<?php
if (isset($_POST['submit'])) {

    $dari = $_POST['dari'];
    $sampai = $_POST['sampai'];

    $query = mysqli_query($conn, "SELECT 
    *,
    parking_transactions.id, 
    members.name as member_name, 
    users.name as user_name 
    FROM parking_transactions 
    JOIN members ON members.id = parking_transactions.member_id
    JOIN users ON users.id = parking_transactions.handled_by
    WHERE DATE(parking_transactions.entry_time) BETWEEN '$dari' AND '$sampai'
    ");
} else {
    $query = mysqli_query($conn, "SELECT 
    *,
    parking_transactions.id, 
    members.name as member_name, 
    users.name as user_name 
    FROM parking_transactions 
    JOIN members ON members.id = parking_transactions.member_id
    JOIN users ON users.id = parking_transactions.handled_by
    ");
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title" style="float:left">Laporan</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="">Dari</label>
                                <input type="date" class="form-control" name="dari" value="<?= isset($_POST['dari']) ? $_POST['dari'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="">Sampai</label>
                                <input type="date" class="form-control" name="sampai" value="<?= isset($_POST['sampai']) ? $_POST['sampai'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary w-100 d-block">
                            </div>
                        </form>
                    </div>
                </div>
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
