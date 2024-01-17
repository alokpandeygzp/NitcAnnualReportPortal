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
                // Use prepared statement to prevent SQL injection
                $sql = "DELETE FROM $table WHERE $column=?";
                $stmt = mysqli_prepare($con, $sql);

                // Bind parameter
                mysqli_stmt_bind_param($stmt, 's', $id);

                // Execute the statement
                $success = mysqli_stmt_execute($stmt);

                // Close the statement
                mysqli_stmt_close($stmt);

                if ($success) {
                    $message = "Entry deleted successfully.";
                } else {
                    $message = "Entry deletion failed.";
                }
                break;            
            default:
                $message = "Unknown action";
                break;
        }

        // Respond with a message
        $response = ['message' => $message];
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    mysqli_close($con);
}
?>
