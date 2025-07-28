<?php

$id = $_GET['id'];
$topup = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM member_topups WHERE id = $id"));

if (isset($_POST['submit'])) {
    $member_id = $_POST['member_id'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
    $status = $_POST['status'];
    $topup_by = $_SESSION['user']['id'];

    $row = mysqli_query($conn, "UPDATE member_topups
    SET 
    member_id = '$member_id',
    amount = '$amount',
    payment_method = '$payment_method',
    status = '$status',
    topup_by = '$topup_by'
    WHERE id = $id
    ");

    $old_amount = $_POST['old_amount'];

    mysqli_query($conn, "UPDATE members SET balance = balance - $old_amount WHERE id = $member_id");
    mysqli_query($conn, "UPDATE members SET balance = balance + $amount WHERE id = $member_id");

    if ($row) {
        echo "
        <script>
            location.href = 'index.php?page=topup/index&status=ditambah'
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
                <h2 class="card-title" style="float:left">Tambah Data topup</h2>
                <a style="float:right" href="index.php?page=topup/index" class="btn btn-primary"> <i class="nav-icon bi bi-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="" method="POST">
                            <input type="hidden" name="old_amount" value="<?= $topup['amount'] ?>">
                            <div class="mb-3">
                                <label for="">Member</label>
                                <select name="member_id" id="" class="form-control">
                                    <option value="">Pilih Member</option>
                                    <?php
                                    $member = mysqli_query($conn, "SELECT * FROM members");
                                    while ($row = mysqli_fetch_assoc($member)) {
                                    ?>
                                        <option <?= $topup['member_id'] == $row['id'] ? 'selected' : '' ?> value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Kode</label>
                                <input readonly type="text" class="form-control" name="code" placeholder="Kode" value="<?= $topup['code'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah</label>
                                <input type="number" class="form-control" name="amount" value="<?= $topup['amount'] ?>" placeholder="Jumlah">
                            </div>
                            <div class="mb-3">
                                <label for="">Metode Bayar</label>
                                <select name="payment_method" class="form-control">
                                    <option value="">Pilih Metode Bayar</option>
                                    <option <?= $topup['payment_method'] == 'Cash' ? 'selected' : '' ?> value="Cash">Cash</option>
                                    <option <?= $topup['payment_method'] == 'Transfer' ? 'selected' : '' ?> value="Transfer">Transfer</option>
                                    <option <?= $topup['payment_method'] == 'E-wallet' ? 'selected' : '' ?> value="E-wallet">E-wallet</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option <?= $topup['status'] == 'Pending' ? 'selected' : '' ?> value="Pending">Pending</option>
                                    <option <?= $topup['status'] == 'Berhasil' ? 'selected' : '' ?> value="Berhasil">Berhasil</option>
                                    <option <?= $topup['status'] == 'Gagal' ? 'selected' : '' ?> value="Gagal">Gagal</option>
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
