<?php

namespace App\Transformers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Slide;
use Flugg\Responder\Transformers\Transformer;

class SliderTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];
    public function transform(Slide $slide)
    {
        return [
                'title'=>$slide->title,
                'url'=>$slide->url,
            'image'=>[
                'large'=>asset($slide->getFirstMediaUrl('slider', 'full')),
                'medium'=>asset($slide->getFirstMediaUrl('slider', 'full')),
                'small'=>asset($slide->getFirstMediaUrl('slider', 'full')),
            ],
        ];
    }
}
