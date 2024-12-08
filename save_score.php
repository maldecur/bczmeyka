




<?php


// Параметры подключения
$servername = "sql101.infinityfree.com"; // сервер базы данных
$username = "if0_37869237"; // имя пользователя базы данных
$password = "Milissa1986"; // пароль для пользователя базы данных
$dbname = "if0_37869237_snake_game"; // имя базы данных

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получаем данные из запроса
$data = json_decode(file_get_contents("php://input"), true);
$nickname = $data['nickname'];
$score = $data['score'];

// Проверка, если игрок уже есть в базе данных
$result = $conn->query("SELECT * FROM leaderboard WHERE nickname = '$nickname'");

if ($result->num_rows > 0) {
    // Если игрок уже есть, обновляем его счет, если новый больше
    $row = $result->fetch_assoc();
    if ($score > $row['score']) {
        $conn->query("UPDATE leaderboard SET score = $score WHERE nickname = '$nickname'");
    }
} else {
    // Если игрока нет в базе данных, добавляем нового игрока
    $stmt = $conn->prepare("INSERT INTO leaderboard (nickname, score) VALUES (?, ?)");
    $stmt->bind_param("si", $nickname, $score);
    $stmt->execute();
}




//cтарый код

/*

$conn = new mysqli("localhost", "root", "", "snake_game");

$data = json_decode(file_get_contents("php://input"), true);

$nickname = $data['nickname'];

$score = $data['score'];



$result = $conn->query("SELECT * FROM leaderboard WHERE nickname = '$nickname'");

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    if ($score > $row['score']) {

        $conn->query("UPDATE leaderboard SET score = $score WHERE nickname = '$nickname'");

    }

} else {

    $stmt = $conn->prepare("INSERT INTO leaderboard (nickname, score) VALUES (?, ?)");

    $stmt->bind_param("si", $nickname, $score);

    $stmt->execute();

}*/

