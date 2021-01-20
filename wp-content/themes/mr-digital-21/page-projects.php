<?php
/*
  Template Name: Projects Page
 */
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
                        ?><div class="cs-dropdown-main">
                        <select name="work_category" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option selected value="">All Case Studies</option><?php
                            foreach( $department as $category ) {
                            ?><option value="<?php echo get_term_link($category); ?>">
                                <?php echo esc_attr( $category->name ); ?>
                            </option><?php
                            }
                        ?></select>
                    </div><?php
                    endif;?>
                    <div class="text-center"><span class="loader text-danger"></span></div>
                </div>
            </div>

                    
            <?php $New = new WP_Query(array('post_type' => 'works', 'posts_per_page' => 6,));
            if($New->have_posts()):?>
            <div class="row row-cs-grid post-grid" id="works">
                <?php while ($New->have_posts()) : $New->the_post();?>
                <div class="col-lg-6">
                    <article class="article-cs">
                        <div class="article-media">
                            <a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_id(), 'case_studies_t'); ?></a>
                        </div>
                        <div class="article-body">
                            <?php $ptype = wp_get_post_terms(get_the_id(), 'work_category', array("fields" => "all")); ?>
                            <?php if($ptype){
                                foreach ($ptype as $postType) {
                                    echo '<span class="article-tag text-uppercase">'.$postType->name.'</span>';
                                }
                            } ?>
                            <h4 class="article-title">
                                <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <p><?php echo mrd_get_the_excerpt(120, get_the_id()).'...'; ?></p>
                            <a href="<?php echo get_permalink() ?>" data-bs-toggle="modal" data-bs-target="#csModal" data-id="<?php echo get_the_id(); ?>" class="launch-modal"><?php echo __('Learn more'); ?></a>
                        </div>
                    </article>
                </div>
                <?php endwhile;?>
            </div>
            <?php endif;?>
            <?php echo do_shortcode('[ajax_load_more archive="true" offset="6" id="works" container_type="div" css_classes="post-grid" post_type="works" posts_per_page="6" taxonomy="work_category" taxonomy_terms="" taxonomy_operator="IN" pause="true" images_loaded="true" scroll="false" transition_container_classes="row" button_label="Load More Posts" no_results_text="<div class="no-results">Sorry, nothing found in this query</div>"]'); ?>
            <div class="text-center"><span class="loader-3 text-danger"></span></div>            
        </div>
    </section>

    <section class="strategy-session mt-5 grey">
        <?php get_template_part( 'parts/template-strategy', 'session' ); ?> 
    </section>

    <!-- Modal -->
    <div class="modal fade" id="csModal" tabindex="-1" aria-labelledby="csModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <div>
                        <button type="button" class="btn btn-primary btn-print rounded ps-4 pe-4 pt-1 pb-1"><span class="icon-printer pe-2"></span> Print</button>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body text-center">
                    <span class="loader-2 text-danger"></span>
                    <div id="modal-body"></div>
                </div>
            </div>
        </div>
        <!-- <div class="modal-nav">
            <button class="btn btn-prev" id="prevpost"><span class="icon-left-arrow"></span></button>
            <button class="btn btn-next" id="nextpost"><span class="icon-next-arrow"></span></button>
        </div> -->
    </div>

</div>

<?php get_footer('new'); ?>
