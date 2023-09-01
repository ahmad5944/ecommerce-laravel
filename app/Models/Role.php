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
class Role extends Model
{

    static $rules = [
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','guard_name'];

}
