<?php
require('common.php');
session_start();

if (!isset($_SESSION['comments_lab12'])) {
  $_SESSION['comments_lab12'] = [];
}

function sanitize($input) {
  $blacklist = ['<script>', '</script>', 'onerror', 'onload', 'alert(', 'iframe', 'img', 'svg'];
  foreach ($blacklist as $tag) {
    $input = str_ireplace($tag, '', $input);
  }
  return $input;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $msg = $_POST['msg'] ?? '';
  $safe = sanitize($msg);
  $_SESSION['comments_lab12'][] = $safe;
}

$comments = '';
foreach ($_SESSION['comments_lab12'] as $c) {
  $comments .= "<li>$c</li>";
}

layout('Lab 12: Stored XSS with Basic Filtering', <<<HTML
<form method="POST">
  <input class="form-control mb-2" name="msg" placeholder="Leave a sneaky comment...">
  <button class="btn btn-primary">Post</button>
</form>
<ul>$comments</ul>
HTML);
?>
