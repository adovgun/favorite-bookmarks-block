<?php
/**
 * Plugin Name:       Favorite Bookmarks block
 * Description:       The plugin was created to demonstrate the capabilities of the Interactivity API.
 * Version:           0.1.0
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Author:            Anatoliy Dovgun
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       favorite-bookmarks-block
 *
 * @package           create-block
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function favorite_bookmarks_block_bookmarks_list_block_init()
{

	$asset_file = include plugin_dir_path(__FILE__) . 'build/bookmark/view.asset.php';

	wp_register_script_module('@favorite-bookmarks-block/bookmark', plugin_dir_url(__FILE__) . 'build/bookmark/view.js', $asset_file['dependencies'], array(), $asset_file['version']);

	register_block_type_from_metadata(__DIR__ . '/build/bookmark');
	register_block_type_from_metadata(__DIR__ . '/build/bookmarks-bar');
	register_block_type_from_metadata(__DIR__ . '/build/bookmarks-list');
}
add_action('init', 'favorite_bookmarks_block_bookmarks_list_block_init');
