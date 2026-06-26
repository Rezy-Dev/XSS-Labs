<?php
require('common.php');

layout('Lab 13: Basic DOM-based XSS', <<<HTML
<form id="dummy" style="margin-bottom:1rem;">
  <label for="hashInput">Try changing the URL hash or enter text:</label>
  <input class="form-control mb-2" type="text" id="hashInput" placeholder="Type something and press Enter">
</form>

<p>Output:</p>
<div id="output"></div>

<script>
  function updateOutput() {
    let input = window.location.hash.slice(1);
    input = decodeURIComponent(input);
    document.getElementById('output').innerHTML = input;
  }

  updateOutput();

  document.getElementById('dummy').onsubmit = function(e) {
    e.preventDefault();
    let val = document.getElementById('hashInput').value;
    window.location.hash = val;
    updateOutput();
  }
</script>
HTML);
?>
