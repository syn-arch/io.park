<?php

$id = $_GET['id'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $id "));

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($_POST['password']) {
        mysqli_query($conn, "UPDATE users SET 
            password = '$password'
            WHERE id = $id
        ");
    }

    $row = mysqli_query($conn, "UPDATE users SET 
        name = '$name',
        address = '$address',
        gender = '$gender',
        phone = '$phone',
        email = '$email',
        role = '$role'
        WHERE id = $id
    ");

    if ($row) {
        echo "
        <script>
            location.href = 'index.php?page=user/index&status=diedit'
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
                <h2 class="card-title" style="float:left">Edit Data User</h2>
                <a style="float:right" href="index.php?page=user/index" class="btn btn-primary"> <i class="nav-icon bi bi-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>" placeholder="Nama">
                            </div>
                            <div class="mb-3">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="address" value="<?= $user['address'] ?>" placeholder="Alamat">
                            </div>
                            <div class="mb-3">
                                <label for="">Jenis Kelamin</label>
                                <select name="gender" class="form-control">
                                    <option <?= $user['gender'] == 'Laki-Laki' ? 'selected' : '' ?> value="Laki-Laki">Laki-Laki</option>
                                    <option <?= $user['gender'] == 'Perempuan' ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Telepon</label>
                                <input type="text" class="form-control" name="phone" value="<?= $user['phone'] ?>" placeholder="Telepon">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="">Level</label>
                                <select name="role" class="form-control">
                                    <option <?= $user['role'] == 'Admin' ? 'selected' : '' ?> value="Admin">Admin</option>
                                    <option <?= $user['role'] == 'Operator' ? 'selected' : '' ?> value="Operator">Operator</option>
                                </select>
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
                        </form>
                    </div>
                </div>
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
</script>
