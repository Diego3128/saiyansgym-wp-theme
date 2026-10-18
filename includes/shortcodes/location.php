<?php

if (!defined('ABSPATH')) exit("Direct access forbidden");

// shortcode to display map and location form
function saiyansgym_location_shortcode()
{
    // 1. Turn on output buffering to capture all HTML below
    ob_start();
    ?>
    <div class="location_shortcode">
        <?php
        if (is_page('contact-us')):
            // location is a custom field created through ACF
            $location = get_field('location');
            if (!empty($location)):
        ?>
                <div>
                    <h2 class="text-center text-main mb-10! border-none!">Our Locations</h2>
                    <div class="location-map min-h-150">
                        <?= $location; ?>
                    </div>
                </div>
        <?php
            endif;
        endif; 
        ?>
        <div>
            <h2 class="text-center text-main  mb-10! border-none!">Get in touch</h2>
            <?php
            echo do_shortcode('[contact-form-7 id="14b01d8" title="Custom contact form" html_class="contact-form contact-form-custom"]'); 
            ?>
        </div>
    </div>
    <?php
    // 2. Capture the buffered content into a variable and clean the buffer
    $output = ob_get_clean();
    // 3. Return the string so WordPress handles the shortcode correctly
    return $output;
}

add_shortcode("saiyansgym_location", "saiyansgym_location_shortcode");