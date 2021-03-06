# Moodle OneRoster Enrolment plugin

The `enrol_oneroster` plugin for Moodle is an Enrolment plugin which supports Version 1.1 of the [IMS OneRoster](https://www.imsglobal.org/activity/onerosterlis) REST specification.

The Moodle OneRoster Enrolment plugin is an IMS Certified plugin.

[![IMS Global Certified](https://www.imsglobal.org/sites/default/files/IMSconformancelogoREG.png)](https://www.imscert.org)

This implementation currently supports the following features:

- Authentication via
  - OAuth 2.0
  - OAuth 1.0a
- Creation of users associated with a School
- Assignation of Parent roles to individual students
- Creation, and Update of Moodle courses from OneRoster Class data, including provision of:
  - Start date
  - End date
- Creation, Update, and Removal of Enrolment records for students, and teachers to each course

The following features are currently not implemented but are planned for future development:

- Support for the OneRoster Gradebook Consumer/Provider specification
- OneRoster Version 1.2

There are currently no plans to add support for the CSV Implementation of the OneRoster specification.

## Important information

**Please note that this plugin is currently in ALPHA development and not suitable for production environments.**

## Installation

Download the latest version of the plugin and unzip or copy to the `enrol/oneroster` folder of your Moodle installation.
