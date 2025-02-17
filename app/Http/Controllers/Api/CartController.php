<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\CartApiRequest;
use App\Models\Cart;
use App\Models\Item;
use App\Repositories\GenralSettingRepository;
use App\Repositories\ItemRepository;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartController extends Controller
{


    public function index(Request $request)
    {
        // dd(auth()->user());

        // dd($request['user_id']);
        $query = CartService::getCarts($request);
        return responder()->success($query)->respond();

    }
    public function addToCart(Request $request, )
    {
        // dd(auth()->user());
        // dd('alaa');

        $entity = Item::find($request->id);
        $add_cart = CartService::addToCart($request, $entity);
        // dd($add_cart);
        switch ($add_cart) {
            case Response::HTTP_OK:
                // $query = CartService::getCarts();
                return responder()->success([
                    'msg' => 'Added to cart successfully',
                ])->respond();
            case Response::HTTP_INTERNAL_SERVER_ERROR:
                return responder()->error(500, __('something went wrong'))->respond();
        }
    }
    public function updateAmount(Request $request)
    {
        CartService::updateAmount($request);
        return responder()->success(['msg' => 'cart updated successfully',])->respond();
    }
    public function destroy(Request $request)
    {

        $entity = Cart::find($request->id);
        if ($entity) {
            $entity->forceDelete();
            // return response()->json(['message'=> 'deleted successfully'],204);

            return response()->json(['message' => 'deleted successfully'], 204);
        }

        return responder()->error(['message' > 'not found'])->respond();



    }
}
