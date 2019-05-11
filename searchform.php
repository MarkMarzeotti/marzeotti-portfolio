<?php
/**
 * Search Form override
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package Marzeotti_Base
 */
?>

<form role="search" class="search-form" action="/" method="get">
    <input type="text" class="search-field" name="s" id="search" placeholder="Search" value="<?php the_search_query(); ?>" />
    <input type="submit" class="search-submit" value="Search" />
</form>
