<!DOCTYPE html>
<html>
<head>
    <title>Downloading PDF...</title>
    <script type="text/javascript">
        
        window.onload = function() {
            window.location.href = 'payment_details.pdf';
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 1000); 
        }
    </script>
</head>
<body>
    <p>Your PDF is being downloaded. If you are not redirected automatically, <a href="index.php">click here</a>.</p>
</body>
</html>
