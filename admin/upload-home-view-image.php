<?php
if(isset($_FILES['file']['name'])){

   
   $filename = 'Awesomesauce Creative'. '_' . $_FILES['file']['name'];

  
   $location = "../upload/homeviewimage/".$filename;
   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   $imageFileType = strtolower($imageFileType);

  
   $valid_extensions = array("jpg","jpeg","png");

   $response = 0;
  
   if(in_array(strtolower($imageFileType), $valid_extensions)) {
     
     
		 // Compress Image
			compressImage($_FILES['file']['tmp_name'],$location,60); 
      echo    $response = $filename;
      
   }

   exit;
}

function compressImage($source, $destination, $quality) {

            $info = getimagesize($source);

            if ($info['mime'] == 'image/jpeg') 
                $image = imagecreatefromjpeg($source);

            elseif ($info['mime'] == 'image/gif') 
                $image = imagecreatefromgif($source);

            elseif ($info['mime'] == 'image/png') 
                $image = imagecreatefrompng($source);

            imagejpeg($image, $destination, $quality);

        }
?>