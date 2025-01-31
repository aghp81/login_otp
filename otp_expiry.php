<?php
date_default_timezone_set("Asia/Tehran");
$otp_expiry = date('Y-m-d H:i:s', strtotime('+5 minutes'));
echo($otp_expiry);

echo "<br>";

echo "امروز " . date("Y/m/d") . "<br>";
echo "امروز " . date("Y.m.d") . "<br>";
echo "امروز " . date("Y-m-d") . "<br>";
echo "امروز " . date("l");

echo "<br>";
echo "زمان فعلی " . date("Y-m-d h:i:sa");
