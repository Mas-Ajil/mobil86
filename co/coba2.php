<!DOCTYPE html>
<html>
<head>
    <title>Checkout - Dark Theme</title>
    <style>
      body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('gt.jfif'); /* Add your background image path here */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;position: relative; /* Ensure relative positioning for the form container */
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            position: center;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background for the form */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            color: #fff;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-top: 10px;
}

input[type="text"],
input[type="email"],
input[type="submit"] {
    margin: 5px 0;
    padding: 10px;
    border: 1px solid #fff;
    background-color: #333;
    color: #fff;
}

input[type="submit"] {
    background-color: #00bfff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0080ff;
}
</style>
</head>
<body>
    <div class="container">
        <a href="../home.html">Back</a>
        <h1>Checkout</h1>
        <?php
        // ... Database connection and car details retrieval ...
        // Replace with your database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "jualmobil";

        // Create a database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // ... Form processing and booking insertion ...

            // Get the car ID from the form
            
            $car_id = $_POST["id_mobil"];


           // Get other form data
           $kode_booking = $_POST["kode_booking"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $jumlah = $_POST["jumlah"];
            $warna = $_POST["warna"];
            $tgl_beli = date("Y-m-d"); // Current date
            $status = "Menunggu Pembayaran"; // Default status

            // Generate a unique transaction code

            // Insert the booking data into the 'booking' table
            $stmt = $conn->prepare("INSERT INTO booking (kode_booking, id_mobil, tgl_beli, jumlah, warna, status, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sisssss", $kode_booking, $car_id, $tgl_beli, $jumlah, $warna, $status, $email);
            $stmt->execute();

            // Close the database connection
            $stmt->close();
            $conn->close();

            // Redirect to the payment page after successful data insertion
            header("Location: ../home.html");
            exit;
        } else {
            // Fetch car details from the 'mobil' table
            $car_id = 10; // Replace with the actual car ID you want to display
            $sql = "SELECT * FROM mobil WHERE id_mobil = $car_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $car_name = $row["nama_mobil"];
                $car_price = $row["harga"];
                // Add more car details if needed
            }
        }
        ?>
        
        <div class="car-details">
            <h2><?php echo $car_name; ?></h2>
            <p>Price: Rp <?php echo number_format($car_price, 0, ',', '.'); ?></p>
            <!-- Display more car details here -->
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <!-- The rest of the form remains the same -->
            <input type="hidden" name="id_mobil" value="<?php echo $car_id; ?>">
              <label for="kode_booking">Kode Booking:</label>
            <input type="text" id="kode_booking" name="kode_booking" value="TRX<?php echo uniqid(); ?>" readonly>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your Name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your Email" required>

            <label for="jumlah">Quantity:</label>
            <input type="number" id="jumlah" name="jumlah" value="1" min="1" required>

            <label for="warna">Color:</label>
            <input type="text" id="warna" name="warna" placeholder="Car Color" required>

            <input type="submit" value="Proceed to Payment">
        </form>
    </div>
</body>
</html>
