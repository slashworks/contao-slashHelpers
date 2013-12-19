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


class HelperUrl extends SlashHelper
{


    /**
     * getUrl by Page Id
     * @param $pageId
     * @return string
     */
    public static function fromPageId($pageId)
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