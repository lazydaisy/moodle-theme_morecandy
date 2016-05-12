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
 * Theme Morecandy core renderer file.
 *
 * @package    theme_morecandy
 * @copyright  2016 bylazydaisy.uk
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once($CFG->dirroot. '/theme/bootstrapbase/renderers.php');

class theme_morecandy_core_renderer extends theme_bootstrapbase_core_renderer {

    /**
     * The standard tags (typically performance information and validation links,
     * if we are in developer debug mode) that should be output in the footer area
     * of the page. Designed to be called in theme layout.php files.
     *
     * @return string HTML fragment.
     */
    protected function render_custom_menu(custom_menu $menu) {
        global $USER, $PAGE;

        $content = parent::render_custom_menu($menu);
        $mycourses = $this->page->navigation->get('mycourses');
        if (isloggedin() && $mycourses && $mycourses->has_children()) {
            $branchlabel = get_string('mycourses', 'theme_morecandy', $USER->firstname);
            $branchurl   = new moodle_url('/course/index.php');
            $branchtitle = $branchlabel;
            $branchsort  = -1;
            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);

            foreach ($mycourses->children as $coursenode) {
                $branch->add($coursenode->get_content(),
                $coursenode->action,
                $coursenode->get_title());
            }
        }

        $content = '<ul class="nav">';
        foreach ($menu->get_children() as $item) {
            $content .= $this->render_custom_menu_item($item, 1);
        }
        $content .= '</ul>';
        $patterns = array();
        $replacements = array();

        $patterns[0] = '/<ul class="nav">/';
        $replacements[0] = '<ul class="nav"><li class="first divider"></li>';

        $patterns[1] = '/<\/ul>/';
        $replacements[1] = '<li class="last divider"></li></ul>';

        $content = preg_replace($patterns, $replacements, $content);

