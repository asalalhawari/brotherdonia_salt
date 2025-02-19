<?php

namespace App\Http\Resources;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        $images = [];

        foreach($this->getMedia('products') as $index => $image){
            $images[] =   asset($image->getUrl());
        }
        return [
            'id' => $this->id,
            'CatID' => $this->CatID,
            'Name' => $this->Name,
            'NameEN' => $this->NameEN,
            'Description' => $this->Description,
            'DescriptionEN' => $this->DescriptionEN,
            'Available' => $this->Available,
            'Price' => (string) $this->price(),
            'NewPrice' => $this->NewPrice,
            'Views' => $this->Views,
            'Rating' => $this->getAvarg(),
            'Stock' => $this->stock,
            'RatingCount' => $this->getRateCount(),
            'optionDetil' => $this->optionDetil(Item::find($this->id)),
            'isFavorited' => $this->isFavorite(),
            'Special' => $this->Special,
            'main_image' => [
                'large' => asset($this->getFirstMediaUrl('products', 'large')),
                'medium' => asset($this->getFirstMediaUrl('products', 'medium')),
                'small' => asset($this->getFirstMediaUrl('products', 'small')),
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

            $data[$key] =
                [
                    'id' => $optin[0]->id,
                    'title_ar' => $optin[0]->subOption->itemOption->Name,
                    'title_en' => $optin[0]->subOption->itemOption->NameEN
                ];
            foreach ($optin as $i => $item) {
                $data[$key]['optin'][] =
                    [
                        'id' => $item->subOption->id,
                        'title_ar' => $item->subOption->Name,
                        'title_en' => $item->subOption->NameEN,
                        'AdditionalValue' => $item->AdditionalValue
                    ];
            }
            array_push($datad, $data);
        }
        return $data;
    }
}
