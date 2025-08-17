<?php
function getDBConnection() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "users";
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

function saveUser($data) {
    $conn = getDBConnection();
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
    
    $stmt->bindParam(':firstname', $data['firstname']);
    $stmt->bindParam(':lastname', $data['lastname']);
    $stmt->bindParam(':email', $data['email']);
    
    return $stmt->execute();
}

function getUsers() {
    $conn = getDBConnection();
    $stmt = $conn->query("SELECT * FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getRandomUser() {
    $conn = getDBConnection();
    $stmt = $conn->query("SELECT * FROM users ORDER BY RAND() LIMIT 1");
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>