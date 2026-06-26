<?php
require('common.php');
session_start();

if (!isset($_SESSION['comments_lab11'])) {
  $_SESSION['comments_lab11'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $msg = $_POST['msg'] ?? '';
  $_SESSION['comments_lab11'][] = $msg;
}

$comments = '';
foreach ($_SESSION['comments_lab11'] as $comment) {
  $comments .= "<li>$comment</li>";
}

layout('Lab 11: Stored XSS', <<<HTML
<form method="POST">
  <input class="form-control mb-2" name="msg" placeholder="Enter a comment...">
  <button class="btn btn-primary">Post</button>
</form>
<ul>$comments</ul>
HTML);
?>
