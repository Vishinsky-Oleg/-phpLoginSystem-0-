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












































 ?>