





<?php

    // Cache for 24 hours
// Параметры для подключения к базе данных на InfinityFree

$servername = "sql101.infinityfree.com"; // сервер базы данных

$username = "if0_37869237"; // имя пользователя базы данных (ваше имя)

$password = "Milissa1986"; // пароль для пользователя базы данных

$dbname = "if0_37869237_snake_game"; // имя базы данных



// Создаем соединение с базой данных

$conn = new mysqli($servername, $username, $password, $dbname);



// Проверяем соединение

if ($conn->connect_error) {

    die("Ошибка подключения: " . $conn->connect_error);

}

// Ваши запросы здесь

$result = $conn->query("SELECT * FROM leaderboard ORDER BY score DESC LIMIT 10");

echo json_encode($result->fetch_all(MYSQLI_ASSOC));



//cтарый код

/*$conn = new mysqli("localhost", "root", "", "snake_game");

$result = $conn->query("SELECT * FROM leaderboard ORDER BY score DESC LIMIT 10");

echo json_encode($result->fetch_all(MYSQLI_ASSOC)); */


