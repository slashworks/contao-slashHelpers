<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * @package BoziHelpers
 * @link    http://www.borowiakziehe.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

namespace SlashHelper;

/**
 * Class DcaHelper
 *
 * Helper class for dca
 * @copyright  Joe Ray Gregory 2012
 * @author     Joe Ray Gregory <http://www.borowiakziehe.de>
 * @package    BoziHelpers
 */

class HelperDca extends \Controller {

    /**
     * buffer for table name
     * @var string
     */
    public static $table;

    private static $_instance = null;

    /**
     * Basic palletes as blueprint
     * @var array
     */
    public static $basicPalettes = array
    (
        'cebasic' => '{type_legend},type;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop'
    );

    /**
     * save the table
     * @param $table
     */
    public function __construct(){}

    public static function table($table)
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
            self::$table = $table;
        }

        return self::$_instance;
    }

    /**
     * extend a palette
     *
     * @param string $palette name of the palette
     * @param string $newItemStr name of the item
     * @param string $toReplaceStr optional replace string
     * @return $this for chaining
     */

    public function extendPalette($palette, $newItemStr, $toReplaceStr = '')
    {

        if($toReplaceStr && is_string($toReplaceStr)) {


            $pos = strpos($GLOBALS['TL_DCA'][self::$table]['palettes'][$palette],$toReplaceStr);

            if ($pos !== false) {
                $GLOBALS['TL_DCA'][self::$table]['palettes'][$palette] = substr_replace($GLOBALS['TL_DCA'][self::$table]['palettes'][$palette],$toReplaceStr.$newItemStr,$pos,strlen($toReplaceStr));
            }

        } else {

            $GLOBALS['TL_DCA'][self::$table ]['palettes'][$palette] = $GLOBALS['TL_DCA'][self::$table ]['palettes'][$palette].';'.$newItemStr;

        }

        return $this;

    }

    /**
     * add a new palette
     * @param $palette
     * @param $newItemStr
     * @return $this
     */

    public function addPalette($palette, $newItemStr=false) {

        if(is_string($palette)) {
            $GLOBALS['TL_DCA'][self::$table]['palettes'][$palette] = $newItemStr;
        } else if(is_array($palette) && count($palette) >= 2) {
            self::clonePalette($palette);
        }

        return $this;

    }

    /**
     * Method to clone an existing palette
     * @param array $dataArr
     * @return $this
     */

    public function clonePalette(array $dataArr)
    {
        // make array readable
        $newPalette = $dataArr[0];
        $copyPalette = $dataArr[1];
        $newItem = $dataArr[2];
        $toReplace = $dataArr[3];

        // Check if item is a basic element
        if(array_key_exists($copyPalette, self::$basicPalettes)) {
            //add a palette
            self::addPalette($newPalette, self::$basicPalettes[$copyPalette]);
        } else {
            //add a palette
            self::addPalette($newPalette, $GLOBALS['TL_DCA'][self::$table]['palettes'][$copyPalette]);
        }

        // Check if thre is a newItem and extend it
        if($newItem) {
            self::extendPalette($dataArr[0], $newItem, $toReplace);
        }

        return $this;
    }

    /**
     * Add fields to dca
     *
     * @param array $fieldsArr dca field array
     * @return $this
     */
    public function addFields($fieldsArr = array())
    {

        $GLOBALS['TL_DCA'][self::$table]['fields'] = array_merge($GLOBALS['TL_DCA'][self::$table]['fields'], $fieldsArr);
        return $this;

    }

    /**
     * add a new selector
     * @param array $itemArr
     * @return $this
     */

    public function addSelector(array $itemArr)
    {

        if(is_array($itemArr))
        {
            $GLOBALS['TL_DCA'][self::$table]['palettes']['__selector__'] = array_merge($GLOBALS['TL_DCA'][self::$table]['palettes']['__selector__'], $itemArr);
        }

        return $this;

    }

    /**
     * Add Item to subpalette
     * @param $paletteName
     * @param $paletteStr
     * @param bool $addSelector
     * @return $this
     */

    public function addSubpalette($paletteName, $paletteStr, $addSelector = false)
    {

        $GLOBALS['TL_DCA'][self::$table]['subpalettes'][$paletteName] = $paletteStr;

        if($addSelector)
            $this->addSelector(array($paletteName));

        return $this;

    }
}
