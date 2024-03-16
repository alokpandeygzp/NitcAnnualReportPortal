<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <div class="d-flex flex-column align-items-center w-100">
        <?php
        if ($userRole == 'admin')
            $sql = "SELECT * FROM faculty_qualification order by date";
        else
            $sql = "SELECT * FROM faculty_qualification where entity='$userRole' order by date";
        $rs = mysqli_query($con, $sql);


        echo '
    <div class="" id="">';

        echo '<div class="table_container">';
        echo '
            <table id="faculty_qualification" class="table table-striped" style="width: 100%; height: auto;">
                <thead> 
                    <tr> 
                    <th class="box sn_box">S. no.</th> 
                    <th class="box">Name of faculty</th> 
                    <th class="box">Qualification</th> 
                    <th class="box">Institute</th> 
                    <th class="box date_box">Date</th> 
                    <th class="box action_box">Action</th>
                    </tr>
                </thead>';

        echo '<tbody>';
        $count = 1;
        while ($row = mysqli_fetch_assoc($rs)) {
            $name = $row['name'];
                        $qual = $row['qualification'];
                        $institute = $row['institute'];
                        $date = $row['date'];
                        $id = $row['Id'];

            echo '
                <tr>
                <td class="box">' . $count . '</td>
                <td class="box">' . $name . '</td>
                <td class="box">' . $qual . '</td>
                <td class="box">' . $institute . '</td>
                <td class="box">' . $date . '</td>
                    <td class="">
                        <div class="">
                            <button class="edit_btn" data-id="community_services:form-1:' . $id . '"><i class="fas fa-edit"></i></button>
                            <button class="delete_btn"  onclick=handleDeleteClick(' . $id . ') "><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </td>
                </tr>';

            $count++;
        }
        echo '</tbody>';
        echo '<tfoot> 
<tr> 
<th class="box">S. no.</th> 
                    <th class="box">Name of faculty</th> 
                    <th class="box">Qualification</th> 
                    <th class="box">Institute</th> 
                    <th class="box date_box">Date</th> 
                    <th class="box action_box">Action</th>
</tr>
</tfoot>';
        echo '</table>
</div>
</div>';
        ?>
    </div>
</body>

</html>