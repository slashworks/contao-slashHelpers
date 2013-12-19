<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
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
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'SlashHelper\SlashHelper'   => 'system/modules/slashHelpers/classes/SlashHelper.php',
	'SlashHelper\HelperFile'   => 'system/modules/slashHelpers/classes/HelperFile.php',
	'SlashHelper\HelperDca'   => 'system/modules/slashHelpers/classes/HelperDca.php',
	'SlashHelper\HelperAssets'   => 'system/modules/slashHelpers/classes/HelperAssets.php',
	'SlashHelper\HelperTemplate'   => 'system/modules/slashHelpers/classes/HelperTemplate.php',
	'SlashHelper\HelperUrl'   => 'system/modules/slashHelpers/classes/HelperUrl.php'

));
