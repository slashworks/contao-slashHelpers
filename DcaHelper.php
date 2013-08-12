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

namespace SW;

/**
 * Class DcaHelper
 *
 * Helper class for dca
 * @copyright  Joe Ray Gregory 2012
 * @author     Joe Ray Gregory <http://www.borowiakziehe.de>
 * @package    BoziHelpers
 */

class DcaHelper extends \Controller {

    /**
     * buffer for table name
     * @var string
     */
    public $table;

    /**
     * Basic palletes as blueprint
     * @var array
     */
    public $basicPalettes = array
    (
        'cebasic' => '{type_legend},type;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop'
    );

    /**
     * save the table
     * @param $table
     */
    public function __construct($table)
    {

        if(is_string($table)) {
            $this->table = $table;
        }

    }

    /**
     * extend a palette
     *
     * @param string $palette name of the palette
     * @param string $newItemStr name of the item
     * @param string $toReplaceStr optional replace string
     * @return $this for chaining
     */

    protected function extendPalette($palette, $newItemStr, $toReplaceStr = '')
    {

        if($toReplaceStr && is_string($toReplaceStr)) {

            $GLOBALS['TL_DCA'][$this->table]['palettes'][$palette] = str_replace
            (
                $toReplaceStr,
                $newItemStr,
                $GLOBALS['TL_DCA'][$this->table]['palettes'][$palette]
            );

        } else {

            $GLOBALS['TL_DCA'][$this->table ]['palettes'][$palette] = $GLOBALS['TL_DCA'][$this->table ]['palettes'][$palette].';'.$newItemStr;

        }

        return $this;

    }

    /**
     * add a new palette
     * @param $palette
     * @param $newItemStr
     * @return $this
     */

    protected function addPalette($palette, $newItemStr=false) {

        if(is_string($palette)) {
            $GLOBALS['TL_DCA'][$this->table ]['palettes'][$palette] = $newItemStr;
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

    protected function clonePalette(array $dataArr)
    {
        // make array readable
        $newPalette = $dataArr[0];
        $copyPalette = $dataArr[1];
        $newItem = $dataArr[2];
        $toReplace = $dataArr[3];

        // Check if item is a basic element
        if(array_key_exists($copyPalette, $this->basicPalettes)) {
            //add a palette
            self::addPalette($newPalette, $this->basicPalettes[$copyPalette]);
        } else {
            //add a palette
            self::addPalette($newPalette, $GLOBALS['TL_DCA'][$this->table]['palettes'][$copyPalette]);
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
    protected function addFields($fieldsArr = array())
    {

        $GLOBALS['TL_DCA'][$this->table]['fields'] = array_merge($GLOBALS['TL_DCA'][$this->table]['fields'], $fieldsArr);
        return $this;

    }

    /**
     * add a new selector
     * @param array $itemArr
     * @return $this
     */

    protected function addSelector(array $itemArr)
    {

        if(is_array($itemArr))
        {
            $GLOBALS['TL_DCA'][$this->table]['palettes']['__selector__'] = array_merge($GLOBALS['TL_DCA'][$this->table]['palettes']['__selector__'], $itemArr);
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

    protected function addSubpalette($paletteName, $paletteStr, $addSelector = false)
    {

        $GLOBALS['TL_DCA'][$this->table]['subpalettes'][$paletteName] = $paletteStr;

        if($addSelector)
            $this->addSelector(array($paletteName));

        return $this;

    }
}