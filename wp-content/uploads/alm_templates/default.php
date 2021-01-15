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
                            <h4 class="article-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <p><?php echo mrd_get_the_excerpt(120, get_the_id()).'...'; ?></p>
                            <a href="<?php echo get_permalink() ?>" data-bs-toggle="modal" data-bs-target="#csModal" data-id="<?php echo get_the_id(); ?>" class="launch-modal"><?php echo __('Learn more'); ?></a>
                        </div>
                    </article>
                </div>