<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <div class="d-flex flex-column align-items-center w-100">
        <?php
        if ($userRole == 'admin')
            $sql = "SELECT * FROM student_achievements order by date";
        else
            $sql = "SELECT * FROM student_achievements where entity='$userRole' order by date";
        $rs = mysqli_query($con, $sql);


        echo '
            <div class="" id="">

                <div class="table_container">
            
                    <table id="student_achievements" class="table table-striped" style="width: 100%; height: auto;">
                        <thead> 
                            <tr> 
                                <th class="">S. no.</th> 
                                <th class="">Name of student</th> 
                                <th class="">Course</th>
                                <th class="">Semester</th>
                                <th class="">Roll No</th>
                                <th class="">Achievement</th> 
                                <th class="">Date</th> 
                                <th class="">Action</th>
                            </tr>
                        </thead>

                        <tbody>';
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($rs)) {
                                $name = $row['name'];
                                $course = $row['course'];
                                $semester = $row['semester'];
                                $rollno = $row['rollno'];
                                $achievement = $row['achievement'];
                                $date = $row['date'];
                                $id = $row['Id'];

                                echo '
                                <tr>
                                    <td class="box">' . $count . '</td>
                                    <td class="box">' . $name . '</td>
                                    <td class="box">' . $course . '</td>
                                    <td class="box">' . $semester . '</td>
                                    <td class="box">' . $rollno . '</td>
                                    <td class="box truncate-text">' . $achievement . '</td>
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
                                <th class="box sn_box">S. no.</th> 
                                <th class="box">Name of student</th> 
                                <th class="box">Course</th>
                                <th class="box">Semester</th>
                                <th class="box">Roll No</th>
                                <th class="box">Achievement</th> 
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