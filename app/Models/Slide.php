<?php

namespace App\Models;

use App\Models\Traits\HasMediaTrait;

use App\Transformers\SliderTransformer;
use Flugg\Responder\Contracts\Transformable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Slide extends Model implements HasMedia,Transformable
{
    use HasFactory;

    use HasMediaTrait;
    protected $CollectionName='slider';

    protected $fillable = [
        'title',
        'url',
        'index',
        'blob',
    ];


    public function setBlobAttribute(){
        $this->attributes['blob'] = '';
    }

    
    public function transformer()
    {
        return SliderTransformer::class;
    }

    public function registerAllMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('full')
        ->width(1920)  // تحديد العرض
        ->height(1080) // تحديد الارتفاع
        ->sharpen(10); // ضبط حدة الصورة
}

    
    
}
