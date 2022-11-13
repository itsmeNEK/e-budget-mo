<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $all_user= $this->user->where('role', '!=', '6')->get();
            return view('admin.manage')->with('all_user', $all_user);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('admin.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'username' => 'required',
                'role' => 'required|min:1',
                'password' => 'required',
            ]);
            $this->user->name = $request->name;
            $this->user->username = $request->username;
            $this->user->role = $request->role;
            $this->user->password = Hash::make($request->password);
            $this->user->save();

            Session::flash('alert', 'success|User has been Saved');
            return redirect()->back();
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
        //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit()
        {
            $user = $this->user->findOrFail(Auth::user()->id);
            return view('changepassword')->with('user', $user);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            $user = $this->user->findOrFail($id);
            if ($request->new_password) {
                $request->validate([
                    'current_password' => 'required',
                    'new_password' => 'required',
                    'confirm_password' => 'required'
                ]);
                if (Hash::check($request->current_password, $user->password)) {
                    if ($request->new_password == $request->confirm_password) {
                        $user->password = Hash::make($request->new_password);

                        $user->save();
                        Session::flash('alert', 'success|Changed password');
                        return redirect()->back();
                        exit;
                    } else {
                        Session::flash('alert', 'danger|Password not match');
                        return redirect()->back();
                        exit;
                    }
                } else {
                    Session::flash('alert', 'danger|Current password do not Match');
                    return redirect()->back();
                    exit;
                }
            } elseif ($request->role) {
                $user->role = $request->role;
                $user->save();
                Session::flash('alert', 'success|User has been Saved');
                return redirect()->back();
            }
            return redirect()->back();
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $this->user->destroy($id);
            Session::flash('alert', 'danger|User has been Deleted');
            return redirect()->back();
        }
}
