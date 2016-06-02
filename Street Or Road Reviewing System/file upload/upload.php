<?php
$file_result="";
if($_FILES['file']['error']>0)
{
    $file_result.="No file uploaded or invalid file ";
    $file_result.="Error Code: ".$_FILE["file"]["error"]."<br>";
}
else
{
    $file_result.=
        "Upload".$_FILES['file']['name'];
    
    move_uploaded_file($_FILES['file']['tmp_name'],'sk/'.$_FILES["file"]["name"]);
    $file_result.="File uploaded successfully";
}
?>