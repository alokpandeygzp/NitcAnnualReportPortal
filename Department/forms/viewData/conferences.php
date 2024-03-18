<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <div class="d-flex flex-column align-items-center gap-2 w-100 h-100">
        <div class="table-heading">Conferences/Summer/Winter School/Short term Courses/ Workshops conducted during year 2023-24</div>
        <?php
        // echo ''. $userRole .'';
        if ($userRole == 'admin')
            $sql = "SELECT * FROM conferences";
        else
            $sql = "SELECT * FROM conferences where entity='$userRole'";
        $rs = mysqli_query($con, $sql);


        echo '

                <div class="table_container">
            
                    <table id="conferences" class="table table-striped" style="width: 100%; height: auto;">
                        <thead> 
                            <tr> 
                            <th class="box sn_box">S. no.</th>  
                            <th class="box">Title</th> 
                            <th class="box">Co-ordinators</th>
                            <th class="box date_box">Start Date</th>                     
                            <th class="box date_box">End Date</th>           
                            <th class="box action_box">Action</th>
                            </tr>
                        </thead>

                        <tbody>';
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($rs)) {
                                $title = $row['title'];
                                $staff = $row['name'];
                                $start = $row['start'];
                                $end = $row['end'];
                                $id = $row['Id'];

                                echo '
                                <tr>
                                <td class="box">' . $count . '</td>                    
                                <td class="box">' . $title . '</td>
                                <td class="box">' . $staff . '</td>
                                <td class="box">' . $start . '</td>
                                <td class="box">' . $end . '</td>
                                    <td class="">
                                        
                                            <button class="edit_btn" data-id="conferences:form-4:' . $id . '"><i class="fas fa-edit"></i></button>
                                            <button class="delete_btn"  onclick=handleDeleteClick(' . $id . ') "><i class="fas fa-trash-alt"></i></button>
                                        
                                    </td>
                                </tr>';

                                $count++;
                            }
                        echo '</tbody>';
                        echo '<tfoot> 
                            <tr> 
                            <th class="box sn_box">S. no.</th>  
                            <th class="box">Title</th> 
                            <th class="box">Co-ordinators</th>
                            <th class="box date_box">Start Date</th>                     
                            <th class="box date_box">End Date</th>           
                            <th class="box action_box">Action</th>
                            </tr>
                            </tfoot>';
                echo '</table>
        </div>';
        ?>
    </div>
</body>

</html>