<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../../config/databasekaryawan.php';
    include_once '../../models/employeeskaryawan.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Employee($db);
    $data = json_decode(file_get_contents("php://input"));
    $item->name = $data->name;
    $item->email = $data->email;
    $item->age = $data->age;
    $item->departemen = $data->departemen;
    $item->telpon = $data->telpon;
    $item->created = date('Y-m-d H:i:s');

    if($item->createEmployee()){
        echo json_encode(['message'=>' Data Karyawan berhasil ditambahkan.']);
    } else{
        echo json_encode(['message'=>' Data Karyawan tidak berhasil ditambahkan.']);
    }
?>