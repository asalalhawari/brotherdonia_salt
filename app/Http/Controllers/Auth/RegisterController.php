<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\ActionPointService;
use App\Services\ReferralService;
use App\Services\UserService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login';  

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'gender' => ['required', 'integer', 'min:0', 'max:1'],
            'phone' => ["required", "regex:/^([0-9\s\\-\+\(\)]*)$/", 'unique:users,phone'],
            'country' => ['required', 'string'], 
            'currency' => ['required', 'string'],  
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'country' => $data['country'],  
            'currency' => $data['currency'],  
            'password' => Hash::make($data['password']),
        ]);

        UserService::logUser($user->id, 0, 'register');
        
        $point = ActionPointService::getActionPoint('new_account_points');
        if ($point > 0) {
            $user->chargePoints($point, 'new account points');
        }

        // generate referral code
        $user->generateNewReferralCode();

        // check if user registered with referral
        ReferralService::registerReferralIfExists($user);

        return redirect($this->redirectTo)
            ->with('status', 'تم إنشاء حسابك بنجاح! الآن يمكنك تسجيل الدخول.');
    }
}
