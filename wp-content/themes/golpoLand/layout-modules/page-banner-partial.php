<?php if (is_front_page()): ?>

    <?php require(get_template_directory() . '/layout-modules/_home-banner.php'); ?>

<?php elseif (is_category()): ?>

    <?php require(get_template_directory() . '/layout-modules/_banner-category.php'); ?>

<?php elseif (is_singular('post')): ?>

    <?php require(get_template_directory() . '/layout-modules/_banner-books.php'); ?>

<?php endif; ?>