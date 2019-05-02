<?php

namespace App\Entity;

use \DateTime;
use \Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'commune';

    /**
     * Indicates if the model should be timestamped
     *
     * @var boolean
     */
    public $timestamps = false;

    protected $visible = [
        'nom',
        'departement',
        'code_postal',
        'adresse',
        'id'
    ];
}