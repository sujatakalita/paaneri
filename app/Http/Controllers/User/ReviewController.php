<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\User\ProductReview;

use Validator,Redirect;


class ReviewController extends Controller
{
    public function store(Request $request){
      try {
      	$rules = ProductReview::$rules;
         $messages = ProductReview::$messages;

         $validator = Validator::make($request->all(), $rules, $messages);

         if ($validator->fails()) {
            Session::flash('error', 'Please fix the error and try again!');
            return redirect()->back()->withErrors($validator)->withInput();
         }

            $data = $request->all();
            ProductReview::create($data);
          
        Toastr::success('You have successfully saved a review for this product', '', ["positionClass" => "toast-top-right"]);
        return Redirect::back();

      } catch (\Throwable $th) {
          return Redirect::back();
      }
    }
}
