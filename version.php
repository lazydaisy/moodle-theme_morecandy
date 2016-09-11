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
 * @copyright  2016 byLazyDaisy.uk
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;


$plugin->component    = 'theme_morecandy';
$plugin->maturity     = MATURITY_STABLE;           // This version's maturity level.
$plugin->release      = '3.1.3 (Build: 20160911)'; // Human-friendly version name.
$plugin->requires     = 2016052301;                // This version of Moodle 3.1rc1 (Build: 20160517).
$plugin->version      = 2016071800;                // Latest build date. YYYYMMDD.
$plugin->dependencies = array(                     // The version of the parent theme.
    'theme_bootstrapbase'  => 2016052300,
);

