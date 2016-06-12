<html> 
    <head> 
        <title>Count Page Access</title> 
   </head> 
  <body> 
<?php 

    if (!isset($_COOKIE['count']))
    {
        ?> 
Tere tulemast! See on esimene kord kui sa külastad seda lehte. 
<?php 
        $cookie = 1;
        setcookie("count", $cookie);
    }
    else
    {
        $cookie = ++$_COOKIE['count'];
        setcookie("count", $cookie);
        ?> 
Sa oled vaadanud seda lehte <?= $_COOKIE['count'] ?> korda. 
<?php  }// end else  ?> 
   </body> 
</html>