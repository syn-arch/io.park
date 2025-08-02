<?php

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
    $chat_id = $_POST['chat_id'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $row = mysqli_query($conn, "INSERT INTO members
    VALUES(
    '', 
    '$name',
    '$address',
    '$gender',
    '$phone',
    '$email',
    '$password',
    '$status',
    '$vehicle_type',
    '$plat_number',
    '$balance',
    '$rfid',
    '$chat_id',
    NOW()
    )
    ");

    if ($row) {
        echo "
        <script>
            location.href = 'index.php?page=member/index&status=ditambah'
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
                <h2 class="card-title" style="float:left">Tambah Data Member</h2>
                <a style="float:right" href="index.php?page=member/index" class="btn btn-primary"> <i class="nav-icon bi bi-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama">
                            </div>
                            <div class="mb-3">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="address" placeholder="Alamat">
                            </div>
                            <div class="mb-3">
                                <label for="">Jenis Kelamin</label>
                                <select name="gender" class="form-control">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Telepon</label>
                                <input type="text" class="form-control" name="phone" placeholder="Telepon">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
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
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Jenis Kendaraan</label>
                                <select name="vehicle_type" id="" class="form-control">
                                    <option value="Roda Dua">Roda Dua</option>
                                    <option value="Roda Empat">Roda Empat</option>
                                    <option value="Roda Enam">Roda Enam</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Plat Nomor</label>
                                <input type="text" class="form-control" name="plat_number" placeholder="Plat Nomor">
                            </div>
                            <div class="mb-3">
                                <label for="">Saldo</label>
                                <input type="text" class="form-control" name="balance" value="0" placeholder="Saldo">
                            </div>
                            <div class="mb-3">
                                <label for="">RFID</label>
                                <input type="text" class="form-control" name="rfid" value="0" placeholder="RFID">
                            </div>
                            <div class="mb-3">
                                <label for="">ID Chat</label>
                                <input type="text" class="form-control" name="chat_id" value="0" placeholder="ID Chat">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    password = document.querySelector('input[name="password"]')
    password_confirmation = document.querySelector('input[name="password_confirmation"]')

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

    setInterval(() => {
        fetch('check.php')
            .then(res => res.text())
            .then(res => {
                if(res == 'false'){
                    <?php
                    $setting = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM setting"));
                    $new_rfid = $setting['new_rfid'];
                    ?>
                    document.querySelector('input[name="rfid"]').value = '<?php echo $new_rfid ?>';
                }
            })
    }, 1000);
</script>
