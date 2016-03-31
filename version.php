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
 * Theme Morecandy version file.
 *
 * @package    theme_morecandy
 * @copyright  2015 byLazyDaisy.uk
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;


$plugin->component    = 'theme_morecandy';
$plugin->maturity     = MATURITY_ALPHA; // This version's maturity level.
$plugin->release      = '3.1 (Build: 2016)'; // Human-friendly version name                    // This version's branch.
$plugin->requires     = 2016032400;
$plugin->version      = 2016033100; // Previously Morecandy 3.0.

$plugin->dependencies = array(
    'theme_bootstrapbase'  => 2015111600,
);
