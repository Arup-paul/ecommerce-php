<?php
$site_url = 'http://php-ecommerce.sumon/backend';
require_once '../../app/ssp.class.php';

$table = 'roles';
$primaryKey = 'id';
$columns = [
    ['db' => 'id', 'dt' => 0],
    ['db' => 'name', 'dt' => 1],
    [
        'db' => 'id',
        'dt' => 2,
        'formatter' => function ($d, $row) use ($site_url) {
            return '<a href="'.$site_url.'/roles/edit.php?id='.$d.'" class="btn btn-sm btn-info">Edit</a>
<a href="'.$site_url.'/roles/delete.php?id='.$d.'" class="btn btn-sm btn-danger">Delete</a>';
        },
    ],
];

$sql_details = [
    'user' => 'root',
    'pass' => '',
    'db' => 'php_ecommerce',
    'host' => 'localhost',
];

header('Content-Type: application/json');
echo json_encode(SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns));
