
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
        

        
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 15px 110px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
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
    
            <br>
            <br>
            <table id ="main">
              <tr>
              <td>
              <div class="dropdown">
          
              <button id="dropdown01" onclick="menutoggle()" class="dropbtn" >Notifications ( Unread  
                      <?php
                      $query = "SELECT * from `view_notification` where (type IS NULL ) And (reciever='$username' or reciever='All')  order by `msg_date` DESC";
                      
                      if( count($db->notificationfetchAll($query))>0){
                      ?>
                      <span class="badge badge-light"><?php echo count($db->notificationfetchAll($query)); ?></span>
                    <?php
                      }
                    ?>)<i class="fa fa-caret-down"></i></button> 
                      
                      <div id="myDropdown" class="dropdown-content">
                      
                      <?php
                      
                      $query = "SELECT DISTINCT id,title,msg_date,type from `view_notification` where (type='view' or type IS NULL ) And (reciever='$username' or reciever='All')  order by `msg_date` DESC";
                       if(count($db->notificationfetchAll($query))>0){
                           foreach($db->notificationfetchAll($query) as $i){
                      ?>
                    <a style ="
                               <?php
                                  if($i['type']!=='view'){
                                      echo "font-weight:bold;";
                                  }
                               ?>
                               "  href="viewmessage.php?msg_id=<?php echo $i['id'] ?>">
                      <small><i><?php echo $i['title'].' - '. date('F j, Y, g:i a',strtotime($i['msg_date'])) ?></i></small><br/>
                        <?php 
       
                      if($i['type']=='comment'){
                          echo "Someone commented on your post.";
                      }else if($i['type']=='like'){
                          echo ucfirst($i['name'])." liked your post.";
                      }
       
                        ?>
                      </a>
                    
                      <?php
                           }
                       }else{
                           echo "No Records yet.";
                       } ?>
                  </div>

            </div> 
            </td >

                <th ><h4>USER TYPE WISE PIE CHART</h4></th>
                
            <tr>
                <td> <h3>Send New Message:</h3></td>
                <td rowspan="2"><div id="piechart_div" style="border: 1px solid #ccc"></div></td>
            </tr>
      <tr>
      <td>  
      <form method="post"  action="<?php echo $_SERVER['PHP_SELF']; ?>">                    
        <table id ="main">

          <tr>
            <td>Title</td>
            <td><input type="text" name="title" class="form-control" required size="48"></td>
          </tr> 
          <tr>
            <td>Message</td>
            <td><textarea name="msg" cols="50" rows="4" class="form-control" required></textarea></td>
          </tr>     
        
          
          <tr>
            <td>For</td>
            <td><select name="user" class="form-control">
            <option value="All">All</option>
            <?php     
              $user = $db->listUsers(); 
              foreach ($user as $key) {
            ?>
              <option value="<?php echo $key['user_name'] ?>"><?php echo $key['user_name'] ?></option>
            <?php } ?>
            </select></td>
          </tr>
          <tr>
            <td colspan=1></td>
            <td colspan=1></td>
          </tr>         
          <tr>
            <td colspan=1></td>
            <td><button name="submit" type="submit" class="btn btn-info">Send Message</button></td>
          </tr>
        </table>
      </form>

<?php 
  if (isset($_POST['submit'])) { 
    if(isset($_POST['msg']) and  isset($_POST['title']) and isset($_POST['user'])) {
      $title = $_POST['title']; 
      $msg = $_POST['msg']; 
      $time = date('Y-m-d H:i:s'); 
      $user = $_POST['user']; 
      $isSaved = $db->saveNotification($title, $msg,$time,$username,$user);
      if($isSaved) {
        echo '* save new notification success';
      } else {
        echo 'error save data';
      }
    } else {
      echo '* completed the information above';
    }
  } 
  ?>
                




                </td>
              </tr>
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
   
<?php 
            if($statement = $db->conn->prepare("SELECT user_type, count(id) as nos  FROM users group By user_type")){
            $statement->execute();
            $res=$statement->fetchAll(PDO::FETCH_OBJ);
            
            ///echo "No of records : ".$statement->rowCount()."<br>";
            $php_data_array = Array(); // create PHP array
             /// echo "<table> <tr> <th>User type</th><th>Nos</th></tr>";
            foreach($res as $row)
            {
              /// echo "<tr><td>$row->user_type</td><td>$row->nos</td></tr>";
               $php_data_array[] = [$row->user_type,$row->nos]; // Adding to array
               }
            ///echo "</table>";
            }
            //print_r( $php_data_array);
            // You can display the json_encode output here. 
            ///echo json_encode($php_data_array); 

            // Transfor PHP array to JavaScript two dimensional array 
            echo "<script>
                    var my_2d = ".json_encode($php_data_array)."
            </script>";
            ?>

    </body>

  


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'user_type');
        data.addColumn('number', 'nos');
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
// above row adds the JavaScript two dimensional array data into required chart format
    
    var piechart_options = {
                       width:425,
                       height:250,
                       pieHole:0.4,
                       //is3D: true
                       legend: 'none',
                       pieSliceText: 'label',
                       pieStartAngle: 100,
                       
                   
                   };

    
    

        // Instantiate and draw the chart
        //var chart = new google.charts.Bar(document.getElementById('chart_div'));
        //chart.draw(data, Baroptions);
  
      
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        piechart.draw(data, piechart_options);
      }

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function menutoggle() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

</html>
