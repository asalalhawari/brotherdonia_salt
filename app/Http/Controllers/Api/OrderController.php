<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use App\Repositories\GenralSettingRepository;
use App\Repositories\ItemRepository;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function __construct(public GenralSettingRepository $genralSettingRepository){
    }
    public function index(Request $request){

        if ($request->filled('type') == 'old') {
            $query= Order::where('UserID', getLogged()->id)->where('status','!=',0)->paginate(10);

        }else{

            $query= Order::where('UserID', getLogged()->id)->where('status',0)->paginate(10);
        }

        return responder()->success($query)->respond();

    }
    public function show(Order $entity){
        return responder()->success($entity)->respond();

    }

}
