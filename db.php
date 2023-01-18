<?php

$_connection = null;

function getConnection(): bool|mysqli|null
{
    global $_connection;

    if (!$_connection) {
        $_connection = mysqli_connect('localhost', 'root');
        mysqli_select_db($_connection, 'phplesson');
    }

    return $_connection;
}

function register(string $username, string $password): void
{
    $statement = mysqli_prepare(
        getConnection(),
        "INSERT INTO users (username, password) VALUES (?, ?);",
    );
    // $password = crypt($password, 'randomSalt');
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($statement, 'ss', $username, $password);
    mysqli_stmt_execute($statement);
}

function findUser(string $username, bool $isFull = false): bool|array|null
{
    $columns = $isFull ? '*' : 'id, username, password';
    $statement = mysqli_prepare(
        getConnection(),
        "SELECT id, username, password FROM users WHERE username = ?",
    );
    mysqli_stmt_bind_param($statement, 's', $username);
    mysqli_stmt_execute($statement);
    return mysqli_fetch_assoc(mysqli_stmt_get_result($statement));
}



