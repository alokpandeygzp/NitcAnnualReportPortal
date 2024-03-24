<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <div class="d-flex flex-column align-items-center gap-2 w-100 h-100">
        <div class="table-heading">Expert lectures delivered in Conferences/Seminar/workshops during year 2023-24</div>
        <?php
        if ($userRole == 'admin')
            $sql = "SELECT * FROM expert_lectures";
        else
            $sql = "SELECT * FROM expert_lectures where entity='$userRole'";
        $rs = mysqli_query($con, $sql);


        echo '

                <div class="table_container">
            
                    <table id="expert_lectures1" class="table table-striped" style="width: 100%; height: auto;">
                        <thead> 
                            <tr> 
                            <th class="box">S. no.</th> 
                            <th class="box">Name of Speaker</th> 
                            <th class="box">Title of programme</th> 
                            <th class="box">Start Date</th>                     
                            <th class="box">End Date</th>                       
                            <th class="box">Organization</th>       
                            <th class="box">Action</th>
                            </tr>
                        </thead>

                        <tbody>';
        $count = 1;
        while ($row = mysqli_fetch_assoc($rs)) {
            $staff = $row['staff'];
            $title = $row['title'];
            $start = $row['start'];
            $end = $row['end'];
            $organization = $row['organization'];
            $id = $row['Id'];

            echo '
                                <tr>
                                <td class="box">' . $count . '</td>
                                <td class="box">' . $staff . '</td>
                                <td class="box">' . $title . '</td>
                                <td class="box">' . $start . '</td>
                                <td class="box">' . $end . '</td>
                                <td class="box">' . $organization . '</td>
                                    <td class="">
                                        
                                            <button class="edit_btn" data-id="expert_lectures:form-6:' . $id . '"><i class="fas fa-edit"></i></button>
                                            <button class="delete_btn" onclick="handleDeleteClick(' . $id . ', \'expert_lectures\')"><i class="fas fa-trash-alt"></i></button>
                                        
                                    </td>
                                </tr>';

            $count++;
        }
        echo '</tbody>';
        echo '<tfoot> 
                            <tr> 
                            <th class="box">S. no.</th> 
                            <th class="box">Name of Speaker</th> 
                            <th class="box">Title of programme</th> 
                            <th class="box">Start Date</th>                     
                            <th class="box">End Date</th>                       
                            <th class="box">Organization</th>       
                            <th class="box">Action</th>
                            </tr>
                            </tfoot>';
        echo '</table>
        </div>';
        ?>
    </div>
</body>

</html>