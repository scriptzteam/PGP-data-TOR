```
wget https://raw.githubusercontent.com/scriptzteam/PGP-data/main/client.php

php client.php --generate_pub_id=TEST
0x94EE059335E587E501CC4BF90613E0814F00A7B08BC7C648FD865A2AF6A22CC2

php client.php  --pass=testpasswd --data=Testing --priv_id=TEST --pub_id=0x94EE059335E587E501CC4BF90613E0814F00A7B08BC7C648FD865A2AF6A22CC2
Status: [OK] PGP message Symmetric-Key Encrypted Session Key done. | File: 1631714005.asc | PublicID: 0x94EE059335E587E501CC4BF90613E0814F00A7B08BC7C648FD865A2AF6A22CC2

The pgp encrypted data is stored there - https://pgp-public.0xc0d3.xyz/0x94EE059335E587E501CC4BF90613E0814F00A7B08BC7C648FD865A2AF6A22CC2/1631714005.asc

To decrypt it on WINDOWS you can use https://www.gpg4win.org/, then just download 1631714005.asc as file, open via gpg4win (Kleopatra) use the password we defined as testpasswd --pass=testpasswd

You got decrypted data!
```
