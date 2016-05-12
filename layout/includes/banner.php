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
 * The one column layout.
 *
 * @package   theme_morecandy
 * @copyright 2016 byLazyDaisy.uk
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Set custommenu for frontpage only.
$custommenu = $OUTPUT->custom_menu($PAGE->theme->settings->custommenuitems);
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));
?>

<div role="banner" class="navbar navbar-fixed-top moodle-has-zindex">
    <nav role="navigation" class="navbar-inner">
    <div class="container-fluid">
    <?php echo $html->brandicon; ?>
    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <?php echo $OUTPUT->user_menu(); ?>

    <div class="nav-collapse collapse"><?php

    if ($hascustommenu && !isloggedin()) {
        echo $custommenu;
    } else {
        echo $OUTPUT->custom_menu();
    } ?>
        <ul class="nav pull-right">
            <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
        </ul>
    </div>

    </div>
    </nav>
</div><?php

echo $html->banner;