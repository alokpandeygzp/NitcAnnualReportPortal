<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');
    
    // Get data from the request
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    $table = $data['table'];
    $column = $data['column'];

    // Handle different actions
    if (isset($data['action'])) {
        $action = $data['action'];
        switch ($action) {            
            case 'delete':
                $sql = "DELETE FROM $table WHERE $column='$id'";
                $rs = mysqli_query($con, $sql);
                $message = "Entry deleted successfully.";
                break;            
            default:
                $message = "Unknown action";
                break;
        }

        // $message = $data['action'];
        // Respond with a message
        $response = ['message' => $message];
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    mysqli_close($con);
}
?>
