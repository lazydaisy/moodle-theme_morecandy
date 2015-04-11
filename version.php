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
 * Theme Morecansy version file.
 *
 * @package    theme_morecandy
 * @copyright  2015 byLazyDaisy.uk
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;


$plugin->version   = 2015030502;
$plugin->maturity  = 'RELEASE_CANDIDATE';
$plugin->release   = '2.00 (Build: 2015041000)';
$plugin->requires  = 2014110400;
$plugin->component = 'theme_morecandy';
$plugin->dependencies = array(
    'theme_bootstrapbase'  => 2014110400,
    'theme_clean'  => 2014110400,
);

