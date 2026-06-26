<?php
require('common.php');

$url = $_GET['url'] ?? '';

layout('Lab 5: Reflected XSS in URL Context', <<<HTML
<form method="GET">
  <input class="form-control mb-2" name="url" placeholder="Website URL">
  <button class="btn btn-primary">Go</button>
</form>
<a class="btn btn-success mt-2" href="$url">Visit site</a>
HTML);
?>
