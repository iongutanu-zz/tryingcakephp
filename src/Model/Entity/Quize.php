<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quize Entity.
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property string $logo
 * @property string $sponsor_logo
 * @property string $short_description
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Question[] $questions
 */
class Quize extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
