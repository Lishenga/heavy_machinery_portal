<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Machines\Request\Request as MachinesRequest;

class BidsController extends Controller
{
    public function userbids(Request $request){
        if($request->page == 0 ){
            $data = MachinesRequest::post([
                'bidder_id'=>$request->id,
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/bids/getparticularuserbids/');
           
            return view('customers.bidders.userbids',[
                'customers'=>$data->data,
                'bidder_id'=>$request->id
            ]);
        }else{
            $data = MachinesRequest::post([
                'bidder_id'=>$request->id,
                'page'=>$request->page,
                'items'=>10,
            ],env('API_URL').'/bids/getparticularuserbids/');
           
            return view('customers.bidders.userbids',[
                'customers'=>$data->data,
                'bidder_id'=>$request->id
            ]);
        }
    }

    public function acceptedbids(Request $request){
        if($request->page == 0 ){
            $data = MachinesRequest::post([
                'bidder_id'=>$request->id,
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/bids/getallacceptedbidsforbidder/');
           
            return view('customers.bidders.acceptedbids',[
                'customers'=>$data->data,
                'bidder_id'=>$request->id
            ]);
        }else{
            $data = MachinesRequest::post([
                'bidder_id'=>$request->id,
                'page'=>$request->page,
                'items'=>10,
            ],env('API_URL').'/bids/getallacceptedbidsforbidder/');
           
            return view('customers.bidders.acceptedbids',[
                'customers'=>$data->data,
                'bidder_id'=>$request->id
            ]);
        }
    }

    public function items(Request $request){
        if($request->page == 0 ){
            $data = MachinesRequest::post([
                'user_id'=>$request->id,
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/item/getparticularuseritems/');

            $datass = MachinesRequest::post([
                'page'=>1,
                'items'=>1500,
            ],env('API_URL').'/location/getalllocations/');

            $datasss = MachinesRequest::get([],env('API_URL').'/category/getallcategories/');
           
            return view('customers.bidders.bidderItems',[
                'customers'=>$data->data,
                'user_id'=>$request->id,
                'location'=>$datass->data,
                'category'=>$datasss->data
            ]);
        }else{
            $data = MachinesRequest::post([
                'user_id'=>$request->id,
                'page'=>$request->page,
                'items'=>10,
            ],env('API_URL').'/item/getparticularuseritems/');
           
            $datass = MachinesRequest::post([
                'page'=>1,
                'items'=>1500,
            ],env('API_URL').'/location/getalllocations/');

            $datasss = MachinesRequest::get([],env('API_URL').'/category/getallcategories/');
           
            return view('customers.bidders.bidderItems',[
                'customers'=>$data->data,
                'user_id'=>$request->id,
                'location'=>$datass->data,
                'category'=>$datasss->data
            ]);
        }
    }

    public function createItem(Request $request)
    {
        # code...
        try{
            
            $save = MachinesRequest::post([
                'user_id'=>$request->user_id,
                'name'=>$request->name,
                'description'=>$request->description,
                'price_for_lease'=>$request->price_for_lease,
                'min_radius'=>$request->min_radius,
                'max_radius'=>$request->max_radius,
                'pictures'=>$request->file('pictures'),
                'location_id'=>$request->location_id,
                'category_id'=>$request->category_id,
            ],env('API_URL').'/item/createitem/');
    
            $data = MachinesRequest::post([
                'user_id'=>$request->user_id,
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/item/getparticularuseritems/');

            $datass = MachinesRequest::post([
                'page'=>1,
                'items'=>1500,
            ],env('API_URL').'/location/getalllocations/');

            $datasss = MachinesRequest::get([],env('API_URL').'/category/getallcategories/');
           
            return var_dump($request->file('pictures'));
           
        }catch(\Exception $e){

            return redirect()->back()->withErrors([
                'error'=> 'Unexpected Error',
            ]);
        }
    }
}
