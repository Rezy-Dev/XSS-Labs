<?php
require('common.php');

$callback = $_GET['callback'] ?? '';
$data = ['message' => 'Hello from Lab 17 JSONP'];

if ($callback) {
    header('Content-Type: application/javascript');

    echo $callback . '(' . json_encode($data) . ');';
    exit;
}

layout('Lab 17: JSONP XSS',
<<<HTML
<p>Use the "callback" query parameter to inject JavaScript function name.</p>
<p>Example: <code>?callback=alert</code></p>
<form method="GET">
  <input class="form-control mb-2" name="callback" placeholder="Enter callback function name">
  <button class="btn btn-primary">Send</button>
</form>
HTML
);
?>
