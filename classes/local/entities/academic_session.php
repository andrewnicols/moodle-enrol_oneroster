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
 * One Roster Enrolment Client.
 *
 * @package    enrol_oneroster
 * @copyright  Andrew Nicols <andrew@nicols.co.uk>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace enrol_oneroster\local\entities;

use enrol_oneroster\local\interfaces\container as container_interface;
use enrol_oneroster\local\endpoints\rostering as rostering_endpoint;
use enrol_oneroster\local\entity;
use stdClass;
use OutOfRangeException;

/**
 * One Roster academicSession entity.
 *
 * @package    enrol_oneroster
 * @copyright  Andrew Nicols <andrew@nicols.co.uk>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class academic_session extends entity {

    /**
     * Get the operation ID for the endpoint, otherwise known as the name of the endpoint.
     *
     * @param   container_interface $container
     * @return  string
     */
    protected static function get_operation_id(container_interface $container): string {
        return static::get_generic_operation_id($container);
    }

    /**
     * Get the operation ID for the endpoint which returns the generic representation of this type.
     *
     * For example a school is a subtype of the organisation object. You can fetch a school from the organisatino
     * endpoint, but you cannot fetch an organisation from the school endpoint.
     *
     * @param   container_interface $container
     * @return  string
     */
    protected static function get_generic_operation_id(container_interface $container): string {
        return rostering_endpoint::getAcademicSession;
    }

    /**
     * Parse the data returned from the One Roster Endpoint.
     *
     * @param   container_interface $container The container for this client
     * @param   stdClass $data The raw data returned from the endpoint
     * @return  stdClass The parsed data
     */
    protected static function parse_returned_row(container_interface $container, stdClass $data): stdClass {
        // Some invalid properties exist, for example in the Aeries implementation.
        $properties = [
            'academicSession',
            'term',
        ];

        foreach ($properties as $property) {
            if (property_exists($data, $property)) {
                return $data->{$property};
            }
        }
        throw new OutOfRangeException("The returned data is missing the 'academicSession' property");
    }
}
