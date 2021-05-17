

    <form name="Myform" id="Myform" action="#" method="post" onsubmit="return(Validate());">
   <div id="error" style="color:red; font-size:16px; font-weight:bold; padding:5px"></div>
    <table style="width:100px; margin-left:2em;">
        <thead></thead>
        <tbody>
            <tr>
                <td style="text-align: right;font-size: 20px">User Name</td>
                <td style="font-size: 20px"><input type="text" name="username" id="username" onkeydown="HideError()" size="20px;"/></td>
            </tr>
            <tr>
                <td style="text-align: right;font-size: 20px">Full Name</td>
                <td style="font-size: 20px"><input type="text" name="fullname" id="fullname" onkeydown="HideError()" size="20px;"/></td>
            </tr>
            <tr>
                <td style="text-align: right;font-size: 20px">Email</td>
                <td style="font-size: 20px"><input type="text" name="email" id="email" onkeydown="HideError()" size="20px;"/></td>
            </tr>

            <tr>
                <td  width: 200px style="text-align: right;font-size: 20px">Password</td>
                <td style="font-size: 20px"><input type="password" name="password" id="password" maxlength="20" onkeydown="HideError()" size="20px;"/></td>
            </tr>
            
            <tr>
                <td style="color:#F8F8FF;"></td>
                <td><input type="submit" name="Register" value="Register" /></td>
            </tr>
            <tr>
                <td style="color:#F8F8FF;"></td>
                <td style="color:green;"><a href="index.php"><i><< Back</i></a></td>
            </tr>
        
        </tbody>
    </table>
</form>