  <section class="services-page">
    <?php
if (isset($post_get_v2) && isset($post_get_v3)) {
    $code_id = '';
    $f_url = '/service-providers/' . $post_get_v2 . '/' . $post_get_v3 . '/';
    if ($post_get_v2 == "home-services") {
        switch ($post_get_v3) {
            case "carpenter":$code_id = '11';
                break;
            case "painter":$code_id = '12';
                break;
            case "plumber":$code_id = '13';
                break;
            case "electrician":$code_id = '14';
                break;
            case "wood-polisher":$code_id = '15';
                break;
            case "glass-and-mirror":$code_id = '16';
                break;
            case "architect":$code_id = '17';
                break;
            case "builder":$code_id = '18';
                break;
            case "interior-designer":$code_id = '19';
                break;
            case "internet-provider":$code_id = '110';
                break;
            case "laundry":$code_id = '111';
                break;
            case "pundit-or-puja":$code_id = '112';
                break;
            case "photographer":$code_id = '113';
                break;
            case "web-designer-and-developer":$code_id = '114';
                break;
            case "cctv-camera-and-installation":$code_id = '116';
                break;
        }
    } else if ($post_get_v2 == "appliance-repair") {
        switch ($post_get_v3) {
            case "ac-service-repair-and-installation":$code_id = '21';
                break;
            case "refrigerator-repair":$code_id = '22';
                break;
            case "washing-machine-repair":$code_id = '23';
                break;
            case "ro-or-water-purifier-repair":$code_id = '24';
                break;
            case "microwave-repair":$code_id = '25';
                break;
            case "tv-repair-and-installation":$code_id = '26';
                break;
            case "air-cooler-repair":$code_id = '27';
                break;
            case "geyser-or-water-heater-repair":$code_id = '28';
                break;
            case "computer-repair":$code_id = '29';
                break;
            case "mobile-repair":$code_id = '210';
                break;
        }
    } else if ($post_get_v2 == "transport") {
        switch ($post_get_v3) {
            case "transport-services":$code_id = '31';
                break;
            case "travel":$code_id = '32';
                break;
        }
    } else if ($post_get_v2 == "showroom") {
        switch ($post_get_v3) {
            case "car-showroom":$code_id = '41';
                break;
            case "bike-showroom":$code_id = '42';
                break;
            case "scooty-and-scooter-showroom":$code_id = '43';
                break;
            case "clothes":$code_id = '44';
                break;
            case "watch":$code_id = '45';
                break;
            case "mobile":$code_id = '46';
                break;
            case "electronics":$code_id = '47';
                break;
            case "ac-and-cooler":$code_id = '48';
                break;
            case "furniture":$code_id = '49';
                break;
            case "laptop-and-computer":$code_id = '410';
                break;
            //case "jewellery" : $code_id = '411';break;
            case "bag-and-suitcase":$code_id = '412';
                break;
            //case "gifts" : $code_id = '413';break;
            case "footwear":$code_id = '414';
                break;
        }
    } else if ($post_get_v2 == "education") {
        $code_id = 'education';
    }
}

?>
    <div class="bg-text">Get Best Service Providers With Whenwing</div>
    <form class="services-form" action="<?php if (isset($f_url)) {
    echo $f_url;
}
?>" method="post">
      <div>
        <span class="error error-prov-gender"></span>
      </div>
      <?php
if (isset($code_id) && !empty($code_id)) {
    require $path['root'] . '/resources/templates/services-tmpl/' . $code_id . '.php';
}
?>
      <div class="btn serv-get-list-btn">Get Providers List</div>
    </form>
  </section>
