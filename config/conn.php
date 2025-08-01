<?php
session_start();

date_default_timezone_set('Asia/Jakarta');

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'io_park'
);

$setting = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM setting"));

function send_message($id_chat, $pesan)
{
    global  $setting;
    $url = "https://api.telegram.org/bot" . $setting["telegram_bot_key"] . "/sendMessage?parse_mode=markdown&chat_id=" . $id_chat;
    $url = $url . "&text=" . urlencode($pesan);
    $ch  = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

function hitungHargaParkir($jam_masuk, $jam_keluar, $tarif)
{
    $masuk = new DateTime($jam_masuk);
    $keluar = new DateTime($jam_keluar);
    $durasi = $masuk->diff($keluar);

    $jam_total = ceil(($durasi->days * 24) + $durasi->h + ($durasi->i / 60));
    $harga = $tarif['base_rate'];

    if ($tarif['base_duration'] === '1 Jam') {
        if ($jam_total > 1) {
            $harga += ($jam_total - 1) * $tarif['additional_per_hour'];
        }
    } elseif ($tarif['base_duration'] === '1 Hari') {
        $hari_total = ceil($jam_total / 24);
        if ($hari_total > 1) {
            $harga += ($hari_total - 1) * $tarif['additional_per_hour'];
        }
    }

    return $harga;
}

function hitungDurasiParkir($jam_masuk, $jam_keluar)
{
    $masuk = new DateTime($jam_masuk);
    $keluar = new DateTime($jam_keluar);
    $selisih = $masuk->diff($keluar);
    $total_jam = ceil(($selisih->days * 24) + $selisih->h + ($selisih->i / 60));

    return [
        'hari' => $selisih->d,
        'jam' => $selisih->h,
        'menit' => $selisih->i,
        'total_jam' => $total_jam,
        'format' => sprintf("%d hari, %d jam, %d menit", $selisih->d, $selisih->h, $selisih->i)
    ];
}

function kirimPesanMasuk($rfid, $entry_time, $chat_id)
{
    send_message($chat_id, "
        *Selamat Datang*
        \n\n*ID Kartu* : $rfid
        \n*Waktu Masuk* : $entry_time
        \n*Status* : Masuk
        \n\n*Terimakasih*
    ");
}

function kirimPesanKeluar($rfid, $entry_time, $exit_time, $chat_id)
{
    send_message($chat_id, "
        *Selamat Datang*
        \n\n*ID Kartu* : $rfid
        \n*Waktu Masuk* : $entry_time
        \n*Waktu Keluar* : $exit_time
        \n*Status* : Keluar
        \n\n*Terimakasih*
    ");
}
