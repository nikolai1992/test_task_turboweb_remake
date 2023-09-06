<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Введіть команду</h2>
            <form class="command-form">
                <input type="hidden" name="dogs_count" value="<?php echo $_GET["dogs_count"];?>">
                <div class="form-group">
                    <label for="command">Команда:</label>
                    <input type="text" class="form-control" id="command" name="command" value="<?php echo $_GET['command'];?>" placeholder="Введіть команду">
                </div>
                <button type="submit" class="btn btn-primary">Виконати</button>
                <a href="/" class="btn btn-danger">Змінити кількість собак</a>
            </form>
        </div>
        <div class="col-md-6">
            <div class="actions-display">
                <?php

                require_once 'autoload.php';

                echo Dog::complete_command();
                ?>
            </div>
        </div>
    </div>

</div>
</body>
</html>