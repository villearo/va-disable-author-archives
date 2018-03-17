<?php
/*
Plugin Name:    VA Disable Author Archives
Plugin URI:     https://github.com/villearo/va-disable-author-archives
Description:    Return 404 on Author Archives and disable author links
Version:        1.0.0
Author:         Ville Aro
Author URI:     https://villearo.fi/
License:        GPLv2 or later
License URI:    http://www.gnu.org/licenses/gpl-2.0.html
*/

function va_disable_author_archives() {
    if ( is_author() ) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
    } else {
        redirect_canonical();   
    }
}
remove_filter('template_redirect', 'redirect_canonical');
add_action('template_redirect', 'va_disable_author_archives');

/*
 * Return empty href
 */
add_filter( 'author_link', '__return_false' );
