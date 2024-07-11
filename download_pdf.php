<!DOCTYPE html>
<html>
<head>
    <title>Downloading PDF...</title>
    <script type="text/javascript">
        // Trigger the download and then redirect to index.php
        window.onload = function() {
            window.location.href = 'payment_details.pdf';
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 1000); // Adjust the delay as needed
        }
    </script>
</head>
<body>
    <p>Your PDF is being downloaded. If you are not redirected automatically, <a href="index.php">click here</a>.</p>
</body>
</html>
