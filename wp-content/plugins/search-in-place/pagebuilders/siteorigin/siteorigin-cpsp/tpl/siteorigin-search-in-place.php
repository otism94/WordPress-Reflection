<?php
$shortcode  = '[search-in-place-form';
$shortcode .= (!empty($instance['search_in_page'])) ? ' in_current_page="1"' : '';
$shortcode .= (!empty($instance['no_popup'])) ? ' no_popup="1"' : '';
$shortcode .= (!empty($instance['exclude_hidden'])) ? ' exclude_hidden_terms="1"' : '';
$shortcode .= (!empty($instance['display_button'])) ? ' display_button="1"' : '';
$shortcode .= ']';
print $shortcode;