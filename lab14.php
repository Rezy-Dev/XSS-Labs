<?php
require('common.php');

layout('Lab 14: Advanced DOM-based XSS with JSON', <<<HTML
<form id="jsonForm" style="margin-bottom:1rem;">
  <label for="jsonInput">Enter JSON data (e.g. {"name":"John"}):</label>
  <input class="form-control mb-2" type="text" id="jsonInput" placeholder='{"name":"John"}'>
  <button class="btn btn-primary">Submit</button>
</form>

<p>Greeting:</p>
<div id="greeting"></div>

<script>
  document.getElementById('jsonForm').onsubmit = function(e) {
    e.preventDefault();
    let raw = document.getElementById('jsonInput').value;

    try {
      let obj = JSON.parse(raw);
      document.getElementById('greeting').innerHTML = 'Hello, ' + obj.name;
    } catch {
      document.getElementById('greeting').innerText = 'Invalid JSON!';
    }
  };
</script>
HTML);
?>
