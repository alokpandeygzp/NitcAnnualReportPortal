<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <div class="d-flex flex-column align-items-center gap-2 w-100 h-100">
        <div class="table-heading">International Conferences Publications for the year 2023-24</div>
        <?php
        if ($userRole == 'admin')
            $sql = "SELECT * FROM internationalconference";
        else
            $sql = "SELECT * FROM internationalconference where entity='$userRole'";
        $rs = mysqli_query($con, $sql);


        echo '<div class="table_container">';
        echo '
            <table id="internationalconference" class="table table-striped" style="width: 100%; height: auto;">
                <thead> 
                    <tr> 
                    <th class="box">S. no.</th> 
                    <th class="box">Name of the Author</th> 
                    <th class="box">Title of the Paper</th> 
                    <th class="box">Name of International Conference</th> 
                    <th class="box">VOL, Year, P.P.</th>
                    <th class="box">Action</th>
                    </tr>
                </thead>';

        echo '<tbody>';
        $count = 1;
        while ($row = mysqli_fetch_assoc($rs)) {
            $author = $row['author'];
            $title = $row['title'];
            $conf_name = $row['conf_name'];
            $vol = $row['vol_pp'];
            $id = $row['id'];

            echo '
                <tr>
                <td class="box">' . $count . '</td>
                <td class="box">' . $author . '</td>
                <td class="box">' . $title . '</td>
                <td class="box">' . $conf_name . '</td>
                <td class="box">' . $vol . '</td>
                    <td class="">
                        
                            <button class="edit_btn" data-id="internationalconference:form-13:' . $id . '"><i class="fas fa-edit"></i></button>
                            <button class="delete_btn"  onclick=handleDeleteClick(' . $id . ') "><i class="fas fa-trash-alt"></i></button>
                        
                    </td>
                </tr>';

            $count++;
        }
        echo '</tbody>';
        echo '<tfoot> 
<tr> 
<th class="box">S. no.</th> 
<th class="box">Name of the Author</th> 
<th class="box">Title of the Paper</th> 
<th class="box">Name of International Conference</th> 
<th class="box">VOL, Year, P.P.</th>
<th class="box">Action</th>
</tr>
</tfoot>';
        echo '</table>
</div>';
        ?>
    </div>
</body>

</html>