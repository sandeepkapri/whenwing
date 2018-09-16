<?php $path = require $_SERVER['DOCUMENT_ROOT'] . '/config/config-path.php';

if (isset($_GET['v1']) && isset($_GET['v2']) && isset($_GET['v3'])) {
    $post_get_v1 = $_GET['v1'];
    $post_get_v2 = $_GET['v2'];
    $post_get_v3 = $_GET['v3'];
    $hash_id = htmlspecialchars($post_get_v3);
    switch ($post_get_v1) {
        case 'customer-email-verification':
            $file_name = 'cust-email-verification-link';
            break;
        case 'customer-password-verification':
            $file_name = 'cust-password-verification-link';
            break;
        case 'provider-email-verification':
            $file_name = 'prov-email-verification-link';
            break;
        case 'provider-password-verification':
            $file_name = 'prov-password-verification-link';
            break;
        case 'service-providers':
            $file_name = 'service-providers';
            break;
        case 'services':
            $file_name = 'services';
            break;
        default:
            $file_name = '404';
    }

    require $path['pages'] . '/' . $file_name . '.php';

} elseif (isset($_GET['v1']) && isset($_GET['v2'])) {
    $post_get_v1 = $_GET['v1'];
    $post_get_v2 = $_GET['v2'];

    switch ($post_get_v1) {
        case 'become-a-provider':
            $file_name = 'become-provider';
            break;
        case 'order-booking-msg':
            $file_name = 'order-booking-msg';
            break;
        case 'search-providers':
            $file_name = 'search-providers';
            break;
        default:
            $file_name = '404';
    }

    require $path['pages'] . '/' . $file_name . '.php';

} elseif (isset($_GET['v1'])) {

    $post_get = $_GET['v1'];

    switch ($post_get) {
        case 'become-a-provider':
            $file_name = 'become-provider';
            break;
        case 'customer-password-reset':
            $file_name = 'cust-password-reset';
            break;
        case 'forgot-password':
            $file_name = 'forgot-password';
            break;
        case 'forgot-password-message':
            $file_name = 'forgot-password-msg';
            break;
        case 'login':
            $file_name = 'cust-login';
            break;
        case 'logout':
            $file_name = 'logout';
            break;
        case 'order':
            $file_name = 'order';
            break;
        case 'password-reset-message':
            $file_name = 'password-reset-msg';
            break;
        case 'profile':
            $file_name = 'cust-profile';
            break;
        case 'provider-forgot-password':
            $file_name = 'prov-forgot-password';
            break;
        case 'provider-forgot-password-message':
            $file_name = 'prov-forgot-password-msg';
            break;
        case 'provider-login-message':
            $file_name = 'prov-login-msg';
            break;
        case 'provider-profile':
            $file_name = 'prov-profile';
            break;
        case 'registration-successful':
            $file_name = 'reg-cust-successful';
            break;
        case 'registration-provider-submit':
            $file_name = 'reg-prov-submit';
            break;
        case 'sign-up':
            $file_name = 'cust-signup';
            break;
        case 'send-otp':
            $file_name = 'otp-sender';
            break;
        case 'verify-otp':
            $file_name = 'otp-verify';
            break;
        default:
            $file_name = '404';
    }

    require $path['pages'] . '/' . $file_name . '.php';

} else {
    require $path['pages'] . '/home.php';
}
