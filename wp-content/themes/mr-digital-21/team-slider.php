<div class="text-center">
    <?php 
    $taxonomy = 'department';
    $department = get_terms( array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false
    ) );

    if ( !empty($department) ) :
        ?><ul class="nav nav-pills d-inline-flex mx-auto rounded" id="pills-tab" role="tablist"><?php
        $i = 1;
        foreach( $department as $category ) {
            $cssClass = ($i == 1) ? 'active' : '';
            ?><li class="nav-item" role="presentation">
                <a class="nav-link <?php echo $cssClass; ?>" id="<?php echo esc_attr( $category->term_id ); ?>-tab" data-bs-toggle="pill" href="#tab-<?php echo esc_attr( $category->term_id ); ?>" role="tab" aria-controls="<?php echo esc_attr( $category->term_id ); ?>" aria-selected="true"><?php echo esc_attr( $category->name ); ?></a>
            </li><?php
            $i++;
        }
        ?></ul><?php
    endif;?>
    <?php 
    ?>
    <div class="tab-content" id="pills-tabContent">
        <?php $department = get_terms( array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false
        ) );

        if ( !empty($department) ) :
            
            $i = 1;
            foreach( $department as $category ) {
                $cssClass = ($i == 1) ? 'active' : '';
                ?>
                <div class="tab-pane fade show <?php echo $cssClass; ?>" id="tab-<?php echo esc_attr( $category->term_id ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $category->term_id ); ?>-tab">
                    <?php $teams = get_posts(array(
                      'post_type' => 'team',
                      'numberposts' => -1,
                      'tax_query' => array(
                        array(
                          'taxonomy' => $taxonomy,
                          'field' => 'term_id', 
                          'terms' => $category->term_id,
                          'include_children' => false
                        )
                      )
                    ));
                    if(!empty($teams)){
                        ?><div class="team-slider owl-carousel"><?php
                        foreach($teams as $team){
                            ?><div class="item pt-5">
                                <figure>
                                    <?php echo get_the_post_thumbnail($team, 'team'); ?>
                                </figure>
                                <div class="text-center mt-3">
                                    <h4><?php echo $team->post_title; ?></h4>
                                    <p class="mb-0"><?php echo esc_attr( $category->name ); ?></p>
                                </div>
                            </div><?php
                        }
                        ?></div><?php
                    }
                $i++;
                ?></div><?php
            }
            
        endif;
        wp_reset_query(); ?>                    
    </div>
</div>