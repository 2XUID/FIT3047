<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Enquiry Entity
 *
 * @property int $enquiry_id
 * @property string $enquiry_full_name
 * @property string $enquiry_email
 * @property string $enquiry_body
 * @property \Cake\I18n\FrozenTime|null $enquiry_created_time
 * @property bool $enquiry_email_sent
 */
class Enquiry extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'enquiry_full_name' => true,
        'enquiry_email' => true,
        'enquiry_body' => true,
        'enquiry_created_time' => true,
        'enquiry_email_sent' => true,
    ];
}
