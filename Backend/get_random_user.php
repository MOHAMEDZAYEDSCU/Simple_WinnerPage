<?php
require_once __DIR__ . '/db.php';

$randomUser = getRandomUser();

if ($randomUser) {
    header('Content-Type: application/json');
    echo json_encode($randomUser);
} else {
    echo json_encode(['error' => 'No users found']);
}
?>