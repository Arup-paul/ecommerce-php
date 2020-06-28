<?php

require_once '../../app/Database.php';

$role = $connection->insert('roles', $_POST);

if($role) {
    $data = [
        'message' => 'Role created'
    ];
} else {
    $data = [
        'message' => 'Something went wrong'
    ];
}

header('Content-Type: application/json');
echo json_encode($data);
