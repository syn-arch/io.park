<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $row = mysqli_query($conn, "INSERT INTO users
    VALUES(
    '', 
    '$name',
    '$address',
    '$gender',
    '$phone',
    '$email',
    '$password',
    '$role',
    NOW()
    )
    ");

    if ($row) {
        echo "
        <script>
            location.href = 'index.php?page=user/index&status=ditambah'
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
                <h2 class="card-title" style="float:left">Tambah Data User</h2>
                <a style="float:right" href="index.php?page=user/index" class="btn btn-primary"> <i class="nav-icon bi bi-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="" method="POST">
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
                                <label for="">Level</label>
                                <select name="role" class="form-control">
                                    <option value="Admin">Admin</option>
                                    <option value="Operator">Operator</option>
                                </select>
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
