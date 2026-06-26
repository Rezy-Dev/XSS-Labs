<?php
require('common.php');

$input = $_GET['input'] ?? '';

$blacklist = ['<script>', '</script>', 'onerror', 'onload', 'alert', 'svg', 'img', 'iframe', 'src='];
foreach ($blacklist as $bad) {
  $input = str_ireplace($bad, '', $input);
}

layout('Lab 9: Reflected XSS with Moderate Custom Filters', <<<HTML
<form method="GET">
  <input class="form-control mb-2" name="input" placeholder="Try to bypass the filter...">
  <button class="btn btn-primary">Submit</button>
</form>
<p>Output: $input</p>
HTML);
?>