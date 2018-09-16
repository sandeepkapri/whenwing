<?php
$path = require $_SERVER['DOCUMENT_ROOT'] . '/config/config-path.php';
require $path['root'] . '/includes/connect.inc.php';
require_once $path['root'] . '/includes/session.inc.php';

function urltodata($url)
{
    // Convert url to data
    $url = htmlspecialchars($url);
    $url = strtolower($url);
    $url = str_replace('-or-', '/', $url);
    $url = str_replace('-', ' ', $url);
    return $url;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['firstoption']) && !empty($_POST['firstoption'])) {
        $_SESSION['orderType1'] = htmlspecialchars($_POST['firstoption']);
    } else {
        $_SESSION['orderType1'] = '-';
    }

    if (isset($_POST['secondoption']) && !empty($_POST['secondoption'])) {
        $_SESSION['orderType2'] = htmlspecialchars($_POST['secondoption']);
    } else {
        $_SESSION['orderType2'] = '-';
    }

    if (isset($_POST['thirdoption']) && !empty($_POST['thirdoption'])) {
        $_SESSION['orderType3'] = htmlspecialchars($_POST['thirdoption']);
    } else {
        $_SESSION['orderType3'] = '-';
    }

    if (isset($_POST['fourthoption']) && !empty($_POST['fourthoption'])) {
        $_SESSION['orderType4'] = htmlspecialchars($_POST['fourthoption']);
    } else {
        $_SESSION['orderType4'] = '-';
    }

    if (isset($_POST['firstoption'])) {
        if ($_POST['firstoption'] == 'transport') {

            if (isset($_POST['fifthoption']) && !empty($_POST['fifthoption'])) {
                $_SESSION['orderType5'] = htmlspecialchars($_POST['fifthoption']);
            } else {
                $_SESSION['orderType5'] = '-';
            }

            if (isset($_POST['sixthoption']) && !empty($_POST['sixthoption'])) {
                $_SESSION['orderType6'] = htmlspecialchars($_POST['sixthoption']);
            } else {
                $_SESSION['orderType6'] = '-';
            }
        }

    }
} else {
    $_SESSION['orderType1'] = '-';
    $_SESSION['orderType2'] = '-';
    $_SESSION['orderType3'] = '-';
    $_SESSION['orderType4'] = '-';
    $_SESSION['orderType5'] = '-';
    $_SESSION['orderType6'] = '-';

}

if (isset($post_get_v2) && isset($post_get_v3)) {
    $url_param2 = urltodata($post_get_v2);
    $url_param3 = urltodata($post_get_v3);
    $cookieVal = $_COOKIE['ww_location'];
    $_SESSION['ord_category1'] = $url_param2;
    $_SESSION['ord_category2'] = $url_param3;

    $db = new DB();
    $db->query('SELECT `prov_id`,`prov_name`, `prov_dob`, `prov_gender`, `prov_pincode`, `prov_specialities`,`prov_workexp` FROM `ww_provider` WHERE `prov_field` = :prov_field AND `prov_service` = :prov_service AND `prov_state` = :prov_state AND is_active = 1');
    $db->bind(':prov_field', $url_param2);
    $db->bind(':prov_service', $url_param3);
    $db->bind(':prov_state', $cookieVal);
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
  <title>WhenWing - Service Providers </title>
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
    line-height: 30px;
    font-size: 12px;
    font-weight: 700;
  }
  .table.table-order thead tr th {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    font-size: 16px;
  }
  .table.table-order tbody tr {
    text-align: center;
    border-bottom: 1px dashed #ddd;
  }
  .table.table-order tbody tr td:last-child {
    padding-right: 15px;
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

  .order .order-name {
    margin-top: 12px;
    font-size: 1.4rem;
    font-weight: 400;
  }
  .order .order-desc {
    color: #ccc;
    margin: 8px 0 0 0;
    font-size: 0.8rem;
  }
  .order .order-time {
    font-weight: 700;
    color: #777;
    border-bottom: 1px solid;
  }
  .order .order-price-cur {
    font-size: 0.6rem;
    color: #777;
  }
  .order .book-btn {

    color: #fff;
    display: inline-block;
    padding: 3% 5%;
    border-radius: 3px;
    background: #000;
    cursor: pointer;
  }
  .order-choos:hover{

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
  <?php include 'resources/templates/header-tmpl.php';?>
  <?php include 'resources/templates/navigation-tmpl.php';?>
  <section class="order">
    <h3 class="order-title">List of Providers
      <span class="order-title-count"><?php if (isset($exeRes)) {
    echo count($exeRes);
}
?></span>
    </h3>

    <table class="table table-order">
      <thead>
        <tr>
          <th>Provider Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Pincode</th>
          <th>Specialities</th>
          <th>Work Experience</th>
          <th>Service</th>
        </tr>
      </thead>
      <tbody>
        <?php

if (isset($exeRes)) {
    foreach ($exeRes as $exeResVal) {
        $dob = new DateTime($exeResVal['prov_dob']);
        $today = new DateTime('today');
        echo '<tr>
            <td >' . $exeResVal['prov_name'] . '</td>
            <td>' . $dob->diff($today)->y . ' Year </td>
            <td>' . $exeResVal['prov_gender'] . '</td>
            <td>' . $exeResVal['prov_pincode'] . '</td>
            <td>' . $exeResVal['prov_specialities'] . '</td>
            <td>' . $exeResVal['prov_workexp'] . '</td>
            <td><a href="/order-booking-msg/' . $exeResVal['prov_id'] . '" class="book-btn">Book Now</a></td>
            </tr>';
    }
} else {
    echo '<p style="text-align:center;">SomethingWent Wrong.<p>';
}
?>
      </tbody>
    </table>
  </section>
  <?php include 'resources/templates/footer-tmpl.php';?>
  <?php include 'includes/script.inc.php';?>
</body>
</html>
