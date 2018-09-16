<section id="reg-successful">
<?php
function sendVerificationLink($receiverEmail, $hashVal)
{
    $to = $receiverEmail;
    $subject = "Email Verification";

    $message = '<p>Verify Your Email by clicking the link below.</p>
  <a href="https://whenwing.com/provider-email-verification/hash/' . $hashVal . '">Verify Your Account</a>
  ';
    $headers = 'MIME-Version: 1.0' . PHP_EOL;
    $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . PHP_EOL;
    $headers .= 'From: <no-reply@whenwing.com>' . PHP_EOL;

    mail($to, $subject, $message, $headers);
}

$path = require $_SERVER['DOCUMENT_ROOT'] . '/config/config-path.php';
include $path['root'] . '/includes/connect.inc.php';

//-----------------------Complete validations for all field---------------------
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function uploadImage($img_name, $img_id, $path)
    {
        $target_dir = $path . "/images/provider-images/";
        $imageFileType = strtolower(pathinfo($_FILES[$img_name]["name"], PATHINFO_EXTENSION));
        $target_file = $target_dir . $img_id . '.' . $imageFileType;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES[$img_name]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "<p>" . $img_name . ".-> File is not an image.</p>";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<p>" . $img_name . ".->Sorry, file already exists.</p>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES[$img_name]["size"] > 500000) {
            echo "<p>" . $img_name . ".->Sorry, your file is too large.</p>";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "<p>" . $img_name . ".->Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return array(false, $imageFileType);
            echo "<p>" . $img_name . ".->Sorry, your file was not uploaded.</p>";
        } else {
            // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES[$img_name]["tmp_name"], $target_file)) {

                return array(true, $imageFileType);
            } else {
                echo "<p>" . $img_name . ".->Sorry, there was an error uploading your file.<p>";
                return array(false, $imageFileType);
            }
        }
    }

    $hash1 = md5(uniqid(rand(), true));
    $img_name1 = "prov-front-id";
    $img_up_rv1 = uploadImage($img_name1, $hash1, $path['root']);
    $img_up_status1 = $img_up_rv1[0];
    $img_ext1 = $img_up_rv1[1];

    $hash2 = md5(uniqid(rand(), true));
    $img_name2 = "prov-back-id";
    $img_up_rv2 = uploadImage($img_name2, $hash2, $path['root']);
    $img_up_status2 = $img_up_rv2[0];
    $img_ext2 = $img_up_rv2[1];

    if (isset($_POST['prov-field'])) {
        if (strtolower($_POST['prov-field']) == 'transport') {
            $hash3 = md5(uniqid(rand(), true));
            $img_name3 = "provh-lic-photo";
            $img_up_rv3 = uploadImage($img_name3, $hash3, $path['root']);
            $img_up_status3 = $img_up_rv3[0];
            $img_ext3 = $img_up_rv3[1];
        } else if (strtolower($_POST['prov-field']) == 'education') {
            $hash3 = md5(uniqid(rand(), true));
            $img_name3 = "provh-deg-img";
            $img_up_rv3 = uploadImage($img_name3, $hash3, $path['root']);
            $img_up_status3 = $img_up_rv3[0];
            $img_ext3 = $img_up_rv3[1];
        }
    }

    if (isset($_POST['prov-name'])) {
        if (!empty($_POST['prov-name'])) {
            /******************Complete other validations*************** */
            if ($img_up_status1 && $img_up_status2) {
                $prov_name = htmlspecialchars($_POST['prov-name']);
                $prov_contact = htmlspecialchars($_POST['prov-contact']);
                $email_id = htmlspecialchars($_POST['prov-email']);
                $pwd = htmlspecialchars($_POST['prov-password']);
                $pwd = password_hash($pwd, PASSWORD_BCRYPT);
                $prov_dob = htmlspecialchars($_POST['prov-dob']);
                $prov_gender = htmlspecialchars($_POST['prov-gender']);
                $prov_addr = htmlspecialchars($_POST['prov-addr']);
                $prov_pincode = htmlspecialchars($_POST['prov-pin']);
                $prov_state = htmlspecialchars($_POST['prov-state']);
                $prov_field = htmlspecialchars($_POST['prov-field']);
                $prov_service = htmlspecialchars($_POST['prov-service']);
                $prov_specialities = htmlspecialchars($_POST['prov-speciality']);
                $prov_workexp = htmlspecialchars($_POST['prov-workexp']);
                $prov_record = htmlspecialchars($_POST['prov-record']);
                $prov_about = htmlspecialchars($_POST['prov-about']);
                $prov_id_front = $hash1 . '.' . $img_ext1;
                $prov_id_bk = $hash2 . '.' . $img_ext2;
                $prov_hash = md5(uniqid(rand(), true));

                $db = new DB();
                $db->query('INSERT INTO `ww_provider`( `prov_name`, `prov_contact`, `email_id`, `pwd`, `prov_dob`, `prov_gender`, `prov_addr`, `prov_pincode`, `prov_state`, `prov_field`, `prov_service`, `prov_specialities`, `prov_workexp`, `prov_record`, `prov_about`, `prov_id_front`, `prov_id_bk`, `prov_hash`, `reg_date`, `is_active`) VALUES (:prov_name, :prov_contact, :email_id, :pwd, :prov_dob, :prov_gender, :prov_addr, :prov_pincode, :prov_state, :prov_field, :prov_service, :prov_specialities, :prov_workexp, :prov_record, :prov_about, :prov_id_front, :prov_id_bk, :prov_hash, now(), :is_active)');

                $db->bind(':prov_name', $prov_name);
                $db->bind(':prov_contact', $prov_contact);
                $db->bind(':email_id', $email_id);
                $db->bind(':pwd', $pwd);
                $db->bind(':prov_dob', $prov_dob);
                $db->bind(':prov_gender', $prov_gender);
                $db->bind(':prov_addr', $prov_addr);
                $db->bind(':prov_pincode', $prov_pincode);
                $db->bind(':prov_state', $prov_state);
                $db->bind(':prov_field', $prov_field);
                $db->bind(':prov_service', $prov_service);
                $db->bind(':prov_specialities', $prov_specialities);
                $db->bind(':prov_workexp', $prov_workexp);
                $db->bind(':prov_record', $prov_record);
                $db->bind(':prov_about', $prov_about);
                $db->bind(':prov_id_front', $prov_id_front);
                $db->bind(':prov_id_bk', $prov_id_bk);
                $db->bind(':prov_hash', $prov_hash);
                $db->bind(':is_active', 0);

                $exeRes = $db->execute();
                if ($exeRes) {
                    //Write additional hidden fields to separate tables
                    if (isset($hash3)) {
                        if (strtolower($_POST['prov-field']) == 'transport') {
                            $f1 = htmlspecialchars($_POST['provh-vehicle']);
                            $f2 = htmlspecialchars($_POST['provh-license']);

                        } else if (strtolower($_POST['prov-field']) == 'education') {
                            $f1 = htmlspecialchars($_POST['provh-degree']);
                            $f2 = htmlspecialchars($_POST['provh-method']);
                        }
                        $db->query('INSERT INTO `ww_prov_extra`(`prov_hash`, `f1`, `f2`, `f3_pic`) VALUES (:prov_hash, :f1, :f2, :f3_pic)');

                        $db->bind(':prov_hash', $prov_hash);
                        $db->bind(':f1', $f1);
                        $db->bind(':f2', $f2);
                        $db->bind(':f3_pic', $hash3 . '.' . $img_ext3);
                        $exeRes = $db->execute();

                    }
                    sendVerificationLink($email_id, $prov_hash);
                    echo '<h1>Registration Successful</h1>
                    <p>Verify your email id. <br>(An email has been sent to your account.) </p>
                    <p>Go to <a href="/become-a-provider">login</a> Page </p>';
                    $db->terminate();

                }

            } else {
                echo 'Image Can\'t be uploaded';
            }

        } else {
            echo 'Something Went Wrong.';
        }
    }
}
?>

</section>
