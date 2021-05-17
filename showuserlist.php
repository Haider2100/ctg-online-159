<?php
    //include'Session.php';
    include 'datafunction.php';
    $db =  new datafunction();
    
    session_start();
    $username=$_SESSION['user_name'];
    $id=$_SESSION['id'];
    $usertype=$_SESSION['user_type'];          
    $imagepath=$_SESSION['image_path'];

include 'header.php';

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, intial-scale=1.0"/>
        <link rel="stylesheet" href="css/dsahboard.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Show user list</title>
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
    <!-------------------Main Content------------------------------>
    <script type="text/javascript">
    
    myFunction('Hide');
    FuncChangePhoto('Hide');
    
    function SetCookie(id,un) {
      
    /*document.getElementById("myText").value =id+' ' +un;*/
    document.cookie = "id="+id;
    document.cookie = "un="+un;

    }

    

    </script>

        <div id="wrap">

            <div id="main">

            <div id="content">
            <form action="" method="post">
            Search user name: <input type="text" name="search"><input type="submit">
            <input type="text" id="myText" name="myText" value="">
            </form>

    <?php
        

       
        $image_query = $db->conn->prepare("select * from users");
        $image_query->execute();
        $results=$image_query->fetchAll(PDO::FETCH_OBJ);

        foreach($results as $result)

        {
            $user_name = $result->user_name;
            $img_src = $result->img_path;
        ?>

        <table id="main">
            <tr >
                <td rowspan=5 >
                <img src="<?php echo $img_src; ?>" alt="" title="<?php echo $img_name; ?>" width="100" height="120" class="img-responsive" />    
                </td>
                <td>User Name </td>
                <td> : </td>
                <td><?php echo $result->user_name; ?> </td>
                <td rowspan=3><a href="useredit.php?id=<?php echo $result->id; ?>"> Change </a></td>
            </tr>
            
            <tr>
                <td>Full Name </td>
                <td> : </td>
                <td><?php echo $result->full_name; ?> </td>
                
            </tr>
            <tr>
                <td>Email Address </td>
                <td> : </td>
                <td><?php echo $result->Email; ?> </td>

            </tr>
            <tr>
                <td>Password </td>
                <td> : </td>
                <td>******* </td>
                <td><a href="resetpassword.php?id=<?php echo $result->id; ?>"> Reset </a></td> 
            </tr>
            <tr>
                <td>User Type </td>
                <td> : </td>
                <td><?php echo $result->user_type; ?> </td>
                <td><a href="userinactive.php?id=<?php echo $result->id;?> & utype=<?php 
                if( $result->user_type=='Inactive')
                    {
                        echo 'User';
                    }
                 else{
                        echo 'Inactive';
                 }
                 ?>">
                
                <?php 
                if( $result->user_type=='Inactive')
                    {
                        echo "Active";
                    }
                 else{
                        echo "In Active";
                 }
                 ?>


                 </a></td>   
            </tr>
            <tr>
                <th><a href="#" onclick="FuncChangePhoto('Show'); SetCookie('<?php  echo $result->id; ?>','<?php  echo $result->user_name; ?>')" > Change Photo </a></th>
                <th><a href="delimage.php" onclick=" SetCookie('<?php  echo $result->id; ?>','<?php  echo $result->img_path; ?>');jsDelImage()" > Remove Photo </a></th>
                <th ColSpan=2><a href="userinactive.php?id=<?php echo $result->id;?> & utype=<?php 
                if( $result->user_type=='User')
                    {
                        echo 'Admin';
                    }
                 else{
                        echo 'No';
                 }
                 ?>"> Set as Admin User </a> </th>
                <th><a href="userdelete.php?id=<?php echo $result->id; ?>" onclick="return  confirm('Are you sure? Y/N')"> Delete This User </a></th>
                
            </tr>
            <tr>
                
                <td ColSpan=6>
                
                </td>
            </tr>
        </table>


<?php } ?>


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

