<?php
/**
 * Created by PhpStorm.
 * User: jrgregory
 * Date: 26.02.14 | KW 9
 * Time: 14:39
 */

namespace SlashHelper;


class HelperConfig extends SlashHelper {

    static private function register($type, $where, $key, $className)
    {

        if(!is_string($type))
            return false;

        switch($type)
        {
            case 'BE_MOD':
                break;

            case 'FE_MOD':
                break;

            case 'TL_CTE':

                $t = array();

                $t[$key] = $className;

                self::_checkRegistration(array
                    (
                        'needle' => $key,
                        'haystack' => $GLOBALS[$type][$where]
                    ),
                    //TODO Fix this Problem!
                    function($where, $t) {

                        array_insert(
                            $GLOBALS['TL_CTE'][$where],
                            2,
                            $t
                        );
                    }
                );

                break;

            case 'BE_FFL':
                break;

            case 'TL_FFL':
                break;

            case 'TL_PTY':
                break;

            case 'TL_MAINTENANCE':
                break;

            case 'TL_PURGE':
                break;

            case 'TL_CROP':
                break;

            case 'TL_CRON':
                break;

            case 'TL_HOOKS':
                break;

            case 'TL_AUTO_ITEM':
                break;

            case 'TL_NOINDEX_KEYS':
                break;

            case 'TL_WRAPPERS':
                break;

            case 'TL_MIME':
                break;

            case 'TL_PERMISSIONS':
                break;

            case 'TL_MODELS':
                break;
        }

    }

    static private function _checkRegistration($rules = array(), $callback) {

        if(count($rules) != 2)
        {
            throw new \Exception('Please check the needle and haystack value!');
        }

        if(!array_key_exists($rules['needle'], $rules['haystack']))
        {
            $callback();
        }

        else
        {
            throw new \Exception("The key ".$key." already exists. If you wanna override the key, please use the method override");
        }
    }

    public function addCE($where, $key, $className, $pos=0)
    {
        self::register('TL_CTE', $where, $key, $className, $pos);
    }


} 