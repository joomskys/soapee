<?php 
// team image size
$team_image_size            = $widget->get_setting('team_image_size_size','full');
$thumbnail_custom_dimension = $widget->get_setting('team_image_size_custom_dimension');
if($team_image_size != 'custom'){
    $img_size = $team_image_size;
} elseif (!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
    $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
} else {
    $img_size = 'full';
}
if(isset($settings['teams']) && !empty($settings['teams']) && count($settings['teams'])): ?>
    <div class="cms-teams">
        <div class="cms-teams-inner">
            <div <?php soapee_slick_slider_settings($widget); ?>>
                <?php foreach ($settings['teams'] as $team): ?>
                        <div class="cms-team-item cms-slick-slide slick-slide">
                            <div class="cms-team-item-inner overflow-hidden cms-box-shadow-hover-5 bdr-radius-20 bdr-1 bdr-solid bdr-primary-102 cms-transition text-center">
                                <?php
                                    soapee_image_by_size([
                                        'id'      => $team['team_image']['id'], 
                                        'size'    => $img_size,
                                        'class'   => 'team-img w-100',
                                        'default' => true,
                                        'before'  => '<div class="team-image">',
                                        'after'   => '</div>'
                                    ]);
                                ?>
                                <div class="team-meta p-13 bdr-radius-20 bg-secondary relative">
                                    <?php
                                        $url    = !empty($team['team_link']['id'])?$team['team_link']['id']:'#';
                                        $target = !empty($team['team_link']['is_external']);
                                        $rel    = !empty($team['team_link']['nofollow']);
                                    ?>
                                    <div class="team-name h4 text-17 text-va-30 lh-24 text-uppercase font-700 m-tb-0">
                                        <a href="<?php echo esc_url($url); ?>" <?php etc_print_html($target?'target="_blank"':''); ?> <?php etc_print_html($rel?'rel="nofollow"':''); ?> class="team-name"><?php echo esc_html($team['team_name'])?></a>
                                    </div>
                                    <div class="team-job text-primary"><?php echo esc_html($team['team_job'])?></div>
                                </div>
                                <div class="team-content pt-25 p-lr-30 pb-30">
                                    <?php if(!empty($team['team_desc'])) : ?>
                                        <div class="team-desc"><?php echo wp_kses_post($team['team_desc']); ?></div>
                                    <?php endif; ?>
                                    <div class="clearfix d-inline-block mt-25">
                                        <div class="team-social cms-social cms-social-style1">
                                            <?php
                                                $social_target = $team['team_social_new_window'] == 'true';
                                                $social_nofollow = $team['team_social_nofollow'] == 'true';
                                                $facebook = !empty($team['team_link_facebook'])?$team['team_link_facebook']:'#';
                                                $twitter = !empty($team['team_link_twitter'])?$team['team_link_twitter']:'#';
                                                $linkedin = !empty($team['team_link_linkedin'])?$team['team_link_linkedin']:'#';
                                                $instagram = !empty($team['team_link_instagram'])?$team['team_link_instagram']:'#';
                                                $skype = !empty($team['team_link_skype'])?$team['team_link_skype']:'#';
                                            ?>
                                            <a href="<?php echo esc_url($facebook); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            </a>
                                            <a href="<?php echo esc_url($twitter); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                            </a>
                                            <a href="<?php echo esc_url($linkedin); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                                <i class="fab fa-linkedin" aria-hidden="true"></i>
                                            </a>
                                            <a href="<?php echo esc_url($instagram); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                                <i class="fab fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif;
