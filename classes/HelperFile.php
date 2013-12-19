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


class HelperFile extends SlashHelper {


    /**
     * getTheImagePath from id
     * @param $fileId
     * @return mixed|null|string
     */
    public static function getPath($fileId)
    {
        if ($fileId == '')
        {
            return '';
        }

        $objModel = \FilesModel::findByUuid($fileId);

        if ($objModel === null)
        {
            if (!\Validator::isUuid($fileId))
            {
                return '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
            }
        }
        elseif (is_file(TL_ROOT . '/' . $objModel->path))
        {

            return $objModel->path;
        }
    }


} 