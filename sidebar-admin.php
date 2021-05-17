
            <div id="side">
                    <img src="<?php echo $_SESSION['image_path'];?>"  width="160" height="200">

            <br>
            <table  id="side" style="border: 1px black solid;background-color: #607B8B;">
                
                <tr>
                    <td><li><a href="showuserlist.php">View User List</a></li></td>
                </tr>
                <tr>
                    <td><li><a href="usercreate.php">Create New User</a></li></td>
                </tr>
                <tr>
                    <td><li><a href="expensesumary.php" >View user Expense Summary</a></li></td>
                </tr>
                <tr>
                    <td><li><a href="logfile.php" >View log</a></li></td>
                </tr>

            </table>
            </div>
            <!-- this clear class is for special purpose.
            this is for to clear the "float property" of 
            the previous element, it will prevent footer
            to float -->
            <div class= "clear"></div>
            </div>
            <div id="footer">
            &copy;Developed by A H M Kamruzzaman
            </div>
       
