<?php

// Menambahkan thumbnail ke API : https://namadomainkamu.com/wp-json/wp/v2/posts
// Masukan kode ini di functions.php

add_action( 'rest_api_init', 'pdn_register_rest_images' );

function pdn_register_rest_images() {
    register_rest_field( array( 'post' ),
        'pudin_thumbnail_img_url',
        array(
            'get_callback'    => 'pdn_get_rest_featured_image',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function pdn_get_rest_featured_image( $object, $field_name, $request ) {
    if ( $object['featured_media'] ) {
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' ); // change 'thumbnail' to other image size if needed
        if ( empty( $img ) ) {
            return false;
        }
        return $img[0];
    }
    return false;
}

// End Code
