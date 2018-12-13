<?php

namespace App\Http\Controllers\customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Machines\Request\Request as MachinesRequest;

class CustomersController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('customers.view');
    }

    public function customers(Request $request){
        switch ($q = $request->Input('q')) {
            case 0:
                if($request->page == 0){
                    $customers = MachinesRequest::post([
                        'page'=>1,
                        'items'=>10,
                    ],env('API_URL').'/users/getallusers/');
                    $datas = [];

                    if($customers != null){
                        foreach ($customers->data as $customer => $value){
                            if($value->role === 'POSTER') continue;
                            $datas[$customer] = $value;
                        }
        
                        return view('customers.bidders')->with([
                            'customers'=>$datas,
                        ]);
                    }else{
                        return view('customers.bidders')->with([
                            'customers'=>$datas,
                        ]);
                    }
                }else{
                    $customers = MachinesRequest::post([
                        'page'=>$request->page,
                        'items'=>10,
                    ],env('API_URL').'/users/getallusers/');
                    $datas = [];

                    if($customers != null){
                        foreach ($customers->data as $customer => $value){
                            if($value->role === 'POSTER') continue;
                            $datas[$customer] = $value;
                        }
        
                        return view('customers.bidders')->with([
                            'customers'=>$datas,
                        ]);
                    }else{
                        return view('customers.bidders')->with([
                            'customers'=>$datas,
                        ]);
                    }
                }
                    

                break;

            case 1:
            if($request->page == 0){
                $customers = MachinesRequest::post([
                    'page'=>1,
                    'items'=>10,
                ],env('API_URL').'/users/getallusers/');
                $datas = [];

                if($customers != null){
                    foreach ($customers->data as $customer => $value){
                        if($value->role === 'BIDDER') continue;
                        $datas[$customer] = $value;
                    }
    
                    return view('customers.posters')->with([
                        'customers'=>$datas,
                    ]);
                }else{
                    return view('customers.posters')->with([
                        'customers'=>$datas,
                    ]);
                }
            }else{
                $customers = MachinesRequest::post([
                    'page'=>$request->page,
                    'items'=>10,
                ],env('API_URL').'/users/getallusers/');
                $datas = [];

                if($customers != null){
                    foreach ($customers->data as $customer => $value){
                        if($value->role === 'BIDDER') continue;
                        $datas[$customer] = $value;
                    }
    
                    return view('customers.posters')->with([
                        'customers'=>$datas,
                    ]);
                }else{
                    return view('customers.posters')->with([
                        'customers'=>$datas,
                    ]);
                }
            }

                break;
        }

    }

    public function ViewCustomer_bidders(Request $request)
    {
        # code...
        $data = MachinesRequest::post([
            'user_id'=>$request->id,
        ],env('API_URL').'/users/getparticularuser/');

        $datas = MachinesRequest::post([
            'stripe_id'=>$data->data->stripe_id
        ],env('API_URL').'/transactions/getcustomercards/');
        
        return view('customers.bidders.index',[
            'customer'=>$data->data,
            'stripe'=>$datas->data
        ]);

    }

    public function update_bidders(Request $request)
    {
        # code...
        try{
            
            $save = MachinesRequest::post([
                'id'=>$request->id,
                'fname'=>$request->fname,
                'lname'=>$request->lname,
                'email'=>$request->email,
                'msisdn'=>$request->msisdn,
                //'password'=>$request->email,
            ],env('API_URL').'/users/updateuser/');
    
            if(json_decode(json_encode($save))->status_code==500){
                return redirect()->back()->withErrors([
                    'error'=> 'Unexpected Error 1',
                ]);
            }

            return redirect()->back()->withErrors([
                'success'=> 'User Updated',
            ]);
           

        }catch(\Exception $e){

            return redirect()->back()->withErrors([
                'error'=> 'Unexpected Error',
            ]);
        }
        
    }

    public function customer_transactions_bidders(Request $request)
    {
        if($request->page == 0){
            $data = MachinesRequest::post([
                'user_id'=>$request->id,
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/transactions/getparticularusertransactions/');
           
            return view('customers.bidders.transactions',[
                'transactions'=>$data->data,
                'id'=>$request->id
            ]);
        }else{
            $data = MachinesRequest::post([
                'user_id'=>$request->id,
                'page'=>$request->page,
                'items'=>10,
            ],env('API_URL').'/transactions/getparticularusertransactions/');
           
            return view('customers.bidders.transactions',[
                'transactions'=>$data->data,
                'id'=>$request->id
            ]);
        }
    }

    public function view_item(Request $request){

        if($request->page == 0){
            $data = MachinesRequest::post([
                'user_id'=>$request->id,
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/item/getparticularuseritems/');
           
            return view('customers.bidders.items',[
                'items'=>$data->data,
                'id'=>$request->id
            ]);
        }else{
            $data = MachinesRequest::post([
                'user_id'=>$request->id,
                'page'=>$request->page,
                'items'=>10,
            ],env('API_URL').'/item/getparticularuseritems/');
           
            return view('customers.bidders.items',[
                'items'=>$data->data,
                'id'=>$request->id
            ]);
        }
    }

    public function particular_item(Request $request){
            $data = MachinesRequest::post([
                'id'=>$request->id,
            ],env('API_URL').'/item/getparticularitems/');

            $datas = MachinesRequest::get([],env('API_URL').'/category/getallcategories/');
            $loc = MachinesRequest::post([
                'id'=>$data->data->location_id,
            ],env('API_URL').'/location/getparticularlocation/');
           
            return view('customers.bidders.items.index',[
                'items'=>$data->data,
                'category'=>$datas->data,
                'location'=>$loc->data
            ]);
    }

    public function createUser(Request $request)
    {
        # code...
        try{
            
            $save = MachinesRequest::post([
                'role'=>$request->role,
                'fname'=>$request->fname,
                'lname'=>$request->lname,
                'email'=>$request->email,
                'msisdn'=>$request->msisdn,
                'password'=>$request->password,
            ],env('API_URL').'/users/createuser/');
    
            return redirect()->back()->withErrors([
                'Success'=> 'User Created',
            ]);
           
        }catch(\Exception $e){

            return redirect()->back()->withErrors([
                'error'=> 'Unexpected Error',
            ]);
        }
    }

}
