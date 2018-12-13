<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Machines\Request\Request as MachinesRequest;

class PostsController extends Controller
{
    public function userposts(Request $request){
        if($request->page == 0 ){
            $data = MachinesRequest::post([
                'user_id'=>$request->id,
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/post/getparticularuserposts/');
           
            return view('customers.posters.userposts',[
                'customers'=>$data->data,
                'bidder_id'=>$request->id
            ]);
        }else{
            $data = MachinesRequest::post([
                'user_id'=>$request->id,
                'page'=>$request->page,
                'items'=>10,
            ],env('API_URL').'/post/getparticularuserposts/');
           
            return view('customers.posters.userposts',[
                'customers'=>$data->data,
                'bidder_id'=>$request->id
            ]);
        }
    }

    public function bids_under_post(Request $request){
        if($request->page == 0 ){
            $data = MachinesRequest::post([
                'post_id'=>$request->id,
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/bids/getparticularpostbids/');
           
            return view('customers.posters.bids_under_post',[
                'customers'=>$data->data,
                'bidder_id'=>$request->id,
                'user_id'=>$request->user_id
            ]);
        }else{
            $data = MachinesRequest::post([
                'post_id'=>$request->id,
                'page'=>$request->page,
                'items'=>10,
            ],env('API_URL').'/bids/getparticularpostbids/');
           
            return view('customers.posters.bids_under_post',[
                'customers'=>$data->data,
                'bidder_id'=>$request->id,
                'user_id'=>$request->user_id
            ]);
        }
    }

    public function viewposter(Request $request)
    {
        # code...
        $data = MachinesRequest::post([
            'user_id'=>$request->id,
        ],env('API_URL').'/users/getparticularuser/');

        $datas = MachinesRequest::post([
            'stripe_id'=>$data->data->stripe_id
        ],env('API_URL').'/transactions/getcustomercards/');
        
        return view('customers.posters.index',[
            'customer'=>$data->data,
            'stripe'=>$datas->data
        ]);

    }

    public function post_acceptedbid(Request $request){
        if($request->page == 0 ){
            $data = MachinesRequest::post([
                'post_id'=>$request->id,
                'user_id'=>$request->user_id,
            ],env('API_URL').'/bids/getspecificacceptedbidforposter/');
           
            return view('customers.posters.acceptedbid',[
                'customers'=>$data->data,
                'bidder_id'=>$request->id,
                'user_id'=>$request->user_id,
            ]);
        }else{
            $data = MachinesRequest::post([
                'post_id'=>$request->id,
                'user_id'=>$request->user_id,
            ],env('API_URL').'/bids/getspecificacceptedbidforposter/');
           
            return view('customers.posters.acceptedbid',[
                'customers'=>$data->data,
                'bidder_id'=>$request->id,
                'user_id'=>$request->user_id,
            ]);
        }
    }

    public function allacceptedbids(Request $request){
        if($request->page == 0 ){
            $data = MachinesRequest::post([
                'user_id'=>$request->user_id,
                'page'=>1,
                'items'=>10,
            ],env('API_URL').'/bids/getallacceptedbidsforposter/');
           
            return view('customers.posters.allacceptedbids',[
                'customers'=>$data->data,
                'user_id'=>$request->user_id,
            ]);
        }else{
            $data = MachinesRequest::post([
                'user_id'=>$request->user_id,
                'page'=>$request->page,
                'items'=>10,
            ],env('API_URL').'/bids/getallacceptedbidsforposter/');
           
            return view('customers.posters.allacceptedbids',[
                'customers'=>$data->data,
                'user_id'=>$request->user_id,
            ]);
        }
    }
}
