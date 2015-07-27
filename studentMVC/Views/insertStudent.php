<?php echo '<link href="./css/view.css" rel="stylesheet" type="text/css" />'; ?>
<html>
    <body align="center">
        <div id="main">
        
            <form name = "insert" method = "POST" > 
                <table align="center">
                    <tr>
                        <td>ID:</td><td><input type   = "text" name   = "id" /></td> 
                    </tr>
                    <tr>
                        <td>Name:</td><td><input type = "text" name   = "name" /></td>
                    </tr>
                    <tr>
                        <td>Age:</td><td><input type  = "text" name   = "age" /></td> 
                    </tr>
                    <tr>
                        <td>Porn:</td><td><input type = "text" name   = "porn" /></td>  
                    </tr>
                    <tr>
                        <td></td><td><input type = "submit" name="submit" /></td>  
                    </tr>
                </table>
                <div>
                    <tr>
                        <td>
                            <?php echo $errs ?>
                        </td>
                    </tr>
                </div>
            </form>  
        
        </div>
     </body>
</html>

