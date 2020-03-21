<?php
// Working with files
function IfFileExist() {
    if (file_exists("testfile.txt")) echo 'It does!<br>';
}

function FileGetString() {
    $fh = fopen("testfile.txt", 'r') or die("File doesn't exist");
    $line = fgets($fh);
    fclose($fh);
    echo $line;
}

function FileRead() {
    $fh = fopen("testfile.txt", 'r') or die("File doesn't exist");
    $line = fread($fh, 3);
    fclose($fh);
    echo $line;
}

function CopyFile() {
    copy('testfile.txt', 'testfile2.txt') or die ("Copying is failed");
}

function RenameFile() {
    if (!rename('testfile.txt', 'newtestfile.txt')) {
        echo "renaming is impossible";
    } else { echo 'File has been renamed';}
}

function DeleteFile() {
    if (!unlink('testfile.txt')) {
        echo "deleting is impossible";
    } else { echo 'File has been deleted';}
}

function LockFileWhileWriting() {
    $fh = fopen("testfile.txt", 'r+') or die("File hasn't been opened");
    $line = fgets($fh);
    if (flock($fh, LOCK_EX)) {
        fseek($fh, 0, SEEK_END);
        fwrite($fh, "$line") or die('Writing failure');
    }
    fclose($fh);
    echo "File has been successfully written";
}

function ReadWholeFile() {
    echo "<pre>";
    echo file_get_contents("https://msk.subscity.ru/cinemas");
    echo "<pre>";
}
?>

<!--Upload file to server-->
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Uploading file to server</title>-->
<!--</head>-->
<!--<body>-->
<!--    <form method="post" action="training.php" enctype="multipart/form-data">-->
<!--        Choose file:-->
<!--        <input type="file" name="filename" size="10">-->
<!--        <input type="submit" value="Upload">-->
<!--    </form>-->
<!--    --><?php
//    foreach ($_FILES as $item) {
//        foreach ($item as $value => $key) {
//            echo $value . " :  " . $key . "<br>";
//        }
//    }
//    if($_FILES) {
//        $name = $_FILES['filename']['name'];
//        move_uploaded_file($_FILES['filename']['tmp_name'], $name);
//        echo "Uploaded image '$name'<br><img src='$name'>";
//    }
//    ?>
<!--</body>-->
<!--</html>-->



<!--More efficient -->
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Uploading file to server</title>-->
<!--</head>-->
<!--<body>-->
<!--<form method="post" action="training.php" enctype="multipart/form-data">-->
<!--    Choose file (JPG/GIF/PNG/TIF):-->
<!--    <input type="file" name="filename" size="10">-->
<!--    <input type="submit" value="Upload">-->
<!--</form>-->
<?php
//if ($_FILES) {
//    $name = $_FILES['filename']['name'];
//    $name = strtolower(preg_replace("[^A-Za-z0-9.]", "", $name));
//    // ^^^^Making all string lower and allowing only A-Z a-z 0-9 symbols^^^^
//    switch ($_FILES['filename']['type']) {
//        case 'image/jpeg': $ext = 'jpg'; break;
//        case 'image/gif': $ext = 'gif'; break;
//        case 'image/png': $ext = 'png'; break;
//        case 'image/tiff': $ext = 'tif'; break;
//        default: $ext = ''; break;
//    }
//    if ($ext) {
//        $n = "image.$ext";
//        move_uploaded_file($_FILES['filename']['tmp_name'], $n);
//        echo "Uploaded image '$name' by name: '$n'<br>";
//        echo "<img src='$n'>";
//    } else {echo "Invalid format";}
//
//} else {echo "File hasn't been uploaded";}
//?>
<!--</body>-->
<!--</html>-->


<?php
// Executing system command
function execute() {
    $cmd = "dir"; // FOR WINDOWS
//  $cmd = "ls"; FOR Linux Unix Mac

    exec(escapeshellcmd($cmd), $output, $status);
    if ($status) {echo "Exec command doesn't execute";}
    else {
        echo "<pre>";
        foreach ($output as $line) {echo htmlspecialchars("$line\n");}
        echo "</pre>";
    }
}
unset($_FILES);
execute();

