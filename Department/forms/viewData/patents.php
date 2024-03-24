<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <div class="d-flex flex-column align-items-center gap-2 w-100 h-100">
        <div class="table-heading">Patents Acquired and Filed during year 2023-24</div>
        <?php
        if ($userRole == 'admin')
            $sql = "SELECT * FROM patents";
        else
            $sql = "SELECT * FROM patents where entity='$userRole'";
        $rs = mysqli_query($con, $sql);


        echo '

                <div class="table_container">
            
                    <table id="patents" class="table table-striped" style="width: 100%; height: auto;">
                        <thead> 
                            <tr> 
                            <th class="box">S. no.</th> 
                            <th class="box">Name of Staff</th> 
                            <th class="box">Description of Patent</th> 
                            <th class="box">Date</th> 
                            <th class="box">Action</th>
                            </tr>
                        </thead>

                        <tbody>';
        $count = 1;
        while ($row = mysqli_fetch_assoc($rs)) {
            $staff = $row['staff'];
            $title = $row['title'];
            $date = $row['date'];
            $id = $row['Id'];

            echo '
                                <tr>
                                <td class="box sn">' . $count . '</td>
                                <td class="box name">' . $staff . '</td>
                                <td class="box title">' . $title . '</td>
                                <td class="box">' . $date . '</td>
                                    <td class="">
                                        
                                            <button class="edit_btn" data-id="patents:form-9:' . $id . '"><i class="fas fa-edit"></i></button>
                                            <button class="delete_btn" onclick="handleDeleteClick(' . $id . ', \'patents\')"><i class="fas fa-trash-alt"></i></button>
                                        
                                    </td>
                                </tr>';

            $count++;
        }
        echo '</tbody>';
        echo '<tfoot> 
                            <tr> 
                            <th class="box">S. no.</th> 
                            <th class="box">Name of Staff</th> 
                            <th class="box">Description of Patent</th> 
                            <th class="box">Date</th> 
                            <th class="box">Action</th>
                            </tr>
                            </tfoot>';
        echo '</table>
        </div>';
        ?>
    </div>
</body>

</html>