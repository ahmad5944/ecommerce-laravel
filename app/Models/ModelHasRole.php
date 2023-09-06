<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Test
 *
 * @property $id
 * @property $nama
 * @property $umur
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ModelHasRole extends Model
{

    static $rules = [
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['role_id','model_type','model_id'];

}
