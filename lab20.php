<?php
require('common.php');

$evil = $_GET['evil'] ?? '';
session_start();

$nonce = base64_encode(random_bytes(16));
$_SESSION['nonce'] = $nonce;

header("Content-Security-Policy: default-src 'self'; script-src 'self' 'nonce-$nonce' https://*.github.io https://rezydev.com;");

layout('Lab 20: Advanced CSP with Nonce + Trusted External Domains', <<<HTML
<p>This lab implements CSP with a <code>nonce</code> to allow inline scripts only if they have this exact nonce.</p>

<form method="GET">
  <input class="form-control mb-2" name="evil" placeholder="XSS Here" value="$evil">
  <button class="btn btn-primary">Load Script</button>
</form>

<script nonce="$nonce">
  console.log('Inline script executed with nonce');
</script>

<script src="https://$evil"></script>
HTML);
?>
