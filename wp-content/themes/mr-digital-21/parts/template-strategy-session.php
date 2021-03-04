<?php $pageId = get_the_id(); 
if(!empty($pageId)) {?>

    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="text-center">
                    <?php if( ! empty (get_field('session_title', $pageId)) ){?>
                    <h3 class="section-title mb-3">
                        <?php echo get_field('session_title', $pageId);?>
                    </h3>
                    <?php } ?>
                </div>
                <?php if( ! empty (get_field('session_content', $pageId)) )
                    echo get_field('session_content', $pageId);?>
            </div>
        </div>
    </div>

<?php }?>