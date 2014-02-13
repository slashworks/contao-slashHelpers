<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * @package SlashHelpers
 * @link    http://www.slash-works.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace SlashHelper;

use Controller;

/**
 * Class SlashHelper
 *
 * Singletone base for slashHelpers
 * @copyright  Joe Ray Gregory 2012 - 2014
 * @author     Joe Ray Gregory <http://www.slash-works.de>
 * @package    SlashHelpers
 */
 
class SlashHelper extends Controller
{

    /**
     * Singleton buffer
     * @var null
     */
    static protected $instance = null;

    /**
     * Singleton constructor
     * @return SlashHelper
     */
    static protected function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new SlashHelper();
        }
        return static::$instance;
    }

    /**
     * Prevent cloning of the object (Singleton)
     */
    final public function __clone() {}

}
