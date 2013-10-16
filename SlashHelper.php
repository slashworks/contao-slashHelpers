<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * @package SlashHelpers
 * @link    http://www.borowiakziehe.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace SW;

use Controller;
use BackendTemplate;
use FrontendTemplate;
use FilesModel;

/**
 * Class CtoTplHelper
 *
 * Static helper class for templates
 * @copyright  Joe Ray Gregory 2012
 * @author     Joe Ray Gregory <http://www.borowiakziehe.de>
 * @package    BoziHelpers
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

    /**
     * generate mootools template
     * @param $tplName
     * @param array $tplVars
     * @throws Exception
     */
    public static function addMooTemplate($tplName, $tplVars = array())
    {
        if(is_string($tplName))
        {
            $tpl =  (TL_MODE === 'FE') ? new FrontendTemplate($tplName) : new BackendTemplate($tplName);
            if($tplVars && is_array($tplVars) && count($tplVars) > 0)
            {
                foreach($tplVars as $key=>$val)
                {
                    $tpl->$key = $val;
                }
            }
        }
        else
        {
            throw new Exception('ERROR: Parameter 1 of method '.__METHOD__.' must be a string');
        }

        $GLOBALS['TL_MOOTOOLS'][] = $tpl->parse();
    }

    /**
     * Adds a javascript file to the head
     * @param $path
     * @throws Exception
     */
    public static function addJS($path)
    {
        if(is_string($path))
        {
            $GLOBALS['TL_JAVASCRIPT'][] = $path;
        }
        else
        {
            throw new Exception('ERROR: Parameter 1 of method '.__METHOD__.' must be a string');
        }
    }

    /**
     * Adds a css file to the head
     * @param $path
     * @param bool $media
     * @throws Exception
     */
    public static function addCSS($path, $media=false)
    {
        if(is_string($path))
        {
            $cssPathStr = (is_string($media)) ? $path.'|'.$media: $path;
            $GLOBALS['TL_CSS'][] = $cssPathStr;
        } else {
            throw new Exception('ERROR: Parameter 1 of method '.__METHOD__.' must be a string');
        }
    }

    /**
     * Generates a wildcard Template for Backend
     * @param $wildcard
     * @param bool $title
     * @return BackendTemplate
     * @throws Exception
     */
    public static function generateWildCardTpl($wildcard, $title=false)
    {
        if(is_string($wildcard))
        {
            $tplname = 'be_wildcard';
            $tpl = new BackendTemplate($tplname);
            $tpl->wildcard = '### '.$wildcard.' ###';

            if(is_string($title))
            {
                $tpl->title = $title;
            }
            return $tpl;
        }
        else
        {
            throw new Exception('ERROR: Parameter 1 of method '.__METHOD__.' must be a string');
        }
    }
    
    /**
     * getTheImagePath from id
     * @param $fileId
     * @return mixed|null|string
     */
    public static function getImagePath($fileId)
    {
        return static::getFilePath($fileId);
    }

    /**
     * getTheImagePath from id
     * @param $fileId
     * @return mixed|null|string
     */
    public static function getFilePath($fileId)
    {
        if ($fileId == '')
        {
            return '';
        }

        if (!is_numeric($fileId))
        {
            return '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
        }

        $objFile = FilesModel::findByPk($fileId);

        if ($objFile === null || !is_file(TL_ROOT . '/' . $objFile->path))
        {
            return '';
        }

        return $objFile->path;
    }
    
    /**
     * getUrl by Page Id
     * @param $pageId
     * @return string
     */

    public static function getUrlByPageId($pageId)
    {
        $domain = \Environment::get('base');
        $objParent = \PageModel::findWithDetails($pageId);

        if ($objParent->domain != '')
        {
            $domain = (\Environment::get('ssl') ? 'https://' : 'http://') . $objParent->domain . TL_PATH . '/';
        }

        return $domain . \Frontend::generateFrontendUrl($objParent->row(), false, $objParent->language);
    }
}
