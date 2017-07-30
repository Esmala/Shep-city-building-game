<?php
    $data = array();
    
    $data["hello"] = "Hello!";

    header("Content-Type: application/json");
    echo(json_encode($data));