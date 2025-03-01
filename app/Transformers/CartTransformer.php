<?php

namespace App\Transformers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Item;
use Flugg\Responder\Transformers\Transformer;

class CartTransformer extends Transformer
{
    protected $relations = ["item"=>ProductsTransformer::class];
    protected $load = ["item"=>ProductsTransformer::class];
    public function transform(Cart $item)
    {
        return [
            'id'=>$item->id,
            'temp_user_id'=>$item->temp_user_id,
            'quantity'=>$item->quantity,
            'OptID'=>str_replace("'", '', $item->OptID) ,
            'note'=>$item->Note,
            'price'=>$item->price,
            'image'=>$item->getFirstMediaUrl('images','large')?asset($item->getFirstMediaUrl('images','large'))??'':'',
        ];
    }

}
