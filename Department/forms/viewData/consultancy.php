<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <div class="d-flex flex-column align-items-center w-100">
        <?php
        if ($userRole == 'admin')
            $sql = "SELECT * FROM consultancy";
        else
            $sql = "SELECT * FROM consultancy where entity='$userRole'";
        $rs = mysqli_query($con, $sql);


        echo '
            <div class="" id="">

                <div class="table_container">
            
                    <table id="consultancy" class="table table-striped" style="width: 100%; height: auto;">
                        <thead> 
                            <tr> 
                            <th class="box">S. no.</th> 
                            <th class="box">Nature of service</th> 
                            <th class="box">Organization</th> 
                            <th class="box">Revenue</th> 
                            <th class="box">Status</th>
                            <th class="box">Date</th>
                            <th class="box">Action</th>
                            </tr>
                        </thead>

                        <tbody>';
        $count = 1;
        while ($row = mysqli_fetch_assoc($rs)) {
            $nature = $row['nature'];
            $org = $row['organization'];
            $revenue = $row['revenue'];
            $status = $row['status'];
            $date = $row['date'];
            $id = $row['Id'];

            echo '
                                <tr>
                                <td class="box">' . $count . '</td>
                                <td class="box">' . $nature . '</td>
                                <td class="box">' . $org . '</td>
                                <td class="box">' . $revenue . '</td>
                                <td class="box">' . $status . '</td>
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
                            <th class="box">Nature of service</th> 
                            <th class="box">Organization</th> 
                            <th class="box">Revenue</th> 
                            <th class="box">Status</th>
                            <th class="box">Date</th>
                            <th class="box">Action</th>
                            </tr>
                            </tfoot>';
        echo '</table>
            </div>
        </div>';
        ?>
    </div>
</body>

</html>