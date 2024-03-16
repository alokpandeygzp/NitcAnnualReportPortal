<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <div class="d-flex flex-column align-items-center w-100">
        <?php



        echo '
    <div class="" id="viewDataTableContainer">';
        $con = mysqli_connect('localhost', 'root', '', 'imsdemo');
        // $entity = $_GET["user"];
        $entity = "junaid_m210662ca@nitc.ac.in";
        if ($entity == 'admin' || $entity == '')
            $sql = "SELECT * FROM community_services";
        else
            $sql = "SELECT * FROM community_services where entity='$entity'";
        $rs = mysqli_query($con, $sql);

        echo '<div class="">';
        echo '
    <table id="table_id" class="table table-striped" style="width: 100%; height: auto;">
        <thead> 
            <tr> 
                <th class="">S.no.</th> 
                <th class="">Name of staff</th>                     
                <th class="">Services</th>                    
                <th class="">Date</th>
                <th class="">Entity</th>
                <th class="">Action</th>
            </tr>
        </thead>';

        echo '<tbody>';
        $count = 1;
        while ($row = mysqli_fetch_assoc($rs)) {
            $staff = $row['staff'];
            $title = $row['title'];
            $date = $row['date'];
            $dep = $row['entity'];
            $id = $row['Id'];

            echo '
        <tr>
        <td class="">' . $count . '</td>
        <td class="">' . $staff . '</td>
        <td class="">' . $title . '</td>
        <td class="">' . $date . '</td>
        <td class="">' . $dep . '</td>
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
    <th class="">S.no.</th> 
    <th class="">Name of staff</th>                     
    <th class="">Services</th>                    
    <th class="">Date</th>
    <th class="">Entity</th>
    <th class="">Action</th>
</tr>
</tfoot>';
        echo '</table>
</div>';
        ?>
    </div>

</body>

</html>