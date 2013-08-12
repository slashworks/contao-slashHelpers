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
	'SW',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'SW\DcaHelper'   => 'system/modules/slashHelpers/DcaHelper.php',
	'SW\SlashHelper' => 'system/modules/slashHelpers/SlashHelper.php',
));
