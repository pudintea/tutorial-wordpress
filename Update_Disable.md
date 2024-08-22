

<h1>Disable Udapte Theme</h1>
<pre><code>
add_action( 'wp_loaded', 'pdn_disable_wp_theme_update_loaded' );
function pdn_disable_wp_theme_update_loaded() {
    remove_action( 'load-update-core.php', 'wp_update_themes' );
    add_filter( 'pre_site_transient_update_themes', '__return_null' );
}
</code></pre>

<h1>Disable All Update</h1>
<pre><code>
function remove_core_updates (){
  global $wp_version ; return ( object ) array ( 'last_checked' => time (), 'version_checked' => $wp_version ,);
}
add_filter ( 'pre_site_transient_update_core' , 'remove_core_updates' );
add_filter ( 'pre_site_transient_update_plugins' , 'remove_core_updates' );
add_filter ( 'pre_site_transient_update_themes' , 'remove_core_updates' );
</code></pre>
