<?php
/**
 * @Package     : Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 * @Author URI  : https://themeforest.net/user/aonecolor
 */

// Block direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="search-form ">
    <input type="search" name="s" class="form-control form-control-lg "
        placeholder="<?php echo esc_attr__('Search here', 'exsit'); ?>"
        value="<?php echo esc_attr(get_search_query()); ?>" required>
    <button type="submit" class="submit-btn btn btn-lg btn-primary"
        aria-label="<?php esc_attr_e('Search', 'exsit'); ?>">
        <?php esc_html_e('Search', 'exsit'); ?>
    </button>
</form>