<?php
$path = __DIR__."/skill/";
$ext = "png";
$start = 1;
$end = 40;
copy("path/1.$ext","$path/2.$ext");
for($i = $start +1  ; $i<=$end ; $i++){
    copy("$path/1.$ext","$path/$i.$ext");

}



?>