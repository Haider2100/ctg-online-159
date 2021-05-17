<?php

    /*-- we included connection files--*/
    include 'User.php';
    $user = new User();

    /*--- we created a variables to display the error message on design page ------*/
    $error = "";

    if (isset($_POST["btn_upload"]) == "Upload")
    {
        $file_tmp = $_FILES["fileImg"]["tmp_name"];
        $file_name = $_FILES["fileImg"]["name"];

        /*image name variable that you will insert in database ---*/
        $image_name = $file_name;

        //image directory where actual image will be store
        $file_path = "images/".$file_name;   
        
    /*---------------- php textbox validation checking ------------------*/
    if($image_name == "")
    {
        $error = "Please enter Image name.";
    }

    /*-------- now insertion of image section has start -------------*/
    else
    {
        if(file_exists($file_path))
        {
            $error = "Sorry,The <b>".$file_name."</b> image already exist.";
        }
            else
            {
                
$eid=8;
$sql="update users set img_name=:image_name,img_path=:file_path where id=:eid";

$query = $user->conn ->prepare($sql);
$query->bindParam(':image_name',$image_name,PDO::PARAM_STR);
$query->bindParam(':file_path',$file_path,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);

$query->execute();
               move_uploaded_file($file_tmp,$file_path);
                $error = "<p align=center>File ".$_FILES["fileImg"]["name"].""."<br />Image saved into Table.";

            }
        }
    }
?>



<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0"/>
    <title>Image Upload - Campuslife</title>
    <style>
    
        html, body{background: #ececec; height: 100%; margin: 0; font-family: Arial;}
        .main{height: 100%; display: flex; justify-content: center;}
        .main .image-box{width:300px; margin-top: 30px;}
        .main h2{text-align: center; color: #4D4D4D;}
        .main .tb{width: 100%; height: 40px; margin-bottom: 5px; padding-left: 5px;}
        .main .file_input{margin-top: 10px; margin-bottom: 10px;}
        .main .btn{width: 100%; height: 40px; border: none; border-radius: 3px; background: #27a465; color: #f7f7f7;}
        .main .msg{color: red; text-align: center;}
    
    </style>
    </head>

    <body>
    <!-------------------Main Content------------------------------>
    <div class="container main" >
        <div class="image-box">
            <h2>Image Upload</h2>
            <form method="POST" name="upfrm" action="" enctype="multipart/form-data">
                <div>
                    
                    <input type="file" name="fileImg" class="file_input" />
                    <input type="submit" value="Upload" name="btn_upload" class="btn" />
                
                </div>
            
            </form>
                <div class="col-sm-3" style="background-color:yellow;">
                    <a class="btn btn-danger" href="showimage.php" style="text-align: right">Change Profile Info</a>
                </div>

            <div class="msg">
                <strong>
                    <?php if(isset($error)){echo $error;}?>
                </strong>
            </div>
        
        </div>
    </div>
    </body>
    </html>