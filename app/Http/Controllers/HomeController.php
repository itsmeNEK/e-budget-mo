<?php

namespace App\Http\Controllers;

use App\Models\mayor\PurchaseRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    private $purchase_request;
    private $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PurchaseRequest $purchase_request,User $user)
    {
        $this->purchase_request = $purchase_request;
        $this->user=$user;
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = $this->user->findOrFail(Auth::user()->id);
        $token = $user->createToken('myapp')->accessToken;
        $user->token = $token->token;
        $user->save();
        if ($user->role != 6) {
            return redirect()->route('purchaseRequest.index');
        }else{
            return redirect()->route('admin.user.index');
        }
        // if ($user->role == 1) {
        // return redirect()->route('purchaseRequest.index');
        // } elseif ($user->role == 2) {
        //     return view('budget.manage');
        // } elseif ($user->role == 3) {
        //     return view('accounting.receive');
        // } elseif ($user->role == 4) {
        //     return view('treasury.status');
        // } elseif ($user->role == 5) {
        //     return view('admin.manage');
        // }
    }

    public function loginMayor()
    {
        $login = "Mayor Portal";
        return view('auth.login')->with('login', $login);
    }
    public function loginBudget()
    {
        $login = "Budget Portal";
        return view('auth.login')->with('login', $login);
    }
    public function loginAccounting()
    {
        $login = "Accounting Portal";
        return view('auth.login')->with('login', $login);
    }
    public function loginTreasury()
    {
        $login = "Treasury Portal";
        return view('auth.login')->with('login', $login);
    }
    public function loginAdmin()
    {
        $login = "Admin Portal";
        return view('auth.login')->with('login', $login);
    }
    public function user_logout()
    {
        $user = $this->user->findOrFail(Auth::user()->id);
        $user->token = "";
        $user->save();
        $users = DB::table('personal_access_tokens')
                ->where('tokenable_id', $user->id)
                ->delete();
        return redirect()->route('logout');
    }
    public function documentStatus(){

        $all_pr = $this->purchase_request->where('user_id',Auth::user()->id)->get();
        return view('form.pr.PRstatus')->with('all_pr',$all_pr);
    }
}
