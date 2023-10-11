<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tpc_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT MAX(id) AS max_id FROM redressal_form");
$row = $result->fetch_assoc();
$nextId = $row['max_id'] + 1;

$conn->close();
?>


<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;

        }

        .form-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 4px 800px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            background-color: #fff;
        }

        h1 {
            background-color: #583672;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        label {
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 0px solid #ddd;
            padding: 8px;
            text-align: left;
        }


        th {
            background-color: #f2f2f2;
        }

        button[type="submit"] {
            background-color: #583672;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: grey;
            color: white;
        }
    </style>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-container">
            <div class="form-group">
                <table>
                    <tr>
                        <td style="border: 1px solid black;">
                            <input type="radio" id="walkin" name="contactMethod">
                            <label for="walkin">Walkin</label>

                            <input type="radio" id="Online" name="contactMethod">
                            <label for="Online">Online</label>

                            <input type="radio" id="Telephonic" name="contactMethod">
                            <label for="Telephonic">Telephonic</label>

                        </td>
                        <td style="border: 1px solid black;">
                            <label for="ref">Reference Number(To be filled by the official)</label><br>
                            <label for="ref">LPU/CSE/CCC/2023/<?php echo $nextId; ?></label>
                            <!-- <input type="text" id="ref1" name="reference1" size="5">
                            <label for="ref">/</label>
                            <input type="text" id="ref2" name="reference2" size="5">
                            <label for="ref">/</label>
                            <input type="text" id="ref3" name="reference3" size="5"> -->
                        </td>

                    </tr>
                </table>
            </div>
            <h1>REDRESSAL MANAGEMENT FORM</h1>
            <table>
                <tr>
                    <td>
                        <label>Message Type(Tick): </label>
                    </td>
                    <td><input type="radio" id="Suggestion" name="message">
                        <label for="Suggestion">Suggestion</label>
                    </td>
                    <td><input type="radio" id="Complaint" name="message">
                        <label for="Complaint">Complaint</label>
                    </td>
                    <td><input type="radio" id="Enquiry" name="message">
                        <label for="Enquiry">Enquiry</label>
                    </td>
                    <td><input type="radio" id="Feedback" name="message">
                        <label for="Feedback">Feedback</label>
                    </td>
                    <td><input type="radio" id="Request" name="message">
                        <label for="Request">Request </label>
                    </td>
                    <td><input type="radio" id="Appointment" name="message">
                        <label for="Appointment">Appointment</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="Student">Student Name:</label></td>
                    <td colspan="3"><input type="text" id="Student" name="Student" size="60" required> </td>
                    <td><label for="Country">Country:</label></td>
                    <td colspan="2"><input type="text" id="Country" name="Country" size="60"></td>

                </tr>
                <tr>


                    <td><label for="Course">Program Name:</label></td>
                    <td colspan="3"><input type="text" id="Course" name="Course" size="60" required> </td>
                    <td><label for="Phone">Contact Number:</label></td>
                    <td colspan="2"><input type="tel" id="Phone" name="Phone" pattern="[0-9]{10}" size="10" required> </td>
                </tr>
                <tr>
                    <td><label for="Registration">Registration Number:</label></td>
                    <td colspan="3"><input type="text" id="Registration" name="Registration" size="60" required></td>
                    <td><label for="Att">Attendance:</label><input type="number" id="Att" name="Att" min="0" max="100"></td>
                    <td><label for="CGPA">CGPA:</label><input type="text" id="CGPA" name="CGPA"></td>
                    <td><label for="Sec">Section:</label><input type="text" id="Sec" name="Sec" required></td>
                </tr>

                <tr>
                    <td><label>Problem Type:<p style="font-size: 10px">(Tick one type of problem only and for other type, student need to fill another form)</p></label></td>
                    <td><input type="radio" id="Internship/OJT" name="Type">
                        <label for="Internship/OJT">OJT/ Internship</label>
                    </td>
                    <td><input type="radio" id="Placement" name="Type">
                        <label for="Placement">Placement Related</label>
                    </td>
                    <td><input type="radio" id="PEP" name="Type">
                        <label for="PEP">PEP Input</label>
                    </td>
                    <td><input type="radio" id="Examination" name="Type">
                        <label for="Examination">Examination</label>
                    </td>
                    <td><input type="radio" id="Fine" name="Type">
                        <label for="Fine">Fine/ Misconduct </label>
                    </td>
                    <td><input type="radio" id="Other" name="Type">
                        <label for="Other">Any Other</label>
                    </td>
                </tr>
                <tr>
                    <td><label>Residency:</label></td>
                    <td colspan="2"><input type="radio" id="hostel" name="Bus">
                        <label for="hostel">Availing Hostel</label>
                    </td>
                    <td colspan="2"><input type="radio" id="Day" name="Bus">
                        <label for="Day">Day Scholar</label>
                    </td>
                    <td colspan="2"><input type="radio" id="bus" name="Bus">
                        <label for="bus">Availing University Bus</label>
                    </td>
                </tr>
                <tr>
                    <td><label>If Availing Hostel</label></td>
                    <td colspan="2">
                        <label for="Hostel">Hostel Number</label>
                        <input type="number" id="Hostel" min="1" max="7">
                    </td>
                    <td colspan="2">
                        <label for="Block">Block:</label>
                        <input type="text" id="Block">
                    </td>
                    <td colspan="2">
                        <label for="Room">Room Number:</label>
                        <input type="text" id="Room" name="Room">
                    </td>
                </tr>
                <tr>
                    <td><label for="subject">Subject:</label></td>
                    <td colspan="6"><input type="text" id="subject" name="subject" size="150"></td>

                </tr>
                <tr>
                    <td><label for="Description">Description:</label></td>
                    <td colspan="6"> <textarea id="Description" name="message" rows="3" cols="140"></textarea></td>
                </tr>
            </table>
            <button type="submit" name="add">Submit</button>
        </div>
    </form>
