<?php

$setting = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM setting"));

if (isset($_POST['submit'])) {
    $app_name = $_POST['app_name'];
    $app_description = $_POST['app_description'];
    $telegram_bot_key = $_POST['telegram_bot_key'];
    $telegram_chat_id = $_POST['telegram_chat_id'];

    $row = mysqli_query($conn, "UPDATE setting SET 
        app_name = '$app_name',
        app_description = '$app_description',
        telegram_bot_key = '$telegram_bot_key',
        telegram_chat_id = '$telegram_chat_id'
    ");

    if ($_FILES['app_logo']['name']) {
        $app_logo = $_FILES['app_logo']['name'];
        $tmp_name = $_FILES['app_logo']['tmp_name'];
        $ext = pathinfo($app_logo, PATHINFO_EXTENSION);
        $new_name = 'logo-' . time() . '.' . $ext;

        unlink('assets/img/' . $setting['app_logo']); // Remove old logo

        move_uploaded_file($tmp_name, 'assets/img/' . $new_name);

        mysqli_query($conn, "UPDATE setting SET app_logo = '$new_name' WHERE id = 1");
    }

    if ($row) {
        echo "
        <script>
            location.href = 'index.php?page=setting&status=diedit'
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
                <h2 class="card-title" style="float:left">Pengaturan</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <?php if (isset($_GET['status'])): ?>
                                <div class="alert alert-success">
                                    <strong>Berhasil</strong>
                                    <p>Data berhasil <?= $_GET['status'] ?></p>
                                </div>
                            <?php endif ?>
                            <div class="mb-3">
                                <img src="assets/img/<?= $setting['app_logo'] ?>" alt="" class="img-fluid w-25">
                            </div>
                            <div class="mb-3">
                                <label for="">Logo</label>
                                <input type="file" class="form-control" name="app_logo" placeholder="Logo">
                            </div>
                            <div class="mb-3">
                                <label for="">Nama Aplikasi</label>
                                <input type="text" class="form-control" name="app_name" value="<?= $setting['app_name'] ?>" placeholder="Nama Aplikasi">
                            </div>
                            <div class="mb-3">
                                <label for="">Deskripsi</label>
                                <textarea name="app_description" id="" class="form-control" cols="30" rows="10"><?= $setting['app_description'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Telegram Bot Key</label>
                                <input type="text" class="form-control" name="telegram_bot_key" value="<?= $setting['telegram_bot_key'] ?>" placeholder="Telegram Bot Key">
                            </div>
                            <div class="mb-3">
                                <label for="">Telegram Chat ID</label>
                                <input type="text" class="form-control" name="telegram_chat_id" value="<?= $setting['telegram_chat_id'] ?>" placeholder="Telegram Chat ID">
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="submit" class="btn btn-primary d-block w-100">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
