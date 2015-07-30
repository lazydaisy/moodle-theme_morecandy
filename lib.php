<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Moodle's morecandy theme, an example of how to make a Bootstrap theme
 *
 * DO NOT MODIFY THIS THEME!
 * COPY IT FIRST, THEN RENAME THE COPY AND MODIFY IT INSTEAD.
 *
 * For full information about creating Moodle themes, see:
 * http://docs.moodle.org/dev/Themes_2.0
 *
 * @package   theme_morecandy
 * @copyright 2015 byLazyDaisy.uk
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Parses CSS before it is cached.
 *
 * This function can make alterations and replace patterns within the CSS.
 *
 * @param string $css The CSS
 * @param theme_config $theme The theme config object.
 * @return string The parsed CSS The parsed CSS.
 */
function theme_morecandy_less_variables($theme) {
    $variables = array();
    if (!empty($theme->settings->sidewayheadercolor)) {
        $variables['sidewayHeaderColor'] = $theme->settings->sidewayheadercolor;
    }
    return $variables;
}

function theme_morecandy_process_css($css, $theme) {

    // Set the background image for the 'Brand' icon.
    $brandicon = $theme->setting_file_url('brandicon', 'brandicon');
    $css = theme_morecandy_set_brandicon($css, $brandicon);

    // Set the background image for the logo.
    $logo = $theme->setting_file_url('logo', 'logo');
    $css = theme_morecandy_set_logo($css, $logo);

    // Set custom CSS.
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = theme_morecandy_set_customcss($css, $customcss);

    return $css;
}

/**
 * Adds the 'Brand' icon to CSS.
 *
 * @param string $css The CSS.
 * @param string $brandicon The URL of the navbar 'Brand' icon.
 * @return string The parsed CSS
 */
function theme_morecandy_set_brandicon($css, $brandicon) {
    $tag = '[[setting:brandicon]]';
    $replacement = $brandicon;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

/**
 * Adds the logo to CSS.
 *
 * @param string $css The CSS.
 * @param string $logo The URL of the logo.
 * @return string The parsed CSS
 */
function theme_morecandy_set_logo($css, $logo) {
    $tag = '[[setting:logo]]';
    $replacement = $logo;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_morecandy_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    if ($context->contextlevel == CONTEXT_SYSTEM && ($filearea === 'logo' || $filearea === 'brandicon')) {
        $theme = theme_config::load('morecandy');
        // By default, theme files must be cache-able by both browsers and proxies.
        if (!array_key_exists('cacheability', $options)) {
            $options['cacheability'] = 'public';
        }
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    } else {
        send_file_not_found();
    }
}

/**
 * Adds any custom CSS to the CSS before it is cached.
 *
 * @param string $css The original CSS.
 * @param string $customcss The custom CSS to add.
 * @return string The CSS which now contains our custom CSS.
 */
function theme_morecandy_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

/**
 * Returns an object containing HTML for the areas affected by settings.
 *
 * Do not add theme specific logic in here, child themes should be able to
 * rely on that function just by declaring settings with similar names.
 *
 * @param renderer_base $output Pass in $OUTPUT.
 * @param moodle_page $page Pass in $PAGE.
 * @return stdClass An object with the following properties:
 *      - navbarclass A CSS class to use on the navbar. By default ''.
 *      - heading HTML to use for the heading. A logo if one is selected or the default heading.
 *      - footnote HTML to use as a footnote. By default ''.
 */
function theme_morecandy_get_html_for_settings(renderer_base $output, moodle_page $page) {
    global $CFG, $SITE;
    $return = new stdClass;

    $return->branding = '';
    if (empty($page->theme->settings->brandicon)) {
        $return->branding = format_string($SITE->shortname, true, array('context' => context_course::instance(SITEID)));
    }

    if (!empty($page->theme->settings->logo)) {
        $return->heading = '<div class="logo"></div>';
    } else {
        $return->heading = $output->page_heading();
    }

    $return->welcomenote = '';
    if (!empty($page->theme->settings->welcomenote)) {
        $return->welcomenote = '<div class="row-fluid">'.format_text($page->theme->settings->welcomenote).'</div>';
    }

    $return->footnote = '';
    if (!empty($page->theme->settings->footnote)) {
        $return->footnote = '<div class="footnote text-center">'.format_text($page->theme->settings->footnote).'</div>';
    }

    return $return;
}
