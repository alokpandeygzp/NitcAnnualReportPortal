<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <div class="d-flex flex-column align-items-center w-100">
        <?php
        if ($userRole == 'admin')
            $sql = "SELECT * FROM expert_lecturesinvited";
        else
            $sql = "SELECT * FROM expert_lecturesinvited where entity='$userRole'";
        $rs = mysqli_query($con, $sql);


        echo '

                <div class="table_container">
            
                    <table id="expert_lecturesinvited" class="table table-striped" style="width: 100%; height: auto;">
                        <thead> 
                            <tr> 
                            <th class="box">S. no.</th> 
                            <th class="box">Name of Speaker</th> 
                            <th class="box">Title of Programme</th> 
                            <th class="box">Start Date</th>                     
                            <th class="box">End Date</th>                       
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
            $id = $row['Id'];

            echo '
                                <tr>
                                <td class="box sn">' . $count . '</td>
                                <td class="box name">' . $staff . '</td>
                                <td class="box program">' . $title . '</td>
                                <td class="box s_date">' . $start . '</td>
                                <td class="box e_date">' . $end . '</td>
                                    <td class="">
                                        
                                            <button class="edit_btn" data-id="community_services:form-1:' . $id . '"><i class="fas fa-edit"></i></button>
                                            <button class="delete_btn"  onclick=handleDeleteClick(' . $id . ') "><i class="fas fa-trash-alt"></i></button>
                                        
                                    </td>
                                </tr>';

            $count++;
        }
        echo '</tbody>';
        echo '<tfoot> 
                            <tr> 
                            <th class="box">S. no.</th> 
                            <th class="box">Name of Speaker</th> 
                            <th class="box">Title of Programme</th> 
                            <th class="box">Start Date</th>                     
                            <th class="box">End Date</th>                       
                            <th class="box">Action</th>
                            </tr>
                            </tfoot>';
        echo '</table>
        </div>';
        ?>
    </div>
</body>

</html>