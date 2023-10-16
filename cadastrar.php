<?php

include_once 'connection1.php';
if (isset($_POST['last_name']) && $_POST['last_name'] != '') {
    $last_name = filter_input(
        INPUT_POST,
        'last_name',
        FILTER_SANITIZE_SPECIAL_CHARS
    );
}

$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);

if (isset($_POST['first_name']) && $_POST['first_name'] != '') {
    $first_name = filter_input(
        INPUT_POST,
        'first_name',
        FILTER_SANITIZE_SPECIAL_CHARS
    );
}

$stmt = $conn->prepare(
    'INSERT INTO usuarios(first_name, last_name, password, email, dataAtual)VALUES(:first_name, :last_name, :password, :email, NOW())'
);

$stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
$stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo 'Usuário cadastrado com sucesso';
} else {
    echo 'Usuário não cadastrado';
}