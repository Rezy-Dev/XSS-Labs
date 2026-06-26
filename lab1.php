<?php
require('common.php');

$search = $_GET['q'] ?? '';
$output = $search ? "<p>Results for: <b>$search</b></p>" : '';

layout('Lab 1: Reflected XSS in HTML Context', <<<HTML
<form method="GET">
  <input class="form-control mb-2" name="q" placeholder="Search...">
  <button class="btn btn-primary">Search</button>
</form>
$output
HTML);
?>
