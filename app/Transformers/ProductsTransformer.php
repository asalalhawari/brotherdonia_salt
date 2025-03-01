<?php

namespace App\Transformers;

use App\Models\Category;
use App\Models\Item;
use Flugg\Responder\Transformers\Transformer;

class ProductsTransformer extends Transformer
{
    protected $relations = [];
    protected $load = [];
    public function transform(Item $item)
    {

        $images = [];

        foreach($item->getMedia('products') as $index => $image){
            $images[] =   asset($image->getUrl());
        }
        return [
            'id' => $item->id,
            'CatID' => $item->CatID,
            'Name' => $item->Name,
            'NameEN' => $item->NameEN,
            'Description' => $item->Description,
            'DescriptionEN' => $item->DescriptionEN,
            'Available' => $item->Available,
            'Price' => (string)$item->price(),
            'NewPrice' => $item->NewPrice,
            'Views' => $item->Views,
            'Rating' => $item->getAvarg(),
            'Stock' => $item->stock,
            'RatingCount' => $item->getRateCount(),
            'optionDetil' => $this->optionDetil($item),
            'isFavorited' => $item->isFavorite(),
            'Special' => $item->Special,
            'main_image' => [
                'large' => asset($item->getFirstMediaUrl('products', 'large')),
                'medium' => asset($item->getFirstMediaUrl('products', 'medium')),
                'small' => asset($item->getFirstMediaUrl('products', 'small')),
            ],
            'other_image' => $images,

        ];
    }
    public function optionDetil(Item $entity)
    {

        $options = $entity->optionDetil->groupBy('POptID');
        $data = [];
        $datad = [];
        foreach ($options ?? [] as $key => $optin) {

            $data =
                [
                    'id' => $optin[0]->id,
                    'title_ar' => $optin[0]->subOption->itemOption->Name,
                    'title_en' => $optin[0]->subOption->itemOption->NameEN
                ];
            foreach ($optin as $i => $item) {
                $data['optin'][] =
                    [
                        'id' => $item->subOption->id,
                        'title_ar' => $item->subOption->Name,
                        'title_en' => $item->subOption->NameEN,
                        'AdditionalValue' => $item->AdditionalValue
                    ];
            }
            array_push($datad, $data);
        }
        return $datad;
    }
}
