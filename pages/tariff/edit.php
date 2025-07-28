<?php

$id = $_GET['id'];
$tariff = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM parking_rates WHERE id = '$id'"));

if (isset($_POST['submit'])) {
    $vehicle_type = $_POST['vehicle_type'];
    $base_duration = $_POST['base_duration'];
    $base_rate = $_POST['base_rate'];
    $additional_per_hour = $_POST['additional_per_hour'];

    $row = mysqli_query($conn, "UPDATE parking_rates
    SET 
    vehicle_type = '$vehicle_type',
    base_duration = '$base_duration',
    base_rate = '$base_rate',
    additional_per_hour = '$additional_per_hour'
    WHERE id = '$id'
    ");

    if ($row) {
        echo "
        <script>
            location.href = 'index.php?page=tariff/index&status=ditambah'
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
                <h2 class="card-title" style="float:left">Tambah Data Tarif</h2>
                <a style="float:right" href="index.php?page=tariff/index" class="btn btn-primary"> <i class="nav-icon bi bi-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="">Jenis Kendaraan</label>
                                <select name="vehicle_type" id="" class="form-control">
                                    <option <?= $tariff['vehicle_type'] == 'Roda Dua' ? 'selected' : '' ?> value="Roda Dua">Roda Dua</option>
                                    <option <?= $tariff['vehicle_type'] == 'Roda Empat' ? 'selected' : '' ?> value="Roda Empat">Roda Empat</option>
                                    <option <?= $tariff['vehicle_type'] == 'Roda Enam' ? 'selected' : '' ?> value="Roda Enam">Roda Enam</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Durasi Minimum</label>
                                <select name="base_duration" id="" class="form-control">
                                    <option <?= $tariff['base_duration'] == '1 Jam' ? 'selected' : '' ?> value="1 Jam">1 Jam</option>
                                    <option <?= $tariff['base_duration'] == '1 Hari' ? 'selected' : '' ?> value="1 Hari">1 Hari</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Tarif Dasar</label>
                                <input type="number" class="form-control" name="base_rate" value="<?= $tariff['base_rate'] ?>" placeholder="Tarif Dasar">
                            </div>
                            <div class="mb-3">
                                <label for="">Harga Per Jam Selanjutnya</label>
                                <input type="number" class="form-control" name="additional_per_hour" value="<?= $tariff['additional_per_hour'] ?>" placeholder="Harga Per Jam Selanjutnya">
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
