<?php

function insert($conn, $table, $data) {
    $columns = implode(", ", array_keys($data));
    $values = implode("', '", array_values($data));
    
    $query = "INSERT INTO $table ($columns) VALUES ('$values')";
    
    if (mysqli_query($conn, $query)) {
        return mysqli_insert_id($conn);
    } else {
        return false;
    }
}
