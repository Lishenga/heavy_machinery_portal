<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function view(){
        
        return view('create');
      
    }

    public function create(Request $request)
    {
        $user = new User;
        foreach ($request->all() as $key => $value) {
            //creating objects excluding the _token
            if ($key=='_token'|| $key=='password')continue;
            $user->$key = $value;
        }
        $user->password= \Hash::make($request->password);
        $user->status = '1';

        if ($user->save()){
            # code...
            return redirect()->back()->withErrors([
                'success'=> 'User Created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'Error'=> 'User not Created',
            ]);
        }
    }

    public function update(Request $request)
    {
        # code...
        $data=[];
        $user = User::where('id',$request->id);
        $users = User::where('id',$request->id)->first();
        if($request->new === $request->confirm){

            foreach ($request->all() as $key => $value) {
                //creating array excluding the _token the array will be used for update
                if ($key=='_token'|| $key=='id'|| $key=='new'|| $key=='confirm')continue;
                $data[$key]=$value;
            }

            if($request->new === null || $request->new == undefined){

                $user->update(array(
                    'password' => $users->password,
                ));

            }else{

                $user->update(array(
                    'password' => \Hash::make($request->new),
                ));

            }
                
            if ($user->update($data)){
                # code...
                return redirect()->back()->withErrors([
                    'success'=> 'User Updated',
                ]);
            } else {
                # code...;
                return redirect()->back()->withErrors([
                    'Error'=> 'User not Updated',
                ]);
            }

        }else{

            return redirect()->back()->withErrors([
                'Error'=> 'Password Do not Match',
            ]);

        }
        
    }

    public function particular (Request $request){
        # code...
        $user = User::where('id','=',$request->id)->first();

        return view('settings.users.layouts.particular')->with([
            'user'=> $user,
        ]);
    }

    public function enabling(Request $request)
    {
        # code...
        $id = $request->input('id');
        $status = $request->input('status');

        if(User::where('id',$id)){
            $default = User::where('id', '=', $id)->first();

            if ($status != '') {
                $default->update(array(
                    'status' => $status,
                ));
            }
            return redirect()->back()->withErrors([
                'success'=> 'Status Updated',
            ]);
        } else {

            return redirect()->back()->withErrors([
                'Error'=> 'Status not Updated',
            ]);
        }

    }
}
