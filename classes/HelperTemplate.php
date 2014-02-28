<?php

/**
 * Class Assets
 *
 * Static helper class for File
 * @copyright  Joe Ray Gregory 2012 - 2013
 * @author     Joe Ray Gregory <http://www.slash-works.de>
 * @package    SlashHelpers
 */

namespace SlashHelper;


use Contao\BackendTemplate;
use Contao\FrontendTemplate;

class HelperTemplate extends SlashHelper
{

    /**
     * generate mootools template
     * @param $tplName
     * @param array $tplVars
     * @throws Exception
     */

    public static function mootools($tplName, $tplVars = array())
    {

        self::addJsTemplate('MOOTOOLS', $tplName, $tplVars);

    }

    /**
     * generate jquery template
     * @param $tplName
     * @param array $tplVars
     * @throws Exception
     */

    public static function jquery($tplName, $tplVars = array())
    {

        self::addJsTemplate('JQUERY', $tplName, $tplVars);

    }


    /**
     * Generates a wildcard Template for Backend
     * @param $wildcard
     * @param bool $title
     * @return BackendTemplate
     * @throws Exception
     */
    public static function wildCard($wildcard, $title=false)
    {
        if(is_string($wildcard))
        {
            $tplname = 'be_wildcard';
            $tpl = new \BackendTemplate($tplname);
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
     * Generate js templates
     * @param $type
     * @param $tplName
     * @param array $tplVars
     * @throws Exception
     */

    private static function addJsTemplate($type, $tplName, $tplVars = array())
    {
<<<<<<< HEAD

        if(is_string($tplName))
        {
            $tpl =  (TL_MODE === 'FE') ? new \FrontendTemplate($tplName) : new \BackendTemplate($tplName);
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

        $GLOBALS['TL_'.$type][] = $tpl->parse();

=======

        if(is_string($tplName))
        {
            $tpl =  (TL_MODE === 'FE') ? new \FrontendTemplate($tplName) : new \BackendTemplate($tplName);
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

        $GLOBALS['TL_'.$type][] = $tpl->parse();

>>>>>>> FETCH_HEAD
    }
} 
