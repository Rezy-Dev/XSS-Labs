<?php
require('common.php');

$name = $_GET['name'] ?? '';

layout('Lab 2: Reflected XSS in Attribute Context', <<<HTML
<form method="GET">
  <input class="form-control mb-2" name="name" placeholder="Your name...">
  <button class="btn btn-primary">Submit</button>
</form>
<img src="avatar.jpg" alt="$name" class="mt-3"/>
HTML);
?>
