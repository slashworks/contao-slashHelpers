<?php

/**
 * Class Assets
 *
 * Static helper class for Assets
 * @copyright  Joe Ray Gregory 2012 - 2013
 * @author     Joe Ray Gregory <http://www.slash-works.de>
 * @package    SlashHelpers
 */

namespace SlashHelper;


class HelperAssets extends SlashHelper {

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


} 