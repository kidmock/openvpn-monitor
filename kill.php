<html> <head> <meta http-equiv='refresh' content='5;/monitor/' /> </head> <body>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle" 
data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">
OpenVPN Status Monitor</a>
</div><div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav"><li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">VPN
<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="#vpn1">VPN1</a></li>
</ul></li>
<li><a href="#map_canvas">Map View</a></li>
</ul>
<a href="#" class="pull-right"><img alt="self.logo" 
style="max-height:46px; padding-top:3px;" 
src="/assets/img/logo150x150.png"></a>
</div></div></nav>
<div class="container-fluid">
<div class="panel panel-success" id="vpn1">
<div class="panel-heading"><h3 class="panel-title">VPN1</h3>
</div><div class="panel-body">


<?php

$vpnclient=$_GET[vpnclient];
$vpnhost=$_GET[vpnhost];
$vpnport=$_GET[vpnport];

$fp = fsockopen($vpnhost, $vpnport, $errno, $errstr, 30);

if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "kill $vpnclient\r\n";
    $out .= "quit\r\n";
    fwrite($fp, $out);
    while (!feof($fp)) {
        echo fgets($fp, 128);
    }
    fclose($fp);
}

        echo "<html> <head> <meta http-equiv='refresh' content='3;/monitor/' /> </head> <body>";
        echo "<h1>$vpnclient disconnected</h1>";
        echo "</body></html>";
?>

</div></div>
</body>
</html>

