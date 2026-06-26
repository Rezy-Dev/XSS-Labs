<?php
require('common.php');

$input = $_GET['input'] ?? '';
$safe = htmlspecialchars($input);

layout('Lab 7: Impossible XSS', <<<HTML
<form method="GET">
  <input class="form-control mb-2" name="input" placeholder="Try to break it">
  <button class="btn btn-primary">Submit</button>
</form>
<p>Output: $safe</p>
HTML);
?>