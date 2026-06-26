<?php
require('common.php');
session_start();

if (!isset($_SESSION['orders'])) {
  $_SESSION['orders'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $product = $_POST['product'] ?? 'unknown';

  $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';

  $_SESSION['orders'][] = [
    'product' => $product,
    'userAgent' => $userAgent,
  ];
}

$orders_html = '';
foreach ($_SESSION['orders'] as $order) {
  $orders_html .= "<li>Product: " . htmlspecialchars($order['product']) . 
                  " | User-Agent: " . $order['userAgent'] . "</li>";
}

layout('Lab 16: Stored Blind XSS via User-Agent Header', <<<HTML
<form method="POST" class="mb-3">
  <select name="product" class="form-control mb-2">
    <option>Phone</option>
    <option>Laptop</option>
    <option>Keyboard</option>
  </select>
  <button class="btn btn-primary">Place Order</button>
</form>
<h5>Orders:</h5>
<ul>
  $orders_html
</ul>
HTML);
?>
