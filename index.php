<?php
require('common.php');

$content = '<ul>';
for ($i = 1; $i <= 20; $i++) {
  $content .= "<li><a href='lab$i.php' class='text-warning'>Lab $i</a></li>";
}
$content .= '</ul>';

layout('XSS Lab - Labs List', $content);
?>
