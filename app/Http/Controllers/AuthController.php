<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginError(Request $request)
  {
      $data['error'] = $request->get('error');
      $request->session()->forget('user');
      Auth::logout();
      return view('main.index');
  }

  public function doLogin(Request $request)
    {
        try {
            $pwd = addslashes(md5(md5('BOLTENSTAR04').md5($request->password).md5('BOLTENSTAR04')));
            // $pwd = $request->password;

            $user = User::whereRaw('LOWER (username) = ?', [strtolower($request->username)])->where('password',$pwd)->where('user_status',1)->first();
            $fullname = $user->nama_user;
            $attributes = [
                'userName' => $user->username,
                'fullName' => $fullname,
                'role' => $user->role_user
            ];
            // dd($attributes);

            session(['user' => $attributes]);
            // Auth::login($user);
            // $user = Auth::User();
            // if($redirect_url){
            //     session()->forget('url_redirect');
            //     return redirect($redirect_url);
            // } else {
            // }
            $current = 'dashboard';
            $data = Menu::where('status',1)->get();
            return view('main.dashboard',['current' => $current,'data' => $data]);
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['password' => 'true']);
        }
    }

    public function logout(Request $request)
    {
        $this->signOut($request);
        return redirect('/login');
    }

    public function checkAuth()
    {
        if (Auth::check()) {
            $userAttributes = Auth::user()->getAttributes();
            return response()->json($userAttributes);
        }
        abort(403);
    }

    protected function signOut(Request $request)
    {
        \Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
    }
}
