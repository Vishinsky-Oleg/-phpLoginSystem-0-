<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="css/style.css">
 <title>PHP Web site</title>
</head>
<body>
<div class="container mt-4">
    <?php
    foreach ($_COOKIE as $item => $value){
        echo "$item = $value";
        echo "<br>";
    }
    if($_COOKIE['user'] == ''):
    ?>
    <div class="row">
        <div class="col">
            <h1>Registration form</h1>
            <form action="validation-form/check.php" method="post">
                <input type="text" class="form-control" name="login" id="login" placeholder="Write your login"><br>
                <input type="text" class="form-control" name="name" id="name" placeholder="Write your name"><br>
                <input type="text" class="form-control" name="password" id="password" placeholder="Write your password"><br>
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
        </div>
        <div class="col">
            <h1>Authorisation form</h1>
            <form action="validation-form/auth.php" method="post">
                <input type="text" class="form-control" name="login" id="login" placeholder="Write your login"><br>
                <input type="text" class="form-control" name="password" id="password" placeholder="Write your password"><br>
                <button class="btn btn-success" type="submit">Authorise</button>
            </form>
        </div>
    </div>
    <?php else:?>
        <p>Hello <?=$_COOKIE['user']?>. To exit press <a href="/www/exit.php">here</a>.</p>

    <?php endif;?>

</div>


</body>
</html>


