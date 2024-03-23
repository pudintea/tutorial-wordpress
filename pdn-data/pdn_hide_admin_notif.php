<?php
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
?>
