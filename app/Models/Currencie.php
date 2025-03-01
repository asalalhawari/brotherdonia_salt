<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currencie extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'Code',
        'AR',
        'EN',
    ];

    public function setBlobAttribute(){
        $this->attributes['blob'] = '';
    }
}

