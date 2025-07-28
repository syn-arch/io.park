<?php

if (isset($_POST['submit'])) {
    $member_id = $_POST['member_id'];
    $entry_time = $_POST['entry_time'];
    $exit_time = $_POST['exit_time'];
    $duration = $_POST['duration'];
    $amount = $_POST['amount'];
    $is_member = $_POST['is_member'];
    $payment_type = $_POST['payment_type'];
    $payment_status = $_POST['payment_status'];
    $handled_by = $_SESSION['user']['id'];

    $row = mysqli_query($conn, "INSERT INTO parking_transactions
    VALUES(
    '', 
    '$member_id',
    '$entry_time',
    '$exit_time',
    '$duration',
    '$amount',
    '$is_member',
    '$payment_type',
    '$payment_status',
    '$handled_by',
    NOW()
    )
    ");

    mysqli_query($conn, "UPDATE members SET balance = balance - $amount WHERE id = $member_id");

    if ($row) {
        echo "
        <script>
            location.href = 'index.php?page=transaction/index&status=ditambah'
        </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title" style="float:left">Tambah Data Transaksi</h2>
                <a style="float:right" href="index.php?page=transaction/index" class="btn btn-primary"> <i class="nav-icon bi bi-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="">Member</label>
                                <select name="member_id" id="" class="form-control">
                                    <option value="">Pilih Member</option>
                                    <?php
                                    $member = mysqli_query($conn, "SELECT * FROM members");
                                    while ($row = mysqli_fetch_assoc($member)) {
                                    ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Waktu Masuk</label>
                                <input type="datetime-local" class="form-control" name="entry_time" placeholder="Waktu Masuk">
                            </div>
                            <div class="mb-3">
                                <label for="">Waktu Keluar</label>
                                <input type="datetime-local" class="form-control" name="exit_time" placeholder="Waktu Keluar">
                            </div>
                            <div class="mb-3">
                                <label for="">Durasi</label>
                                <input type="number" class="form-control" name="duration" placeholder="Durasi">
                            </div>
                            <div class="mb-3">
                                <label for="">Total</label>
                                <input type="number" class="form-control" name="amount" placeholder="Total">
                            </div>
                            <div class="mb-3">
                                <label for="">Member</label>
                                <select name="is_member" id="" class="form-control">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Pembayaran</label>
                                <select name="payment_type" class="form-control">
                                    <option value="">Pilih Metode Bayar</option>
                                    <option value="Oleh Petugas">Oleh Petugas</option>
                                    <option value="Mandiri">Mandiri</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="payment_status" class="form-control">
                                    <option value="Pending">Pending</option>
                                    <option value="Berhasil">Berhasil</option>
                                    <option value="Gagal">Gagal</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="submit" class="btn btn-primary d-block w-100">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
