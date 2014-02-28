<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package SlashHelpers
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'SlashHelper',
	'SW',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'SlashHelper\HelperAssets'   => 'system/modules/slashHelpers/classes/HelperAssets.php',
	'SlashHelper\HelperConfig'   => 'system/modules/slashHelpers/classes/HelperConfig.php',
	'SlashHelper\HelperDca'      => 'system/modules/slashHelpers/classes/HelperDca.php',
	'SlashHelper\HelperFile'     => 'system/modules/slashHelpers/classes/HelperFile.php',
	'SlashHelper\HelperTemplate' => 'system/modules/slashHelpers/classes/HelperTemplate.php',
	'SlashHelper\HelperUrl'      => 'system/modules/slashHelpers/classes/HelperUrl.php',
	'SlashHelper\SlashHelper'    => 'system/modules/slashHelpers/classes/SlashHelper.php',

	// Fallback
	'SW\SlashHelper'             => 'system/modules/slashHelpers/fallback/SlashHelper.php',
));