        return $content;

    }

    /**
     * The standard tags (typically performance information and validation links,
     * if we are in developer debug mode) that should be output in the footer area
     * of the page. Designed to be called in theme layout.php files.
     *
     * @return string HTML fragment.
     */
    public function standard_footer_html() {
        $output = parent::standard_footer_html();
        $patterns = array();
        $replacements = array();

        $patterns[0] = '/<div class="performanceinfo pageinfo">/';
        $replacements[0] = '<div class="performanceinfo pageinfo well"><i class="fa fa-cogs"></i>';

        $patterns[1] = '/<div class="purgecaches"><a([^>]+)>([^<]+)<\/a>/';
        $replacements[1] = '<div class="purgecaches"><a class="btn btn-default" ${1}><i class="fa fa-trash"></i>${2}</a>';

        $patterns[2] = '/<li><a([^>]+)>([^<]+)<\/a>/';
        $replacements[2] = '<li><a class="btn btn-small btn-default" ${1}><i class="fa fa-cogs">${2}</i></a>';
        $output = preg_replace($patterns, $replacements, $output);

        return $output;
    }


    /**
     * Returns HTML to display a "Turn editing on/off" button in a form.
     *
     * @param moodle_url $url The URL + params to send through when clicking the button
     * @return string HTML the button
     * @copyright 2016 // Originally written for Tiny Bootstrap Project byLazyDaisy.co.uk.
     */
    public function edit_button(moodle_url $url) {

        $url->param('sesskey', sesskey());
        if ($this->page->user_is_editing()) {
            $url->param('edit', 'off');
            $icon = 'fa-power-off';
            $title = get_string('turneditingoff');
        } else {
            $url->param('edit', 'on');
            $icon = 'fa-edit';
            $title = get_string('turneditingon');
        }
        $itag = html_writer::tag('i', '', array('class' => 'course-edit-icon fa '. $icon . ' fa-2x'));
        $content = '';
        $content .= html_writer::link($url, $itag, array('href' => $url, 'title' => $title));

        return $content;

    }

    /**
     * Renders a primary action_menu_filler item.
     *
     * @param action_menu_link_filler $action
     * @return string HTML fragment
     */
    protected function render_action_menu_filler(action_menu_filler $action) {
        return html_writer::tag('li', '', array('class' => 'divider'));
    }

    /** CONTEXT HEADER BAR & ELEMENTS
     ---------------------------------*/

    /**
     * Returns the header bar.
     *
     * @since Moodle 2.9
     * @param array $headerinfo An array of header information, dependant on what type of header is being displayed. The following
     *                          array example is user specific.
     *                          heading => Override the page heading.
     *                          user => User object.
     *                          usercontext => user context.
     * @param int $headinglevel What level the 'h' tag will be.
     * @return string HTML for the header bar.
     */
    public function context_header($headerinfo = null, $headinglevel = 1) {
        global $DB, $USER, $CFG;
        $context = $this->page->context;
        // Make sure to use the heading if it has been set.
        if (isset($headerinfo['heading'])) {
            $heading = $headerinfo['heading'];
        } else {
            $heading = null;
        }
        $imagedata = null;
        $subheader = null;
        $userbuttons = null;
        // The user context currently has images and buttons. Other contexts may follow.
        if (isset($headerinfo['user']) || $context->contextlevel == CONTEXT_USER) {
            if (isset($headerinfo['user'])) {
                $user = $headerinfo['user'];
            } else {
                // Look up the user information if it is not supplied.
                $user = $DB->get_record('user', array('id' => $context->instanceid));
            }
            // If the user context is set, then use that for capability checks.
            if (isset($headerinfo['usercontext'])) {
                $context = $headerinfo['usercontext'];
            }
            // Use the user's full name if the heading isn't set.
            if (!isset($heading)) {
                $heading = fullname($user);
            }

            $imagedata = $this->user_picture($user, array('size' => 100));
            // Check to see if we should be displaying a message button.
            if (!empty($CFG->messaging) && $USER->id != $user->id && has_capability('moodle/site:sendmessage', $context)) {
                $userbuttons = array(
                    'messages' => array(
                        'buttontype' => 'message',
                        'title' => get_string('message', 'message'),
                        'url' => new moodle_url('/message/index.php', array('id' => $user->id)),
                        'image' => 'message',
                        'linkattributes' => message_messenger_sendmessage_link_params($user),
                        'page' => $this->page
                    )
                );
                $this->page->requires->string_for_js('changesmadereallygoaway', 'moodle');
            }
        }

        $contextheader = new context_header($heading, $headinglevel, $imagedata, $userbuttons);
        return $this->render_context_header($contextheader);
    }

     /**
      * Renders the header bar.
      *
      * @param context_header $contextheader Header bar object.
      * @return string HTML for the header bar.
      */
    protected function render_context_header(context_header $contextheader) {

        // All the html stuff goes here.
        // Set default (LTR) page layout mark-up.
        $before = 'span6 desktop-first-column';
        $behind = 'span6 pull-right';
        $contextheaderleft = $before;
        $contextheaderright = $behind;
        // Reset layout mark-up for RTL languages.
        if (right_to_left()) {
            $before = 'span6 pull-right';
            $behind = 'span6 desktop-first-column';
            $contextheaderleft = $behind;
            $contextheaderright = $before;
        }

        $html = html_writer::start_div('page-context-header',
                array('id' => 'context-header-left', 'class' => $contextheaderleft));
        // Image data.
        if (isset($contextheader->imagedata)) {

            // Header specific image.
            $html .= html_writer::div($contextheader->imagedata, 'page-header-image');
            $html .= html_writer::tag('div', '',
            array('id' => 'context-header-right', 'class' => 'page-context-header ' . $contextheaderright));
        }

        // Headings.
        if (!isset($contextheader->heading)) {
            $headings = $this->heading($this->page->heading, $contextheader->headinglevel);
        } else {
            $headings = $this->heading($contextheader->heading, $contextheader->headinglevel);
        }

        $html .= html_writer::tag('div', $headings, array('class' => 'page-header-headings'));

        // Buttons.
        if (isset($contextheader->additionalbuttons)) {
            $html .= html_writer::start_div('btn-group header-button-group');
            foreach ($contextheader->additionalbuttons as $button) {
                if (!isset($button->page)) {
                    // Include js for messaging.
                    if ($button['buttontype'] === 'message') {
                        message_messenger_requirejs();
                    }
                    $image = $this->pix_icon($button['formattedimage'], $button['title'], 'moodle', array(
                        'class' => 'iconsmall',
                        'role' => 'presentation'
                    ));
                    $image .= html_writer::span($button['title'], 'header-button-title');
                } else {
                    $image = html_writer::empty_tag('img', array(
                        'src' => $button['formattedimage'],
                        'role' => 'presentation'
                    ));
                }
                $html .= html_writer::end_div();
            }
            $html .= html_writer::link($button['url'], html_writer::tag('span', $image), $button['linkattributes']);
        }
        $html .= html_writer::end_div();

        return $html;
    }

    /**
     * Wrapper for header elements.
     *
     * @return string HTML to display the main header.
     */
    public function full_header() {
        $html = html_writer::start_tag('header', array('id' => 'page-header', 'class' => 'span12 clearfix'));
        $html .= $this->context_header();
        $html .= html_writer::start_div('clearfix', array('id' => 'page-navbar'));
        $html .= html_writer::tag('nav', $this->navbar(), array('class' => 'breadcrumb-nav'));
        $html .= html_writer::div($this->page_heading_button(), 'breadcrumb-button');
        $html .= html_writer::end_div();
        $html .= html_writer::tag('div', $this->course_header(), array('id' => 'course-header'));
        $html .= html_writer::end_tag('header');
        return $html;
    }
}
