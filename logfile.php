<?php

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
  





  <h1>Logfile</h1>
     
        
        <table id="main" >
             <tr>
                
<?php
 
    $myfile = fopen("log.txt", "w") or die("Unable to open file!");
    //$txt = "John Doe\n";
    //fwrite($myfile, $txt);
    //$txt = "Jane Doe\n";
    //fwrite($myfile, $txt);
    fclose($myfile);

    $sql ="select * from Logdata order by logdate desc";
    $query=$db->conn->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
    file_put_contents("log.txt", "=========================================== " . "\n", FILE_APPEND);
    file_put_contents("log.txt", "Date    User Name    Type    Description " . "\n", FILE_APPEND);
    file_put_contents("log.txt", "=========================================== " . "\n", FILE_APPEND);
    foreach($results as $row)
    { 
     $str=$row->logdate.'  '.$row->user_name.' '.$row->logtype.' '.$row->Description;

    file_put_contents("log.txt", $str . "\n", FILE_APPEND);
    }}
    //echo file_get_contents( "log.txt" );
    //readfile("log.txt");

?>               
 <div id="list"><p><iframe src="log.txt" width=900 height=400 frameborder=0 ></iframe></p>           
            <tr>
                <td colspan=2><a class="btn btn-danger" href="dashboard.php" >Back</a></td>
            
            </tr>

</table>

                                           

</div>

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