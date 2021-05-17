<?php
include 'datafunction.php';
$db =  new datafunction();
    session_start();
    $username=$_SESSION['user_name'];
    $id=$_SESSION['id'];
    $usertype=$_SESSION['user_type'];  

$exhid=$_GET['exhid'];

$sql = "SELECT id,expense_head,status from expenses Where id=:exhid";
$query1 = $db->conn->prepare($sql);
$query1->bindParam(':exhid',$exhid,PDO::PARAM_STR);
$query1->execute();
$results=$query1->fetchAll(PDO::FETCH_OBJ);

foreach($results as $result)
{
$exphead= $result->expense_head;

}
include 'header.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Docs | Home Page</title>
        <link rel="stylesheet" href="css/dsahboard.css">       
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--https://fontawesome.com/v4.7.0/icons/-->
        
        <style>
        img {
          display: block;
          margin-left: auto;
          margin-right: auto;
          border: 5px solid #555;
          border-radius: 15%;
        }
        
        
        button.a {
          background-color: #04AA6D;
          color: yellow;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
          height:50px;
         text-shadow: 2px 2px #FF0000;    
         font-size: 20px;

        }
        button.b {
          color: green; 
          border: none;
          cursor: pointer;
          height:20px;
        
         

        }
        button.c {
          color: red; 
          border: none;
          cursor: pointer;
          height:20px;
        
         

        }


        button:hover {
            opacity: 0.75;
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
                    <span class="card-title"><h3>Details Expense Information(For <?php echo $exphead; ?>)</h3> </span>
                        
                            <form action="#" method="post">
                            <button class="a" type="submit" formaction="addexpensedetails.php?exhid=<?php echo htmlentities($exhid);?>"><b>Add New Expenses</b></button> 
                            </form>


                            <table id="main" class="display responsive-table ">
                                <thead>
                                    <tr>
                                        <th>Sl#</th>
                                        <th>Expense Name</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th colspan="2">Action</th> 
                                    
                                    </tr>
                                </thead>
                                 
                                <tbody>

<?php
//include 'datafunction.php';
//$db =  new datafunction();

//$exid=$_COOKIE['jsexid'];

$sql = "SELECT id,expense_head,expense_name,description,amount from view_expensedetails Where expense_id=:exhid";
$query = $db->conn->prepare($sql);
$query->bindParam(':exhid',$exhid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
$Amt=0;
if($query->rowCount() > 0)
{
foreach($results as $result)
 
{               
$Amt=$Amt+ $result->amount ;
?>  
                                <tr>
                                    <td width=50px><?php echo htmlentities($cnt);?></td>
                                    <td width=200px><?php echo htmlentities($result->expense_name);?></td>
                                    <td width=400px><?php echo htmlentities($result->description);?></td>
                                    <td style="text-align: right;" width=100px><?php echo htmlentities($result->amount);?></td>
                                    <td style="text-align: center;">

                                        <form action="#" method="post"><button class='b' formaction="editexpensedetails.php?exdid=<?php echo htmlentities($result->id);?> & exhid=<?php echo htmlentities($exhid);?>"><i class="fa fa-pencil"></i></button></form>
                                    </td>
                                
                                    <td style="text-align: center;">

                                        <form action="#" method="post"><button class='c' formaction="deleteexpdetails.php?exdid=<?php echo htmlentities($result->id);?> & exhid=<?php echo htmlentities($exhid);?>" onclick="return  confirm('Are you sure? Y/N')"><i class="fa fa-trash"></i></button></form>
                                    </td>

                                </tr>
                                 <?php $cnt++;} }?>
                                 <tr>
                                    <td colspan=2 style="color:green;"><a href="dashboard.php"><i><< Back</i></a></td>
                                    <td style="text-align:right;">Total=</td>
                                    <td style="text-align:right;"><?php echo $Amt?></td>
                                    <td colspan="2" style="text-align: center;"><a href="expenselist.php"><i><< Back</i></a></td>
                                 </tr>
                            </tbody>
                        </table>
                            
                            

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
