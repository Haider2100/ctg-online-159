<?php

include 'datafunction.php';
$db =  new datafunction();
session_start();
    $username=$_SESSION['user_name'];
    $id=$_SESSION['id'];
    $usertype=$_SESSION['user_type'];          
    $imagepath=$_SESSION['image_path'];


$msg_id = $_GET['msg_id'];
$query ="INSERT INTO notifistatus (msg_id,type,description,react_name,react_time) values ('$msg_id','view','view','$username',now())";
$db->notificationperformQuery($query);

include 'header.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Docs | Home Page</title>
        <link rel="stylesheet" href="css/dsahboard.css">       
        <style>
        img {
          display: block;
          margin-left: auto;
          margin-right: auto;
          border: 5px solid #555;
          border-radius: 15%;
        }
        </style> 
    </head>
    <body>
       <script type="text/javascript">
    
            myFunction('Hide');
            FuncChangePhoto('Hide');
        </script>     


            <div id="wrap">
                <div id="main">
  
                    <div id="content">
  

<form id="example-form" method="POST" name="updatexp">
 
<?php
 
    //$id = $_GET['id'];
   // $query ="UPDATE `notifications` SET `status` = 'read' WHERE `id` = $msg_id;";
    //$db->notificationperformQuery($query);
    $query = "SELECT * from notifications where id ='$msg_id'";
    if(count($db->notificationfetchAll($query))>0){
        foreach($db->notificationfetchAll($query) as $i){
        
        ?>
      <table id ="main">
            
            <tr>
              <th colspan=3><h1>Message Details</h1> </th>
            </tr>
            <tr>
              <td style="width:100px;">From </td>
              <td style="width:20px;">: </td>  
              <td style="width:780px;"><?php echo ucfirst($i['sender']) ?></td>
            </tr>
            <tr>
              <td>To </td>
              <td>: </td>  
              <td><?php echo ucfirst($i['reciever']) ?></td>
            </tr>
            <tr>
              <td>Date </td>
              <td>: </td>  
              <td><?php echo ucfirst($i['msg_date']) ?></td>
            </tr>
            <tr>
              <td>Subject </td>
              <td>: </td>  
              <td><?php echo ucfirst($i['title']) ?></td>
            </tr>
            <tr>
              <td colspan="3">Message : </td>
              
            </tr>
            <tr>
              <td colspan="3"><?php echo ucfirst($i['message']) ?></td>
            </tr>
        </table>  



<?php }} ?>   
 
  <br>
  <br>                               
  
  <table id="main">
    <tr>
        <td colspan=3><textarea name="msg" cols="125" rows="6" class="form-control" ></textarea></td>
    </tr>
    <tr>
            <th><button class="btn btn-danger" name="post" >Post</button></th>
            <th><button class="btn btn-danger" name="like" >Like</button></th>
            <th><a class="btn btn-danger" href="dashboard.php" >Back</a></th>
    </tr>

    </table>

</form>                                               

<?php 
  if (isset($_POST['post'])) { 
    if(isset($_POST['msg'])) {
      
      $msg = $_POST['msg']; 
      $time = date('Y-m-d H:i:s'); 
      $isSaved = $db->notificationperformQuery("INSERT INTO notifistatus (msg_id,type,description,react_name,react_time) values ('$msg_id','comment','$msg','$username','$time')");
      
      if($isSaved) {
        echo '* save new Comments success';
      } else {
        echo 'error save data';
      }
    } else {
      echo '* completed the information above';
    }
  } 
  
  if (isset($_POST['like'])) { 
        $time = date('Y-m-d H:i:s');
        $isSaved = $db->notificationperformQuery("INSERT INTO notifistatus (msg_id,type,description,react_name,react_time) values ('$msg_id','like','like','$username','$time')");
      
      if($isSaved) {
        echo '* You like  this message';
      } else {
       // echo 'error save data';
      }
    } else {
      echo '* completed the information above';
    }
   

  ?>



</div>
                <?php 
                
                if ($_SESSION['user_type']=='Admin')
                {
                    include 'sidebar-admin.php';;
                }
                else
                {
                    include 'sidebar.php';
                }
                ?>

        </div>
  
    </div>

      </body>
</html>