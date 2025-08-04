<?php

if (isset($_POST['submit'])) {
    $slot_code = $_POST['slot_code'];
    $status = $_POST['status'];

    $row = mysqli_query($conn, "INSERT INTO parking_slots
    VALUES(
    '', 
    '$slot_code',
    '$status',
    NOW()
    )
    ");

    if ($row) {
        echo "
        <script>
            location.href = 'index.php?page=slot/index&status=ditambah'
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
                <h2 class="card-title" style="float:left">Tambah Data slot</h2>
                <a style="float:right" href="index.php?page=slot/index" class="btn btn-primary"> <i class="nav-icon bi bi-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="">Kode Slot</label>
                                <input type="text" class="form-control" name="slot_code" placeholder="Kode Slot">
                            </div>
                            <div class="mb-3">
                                <label for="">Nama Slot</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Slot">
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Tersedia</option>
                                    <option value="0">Tidak Tersedia</option>
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
