<?php
require('common.php');

$evil = $_GET['evil'] ?? '';

header("Content-Security-Policy: default-src 'self'; script-src 'self' https://*.github.io https://rezydev.com;");

layout('Lab 19: CSP with github.io domain allowed', <<<HTML
<p>CSP allows scripts from GitHub Pages domains.</p>
<form method="GET">
  <input class="form-control mb-2" name="evil" placeholder="XSS Me" value="$evil">
  <button class="btn btn-primary">Load script</button>
</form>

<!-- Load external script from github.io -->
<script src="https://$evil"></script>
HTML);
?>
