<?php
die("Use client-tor.php please!");

$host = "pgp.0xc0d3.xyz";
$port = 10101;

$generate_pub_id = getopt(null, ["generate_pub_id::"]);
$pass = getopt(null, ["pass::"]);
$data = getopt(null, ["data::"]);
$priv_id = getopt(null, ["priv_id::"]);
$pub_id = getopt(null, ["pub_id::"]);

if (!empty($generate_pub_id))
{
    $who_x = "0x" . strtoupper(hash("sha256", $generate_pub_id["generate_pub_id"]));
    echo ($who_x . "\n");
    die();
}
if (!empty($pass) && !empty($data) && !empty($priv_id) && !empty($pub_id))
{
    
if (!file_exists('file.data')) {
    touch('file.data');
}
    
$fp = fopen('file.data', 'w');
fwrite($fp, $data["data"]);
fclose($fp);

passthru("echo " . $pass["pass"] . " | gpg --armor --symmetric --batch --yes --passphrase-fd 0 -c file.data");

$data = $priv_id["priv_id"] . "::|::" . base64_encode(file_get_contents("file.data.asc")) . "::|::" . $pub_id["pub_id"];

$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
    
socket_write($socket, $data, strlen($data)) or die("Could not send data to server\n");

$result = socket_read($socket, 1024) or die("Could not read server response\n");
echo "Status: " . $result . "\n";

socket_close($socket);
}
else
{
echo "\nPublic PGP data: https://pgp-public.0xc0d3.xyz/\n\n";
echo "Warning: DO NOT SHARE PRIVATEID!\n\n";
echo "Generate PUBLICID: php client.php --generate_pub_id=PRIVATEID\n\n";
echo "Usage: php client.php --pass=PASSWORD --data=\"Message you want to became encrypted with GPG\" --priv_id=PRIVATEID --pub_id=PUBLICID\n\n";
}
