<p>Simpan dalam file .htaccess kode berikut ini :</p>
<pre><kode>
<IfModule mod_headers.c>
    Header always append X-Frame-Options "DENY"
    Header always append Content-Security-Policy "frame-ancestors 'self'"
</IfModule>
</kode></pre>
<p>Terima Kasih</p>
