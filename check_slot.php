<?php

require 'config/conn.php';

$slots = [];
$query = mysqli_query($conn, "SELECT slot_code, status FROM parking_slots");

while ($slot = mysqli_fetch_assoc($query)) {
    $slots[] = $slot;
}

echo json_encode($slots);
