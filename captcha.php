// Register API keys at https://www.google.com/recaptcha/admin
$siteKey = "6LcgmdcUAAAAAEFSICfVs7rb9XhyaaOj5yYicavH";
$secret = "6LcgmdcUAAAAAHse6CzvNt9TpDpzIbFJculTS3ji";
// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
$lang = "en";

// The response from reCAPTCHA
$resp = null;
// The error code from reCAPTCHA, if any
$error = null;

$reCaptcha = new ReCaptcha($secret);

// Was there a reCAPTCHA response?
if ($_POST["g-recaptcha-response"]) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
?>
<html>
  <head><title>reCAPTCHA Example</title></head>
  <body>
<?php
if ($resp != null && $resp->success) {
    echo "You got it!";
}
?>
    <form action="?" method="post">
      <div class="g-recaptcha" data-sitekey="<?php echo $siteKey;?>"></div>
      <script type="text/javascript"
          src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>">
      </script>
      <br/>
      <input type="submit" value="submit" />
    </form>
  </body>
</html>