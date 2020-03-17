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

  echo "</pre>"
 ?>