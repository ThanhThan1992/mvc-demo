<!DOCTYPE html>
<?php echo '<link href="./css/view.css" rel="stylesheet" type="text/css" />'; ?>
<html>
    <body align="center">
        <div id="main" >
            <table align="center" border="1" cellspacing="2" cellpadding="2">
            <tr>
            <th><font face="Arial, Helvetica, sans-serif">ID</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Name</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Age</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Porn</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Action</font></th>
            <a href="studentView.php"></a>
            <th><font face="Arial, Helvetica, sans-serif">Delete</font></th>
            </tr>
            
            <?php
                //echo '<pre>';
                //var_dump(pg_numrows($students));die;
                //var_dump($students);die;
                while ($row = pg_fetch_object($students))  
                {
                    $id   = $row->id;
                    $name = $row->name;
                    $age  = $row->age;
                    $porn = $row->porn;
            ?>
            <tr>
            
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $age; ?></td>
                <td><?php echo $porn; ?></td>
                <td><a href="index.php?edit=<?php echo $id; ?>">Edit</a></td>
                <td><a href="delete.php?delete=<?php echo $id; ?>">delete</a></td>
            </tr>
                <?php } ?>
            </table>
            <a href="index.php?insert='insert'">Insert</a>
        </div>
    </body>
</html>