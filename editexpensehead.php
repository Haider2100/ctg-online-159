
<?php
    //include'Session.php';
    include 'datafunction.php';
    $db =  new datafunction();
    session_start();
    $username=$_SESSION['user_name'];
    $id=$_SESSION['id'];
    $usertype=$_SESSION['user_type'];          


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
            
            <?php
                    //USER HIT LOGIN BUTTON
                    if(isset($_POST['submit'])){
                        $exp_head = $_POST['exp_head'];
                        $status = $_POST['status'];
                        $exhid=$_GET['exhid'];
                        $res = $db->EditExpense($exhid,$exp_head,$status);
                        
                        if($res){
                        ?>
                       <script> alert("Expense Head Edited");</script>
                   
                    <?php 
                       
                    }
                     header("location:expenselist.php");
                    }
                ?>
                
                <form method="POST" action="" class="form-group form-inline">
                 <table id="side" style="border: 1px black solid;background-color: #607B8B; width:900px;">
                    <theader> 
                        <tr>
                            <th style="width:200px;">Edit Expense Head</th>
                        <?php
                        $exhid=$_GET['exhid'];
                        $sql1="Select id,expense_head,status From expenses where id=:exhid";
                        $query1=$db->conn->prepare($sql1);
                        $query1->bindParam(':exhid',$exhid,PDO::PARAM_STR);
                        $query1->execute();
                        $results=$query1->fetchAll(PDO::FETCH_OBJ);
                        
                        if($query1->rowCount() > 0)
                        {
                        foreach($results as $row)
                        {                      
                         

                        ?>

                            <th style="text-align: left; width:350px;"><input  class="form-control" value="<?php echo htmlentities($row->expense_head);?>" type="text" name="exp_head" maxlength="50" size="40" autocomplete="off" required></th>
                         <?php }} ?>   
                            <th style="text-align: left; width:100px;"> Status </th>

                            <th>
  
                                <select  name="status" >
                                <?php 
                                echo "<option value=Running"; 
                                if($row->status=='Running'){echo " selected='selected'";}
                                echo "> Running </option>";
                                echo "<option value=Closed"; 
                                if($row->status=='Closed'){echo " selected='selected'";}
                                echo "> Closed </option>";
                                echo "</select>";
                                ?>

                            </th>
                                
                            <th style="text-align: left; width:150px;">   
                            <input class="btn btn-success" type="submit" name="submit" onclick="return  confirm('Are you sure? Y/N')" value="Update"> <a href="expenselist.php"><i><< Back</i></a></th>
                        
                        </tr>
                    </theader> 
                    </table>
                   
                    
                </form>

            <h1 style="text-align: center;color: green;">Expense List </h1>
            
                <table id="main" style="border: 1px black solid;background-color: #607B8B; width:900px;">
                    <theader> 
                        <tr>
                            <th style="width:50px;">SlNo</th>
                            <th style="text-align: left; width:300px;">Expense Head</th>
                            <th style="width:100px;">#Entry</th>
                            <th style="width:150px;">Expense Amount</th>
                            <th style="width:100px;">Status</th>
                            <th style="width:200px;">Action</th>
                        
                        </tr>
                    </theader>
                    <tbody>
                        <?php
                        $sql="Select id,expense_head,status,EntryNum,Total From expheadsummary where user_id=:uid order by id desc";
                        $query=$db->conn->prepare($sql);
                        $query->bindParam(':uid',$id,PDO::PARAM_STR);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        $amt=0;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $row)
                        { 
                        $amt=$amt+$row->Total;                     
                        ?>
                        <tr>
                            <td style="text-align: center;"><?php echo htmlentities($cnt);?></td>
                            <td><?php echo htmlentities($row->expense_head);?></td>
                            <td style="text-align: center;"><?php echo htmlentities($row->EntryNum);?></td>
                            <td style="text-align: right;"><?php echo htmlentities($row->Total);?></td>
                            <td style="text-align: center;"><?php echo htmlentities($row->status);?></td>
                            <td style="text-align: center;"> <form action="#" method="post"><button formaction="expenselist.php"><i class="fa fa-home"></i></button></form></td>
                        </tr>
                        <?php $cnt++;} }?>
                    

                        <tr>
                            <th colspan=3 style="text-align: right;width:450px;">Total=</th>
                            <th style="text-align: right; width:150px;"><?php echo htmlentities($row->Total);?></th>
                            <th colspan=2 style="width:300px;"></th>
                            
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
