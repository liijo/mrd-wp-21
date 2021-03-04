<?php
    /*template name: Case Studies*/
  get_header();
?>
    <section class="si-case-studies">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php 
                    $taxonomy = 'work_category';
                    $department = get_terms( array(
                        'taxonomy' => $taxonomy,
                        'hide_empty' => false
                    ) );

                    if ( !empty($department) ) :
                        /*?><div class="cs-dropdown-main">
                        <select name="work_category" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option selected value="">All Case Studies</option><?php
                            foreach( $department as $category ) {
                            ?><option value="<?php echo get_term_link($category); ?>">
                                <?php echo esc_attr( $category->name ); ?>
                            </option><?php
                            }
                        ?></select>
                    </div><?php */
                    endif;?>
                    <div class="text-center"><span class="loader text-danger"></span></div>
                </div>
            </div>

                    
            <?php 
            $args = array('post_type' => 'works', 'showposts' => 10);
            query_posts($args);
            if(have_posts()):?>
            <div class="row row-cs-grid post-grid" id="works">
                <?php while (have_posts()) : the_post();?>
                <div class="col-lg-6">
                    <article class="article-cs">
                        <div class="article-media">
                            <?php echo get_the_post_thumbnail(get_the_id(), 'case_studies_t'); ?>
                        </div>
                        <div class="article-body">
                            <?php $ptype = wp_get_post_terms(get_the_id(), 'work_category', array("fields" => "all")); ?>
                            <?php if($ptype){
                                echo '<div class="tags">';
                                foreach ($ptype as $postType) {
                                    echo '<span class="article-tag text-uppercase">'.$postType->name.'</span>';
                                }
                                echo '</div>';
                            } ?>
                            <h4 class="article-title"><?php the_title(); ?></h4>
                            <p><?php echo mrd_get_the_excerpt(120, get_the_id()).'...'; ?></p>
                            <a href="<?php echo get_permalink() ?>" data-bs-toggle="modal" data-bs-target="#csModal" data-id="<?php echo get_the_id(); ?>" class="launch-modal"><?php echo __('Learn more'); ?></a>
                        </div>
                    </article>
                </div>
                <?php endwhile;?>
            </div>
            <?php else:?>
                <p><?php echo __('Nothing found.') ?></p>
            <?php endif;?>
            <?php echo do_shortcode('[ajax_load_more archive="true" offset="10" id="works" container_type="div" css_classes="post-grid" post_type="works" posts_per_page="6" taxonomy="work_category" taxonomy_terms="" taxonomy_operator="IN" pause="true" images_loaded="true" scroll="false" transition_container_classes="row" button_label="Load More Posts" no_results_text="<div class="no-results">Sorry, nothing found in this query</div>"]'); ?>
            <div class="text-center"><span class="loader-3 text-danger"></span></div>            
            <?php /*<div class="row">
                <div class="col-12 text-center mt-3 mt-md-5">
                    <a href="#" class="cs-view-all-links" id="load-more" data-ptype="works"><?php echo __('Load more Posts'); ?></a>
                    <input type="hidden" name="offset" value="6" />
                    <?php $postCount = wp_count_posts('works'); ?>
                    <input type="hidden" name="total-posts" value="<?php echo $postCount->publish; ?>" />
                </div>
            </div>*/?>
        </div>
    </section>
    <?php wp_reset_query(); ?>
    <section class="strategy-session mt-md-5 grey">
        <?php get_template_part( 'parts/template-strategy', 'session' ); ?> 
    </section>

</div>

<?php get_footer('new'); ?>
