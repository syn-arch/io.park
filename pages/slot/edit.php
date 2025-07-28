<?php

$id = $_GET['id'];
$slot = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM parking_slots WHERE id = $id "));

if (isset($_POST['submit'])) {
    $slot_code = $_POST['slot_code'];
    $status = $_POST['status'];

    $row = mysqli_query($conn, "UPDATE parking_slots SET 
        slot_code = '$slot_code',
        status = '$status'
        WHERE id = $id
    ");

    if ($row) {
        echo "
        <script>
            location.href = 'index.php?page=slot/index&status=diedit'
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
                <h2 class="card-title" style="float:left">Edit Data slot</h2>
                <a style="float:right" href="index.php?page=slot/index" class="btn btn-primary"> <i class="nav-icon bi bi-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="">Kode Slot</label>
                                <input type="text" class="form-control" name="slot_code" value="<?= $slot['slot_code'] ?>" placeholder="Kode Slot">
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option <?= $slot['status'] == '1' ? 'selected' : '' ?> value="1">Tersedia</option>
                                    <option <?= $slot['status'] == '0' ? 'selected' : '' ?> value="0">Tidak Tersedia</option>
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
