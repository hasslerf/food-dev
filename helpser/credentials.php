<?php
/**
 * credentials.default.php
 * please rename this file to "credentials.php" to use it
 *
 * FoodCoopShop - The open source software for your foodcoop
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @since         FoodCoopShop 1.0.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @author        Mario Rothauer <office@foodcoopshop.com>
 * @copyright     Copyright (c) Mario Rothauer, https://www.rothauer-it.com
 * @link          https://www.foodcoopshop.com
 */

return [

    'app' => [

        /**
         * the cronjobs for sending order lists and invoices need the credentials to a valid superadmin account
         */
        'adminEmail' => 'admin@food.test',
        'adminPassword' => 'Food123!',

        /**
         * set to true if you want to receive debug emails when exceptions are triggered
         */
        'emailErrorLoggingEnabled' => true,

        /**
         * TO address
         * when exceptions are triggered, emails are sent TO this email address
         */
        'debugEmail' => 'debugmail@food.test',

        /**
         * this email address
         * - receives the test email of url: /email /admin/configurations/sendTestEmail
         * - must have a valid customer record (which is never shown in customer list)
         * - receives the database dumps of BackupDatabase Shell
         */
        'hostingEmail' => 'hostingmail@food.test',

        /**
         * FALLBACK email config
         * when the main email config in custom_config.php is wrong, you can define this fallback email config
         * to send the emails despite a wrong main config
         * if you don't want to use the email fallback, leave it commented
         */
        'EmailTransport' => [
            'fallback' => [
                'emailFormat' => 'html',
                'className' => 'Smtp',
                'host' => 'food-mailhog',
                'port' => 1025,
                'timeout' => 30,
                'username' => '',
                'password' => '',
                'client' => null,
                'tls' => null,
            ],
        ],

        'Email' => [
            'fallback' => [
                'from' => ['fallback@food.test'], // only use email address here (no [mail => name] syntax!)
                'charset' => 'utf-8',
                'headerCharset' => 'utf-8',
            ],
        ],

    ],

    /**
     * DEBUG email config
     * emails are sent FROM this email configuration if emailErrorLoggingEnabled is set to true
     * needs to be configured to run BackupDatabaseShell
     */
    'EmailTransport' => [
        'debug' => [
            'emailFormat' => 'html',
            'className' => 'Smtp',
            'host' => 'food-mailhog',
            'port' => 1025,
            'timeout' => 30,
            'username' => '',
            'password' => '',
            'client' => null,
            'tls' => null,
        ],
    ],
    'Email' => [
        'debug' => [
            'from' => ['emaildebug@food.test' => 'Debug-Emailer'],
            'charset' => 'utf-8',
            'headerCharset' => 'utf-8',
        ],
    ],

];
