<?php
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
                
$eid=$id;


$file_path="images/".$username.substr($file_name,-4);

$sql="update users set img_name=:image_name,img_path=:file_path where id=:eid";

$query = $db->conn ->prepare($sql);
$query->bindParam(':image_name',$image_name,PDO::PARAM_STR);
$query->bindParam(':file_path',$file_path,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);

$query->execute();
               move_uploaded_file($file_tmp,$file_path);
                $error = "<p align=center>File ".$_FILES["fileImg"]["name"].""."<br />Image saved into Table.";

            }
        }
    ?>
    <script type="text/javascript">
    myFunction('Hide');
    FuncChangePhoto('Hide');
    </script>
<?php
    }
  

$error = "";

    if (isset($_POST["btn_imgchange"]) == "Change")
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
                
//$eid=$_POST["myText"]; document.getElementById("myText").value
//echo "<script>document.writeln(imgpath);</script>";
$eid= $_COOKIE["id"];
$usr= $_COOKIE["un"];

$file_path="images/".$usr.substr($file_name,-4);

$sql="update users set img_name=:image_name,img_path=:file_path where id=:eid";


$query = $db->conn ->prepare($sql);
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

        <div id="wrap">
            <div id="header">
                <div id="logo">
                    <h1 style="text-align: center;color: green;"><span><img src="images/titlelogo.png" alt="logo"/></span></h1>  
                </div>
                </div>
            <div id="menu">
                <ul>
                <li><a href="dashboard.php" >Dashborad</a></li>
                <li><a href="#">Profile Management</a>
                
                <ul>
                <li><a href="useredit.php?id=<?php echo $id; ?>" >Change User Info</a></li>
                <li><a href="changepassword.php?id=<?php echo $id; ?>" >Change Password</a></li>
                <li><a href="#" onclick="myFunction('Show')" >Change Profile Picture</a></li>
                </ul>
                </li> 
                <li><a href="expenselist.php">Expenses</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li style="margin-top: -3px;margin-left: 2em;">
                
                 <form type="hidden" method="POST" id="upfrm" name="upfrm" action="" enctype="multipart/form-data">
 
                    <input type="file" name="fileImg" class="file_input" />
                    <input type="submit" value="Upload" name="btn_upload" class="btn" />
 
                </form> 
                <form type="hidden" method="POST" id="chgfrm" name="chgfrm" action="" enctype="multipart/form-data">
 
                    <input type="file" name="fileImg" class="file_input" />
                    <input type="submit" value="Change" name="btn_imgchange" class="btn" />
 
                </form> 

                </li>
                <li style="margin-top: 5px;margin-left: 12em;">You login as : <?php echo $username ."/".$usertype?></li>
                
                </ul>
            </div>
            
            
        </div>
  
<script>
function myFunction(show) {
  var x = document.getElementById("upfrm");
  if (show === "Show") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function FuncChangePhoto(show) {
  
  var x = document.getElementById("chgfrm");
  if (show === "Show") {
    x.style.display = "block";
     
  } else {
    x.style.display = "none";
  }
}
</script>
