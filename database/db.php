<?php
    // Create a connection
    $conn = new mysqli('localhost', 'root', '', '');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $databaseName = "imsdemo";
    $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$databaseName'";

    $result = $conn->query($query);

    if ($result->num_rows == 0) {
        $createDatabaseQuery = "CREATE DATABASE $databaseName";
        if ($conn->query($createDatabaseQuery) === TRUE) {
            echo "Database created successfully. ";
            mysqli_select_db($conn, $databaseName);

            // Load and execute the SQL file
            $sqlFile = "./database/imsdemo.sql"; // Provide the path to your exported SQL file

            if (file_exists($sqlFile)) {
                $sql = file_get_contents($sqlFile);
                // echo "SQL file content: <pre>$sql</pre>";
                if ($conn->multi_query($sql) === TRUE) {
                    echo " Data populated successfully";
                } else {
                    echo "Error importing database: " . $conn->error;
                }
            } else {
                echo "SQL file not found.";
            }
        }
    } else {
        // echo "Database already exists";
    }

    // Close the connection
    $conn->close();
?>
