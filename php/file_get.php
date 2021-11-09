<?php
$file = $_FILES["picture"];
echo $file["name"];

$ext = substr($file['name'], -4);
if($ext == '.gif' || $ext == '.jpg' || $ext == '.png'){
  $filepath = './' . $file['name'];
  $success = move_uploaded_file($file['tmp_name'], $filepath);
}else{
  print("拡張子が.git, .jpg, .png のいずれかのファイルをアップロードしてください");
}


echo "<br>";
echo "information";
echo "<br>";
echo $file['tmp_name'];
echo "[".$filepath."]";

if($success){
  print "<br />";
  print "<img src=" . $filepath . " width='50%'>";
}else{
  print "＊ファイルアップロードに失敗しました。";
}

?>