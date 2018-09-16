<?php
//0 Pending
//1 Fulfilled
//2 cancelled
$path = require $_SERVER['DOCUMENT_ROOT'] . '/config/config-path.php';
require $path['root'] . '/includes/connect.inc.php';
require_once $path['root'] . '/includes/session.inc.php';
$provider_id = htmlspecialchars($_SESSION['providerlogin']);
if (isset($provider_id)) {
    $db = new DB();
    $db->query('SELECT `order_id`, `customer_id`, `provider_id`, `order_type1`, `order_type2`, `order_type3`, `order_type4`, `order_date`, `order_status` FROM `ww_customer_order` WHERE `provider_id` = :provider_id');
    $db->bind(':provider_id', $provider_id);
    $exeRes = $db->resultset();
    $db->terminate();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="theme-color" content="#4885ed" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WhenWing - Profile</title>
<link rel="icon" href="images/logo.png">
<?php include 'includes/style.inc.php';?>
<style>


.table {
  width: 100%;
}
.table tr td,
.table tr th {
  vertical-align: middle;
}
.table.table-order {
  margin-top: 10px;
}
.table.table-order thead tr {
  border: 1px solid #E9ECF2;
  border-left: none;
  border-right: none;
  background: #F9FBFC;
  color: #67676C;
  min-height: 52px;
  font-size: 12px;
  font-weight: 700;
}
.table.table-order thead tr th {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.table.table-order tbody tr {
  text-align: center;
  border-bottom: 1px dashed #ddd;
}
.table.table-order tbody tr td:last-child {
  padding-right: 15px;
}
.table.table-order tbody td{
    padding: 1% 0;
}
.order {
  position: relative;
  width: 90%;
  margin: 5% auto;
  background: #fff;
  padding: 10px 0;
  box-shadow: 0 0px 12px rgba(0, 0, 0, 0.1);
  color: #444;
}

.order .order-title {
  font-size: 1.6rem;
  line-height: 2rem;
  font-weight: 700;
  padding: 0 15px;
}
.order .order-title-count {
  display: inline-block;
  height: 30px;
  line-height: 30px;
  margin-top: -2px;
  background: #eee;
  vertical-align: middle;
  padding: 0 14px;
  border-radius: 100px;
  color: #bbb;
  font-size: 1rem;
}
.order .order-delete {
  color: #f44336;
  cursor: pointer;
}
.order .order-delete:hover{
    text-decoration: underline;
}
@media only screen and (max-width: 768px) {

  .table.table-order thead tr {
    font-size: 0.5rem;
  }
  .table.table-order tbody tr td {
    padding: 0 6px;
  }

  .order .order-title {
    font-size: 1.2rem;
  }
  .order .order-title-count {
    font-size: 0.8rem;
    padding: 0 10px;
    margin-top: -1px;
    height: 22px;
    line-height: 22px;
  }
}

</style>
</head>
<body>
<header>
        <div class="logo-and-name">
            <a href="/">
                <img src="/images/icons/logo.png" class="site-logo">
                <span class="site-name">WhenWing</span>
            </a>
        </div>
        <div class="search-div">
        </div>
        <div class="header-menu">
            <a href="/logout">Logout </a>
        </div>
</header>
<section>

</section>
<section class="order">
    <h3 class="order-title">All Orders
        <span class="order-title-count"><?php if (isset($exeRes)) {
    echo count($exeRes);
}
?></span>
    </h3>

    <table class="table table-order">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>Customer Id</th>
                <th>Order</th>
                <th>Order Type</th>
                <th>Order Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
foreach ($exeRes as $exeResVal) {
    $status = 'Unknown';
    if ($exeResVal['order_status'] == 1) {
        $status = 'Active';
    } else if ($exeResVal['order_status'] == 2) {
        $status = 'Cancelled';
    }
    echo ' <tr>
                    <td >' . $exeResVal['order_id'] . '</td>
                    <td>' . $exeResVal['customer_id'] . '</td>
                    <td>' . $exeResVal['order_type1'] . '</td>
                    <td>' . $exeResVal['order_type2'] . ' &gt; ' . $exeResVal['order_type3'] . ' &gt; ' . $exeResVal['order_type4'] . '</td>
                    <td>' . $exeResVal['order_date'] . '</td>
                    <td>' . $status . '</td>
                </tr>';
}
?>
        </tbody>
    </table>
</section>
<?php include 'includes/script.inc.php';?>
</body>
</html>
