<?php

include_once 'connection.php';
date_default_timezone_set('America/Sao_Paulo');
// $myDate = date('d/m/Y');

$result = $conn->query('SELECT * FROM users ORDER BY id ASC');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Include in HTML -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>

    <a href="adicionar.html">Cadastrar Usuário</a>
    <br><br>
    <table class="table table-dark table-striped">

        <thead>

            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Idade</th>
            <th scope="col">Email</th>
            <th scope="col">Cidade</th>
            <th sope="col">Senha</th>
            <th scope="col">Data Cadastro</th>
            <th scope="col"><i class="bi bi-pencil-fill"></i> Update | <i class="bi bi-trash"></i> Delete</th>
        </thead>
        <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td>' . $row['idade'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['cidade'] . '</td>';
            echo '<td>' .$row['senha'] . '</td>';
            // echo '<td>' . date('d/m/Y'), strtotime($row['dataAtual']) . '</td>';
            echo '<td>'.$row['dataAtual']. '</td>';
            echo "<td><a href=\"edit.php?id=$row[id]\">Update</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        echo '</tr>';
        ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


</table>
</body>

</html>