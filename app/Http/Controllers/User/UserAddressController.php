<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Address;

class UserAddressController extends Controller
{
    public function address()
    {
        return view('user.profile.address');
    }

    public function store(Request $request)
    {
        try {
            if($request->pincode == '' || $request->city == '' || $request->address == '' || $request->country == '' || $request->state == '' || $request->address_type == ''){
                echo "3";
            } else {
                $data = [
                    'user_id'=>auth()->user()->id,
                    'country'=>$request->country,
                    'address'=>$request->address,
                    'city'=>$request->city,
                    'state'=>$request->state,
                    'pincode'=>$request->pincode,
                    'landmark'=>$request->landmark,
                    'home_office'=>$request->address_type,
                    'alternateMobile'=>$request->alternate_mobile,
                    'is_active'=>1
                ];
                $store = Address::create($data);
                if($store){
                    echo "1";
                } else {
                    echo "2";
                }
            }
        } catch (\Throwable $th) {
            Toastr::warning('Something want wrong', '', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
        }
    }

    public function get()
    {
        $get_addresses['data'] = Address::select('id','user_id','country','address','city','state','pincode','landmark','home_office','alternateMobile','is_active')->where('user_id', auth()->user()->id)->get();
        return response()->json($get_addresses);
    }

    public function deleteAddress(Request $request)
    {
        try {
            $address = Address::where('id',$request->id)->where('user_id',auth()->user()->id)->first();
            $data = [
                'deleted_at'=>date("Y-m-d H:i:s")
            ];
            $address->update($data);
            if($address){
                echo "1";
            } else {
                echo "2";
            }
        } catch (\Throwable $th) {
            echo "3";
        }
    }

    public function getOne($id)
    {
        $get_address['data'] = Address::select('id','user_id','country','address','city','state','pincode','landmark','home_office','alternateMobile','is_active')->where('id', $id)->where('user_id', auth()->user()->id)->first();
        return response()->json($get_address);
    }

    public function update(Request $request)
    {
        try {
            if($request->pincode == '' || $request->city == '' || $request->address == '' || $request->country == '' || $request->state == '' || $request->address_type == '' || $request->id == ''){
                echo "3";
            } else {
                $address = Address::where('user_id', auth()->user()->id)->where('id',$request->id)->first();
                if($address){
                    $data = [
                        'user_id'=>auth()->user()->id,
                        'country'=>$request->country,
                        'address'=>$request->address,
                        'city'=>$request->city,
                        'state'=>$request->state,
                        'pincode'=>$request->pincode,
                        'landmark'=>$request->landmark,
                        'home_office'=>$request->address_type,
                        'alternateMobile'=>$request->alternate_mobile,
                        'is_active'=>1
                    ];
                    $address->update($data);
                    echo "1";
                } else {
                    echo "2";
                }
            }
        } catch (\Throwable $th) {
            echo "4";
        }
    }
}
