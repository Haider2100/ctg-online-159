
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
        <title>Docs | Home Page</title>
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
                
                <form method="POST" action="" class="form-group form-inline">
                 <table id="side" style="border: 1px black solid;background-color: #607B8B; width:900px;">
                    <theader> 
                        <tr>
                            <th style="width:250px;">New Expense Head</th>
                            <th style="text-align: left; width:650px;"><input  class="form-control" placeholder="New Expense" type="text" name="name" maxlength="50" size="60" autocomplete="off" required><input class="btn btn-success" type="submit" name="submit" onclick="return  confirm('Are you sure? Y/N')" value="Add New"><a class="btn btn-danger" href="dashboard.php" ><i><< Back</i></a></th>
                            
                            
                        
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
                            <td style="text-align: center;"><form action="#" method="post"><button formaction="expensedetailslist.php?exhid=<?php echo htmlentities($row->id);?>"><i class="fa fa-bars"></i></button><button formaction="editexpensehead.php?exhid=<?php echo htmlentities($row->id);?>"><i class="fa fa-pencil"></i></button><button formaction="deleteexphead.php?exhid=<?php echo htmlentities($row->id);?>" onclick="return  confirm('Are you sure? Y/N')"><i class="fa fa-trash"></i></button></form></td> <?php $cnt++;} }?>
                            

                        <tr>
                            <th colspan=3 style="text-align: right;width:450px;">Total=</th>
                            <th style="text-align: right; width:150px;"><?php echo htmlentities($amt);?></th>
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
