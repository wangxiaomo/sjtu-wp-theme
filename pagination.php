<?php
define('ENTRY_COUNT_PER_PAGE', 3);

function get_pagination(){
?>
    <div class="pagination">
        <div class="prev"><?php previous_posts_link('<<上一页'); ?></div>
        <div class="next"><?php next_posts_link('下一页>>'); ?></div>
    </div>
<?php
}
?>
