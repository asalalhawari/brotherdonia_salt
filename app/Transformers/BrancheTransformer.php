<?php

namespace App\Transformers;

use App\Models\Branche;
use App\Models\GeneralInfo;
use App\Models\Page;
use Flugg\Responder\Transformers\Transformer;

class BrancheTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];
    public function transform(Branche $branche){





        return [
            'id'=>$branche->id,
            'name'=>(string)$branche->name ?? "Branch Name",
            'Addres'=>$branche->AddresAr,
            'Phone'=>$branche->Phone,
            'Map'=>$branche->Map,
            //TODO ::
            'image'=>(string)asset($branche->getFirstMediaUrl('products', 'large')) ?? "https://akhodonia.jolife.dev/storage/media/products/92dec31077bb9269f85f9c4a1e151e97/01JHF5QTFASRCSHTFJC3W5NFW1.jpg" ,



        ];
    }
}
