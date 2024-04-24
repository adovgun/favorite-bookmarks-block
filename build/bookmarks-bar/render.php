<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

?>

<ul <?php echo get_block_wrapper_attributes(); ?> data-wp-interactive="favorite-bookmarks-block"
	data-wp-init="callbacks.initReadingList">

	<div data-wp-text="state.bookmarksCount">
		Favorite<sup data-wp-text="state.bookmarksCount"></sup>
	</div>
	<span data-wp-bind--hidden="state.allBookmarks">
		<?php //esc_html_e('No added to Bookmark', 'favorite-bookmarks-block'); ?>
	</span>
</ul>