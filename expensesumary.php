
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
        <title>EMS | Expense Summary</title>
        <link rel="stylesheet" href="css/dsahboard.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        $exp_head = $_POST['name'];
                        
                        $res = $db->newExpense($id,$exp_head);
                        //if($res){
                        
                       //<script> alert("Expense Head Added");</script>
                         
                }
                ?>
                   
                 <table id="side" style="border: 1px black solid;background-color: #607B8B; width:900px;">
                        <tr>
                            <th style="text-align: center; width:650px;"><h1 style="text-align: center;color: blue;">User Expense Summary </h1></th>
                            <th style="text-align: right; width:50px;"><a class="btn btn-danger" href="dashboard.php" ><i><< Back</i></a></th>
                        </tr>
                    </table>
                

 
                <table id="main" style="border: 1px black solid;background-color: #607B8B; width:900px;">
                    <theader> 
                        <tr>
                            <th style="text-align:center;width:50px;">Sl</th>
                            <th style="text-align: left; width:150px;">User Name</th>
                            <th style="text-align: right;width:50px;">Total Expense</th>
                            <th style="text-align: center; width:650px;">User Detail Expense</th>
                            
                        
                        </tr>
                    </theader>
                    <tbody>
                        <?php
                        $sql="Select user_id,user_name, Sum(Total) as AmtTotal From expheadsummary  Group By user_id,user_name order by user_id desc";
                        $query=$db->conn->prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $ucnt=1;
                        $tamt=0;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $row)
                        { 
                            $tamt=$tamt+$row->AmtTotal;                   
                        ?>
                        <tr>
                            <td style="text-align: center;width:50px;"><?php echo htmlentities($ucnt);?></td>
                            <td style="text-align: left; width:150px;"><?php echo htmlentities($row->user_name);?></td>
                            <td style="text-align: right; width:50px;"><?php echo htmlentities($row->AmtTotal);?></td>
                            <td >
                        <table>        
                        <?php
                        $uid=$row->user_id;
                        $sql1="Select id,user_name,expense_head,status,EntryNum,Total,status From expheadsummary Where user_id=:uid order by id desc";
                        $query1=$db->conn->prepare($sql1);
                        $query1->bindParam(':uid',$uid,PDO::PARAM_STR);
                        $query1->execute();
                        $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        $amt=0;
                        if($query1->rowCount() > 0)
                        {
                        foreach($results1 as $row1)
                        { 
                            $amt=$amt+$row1->Total;                   
                        ?>
                        <tr>
                            <td style="text-align: center;width:50px;"><?php echo htmlentities($cnt);?></td>
                            <td style="text-align: left;width:400px;"><?php echo htmlentities($row1->expense_head);?></td>
                            <td style="text-align: right; width:100px;"><?php echo htmlentities($row1->Total);?></td>
                            <td style="text-align: right; width:100px;"><?php echo htmlentities($row1->status);?></td>
                             <?php $cnt++; }}?>
                        
                    </table>



                            </td>
                            
                            
                             <?php $ucnt++; }?>
                            

                        <tr>
                            <th colspan=2 style="text-align: right;width:450px;">Total=</th>
                            <th style="text-align: right; width:150px;"><?php echo htmlentities($tamt);?></th>
                            <th colspan=2 style="width:300px;"></th>
                            
                        </tr>
                    <?php $cnt++; }?>
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
