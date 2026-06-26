<?php
require('common.php');

$email = $_GET['email'] ?? '';

layout('Lab 4: Reflected XSS in Input Value', <<<HTML
<form method="GET">
  <input class="form-control mb-2" name="email" value="$email" placeholder="Your email">
  <button class="btn btn-primary">Submit</button>
</form>
HTML);
?>
