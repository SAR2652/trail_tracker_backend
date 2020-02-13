<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    protected $table = 'camera';
    protected $primaryKey = 'camera_id';
    public $timestamps = false;
}