</body>


<?php
// Replace these credentials with your MySQL database details
$host = "localhost";
$username = "root";
$password = "";
$database = "tpc_db";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    // Collect form data
    $messageType = $_POST["message"];
    $studentName = $_POST["Student"];
    $country = $_POST["Country"];
    $programName = $_POST["Course"];
    $contactNumber = $_POST["Phone"];
    $registrationNumber = $_POST["Registration"];
    $attendance = $_POST["Att"];
    $cgpa = $_POST["CGPA"];
    $section = $_POST["Sec"];
    $problemType = isset($_POST["Type"]) ? $_POST["Type"] : "";
    $residency = isset($_POST["Bus"]) ? $_POST["Bus"] : "";
    $hostelNumber = isset($_POST["hostel"]) ? $_POST["Hostel"] : "";
    $block = isset($_POST["Block"]) ? $_POST["Block"] : "";
    $roomNumber = isset($_POST["Room"]) ? $_POST["Room"] : "";
    $subject = $_POST["subject"];
    $description = $_POST["message"];

    // Sanitize user input to prevent SQL injection
    $messageType = mysqli_real_escape_string($conn, $messageType);
    $studentName = mysqli_real_escape_string($conn, $studentName);
    $country = mysqli_real_escape_string($conn, $country);
    $programName = mysqli_real_escape_string($conn, $programName);
    $contactNumber = mysqli_real_escape_string($conn, $contactNumber);
    $registrationNumber = mysqli_real_escape_string($conn, $registrationNumber);
    $attendance = mysqli_real_escape_string($conn, $attendance);
    $cgpa = mysqli_real_escape_string($conn, $cgpa);
    $section = mysqli_real_escape_string($conn, $section);
    $problemType = mysqli_real_escape_string($conn, $problemType);
    $residency = mysqli_real_escape_string($conn, $residency);
    $hostelNumber = mysqli_real_escape_string($conn, $hostelNumber);
    $block = mysqli_real_escape_string($conn, $block);
    $roomNumber = mysqli_real_escape_string($conn, $roomNumber);
    $subject = mysqli_real_escape_string($conn, $subject);
    $description = mysqli_real_escape_string($conn, $description);

    // Insert data into the database
    $insertQuery = "INSERT INTO redressal_form (message_type, student_name, country, program_name, contact_number, registration_number, attendance, cgpa, section, problem_type, residency, hostel_number, block, room_number, subject, description) 
                        VALUES ('$messageType', '$studentName', '$country', '$programName', '$contactNumber', '$registrationNumber', '$attendance', '$cgpa', '$section', '$problemType', '$residency', '$hostelNumber', '$block', '$roomNumber', '$subject', '$description')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "<script>alert('Form submitted successfully!');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

</html>