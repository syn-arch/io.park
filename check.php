<?php

require 'config/conn.php';

$setting = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM setting"));
$new_rfid = $setting['new_rfid'];

$member = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM members WHERE rfid = '$new_rfid'"));

if ($member) {
    echo 'true';
}else{
    echo $new_rfid;
}
