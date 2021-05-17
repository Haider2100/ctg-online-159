<?php

include 'datafunction.php';
$db =  new datafunction();
$exhid=$_GET['exhid'];
session_start();
    $username=$_SESSION['user_name'];
    $id=$_SESSION['id'];
    $usertype=$_SESSION['user_type'];  

if(isset($_POST['update']))
{

$expense_id=$exhid;
$expense_name=$_POST['expense_name'];   
$description=$_POST['description']; 
$amount=$_POST['amount']; 
$res=$db->addExpenseDetails($expense_id,$expense_name,$description,$amount)

?>

<script> alert("Expense Details record updated Successfully");</script>
<?php
header("location:expensedetailslist.php?exhid=$exhid");
}
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

  <h2>Add New Expense Detail Information</h2>
        
        <table id="example" class="display responsive-table ">
             <tr>
                <th> </th>
                <th> </th>
            </tr>                                 
            <tr>
                <td>Expense Details id</td>
                <td></td>
            </tr>
              <tr>
                <td>Expense Head</td>
                <td></td>
            </tr>     

            <tr>
                <td>Expense Name</td>
                <td><input id="expense_name" name="expense_name" type="text" autocomplete="off" required size="50"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input id="description" name="description"  type="text" autocomplete="off" required size="50"></td>
            </tr>
            <tr>
                <td>Amount</td>
                <td><input id="Amount" name="amount" type="text"  maxlength="10" autocomplete="off" required></td>
            </tr>            
            
            <tr>
                <td> </td>
                <td><button class="btn btn-Success" type="submit" name="update"  id="update" >Update</button> <a class="btn btn-danger" href="expensedetailslist.php?exhid=<?php echo $exhid; ?>" >Back</a></td>
            </tr>

</table>

</form>                                               

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