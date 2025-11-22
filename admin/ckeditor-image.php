<?php
//upload.php
if($_FILES["upload"]["name"] != '')
{
 $test = explode('.', $_FILES["upload"]["name"]);
 $ext = end($test);
 $name =time() . '_' . $_FILES["upload"]["name"] ;
 $location = "https://awesomesauce.in/upload/".$name;  
 move_uploaded_file($_FILES["upload"]["tmp_name"],  "../upload/".$name);
 $data = [ 'url' => $location];
header('Content-type: application/json');
echo json_encode( $data );
}
?>
