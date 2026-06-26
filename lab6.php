<?php
require('common.php');

$comment = $_GET['comment'] ?? '';
$safe = str_replace("<script>", "", $comment);

layout('Lab 6: Reflected XSS with Basic Filtering', <<<HTML
<form method="GET">
  <input class="form-control mb-2" name="comment" placeholder="Say something">
  <button class="btn btn-primary">Post</button>
</form>
<p>You said: $safe</p>
HTML);
?>
