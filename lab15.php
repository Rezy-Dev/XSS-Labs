<?php
require('common.php');
session_start();

if (!isset($_SESSION['logs'])) {
    $_SESSION['logs'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payload = $_POST['payload'] ?? '';
    $_SESSION['logs'][] = $payload;
}

$view = $_GET['view'] ?? '';

if ($view === 'admin') {
    $logsHtml = '';
    foreach ($_SESSION['logs'] as $log) {
        $logsHtml .= "<li>$log</li>";
    }
    layout('Lab 15: Blind XSS - Admin Log Viewer', <<<HTML
    <h3>Admin Log Viewer</h3>
    <ul>$logsHtml</ul>
HTML);
} else {
    layout('Lab 15: Blind XSS - User Input', <<<HTML
    <form method="POST">
      <input class="form-control mb-2" name="payload" placeholder="Enter something to log...">
      <button class="btn btn-primary">Submit</button>
    </form>
    <p>Note: Payload will be triggered when admin views logs.</p>
    <a href="?view=admin" class="btn btn-secondary mt-3">View Admin Logs</a>
HTML);
}
?>
