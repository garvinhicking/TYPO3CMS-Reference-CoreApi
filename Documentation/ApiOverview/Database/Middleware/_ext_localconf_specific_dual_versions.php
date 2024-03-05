<?php

declare(strict_types=1);

use MyVendor\MyExtension\Doctrine\Driver\MyDriverMiddleware;
use TYPO3\CMS\Core\Information\Typo3Version;

defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['driverMiddlewares']['driver-middleware-identifier']
    = ((new Typo3Version())->getMajorVersion() < 13)
    ? MyDriverMiddleware::class
    : [
        'target' => MyDriverMiddleware::class,
        'after' => [
            // NOTE: Custom driver middleware should be registered after essential
            //       TYPO3 Core driver middlewares. Use the following identifiers
            //       to ensure that.
            'typo3/core/custom-platform-driver-middleware',
            'typo3/core/custom-pdo-driver-result-middleware',
        ],
    ];
