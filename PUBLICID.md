PUBLICID is used to access all of your pgp encrypted data (this is NOT password to decrypt them)

client.php line 13
```
$who_x = "0x" . strtoupper(hash("sha256", $generate_pub_id["generate_pub_id"]));
```
