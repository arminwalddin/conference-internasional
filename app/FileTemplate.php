<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileTemplate extends Model
{
    use SoftDeletes;

    public $table = 'file_template';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'path',
        'category',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
