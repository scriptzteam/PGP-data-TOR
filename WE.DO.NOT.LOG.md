Data are NOT logged and NOT send without being first PGP encrypted on YOUR machine.

How?
```
1, When you run client.php your machine will create socket connection to pgp.0xc0d3.xyz on port 10101
2, Unencrypted data are written on your ONLY machine to file file.data
3, Command called gpg will encrypt unencrypted file file.data and write pgp encrypted data to file file.data.asc
4, The last step is that your machine will send the encrypted file file.data.asc to our server at https://pgp-public.0xc0d3.xyz/
```
