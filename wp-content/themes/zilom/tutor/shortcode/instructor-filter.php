<?php 
    ob_start();

    foreach($categories as $category) {
        ?>
        <div>
            <label>
                <input type="checkbox" name="category" value="<?php echo esc_attr($category->term_id); ?>"/> 
                <?php echo esc_html($category->name); ?>
            </label>
        </div>
        <?php
    }

    $category_list = ob_get_clean();
?>

<div class="tutor-instructor-filter" 
    <?php 
        foreach($attributes as $key => $value) {
            echo 'data-' . $key . '="' . $value . '" ';
        }
    ?>>
    <div class="tutor-instructor-filter-sidebar">
        <div>
            <div class="tutor-category-text">
                <span>Category</span>
                <span class="clear-instructor-filter">
                    <i class="tutor-icon-line-cross"></i> <span><?php echo esc_html__('Clear All', 'zilom'); ?></span>
                </span>
            </div>
            <br/>
        </div>
        <div class="course-category-filter">
            <?php echo html_entity_decode($category_list); ?>
        </div>
    </div>
    <div class="tutor-instructor-filter-result">
        <div class="filter-pc">
            <div class="keyword-field">
                <i class="tutor-icon-magnifying-glass-1"></i>
                <input type="text" name="keyword" placeholder="<?php echo esc_attr__('Search any instructor...', 'zilom'); ?>"/>
            </div>
        </div>
        <div class="filter-mobile">
            <div class="mobile-filter-container">
                <div class="keyword-field mobile-screen">
                    <i class="tutor-icon-magnifying-glass-1"></i>
                    <input type="text" name="keyword" placeholder="<?php echo esc_attr__('Search any instructor...', 'zilom'); ?>"/>
                </div>
                <i class="tutor-icon-filter-tool-black-shape"></i>
            </div>
            <div class="mobile-filter-popup">
                <div>
                    <div class="tutor-category-text">
                        <div class="expand-instructor-filter"></div>
                        <span><?php echo esc_html__('Category', 'zilom') ?></span>
                        <span class="clear-instructor-filter">
                            <i class="tutor-icon-line-cross"></i> <span><?php echo esc_html__('Clear All', 'zilom'); ?></span>
                        </span>
                    </div>
                    <div>
                        <?php echo html_entity_decode($category_list); ?>
                    </div>
                    <div>
                        <button class="tutor-btn btn-sm">
                            <?php echo esc_html__('Apply Filter', 'zilom'); ?>
                        </button>
                    </div>
                </div>
            </div>
            <div class="selected-cate-list">

            </div>
        </div>
        <div class="filter-result-container">
            <?php echo html_entity_decode($content); ?>
        </div>
    </div>
</div>