

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

<h1>Hide Admin Notif Dashboard</h1>
<pre><code>
    // pudin.my.id
function pdn_hide_all_admin_notices() {
    global $wp_filter;

    // Check if the WP_Admin_Bar exists, as it's not available on all admin pages.
    if (isset($wp_filter['admin_notices'])) {
        // Remove all actions hooked to the 'admin_notices' hook.
        unset($wp_filter['admin_notices']);
    }
}

add_action('admin_init', 'pdn_hide_all_admin_notices');
</code></pre>
