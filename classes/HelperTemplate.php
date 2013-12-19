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

        $GLOBALS['TL_MOOTOOLS'][] = $tpl->parse();
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


} 