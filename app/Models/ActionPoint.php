<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActionPoint extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'point',
        'blob',
    ];

    public function setBlobAttribute(){
        $this->attributes['blob'] = '';
    }
}
