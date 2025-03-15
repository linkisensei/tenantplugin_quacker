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
 * Version information for tenantplugin_quacker
 * 
 * This plugins purpose is to test the local_tenant plugin
 *
 * @package    tenantplugin_quacker
 * @copyright  2025 Lucas barreto <lucas.b.fisica@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component    = 'tenantplugin_quacker';
$plugin->release      = '1.0';
$plugin->version      = 2025031401;
$plugin->requires     = 2023042400;
$plugin->supported    = [402, 405];
$plugin->maturity     = MATURITY_STABLE;
