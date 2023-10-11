<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Excel File</title>
</head>

<body>
    <h1>Upload Excel File</h1>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Choose Excel File:</label>
        <input type="file" name="file" id="file" accept=".xlsx, .xls">

        <button type="submit" name="submit">Upload</button>
    </form>

</body>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Check if file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Allow certain file formats
        if ($fileType != "xlsx" && $fileType != "xls") {
            echo "Sorry, only Excel files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Move the file to the uploads directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";

                // Process the Excel file and write to the database
                processExcelFile($targetFile);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file uploaded.";
    }
}

function processExcelFile($filePath)
{
    require 'vendor/autoload.php'; // Include PhpSpreadsheet library

    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
    $worksheet = $spreadsheet->getActiveSheet();

    // Assuming the Excel file has headers in the first row
    $headers = $worksheet->getRowIterator(1)->current()->toArray();

    // Assuming you have a database connection
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Iterate through rows and insert into the database
    foreach ($worksheet->getRowIterator(2) as $row) {
        $rowData = $row->toArray();

        // Assuming the columns in the Excel file match your database table columns
        $sql = "INSERT INTO your_table (" . implode(", ", $headers) . ") VALUES ('" . implode("', '", $rowData) . "')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>

</html>
