<?php $pageId = get_the_id(); 
if(!empty($pageId)) {?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="text-center mb-5">
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