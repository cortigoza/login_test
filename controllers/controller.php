<?php
include("../models/model.php");
$connection = new DB();
session_start();

if (isset($_GET['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $connection->getLogin($username, $password);
    
    if ($result) {
        $result->nameProfile = $connection->getProfile($result->profile);
        $_SESSION['test_login'] = $result;
    }
    echo json_encode(['resp' => $result]);
}

if (isset($_GET['users'])) {
    $result = $connection->getUsers();

    echo json_encode(['resp' => $result]);
}

if (isset($_GET['user'])) {
    $result = $connection->getUser($_POST['id']);

    echo json_encode(['resp' => $result]);
}

if (isset($_GET['delete'])) {
    $id = $_POST['id'];
    $result = $connection->deleteUsers($id);
    echo json_encode(['resp' => $result]);
}

if (isset($_GET['editUser'])) {
    $result = $connection->updateUser($_POST);
    echo json_encode(["resp" => $result]);
}

if (isset($_GET['signup'])) {
    $result = $connection->insertUsers($_POST);
    echo json_encode(["resp" => $result]);
}
