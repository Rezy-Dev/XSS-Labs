<?php
function layout($title, $content) {
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>$title</title>
  <link href="bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
  <div class="container mt-5">
    <h2 class="mb-4">$title</h2>
    <p>Your goal is to pop <code>alert()</code>, <code>confirm()</code> or <code>prompt()</code> to prove Javascript execution.</p>
    $content
    <hr>
    <p class="text-muted">XSS Labs - Built with ❤️ by Rezy Dev</p>
    <a href="index.php" class="btn btn-secondary mt-2">Back to Home</a>
  </div>
</body>
</html>
HTML;
}
?>
