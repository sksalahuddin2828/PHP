<?php

$command = shell_exec("netsh wlan show profiles");
$profiles = [];
preg_match_all("/All User Profile\s+:\s+(.*)\r/", $command, $profiles);

$WifiList = [];

if (count($profiles[1]) != 0) {
    foreach ($profiles[1] as $name) {
        $WifiProfile = array();
        $profile_info = shell_exec("netsh wlan show profile \"$name\"");
        
        if (preg_match("/Security key\s+:\s+Absent/", $profile_info)) {
            continue;
        } else {
            $WifiProfile["ssid"] = $name;
            $profile_info_pass = shell_exec("netsh wlan show profile \"$name\" key=clear");
            preg_match("/Key Content\s+:\s+(.*)\r/", $profile_info_pass, $password);
            
            if ($password == null) {
                $WifiProfile["password"] = null;
            } else {
                $WifiProfile["password"] = $password[1];
            }
            
            $WifiList[] = $WifiProfile;
        }
    }
}

foreach ($WifiList as $wifi) {
    echo "SSID: " . $wifi["ssid"] . "\n";
    echo "Password: " . $wifi["password"] . "\n";
}

?>
