<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Hero;
use Brian2694\Toastr\Facades\Toastr;

use DB,Crypt,Validator,Str,Redirect,Image, Session;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heros = Hero::where('status',1)->orderBy('id','desc')->get();
        return view('admin.hero.index',compact('heros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         try
       {
         $rules = Hero::$rules;
         $messages = Hero::$messages;

         $validator = Validator::make($request->all(), $rules, $messages);

         if ($validator->fails()) {
            Session::flash('error', 'Please fix the error and try again!');
            return redirect()->back()->withErrors($validator)->withInput();
         }

            $data = $request->all();

            $hero_img_slug = Str::slug($request->hero_img, '-');

            if( $request->hasFile('hero_img'))
            {
                $file=$request->file('hero_img');
                $imageName = strtolower(uniqid()).'_'.$hero_img_slug.'.'.$file->getClientOriginalExtension();
                // $destinationPathSmall=str_replace('\\', '/', public_path().'/admin/hero/small');
                // $image=Image::make($file->getRealPath());

                // $image->resize(620,430)->save($destinationPathSmall.'/'.$imageName);
                
                $destinationPath=str_replace('\\', '/', public_path().'/admin/hero');
                $file->move($destinationPath,$imageName);
                $data['hero_img'] = $imageName;
            }

            // dd($data);

            Hero::create($data);
          
      }catch(ValidationException $e)
            {
                return Redirect::back();
            }

        Toastr::success('You have successfully saved hero details', '', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.home-page-banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hero_id = Crypt::decrypt($id);
        $hero = Hero::where([['status',1],['id',$hero_id]])->first();
        return view('admin.hero.show',compact('hero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hero_id = Crypt::decrypt($id);
        $hero = Hero::where([['status',1],['id',$hero_id]])->first();
        return view('admin.hero.edit',compact('hero'));
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
         try
       {
         $hero_id = Crypt::decrypt($id);
         $hero = Hero::where([['status',1],['id',$hero_id]])->first();
         $rules = Hero::$rules;
         $messages = Hero::$messages;

         if ($hero->hero_img) {
            $rules['hero_img'] = str_replace("required", "nullable", $rules['hero_img']);
         }

         $validator = Validator::make($request->all(), $rules, $messages);

         if ($validator->fails()) {
            Session::flash('error', 'Please fix the error and try again!');
            return redirect()->back()->withErrors($validator)->withInput();
         }

            $hero->remarks = $request->remarks;

            $hero_img_slug = Str::slug($request->hero_img, '-');

            if( $request->hasFile('hero_img'))
            {
                $file=$request->file('hero_img');
                $imageName = strtolower(uniqid()).'_'.$hero_img_slug.'.'.$file->getClientOriginalExtension();
                // $destinationPathSmall=str_replace('\\', '/', public_path().'/admin/hero/small');
                // $image=Image::make($file->getRealPath());

                // $image->resize(620,430)->save($destinationPathSmall.'/'.$imageName);
                
                $destinationPath=str_replace('\\', '/', public_path().'/admin/hero');
                $file->move($destinationPath,$imageName);
                $hero->hero_img = $imageName;
            }

            $hero->save();
          
      }catch(ValidationException $e)
            {
                return Redirect::back();
            }

        Toastr::success('You have successfully updated hero details', '', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.home-page-banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hero_id = Crypt::decrypt($id);
        $hero = Hero::where([['status',1],['id',$hero_id]])->update(['status' => 0]);
        Toastr::success('You have successfully deleted hero details', '', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.home-page-banner');
    }
}
