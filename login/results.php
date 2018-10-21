<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>결과</title>
</head>
<body>
    <p>Invisible reCAPTCHA 테스트 :</p>

    <?php
        // reCaptcha info
        $secret = "6Lewb3UUAAAAAOkEKR0iWqx3Eoe7q6nEGB3sO-ZG";
        $remoteip = $_SERVER["REMOTE_ADDR"];
        $url = "https://www.google.com/recaptcha/api/siteverify";

        // Form info
        $first = $_POST["first"];
        $last = $_POST["last"];
        $response = $_POST["g-recaptcha-response"];

        // Curl Request
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, array(
            'secret' => $secret,
            'response' => $response,
            'remoteip' => $remoteip
            ));
        $curlData = curl_exec($curl);
        curl_close($curl);

        // Parse data
        $recaptcha = json_decode($curlData, true);
        if ($recaptcha["success"])
            echo "정상적인 접근 입니다!";
        else
            echo "봇은 접근할 수 없습니다!";
    ?>
</body>
</html>
