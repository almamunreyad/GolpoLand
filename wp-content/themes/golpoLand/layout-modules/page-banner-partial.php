<?php if (is_front_page()): ?>

    <?php require(get_template_directory() . '/layout-modules/_home-banner.php'); ?>

<?php elseif (is_category() || is_tax('author-by') || is_tax('illustrated')): ?>

    <?php require(get_template_directory() . '/layout-modules/_banner-category.php'); ?>

<?php //elseif (is_tax('author-by')): ?>

    <?php //require(get_template_directory() . '/layout-modules/_banner-author.php'); ?>

<?php //elseif (is_tax('illustrated')): ?>

    <?php //require(get_template_directory() . '/layout-modules/_banner-illustrated.php'); ?>

<?php elseif (is_singular('post')): ?>

    <?php require(get_template_directory() . '/layout-modules/_banner-books.php'); ?>

<?php endif; ?>