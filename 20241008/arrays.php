<?php

$getal = 123;

$list = ["vi","nic","jop","kev"];
$list[]="mathi";

echo $list[1];
echo "<pre>";
print_r($list);
echo"<pre>;


for($i=0; $i < count($list); $i++){
echo "<li>$list[$i]</li>";
}

foreach($list as $index => $person){
echo"<li>$person</li>"
}

?>