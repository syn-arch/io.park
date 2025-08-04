<?php

require 'config/conn.php';

if (isset($_GET['rfid'])) {
    $rfid = mysqli_escape_string($conn, $_GET["rfid"]);
    $sensor = mysqli_escape_string($conn, $_GET["sensor"]);

    $entry_time = date('Y-m-d H:i:s');

    $member = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM members WHERE rfid = '$rfid'")
    );

    if ($sensor == "0") {
        die("Vehicle Not Found");
    }

    if ($member) {
        $member_id = $member['id'];
        $chat_id = $member['chat_id'];
        $vehicle_type = $member['vehicle_type'];
        $handled_by = $_SESSION['user']['id'] ?? $member['id'];

        $transaction = mysqli_fetch_assoc(
            mysqli_query($conn, "SELECT * FROM parking_transactions WHERE member_id = '$member_id' ORDER BY id DESC LIMIT 1")
        );

        if ($transaction && is_null($transaction['exit_time'])) {
            $exit_time = date('Y-m-d H:i:s');
            $tariff = mysqli_fetch_assoc(
                mysqli_query($conn, "SELECT * FROM parking_rates WHERE vehicle_type = '$vehicle_type'")
            );

            $duration = hitungDurasiParkir($transaction['entry_time'], $exit_time);
            $amount = hitungHargaParkir($transaction['entry_time'], $exit_time, $tariff);

            // Update saldo
            mysqli_query($conn, "UPDATE members SET balance = balance - $amount WHERE id = $member_id");

            // Update transaksi
            mysqli_query($conn, "UPDATE parking_transactions SET 
                exit_time = '$exit_time',
                duration = '{$duration['format']}',
                amount = '$amount',
                payment_type = 'Mandiri',
                payment_status = 'Berhasil',
                handled_by = '$handled_by'
                WHERE id = {$transaction['id']}
            ");

            kirimPesanKeluar($rfid, $transaction['entry_time'], $exit_time, $chat_id);
            echo "Exit";
        } else {
            mysqli_query($conn, "INSERT INTO parking_transactions (member_id, entry_time, handled_by)
                VALUES ('$member_id', '$entry_time', '$handled_by')");

            kirimPesanMasuk($rfid, $entry_time, $chat_id);
            echo "Enter";
        }
    } else {
        mysqli_query($conn, "UPDATE setting SET new_rfid = '$rfid'");
        echo "ID Not Found";
    }
} else if (isset($_GET['slot_a']) || isset($_GET['slot_b'])) {
    if (isset($_GET['slot_a'])) {
        $plat_a = mysqli_escape_string($conn, $_GET["slot_a"]);
        if ($plat_a == "1") {
            mysqli_query($conn, "UPDATE parking_slots SET status = 0 WHERE slot_code = 'slot_a' ");
        } else {
            mysqli_query($conn, "UPDATE parking_slots SET status = 1 WHERE slot_code = 'slot_a' ");
        }
    }

    if (isset($_GET['slot_b'])) {
        $plat_a = mysqli_escape_string($conn, $_GET["slot_b"]);
        if ($plat_a == "1") {
            mysqli_query($conn, "UPDATE parking_slots SET status = 0 WHERE slot_code = 'slot_b' ");
        } else {
            mysqli_query($conn, "UPDATE parking_slots SET status = 1 WHERE slot_code = 'slot_b' ");
        }
    }

    echo "Slot Updated!";
} else {
    echo "API Connect!";
}
