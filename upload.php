
<?php
$diretorio = "uploads/";
$imagem = $diretorio . basename($_FILES["fileToUpload"]["name"]);
$controle = 1;
$imageFileType = strtolower(pathinfo($imagem,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $controle = 1;
    } else {
        echo "File is not an image.";
        $controle = 0;
    }
}
// Check if file already exists
if (file_exists($imagem)) {
    echo "Sorry, file already exists.";
    $controle = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $controle = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $controle = 0;
}
// Check if $controle is set to 0 by an error
if ($controle == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imagem)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
