<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .button-back {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            color: white;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
        }

        .button-back:hover {
            background-color: #0056b3;
        }

        .messages-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .messages-table th,
        .messages-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .messages-table th {
            background-color: #f2f2f2;
            color: #333;
        }

        .messages-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="index.html" class="button-back">Back to Home</a>

        <h1>Contact Us</h1>
        <form action="contact.php" method="POST">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="message">Message:</label><br>
            <textarea id="message" name="message" required></textarea><br>

            <input type="submit" value="Send">
        </form>

        <?php
        include 'db_connect.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil data dari form
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            // Menyimpan data ke tabel messages
            $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Message sent successfully</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Mengambil data dari tabel messages
        $sql = "SELECT name, email, message, sent_at FROM messages";
        $result = $conn->query($sql);

        if ($result === FALSE) {
            echo "Error executing query: " . $conn->error;
        } else {
            if ($result->num_rows > 0) {
                echo "<h2>Messages Received</h2>";
                echo "<table class='messages-table'>";
                echo "<tr><th>Name</th><th>Email</th><th>Message</th><th>Sent At</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['sent_at']) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No messages found.</p>";
            }
        }

        // Menutup koneksi database
        $conn->close();
        ?>

    </div>

</body>

</html>