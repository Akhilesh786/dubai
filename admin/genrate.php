<?php
include "config.php";
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (isset($_POST)) {
    $name = $_POST["name"];
    $date = $_POST["date"];
    //$date = date("jS F Y");
    $line1 = $_POST["line1"];
    $line2 = $_POST["line2"];
    $skill = $_POST["skill"];
    $description = $_POST["description"];

    $stmt = $dbh->prepare("INSERT INTO `inter_certifcate`( `name`, `line1`, `line2`, `date`, `description`, `skill`) VALUES (:name,:line1,:line2,:date,:description,:skill)");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':line1', $line1);
    $stmt->bindParam(':line2', $line2);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':skill', $skill);

    $stmt->execute();
    $primary_key = $dbh->lastInsertId();
    if($primary_key) {
      echo  $unique = md5($primary_key);
        $uniqueId =hash("sha256", $unique . $name);

        $stmt_update = $dbh->prepare(
            "UPDATE `inter_certifcate` SET `unique_id` = :uniqueId WHERE `inter_certifcate`.`id` = :id"
        );
        $stmt_update->bindParam(":uniqueId", $unique);
        $stmt_update->bindParam(":id", $primary_key);
        $stmt_update->execute();
        $count = $stmt_update->rowCount();

        if ($count) {
            // Load the font
            $font = "font/Poppins-Regular.ttf";

            // Create an image from the template
            $image = imagecreatefromjpeg("template.jpg");

            // Set the font color
            $color = imagecolorallocate($image, 10, 21, 22);

            // Add the date to the image
            imagettftext($image, 26, 0, 190, 915, $color, $font, $date);

            // Add the name to the image
            imagettftext($image, 50, 0, 190, 1020, $color, $font, $name);

            // Add the description to the image
            imagettftext($image, 44, 0, 190, 1260, $color, $font, $line1);

            imagettftext($image, 44, 0, 190, 1350, $color, $font, $line2);

            imagettftext($image, 34, 0, 610, 3290, $color, $font, $unique);
            // Adjust the Y-coordinate (625) as needed to position the description properly

            // Generate a unique file name
            $file = $uniqueId;
            $file_path = "certificate/" . $file . ".jpg";
            $file_path_pdf = "certificate/" . $file . ".pdf";

            // Save the image to a file
            imagejpeg($image, $file_path);

            // Clean up the image resources
            imagedestroy($image);

            // Create a PDF
            require "fpdf.php";
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->Image($file_path, 0, 0, 210, 297);
            $pdf->Output($file_path_pdf, "F");
			
			$stmt_update1 = $dbh->prepare("UPDATE `inter_certifcate` SET `pdf_file` = :pdf_file,`jpg_file` = :jpg_file WHERE `inter_certifcate`.`id` = :id");
				$stmt_update1->bindParam(":pdf_file", $file);
				$stmt_update1->bindParam(":jpg_file", $file);
				$stmt_update1->bindParam(":id", $primary_key);
				$stmt_update1->execute();
				$count1 = $stmt_update1->rowCount();
				if($count1){
					echo $file_path_pdf;
				}
			

            // Output a link to download the PDF
            /* echo '<a target="_blank" href="https://awesomesauce.in/admin/' . $file_path_pdf . '">click here to download</a>'; */
        }
    }
}

?>
