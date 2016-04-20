<?php  
if(isset($_POST['submit']))
{
    //print_r($_FILES['image']);
    $error=array();
    $allowed=array('jpg','jpeg','gif','png');
    $file_name=$_FILES['image']['name'];
    @$file_ext=  strtolower(end(explode('.', $file_name)));
    $file_size=$_FILES['image']['size'];
    $file_tmp=$_FILES['image']['tmp_name'];
    if(in_array($file_ext, $allowed)===FALSE)
    {
        $error[]='extension not allowed';
        
    }
    if($file_size>2097152){
       $error[]='file size should be less than 2 mb'; 
    }
     if(empty($error)){
    move_uploaded_file($_FILES['image']['tmp_name'], "upload/$file_name");
    echo "successfully uploaded";
   }
   else{
       foreach ($error as $value) {
           echo $value.'<br/>';
           
       }
   }
    
}


?>
<html>
    <head>
        <title>
            Secure file upload
        </title>
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="image"/>
            <input type="submit" value="upload" name="submit"/>
        </form>
    </body>
</html>