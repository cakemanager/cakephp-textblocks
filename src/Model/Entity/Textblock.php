<?php
namespace TextBlocks\Model\Entity;

use Cake\ORM\Entity;

/**
 * Textblock Entity.
 */
class Textblock extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'alias' => true,
        'title' => true,
        'body' => true,
    ];
}
