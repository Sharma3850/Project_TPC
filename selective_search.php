<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            background-color: #583672;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .filter-section select,
        .filter-section input {
            width: 30%;
            margin-right: 10px;
            padding: 10px;
            box-sizing: border-box;
        }

        .filter-section button {
            background-color: #583672;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .filter-section button:hover {
            background-color: grey;
        }

        .cancel-icon {
            cursor: pointer;
        }

        .add-parameter-btn {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .add-parameter-btn:hover {
            background-color: #218838;
        }

        .action-buttons {
            margin-top: 20px;
        }

        /* New styles for the container divs */
        .filter-container {
            width: 80%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .button-container {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1>Search Selective Students</h1>

    <div class="filter-container" id="filterContainer">
        <!-- Filter Section (Default) -->
        <div class="filter-section" id="defaultFilterSection">
            <label for="examName">Exam Name:</label>
            <select name="examName" id="examName">
                <option value="">Select</option>
                <option value="exam1">Exam 1</option>
                <option value="exam2">Exam 2</option>
                <option value="exam2">Exam 3</option>
                <option value="exam2">Exam 4</option>
                <!-- Add more options as needed -->
            </select>

            <label for="percentage">Percentage:</label>
            <input type="number" name="percentage" id="percentage" step="0.01" placeholder="Percentage">

            <label for="comparison">Comparison:</label>
            <select name="comparison" id="comparison">
                <option value="">Select</option>
                <option value="lessThan">Less Than</option>
                <option value="greaterThan">Greater Than</option>
                <option value="equalTo">Equal To</option>
            </select>

            <label for="number">Number of students:</label>
            <input type="number" name="number" id="number" step="1" placeholder="Number">
        </div>
    </div>

    <div class="button-container">
        <!-- Add Parameter Button -->
        <button class="add-parameter-btn" onclick="addFilterSection()">Add Parameter</button>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
        <button onclick="resetFilters()">Reset</button>
        <button onclick="search()">Search</button>
    </div>

    
    <?php
    // Assuming you have a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tpc_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the search button is clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        // Retrieve filter values
        $examName = $_POST['examName'];
        $percentage = $_POST['percentage'];
        $comparison = $_POST['comparison'];

        // Build the SQL query based on the filters
        $sql = "SELECT * FROM your_table_name WHERE examName = '$examName'";

        if ($percentage !== "") {
            $sql .= " AND percentage $comparison $percentage";
        }

        // Execute the query
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row['column_name'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No results found";
        }
    }

    $conn->close();
    ?>

    <script>
        function addFilterSection() {
            const filterContainer = document.getElementById('filterContainer');
            const defaultFilterSection = document.getElementById('defaultFilterSection');

            // Clone the default filter section
            const newFilterSection = defaultFilterSection.cloneNode(true);

            // Clear input values in the new section
            newFilterSection.querySelectorAll('input').forEach(input => input.value = '');

            // Add a cancel icon to the new section
            const cancelIcon = document.createElement('span');
            cancelIcon.className = 'cancel-icon';
            cancelIcon.innerHTML = '❌';
            cancelIcon.onclick = () => removeFilterSection(newFilterSection);

            // If it's not the first filter section, remove the "Number of students" label and input
            if (filterContainer.childElementCount >= 1) {
                newFilterSection.removeChild(newFilterSection.querySelector('label[for="number"]'));
                newFilterSection.removeChild(newFilterSection.querySelector('[name="number"]'));
            }

            // Append the new section
            filterContainer.appendChild(newFilterSection);
            // If it's not the first filter section, append the cancel icon
            if (filterContainer.childElementCount > 1) {
                filterContainer.lastElementChild.appendChild(cancelIcon);
            }

            // Move the "Add Parameter" button to the button container
            document.querySelector('.button-container').appendChild(document.querySelector('.add-parameter-btn'));
        }

        function removeFilterSection(section) {
            const filterContainer = document.getElementById('filterContainer');

            // Make sure there's always at least one filter section
            if (filterContainer.childElementCount > 1) {
                filterContainer.removeChild(section);
            }
        }

        function resetFilters() {
            // You can implement reset functionality as needed
            alert('Filters reset!');
        }

        function search() {
            // You can implement search functionality as needed
            alert('Search triggered!');
        }
    </script>
</body>

</html>