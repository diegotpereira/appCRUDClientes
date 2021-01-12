<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <h3>Cadastro de Clientes com PHP</h3>
        </div>
        <div class="row">
            <p>
                <a href="create.php" class="btn btn-success">Cadastrar</a>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'database.php';
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM customers ORDER BY id DESC';
                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['mobile'] . '</td>';
                        echo '<td width=250>';
                        echo '<a class="btn" href="read.php?id=' . $row['id'] . '">Ler</a>';
                        echo ' ';
                        echo '<a class="btn btn-success" href="update.php?id=' . $row['id'] . '">Atualizar</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . '">Deletar</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    Database::disconnect();
                    ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->
</body>

</html>