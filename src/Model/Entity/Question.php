<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity.
 *
 * @property int $id
 * @property int $quize_id
 * @property \App\Model\Entity\Quize $quize
 * @property string $title
 * @property string $subtitle
 * @property string $logo
 * @property string $question_text
 * @property string $answer_a
 * @property string $answer_b
 * @property bool $correct_answer
 * @property int $total_correct_answers
 * @property int $total_answers
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Question extends Entity
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
