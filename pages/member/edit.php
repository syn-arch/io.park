<?php

$id = $_GET['id'];
$member = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM members WHERE id = $id "));

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $vehicle_type = $_POST['vehicle_type'];
    $plat_number = $_POST['plat_number'];
    $balance = $_POST['balance'];
    $rfid = $_POST['rfid'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($_POST['password']) {
        mysqli_query($conn, "UPDATE members SET 
            password = '$password'
            WHERE id = $id
        ");
    }

    $row = mysqli_query($conn, "UPDATE members SET 
        name = '$name',
        address = '$address',
        gender = '$gender',
        phone = '$phone',
        email = '$email',
        vehicle_type = '$vehicle_type',
        plat_number = '$plat_number',
        status = '$status',
        balance = '$balance',
        rfid = '$rfid'
        WHERE id = $id
    ");

    if ($row) {
        echo "
        <script>
            location.href = 'index.php?page=member/index&status=diedit'
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
                <h2 class="card-title" style="float:left">Edit Data Member</h2>
                <a style="float:right" href="index.php?page=member/index" class="btn btn-primary"> <i class="nav-icon bi bi-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="name" value="<?= $member['name'] ?>" placeholder="Nama">
                            </div>
                            <div class="mb-3">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="address" value="<?= $member['address'] ?>" placeholder="Alamat">
                            </div>
                            <div class="mb-3">
                                <label for="">Jenis Kelamin</label>
                                <select name="gender" class="form-control">
                                    <option <?= $member['gender'] == "Laki-Laki" ? 'selected' : '' ?> value="Laki-Laki">Laki-Laki</option>
                                    <option <?= $member['gender'] == "Perempuan" ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Telepon</label>
                                <input type="text" class="form-control" name="phone" value="<?= $member['phone'] ?>" placeholder="Telepon">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $member['email'] ?>" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="">Password <small class="text-danger">(*Isi Untuk Mengubah)</small></label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <label for="">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password">
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="submit" class="btn btn-primary d-block w-100">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option <?= $member['status'] == '1' ? 'selected' : '' ?> value="1">Tersedia</option>
                                    <option <?= $member['status'] == '0' ? 'selected' : '' ?> value="0">Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Jenis Kendaraan</label>
                                <select name="vehicle_type" value="<?= $member['vehicle_type'] ?>" id="" class="form-control">
                                    <option <?= $member['vehicle_type'] == "Roda Dua" ? 'selected' : '' ?> value="Roda Dua">Roda Dua</option>
                                    <option <?= $member['vehicle_type'] == "Roda Empat" ? 'selected' : '' ?> value="Roda Empat">Roda Empat</option>
                                    <option <?= $member['vehicle_type'] == "Roda Enam" ? 'selected' : '' ?> value="Roda Enam">Roda Enam</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Plat Nomor</label>
                                <input type="text" class="form-control" name="plat_number" value="<?= $member['plat_number'] ?>" placeholder="Plat Nomor">
                            </div>
                            <div class="mb-3">
                                <label for="">Saldo</label>
                                <input type="text" class="form-control" name="balance" value="<?= $member['balance'] ?>" value="0" placeholder="Saldo">
                            </div>
                            <div class="mb-3">
                                <label for="">RFID</label>
                                <input type="text" class="form-control" name="rfid" value="<?= $member['rfid'] ?>" value="0" placeholder="RFID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    password = document.querySelector('input[name="password" value="<?= $member['password'] ?>"]')
    password_confirmation = document.querySelector('input[name="password_confirmation" value="<?= $member['password_confirmation'] ?>"]')

    password.addEventListener('input', function() {
        if (password.value !== password_confirmation.value) {
            password_confirmation.setCustomValidity('Passwords do not match');
        } else {
            password_confirmation.setCustomValidity('');
        }
    });

    password_confirmation.addEventListener('input', function() {
        if (password.value !== password_confirmation.value) {
            password_confirmation.setCustomValidity('Passwords do not match');
        } else {
            password_confirmation.setCustomValidity('');
        }
    });
</script>
