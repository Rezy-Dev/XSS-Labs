<?php
require('common.php');

header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline';");

$input = $_GET['input'] ?? '';

layout('Lab 18: Basic CSP with unsafe-inline', <<<HTML
<p>Enter JavaScript code in the input below and see if alert pops up (XSS possible due to unsafe-inline)</p>
<form method="GET">
  <input class="form-control mb-2" name="input" placeholder="Try XSS here" value="$input">
  <button class="btn btn-primary">Submit</button>
</form>
<div>
  Output: <span id="output">$input</span>
</div>

<script>
  var userData = "$input";
  try {
    eval(userData);
  } catch(e) {}
</script>
HTML);
?>
