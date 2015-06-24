<?php
/**
 * CakeManager (http://cakemanager.org)
 * Copyright (c) http://cakemanager.org
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) http://cakemanager.org
 * @link          http://cakemanager.org CakeManager Project
 * @since         1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace TextBlocks\Utility;

use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

class TBlox
{

    protected static $_storage = [];

    protected static $_model = 'TextBlocks.Textblocks';

    public static function title($alias, $vars = null)
    {
        if (!$vars) {
            $vars = [];
        }
        $content = self::get($alias, 'title');

        return Text::insert($content, $vars);
    }

    public static function body($alias, $vars = null)
    {
        if (!$vars) {
            $vars = [];
        }
        $content = self::get($alias, 'body');

        return Text::insert($content, $vars);
    }

    public static function model($model = null)
    {
        if ($model) {
            static::$_model = $model;
        }
        return static::$_model;
    }

    public static function register($alias)
    {
        $model = TableRegistry::get(self::$_model);
        $query = $model->findByAlias($alias);
        if (!$query->count()) {
            $entity = $model->newEntity([
                'alias' => $alias
            ]);
            $model->save($entity);
        }
    }

    protected static function get($alias, $type = null)
    {
        if (!$type) {
            $type = 'body';
        }

        if (array_key_exists($alias, static::$_storage)) {
            return static::$_storage[$alias][$type];
        }

        $model = TableRegistry::get(self::model());
        $query = $model->findByAlias($alias);

        if ($query->count()) {
            $data = $query->first();

            static::$_storage[$alias] = [
                'title' => $data->get('title'),
                'body' => $data->get('body'),
            ];

            return static::$_storage[$alias][$type];
        }
        return null;
    }
}
