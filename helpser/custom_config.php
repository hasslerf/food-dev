<?php
/**
 * - this file contains the specific configuration for your foodcoop
 * - configurations in config.php can be overriden in this file
 * - please rename it to "custom_config.php" to use it
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
    'debug' => true,
    'EmailTransport' => [
        'default' => [
            'className' => 'Smtp',
            'host' => 'food-mailhog',
            'port' => 1025,
            'timeout' => 30,
            'username' => '',
            'password' => '',
            'client' => null,
            'tls' => null,
        ]
    ],
    'Email' => [
        'default' => [
            'from' => ['default-mail@food.test' => 'FoodDev Local'], // [email-address => name] syntax necessary (not only [email]
        ]
    ],
    'Datasources' => [
        'default' => [
            'host' => 'food-db',
            'username' => 'fooddb',
            'password' => 'food&321§db',
            'database' => 'fooddb',
            'prefix' => 'fcs_'
        ]
    ],

    /**
     * A random string used in security hashing methods.
     */
    'Security' => [
        'salt' => 'cb23b6a13fc9dfdb1865d2efa04909dd3a4c08de9c9fea53f5a75b0de252ff71'
    ],

    'app' => [
        
        'discourseSsoEnabled' => false,

        /**
         * A random string used for Discourse SSO
         */
        'discourseSsoSecret' => '',

        /**
         * optional: message that is displayed in the dialog where order-detail status can be changed (/admin/order-details)
         */
        'additionalOrderStatusChangeInfo' => '',

        /**
         * your host's name, eg. http://www.yourfoodcoop.com
         */
        'cakeServerName' => 'http://food.test',

        /**
         * whether to apply a member fee to the members account balance
         */
        'memberFeeEnabled' => false,

        /**
         * cronjob needs to be activated / deactivated too if you change emailOrderReminderEnabled
         * @see https://foodcoopshop.github.io/en/cronjobs
         */
        'emailOrderReminderEnabled' => true,

        /**
         * valid options of array: 'cashless' or 'cash' (or both but this is not recommended)
         */
        'paymentMethods' => [
            'cashless'
        ]

    ]
];
