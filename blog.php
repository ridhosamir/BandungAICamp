<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - My Website</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .posts-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .posts-table th, .posts-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .posts-table th {
            background-color: #f2f2f2;
            color: #333;
        }
        .posts-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Blog Posts</h1>
        <a href="index.html" class="button-back">Back to Home</a>

        <?php
        include 'db_connect.php';

        // Query untuk mengambil data artikel dari tabel posts
        $sql = "SELECT title, content FROM posts";
        $result = $conn->query($sql);

        if ($result === FALSE) {
            echo "Error executing query: " . $conn->error;
        } else {
            if ($result->num_rows > 0) {
                echo "<table class='posts-table'>";
                echo "<tr><th>Title</th><th>Content</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['content']) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No posts found.</p>";
            }
        }

        // Menutup koneksi database
        $conn->close();
        ?>

    </div>

</body>

</html>
