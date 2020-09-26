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
                            <div class="cms-team-item-inner overflow-hidden cms-box-shadow-1 cms-box-shadow-hover-5 bdr-radius-10 cms-transition text-center">
                                <div class="team-image relative overflow-hidden"><?php
                                        soapee_image_by_size([
                                            'id'      => $team['team_image']['id'], 
                                            'size'    => $img_size,
                                            'class'   => 'team-img w-100 cms-transition',
                                            'default' => true,
                                            'before'  => '',
                                            'after'   => ''
                                        ]);
                                    ?>
                                    <div class="team-socials cms-transition clearfix">
                                        <div class="team-social cms-social cms-social-style2">
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
                                                <span class="fab fa-facebook-f" aria-hidden="true"></span>
                                            </a>
                                            <a href="<?php echo esc_url($twitter); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                                <span class="fab fa-twitter" aria-hidden="true"></span>
                                            </a>
                                            <a href="<?php echo esc_url($linkedin); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                                <span class="fab fa-linkedin" aria-hidden="true"></span>
                                            </a>
                                            <a href="<?php echo esc_url($instagram); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                                <span class="fab fa-instagram" aria-hidden="true"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-content p-25">
                                    <?php
                                        $url    = !empty($team['team_link']['id'])?$team['team_link']['id']:'#';
                                        $target = !empty($team['team_link']['is_external']);
                                        $rel    = !empty($team['team_link']['nofollow']);
                                    ?>
                                    <div class="team-name h3 text-va-30 font-700 pb-15 text-capitalize">
                                        <a href="<?php echo esc_url($url); ?>" <?php etc_print_html($target?'target="_blank"':''); ?> <?php etc_print_html($rel?'rel="nofollow"':''); ?> class="team-name"><?php echo esc_html($team['team_name'])?></a>
                                    </div>
                                    <div class="team-job font-500 text-uppercase"><?php echo esc_html($team['team_job'])?></div>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif;
