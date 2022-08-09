<?php
include 'connection.php';
global $pdo;
echo "here";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'resDate' => $_POST['resDate'],
            'success' => true
        ], JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
    }
    echo "here here";
    $d = $_POST['resDate'];
    $sql = "SELECT title, user_id, date_start, time FROM reservations WHERE date_start='" . $d . "' ORDER BY time";
    $res = $pdo->query($sql);
    echo "<ul>";
    while ($row = $res->fetch()) {
        $user = $row["user_id"];
        $sql2 = "SELECT id, img FROM users WHERE id='" . $user . "'";
        $res2 = $pdo->query($sql2);
        $row2 = $res2->fetch();

        echo "<li><time>" . $row['time'] . "</time>" . $row['title'] . "</li>";
    }
    echo "</ul>";

}

