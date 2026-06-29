<?php
require('common.php');

$input = $_GET['input'] ?? '';

$input = str_replace(["<", ">", '"', "'"], "", $input);

layout('Lab 10: Reflected XSS in JS Context with Basic Filtering', <<<HTML
<form method="GET">
  <input class="form-control mb-2" name="input" placeholder="Enter something...">
  <button class="btn btn-primary">Submit</button>
</form>
<script>
  let data = `$input`;
  console.log("User input:", data);
</script>
HTML);
?>
