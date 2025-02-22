<?php

namespace App\Models;


use App\Models\Traits\HasMediaTrait;
use App\Transformers\GenralInfoTransformer;
use App\Transformers\GenralSettingTransformer;
use Flugg\Responder\Contracts\Transformable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

class GeneralSetting extends Model implements Transformable, HasMedia
{
    use HasFactory;
    use HasMediaTrait;

    protected $fillable = [
        'Currency',
        'WhatsApp',
        'Coupon',
        'Coupon',
        'DeliveryFirstOrder',
        'OrderTime',
        'OrderMessage',
        'OrderMessageEN',
        'Thanks',
        'ThanksEN',
        'AppVersion',
        'about',
        'title1',
        'title2',
        'title3',
        'des1',
        'des2',
        'des3',
        'facebook',
        'linkedin',
        'instagram',
        'address',
        'email',
        'phone_number',
    ];


    public function getCouponAttribute($value)
    {
        switch ($value) {
            case 0:
                return 'ineffective';
            case 1:
                return 'effective';
        }
    }
   public function getDeliveryFirstOrderAttribute($value)
    {
        switch ($value) {
            case 0:
                return 'ineffective';
            case 1:
                return 'effective';
        }
    }

    public function transformer()
    {
        return  GenralSettingTransformer::class;
    }
    public function currency(){
        return $this->belongsTo(Currencie::class,'Currency');
    }

    public function setBlobAttribute(){
        $this->attributes['blob'] = '';
    }

}
