<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Calculation</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Date Calculation</h2>

                <?php
                include 'functions.php'; // Include the functions 
                include 'form.php';      // Include the form 

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $invoiceDate = $_POST['invoiceDate'];         
                    $expirationDate = $_POST['expirationDate'];   
                    $currentDate = date("Y-m-d");                

                    echo '<div class="mt-4 alert alert-info">';

                    if (isPastExpiration($currentDate, $expirationDate)) {
                        list($years, $months, $days) = calculateDateDifference($currentDate, $expirationDate);
                        echo "The current date exceeds the expiration date by <strong>$years</strong> years, <strong>$months</strong> months, and <strong>$days</strong> days.";
                    } else {
                        list($years, $months, $days) = calculateDateDifference($expirationDate, $currentDate);
                        echo "There are <strong>$years</strong> years, <strong>$months</strong> months, and <strong>$days</strong> days until the invoice is due.";
                    }

                    echo '</div>'; 
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
