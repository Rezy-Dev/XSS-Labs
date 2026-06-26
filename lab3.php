<?php
require('common.php');

$msg = $_GET['msg'] ?? '';

layout('Lab 3: Reflected XSS in JS Context', <<<HTML
<form method="GET">
  <input class="form-control mb-2" name="msg" placeholder="Message">
  <button class="btn btn-primary">Go</button>
</form>
<script>
  let msg = "$msg";
  console.log("Message: " + msg);
</script>
HTML);
?>
