 <?php 
  // Working with printf
  echo "<pre>";
  printf("Some text %15f\n", 12.1241441);
  printf("Some text %015f\n", 12.1241441);
  printf("Some text %15.2f\n", 12.1241441);
  printf("Some text %015.2f\n", 12.1241441);
  printf("Some text %'#15.2f\n", 12.1241441);
  $name = "String";
  printf("[%s]\n", $name);
  printf("[%12s]\n", $name);
  printf("[%-12s]\n", $name);
  printf("[%012s]\n", $name);
  printf("[%'#12s]\n\n", $name);
  $name1 = "Much longer string";
  printf("[%12.8s]\n", $name1);
  printf("[%-12.12s]\n", $name1);
  printf("[%-'@12.10s]\n", $name1);
  echo "</pre>";


//  Smart if construction
 $value = 5;
 $isGreater = ($value > 5) ? "If expression is TRUE": "If expression is FALSE";
 echo $isGreater;


//  Working with functions
 function addNumbers($num1=0, $num2=0) { //$num1=0 is parameter by default
     return $num1 + $num2;
 }
 printf("5 + 4 = %d<br>", addNumbers(5, 4));

 function changeMe(&$change) { //with & sign $change value will be referenced directly, and function will change it
     $change = 10;
 }
 $change = 5;
 changeMe($change);
 echo "Change : " . $change;

 function getSum(...$nums) { // ... creating an array of values
     $sum = 0;
     foreach ($nums as $num) {
         $sum += $num;
         }
     return $sum;
 }
 printf("Sum is %d", getSum(5, 9, 10, 15, 29.5));

 function doMath($x, $y) { //returning multiple arguments
     return array(
         $x + $y,
         $x - $y
     );
 }
 list($sum, $difference) = doMath(5,4);
 echo "Sum = $sum<br>";
 echo "Difference = $difference<br>";





// array_map()

 function double($x) { //Example #1 array_map()
     return $x * $x;
 }
 $list = [1,2,3,4];
 $dbl_list = array_map('double', $list);
 print_r($dbl_list);
//--------------------------------------------------------
 $func = function($value) { //Example #2 array_map() using a lambda function
     return $value * 2;
 };

 print_r(array_map($func, range(1, 5)));
 //--------------------------------------------------------
 function show_Spanish($n, $m) //Example #3 array_map() - using more arrays
 {
     return "The number $n is called $m in Spanish";
 }

 function map_Spanish($n, $m)
 {
     return [$n => $m];
 }

 $a = [1, 2, 3, 4, 5];
 $b = ['uno', 'dos', 'tres', 'cuatro', 'cinco'];

 $c = array_map('show_Spanish', $a, $b);
 print_r($c);

 $d = array_map('map_Spanish', $a , $b);
 print_r($d);
 //--------------------------------------------------------
 $a = [1, 2, 3, 4, 5];  //Example #4 Performing a zip operation of arrays
 $b = ['one', 'two', 'three', 'four', 'five'];
 $c = ['uno', 'dos', 'tres', 'cuatro', 'cinco'];

 $d = array_map(null, $a, $b, $c);
 print_r($d);
 //--------------------------------------------------------
 function callback($k, $v) {
     echo "$k and $v";
 }// I was miffed that array_map didn't have a way to pass values
 // *and* keys to the callback, but then I realized I could do this:
 array_map( "callback", array_keys($array), $array);
 //--------------------------------------------------------

// array_reduce()
 $array = [4, 3, 2, 1];
 function multiply($x, $y) {
     $x *= $y;
     return $x;
 }
 $num = array_reduce($array, 'multiply', 1);
 print_r($num);

// array_filter()
function arrayFilter($x) {
    return ($x % 2) == 0;
}
    $list = [1,2,3,4,5,6,7,8,9,10];
    $even = array_filter($list, 'arrayFilter');
    print_r($even)










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



// --------------------------------------UPLOADING IMAGE TO SERVER----------------------------//

//<!--<!doctype html>-->
//<!--<html lang="en">-->
//<!--<head>-->
//<!--    <meta charset="UTF-8">-->
//<!--    <meta name="viewport"-->
//<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
//<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
//<!--    <title>Uploading file to server</title>-->
//<!--</head>-->
//<!--<body>-->
//<!--<form method="post" action="training.php" enctype="multipart/form-data">-->
//<!--    Choose file (JPG/GIF/PNG/TIF):-->
//<!--    <input type="file" name="filename" size="10">-->
//<!--    <input type="submit" value="Upload">-->
//<!--</form>-->
//<?php
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


//Function with Null and Default arguments
function makeCoffee($types = array("cappuccino"), $coffeeMaker = NULL)
{
    $device = is_null($coffeeMaker) ? "hands" : $coffeeMaker;
    return "Making a cup of ".join(", ", $types)." with $device.\n";
}


//Finding numbers that appears odd count of times
$numbers = [1,1,1,1,5,3,8,9,8,9,9,1,7,7,3];

function evenNumber($array) {
    $counted = 0;
    $oddNumbers = [];
    for ($i=0;$i<count($array);$i++) {
        for ($j=0;$j<count($array);$j++) {
            if ($array[$i] == $array[$j]) {
                $counted++;
            }
        }
        if ($counted % 2 != 0) {
            $oddNumbers[] = $array[$i];
        }
        $counted = 0;
    }
    $oddNumbers = array_unique($oddNumbers);
    return $oddNumbers;
}


function evenNumber1($array) {
    $counted = array_count_values($array);
    foreach ($counted as $key=>$value) {
        if ($value % 2 == 0) {
            unset($counted[$key]);
        }
    }
    return $counted;
}




//Divisible by 3 and 5
function solution($num) {
    $sum = 0;
    for ($i = 0; $i<$num;$i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            $sum += $i;
            echo "$i<br>";
        } elseif ($i % 3 == 0) {
            $sum += $i;
            echo "$i<br>";

        } elseif ($i % 5 == 0) {
            $sum += $i;
            echo "$i<br>";

        }
    }
    return $sum;
}

function solution1($number){
    return array_sum(array_filter(range(1, $number-1), function ($item) {
        return $item % 3 == 0 || $item % 5 == 0;
    }));
}

//Given two arrays of strings a1 and a2 return a sorted array r in lexicographical order of the strings of a1 which are substrings of strings of a2.
function inArray($a1, $a2) {
    $r = array_filter($a1, function($v) use ($a2) {
        foreach ($a2 as $v2) {
            if (strpos($v2, $v) !== false) return true;
        }
        return false;
    });
    sort($r);
    return $r;
}



// Tribonaccy
$numbers = [3,2,1];

function tribonacci ($ar, $n) {
    if ($n !== 0) {

        if ($n>2) {
            $seq = $ar;
            for ($i=3;$i<$n;$i++) {
                $seq[] = ($seq[$i-3] + $seq[$i-2] + $seq[$i-1]);
            }
            return $seq;
        } else if ($n=1){
            $seq[] = $ar[0];
            return $seq;
        } else if ($n=2){
            $seq[] = ($ar[0] + $ar[1]);
            return $seq;
        }
    } else return $seq = [];
}


function tribonacci1(array $signature, int $n): array {
    for ($i = $n - 3; $i > 0; $i--) {
        $signature[] = array_sum(array_slice($signature, -3));
    }
    return array_slice($signature, 0, $n);
}































 ?>