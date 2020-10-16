<?php
function dirToArray($dir) {
  
    $result = array();
 
    $cdir = scandir($dir);
    foreach ($cdir as $key => $value)
    {
       if (!in_array($value,array(".","..")))
       {
          if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
          {
             $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
          }
          else
          {
             $result[] = $value;
          }
       }
    }
   
    return $result;
 } 

$files = dirToArray("./data");

echo ("<ul>");
foreach($files as $key => $value) {
    echo ("<li><a href=\"./data/".$value."\">".$value."</a></li>");
}
echo ("</ul>");
?>