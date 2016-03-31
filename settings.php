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
 * Moodle's cle theme, an example of how to make a Bootstrap theme
 *
 * DO NOT MODIFY THIS THEME!
 * COPY IT FIRST, THEN RENAME THE COPY AND MODIFY IT INSTEAD.
 *
 * For full information about creating Moodle themes, see:
 * http://docs.moodle.org/dev/Themes_2.0
 *
 * @package   theme_morecandy
 * @copyright 2016 byLazyDaisy.uk
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // @sidewayHeaderColor setting.
    $name = 'theme_morecandy/sidewayheadercolor';
    $title = get_string('sidewayheadercolor', 'theme_morecandy');
    $description = get_string('sidewayheadercolor_desc', 'theme_morecandy');
    $default = '#336699';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Brand icon.
    $name = 'theme_morecandy/brandicon';
    $title = get_string('brandicon','theme_morecandy');
    $description = get_string('brandicondesc', 'theme_morecandy');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'brandicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Welcome note setting
    $name = 'theme_morecandy/welcomenote';
    $title = get_string('welcomenote','theme_morecandy');
    $description = get_string('welcomenotedesc', 'theme_morecandy');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Logo file setting.
    $name = 'theme_morecandy/logo';
    $title = get_string('logo','theme_morecandy');
    $description = get_string('logodesc', 'theme_morecandy');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Custom CSS file.
    $name = 'theme_morecandy/customcss';
    $title = get_string('customcss', 'theme_morecandy');
    $description = get_string('customcssdesc', 'theme_morecandy');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Footnote setting.
    $name = 'theme_morecandy/footnote';
    $title = get_string('footnote', 'theme_morecandy');
    $description = get_string('footnotedesc', 'theme_morecandy');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Theme overrides custom menu setting...
    $name = 'theme_morecandy/custommenuitems';
    $title = get_string('custommenuitems', 'admin');
    $description = get_string('configcustommenuitems', 'admin');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);
}
