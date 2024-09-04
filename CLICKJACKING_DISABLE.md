<p>Simpan dalam file .htaccess kode berikut ini :</p>
<p>
<IfModule mod_headers.c>
    Header always append X-Frame-Options "DENY"
    Header always append Content-Security-Policy "frame-ancestors 'self'"
</IfModule>
</p>
<p>Terima Kasih</p>
