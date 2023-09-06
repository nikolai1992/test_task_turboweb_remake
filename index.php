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
    <form action="dogs.php" method="get">
        <div class="row">
            <div class="col-md-6">

                    <h2>Введіть кількість собак</h2>
                    <select name="dogs_count" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

            </div>
        </div><br>
        <div class="row">
            <div class="col-md-6">
                <input type="submit" class="btn btn-primary" value="Підтвердити">
            </div>
        </div>
    </form>
</div>
</body>
</html>