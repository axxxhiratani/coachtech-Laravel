<?php

$name = htmlspecialchars($_POST["name"],ENT_QUOTES);
$set = htmlspecialchars($_POST["set"],ENT_QUOTES);
$sum = htmlspecialchars($_POST["sum"],ENT_QUOTES);


echo "私の名前は".$name;
echo "ご希望の商品は".$set."セット";
echo "注文数は、".$sum;

?>