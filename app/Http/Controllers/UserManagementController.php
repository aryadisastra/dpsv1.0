<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class UserManagementController extends Controller
{
    public function index()
    {
        if(session('user'))
        {
            $current = 'user-management';
            $user = User::all();
            $data = Menu::where('status',1)->get();
            
            return view('user-managements.user-managements',
                [
                'user' => $user,
                'current' => $current,   
                'data' => $data,   
                ]);
        }
        else {
            return redirect('/');
        }
    }
    public function create(Request $request)
    {
        if(session('user'))
        {
            $current = 'user-management';
            $data = Menu::where('status',1)->get();
            return view('user-managements.user-managements-create',[
                'current' => $current, 
                'data' => $data, 
            ]);
            
        }else {
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        if(session('user'))
        {
            $rules =[

                'username' => 'required',
                'password' => 'required',
                'nama' => 'required',
                'nohp' => 'required',
                'email' => 'required',
            ];

            $messages =  [
                    'username.required' => 'Username Mobil tidak boleh kosong',
                    'password.required' => 'Password tidak boleh kosong',
                    'nama_user.required' => 'Nama tidak boleh kosong',
                    'nohp.required' => 'No Hp tidak boleh kosong',
                    'email.required' => 'Email tidak boleh kosong',
            ];
            $this->validate($request, $rules, $messages);

            try {
                DB::beginTransaction();
                $newUsr = new User();
                $newUsr->username = $request->username;
                $newUsr->password = addslashes(md5(md5('BOLTENSTAR04').md5($request->password).md5('BOLTENSTAR04')));;
                $newUsr->nama_user = ucWords($request->nama);
                $newUsr->no_hp = $request ->nohp;
                $newUsr->email = $request ->email;
                $newUsr->role_user = $request ->role;
                $newUsr->user_status = $request ->status;
                $newUsr->rec_creator = session('user')['userName'] ;
                $newUsr->rec_editor = session('user')['userName'];
                $newUsr->save();
            
                DB::commit();
                return redirect('/user-management');
            }
            catch (Exception $e) {
                DB::rollBack();
                return redirect('/user-management/create');
            }
        }else {
            return redirect('/');
        }
    }

    public function show($id)
    {
        if(session('user')){
            $current = 'user-management';
            $user = User::where('id_user',$id)->first();
            $data = Menu::where('status',1)->get();
            return view('user-managements.user-managements-detail',
                [
                    'user' => $user,
                    'data' => $data,
                    'current' => $current,
                ]);

        }else {
            return redirect('/');
        }
    }

    public function edit($id)
    {
        if(session('user')){
            $current = 'user-management';
            $user = User::where('id_user',$id)->first();
            $data = Menu::where('status',1)->get();
            return view('user-managements.user-managements-edit',
                [
                    'user' => $user,
                    'data' => $data,
                    'current' => $current,
                ]);

        }else {
            return redirect('/');
        }
    }

    public function update(Request $request,$id)
    {
        if(session('user')){
            $rules =[

                'username' => 'required',
                'password' => 'required',
                'nama' => 'required',
                'nohp' => 'required',
                'email' => 'required',
            ];

            $messages =  [
                    'username.required' => 'Username Mobil tidak boleh kosong',
                    'password.required' => 'Password tidak boleh kosong',
                    'nama_user.required' => 'Nama tidak boleh kosong',
                    'nohp.required' => 'No Hp tidak boleh kosong',
                    'email.required' => 'Email tidak boleh kosong',
            ];
            $this->validate($request, $rules, $messages);
            try{
                DB::beginTransaction();
                $user = User::where('id_user',$id)->first();
                $user->nama_user = $request->nama;
                $user->username = $request->username;
                $user->no_hp = $request->nohp;
                $user->email = $request->email;
                $user->role_user = $request->role;
                $user->user_status = $request->status;
                $user->rec_editor = session('user')['userName'];
                $user->save();

                DB::commit();
                return redirect('/user-management/'.$id);
            }
            catch(Exception $e)
            {
                DB::rollback();
                return redirect('/user-management/edit/'.$id);
            }
        }else {
            return redirect('/');
        }
    }
}
