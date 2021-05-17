<?php

include 'datafunction.php';
$db =  new datafunction();
$exdid=$_GET['exdid'];
$exhid=$_GET['exhid'];
session_start();
    $username=$_SESSION['user_name'];
    $id=$_SESSION['id'];
    $usertype=$_SESSION['user_type'];  

if(isset($_POST['update']))
{

$expense_id=$_POST['exphead_id'];
$expense_name=$_POST['expense_name'];   
$description=$_POST['description']; 
$amount=$_POST['amount']; 
$sql="update expensedetails set expense_id=:expense_id,expense_name=:expense_name,description=:description,amount=:amount where id=:exdid";

$query = $db->conn ->prepare($sql);
$query->bindParam(':expense_id',$expense_id,PDO::PARAM_STR);
$query->bindParam(':expense_name',$expense_name,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':amount',$amount,PDO::PARAM_STR);
$query->bindParam(':exdid',$exdid,PDO::PARAM_STR);

$query->execute();
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

  <h2>Edit Expense Detail Information</h2>
 
<?php 

//$eid=$_GET['id'];
$sql = "SELECT * from  expensedetails where id=:exdid";

$query = $db->conn -> prepare($sql);
$query -> bindParam(':exdid',$exdid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>      
        
        <table id="example" class="display responsive-table ">
             <tr>
                <th> </th>
                <th> </th>
            </tr>                                 
            <tr>
                <td>Expense Details id</td>
                <td><input  name="id" id="id" value="<?php echo htmlentities($result->id);?>" type="text" autocomplete="off" readonly required size="1"></td>
            </tr>
              <tr>
                <td>Expense Head</td>
                <td>
  
<select  name="exphead_id" autocomplete="off"  >

<?php 
$sql = "SELECT id,expense_head from expenses";
$query = $db->conn -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $resultt)
{   

echo "<option value=".$resultt->id; 

if($resultt->id==$result->expense_id){echo " selected='selected'";}

echo ">" . $resultt->expense_head . "</option>";

//==========other way====================

//$select_attribute = '';
//if($resultt->id==$result->expense_id){$select_attribute= " selected='selected'";}
//echo '<option value=" '.$resultt->id.'" '. $select_attribute . ' >'.$resultt->expense_head.'</option>';
//================

}
}

echo "</select>";
?>
                                                           

    </td>
            </tr>     

            <tr>
                <td>Expense Name</td>
                <td><input id="expense_name" name="expense_name" value="<?php echo htmlentities($result->expense_name);?>" type="text" autocomplete="off" required size="50"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input id="description" name="description" value="<?php echo htmlentities($result->description);?>" type="text" autocomplete="off" required size="50"></td>
            </tr>
            <tr>
                <td>Amount</td>
                <td><input id="Amount" name="amount" type="text" value="<?php echo htmlentities($result->amount);?>" maxlength="10" autocomplete="off" required></td>
            </tr>            
 <?php }}?>           
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