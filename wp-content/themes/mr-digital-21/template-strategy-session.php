<?php $resultId = get_theme_mod('strategy_session'); 
if(!empty($resultId)) {?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="text-center mb-5">
                    <?php if( ! empty (get_field('session_title', $resultId)) ){?>
                    <h3 class="section-title mb-3">
                        <?php echo get_field('session_title', $resultId);?>
                    </h3>
                    <?php } ?>
                </div>
                <?php if( ! empty (get_field('session_content', $resultId)) )
                    echo get_field('session_content', $resultId);?>
            </div>
        </div>
    </div>

<?php }?>