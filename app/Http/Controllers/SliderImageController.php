<?php

namespace App\Http\Controllers;

use App\Models\SliderImage;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class SliderImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_slider = SliderImage::where('status',1)->get();
        // dd($get_slider);
        return view('admin.slider.index',compact('get_slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('slider_images')!=null){
            $image=$request->file('slider_images');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('admin/images/slide'), $imageName);   
        } 
        
      $data = [
        'button_text' =>$request->button_text,
        'button_url' => 'public/admin/images/slide/' . $imageName,
        'slider_images' => 'public/admin/images/slide/' . $imageName,
        'status' => 1,
      ];
      $query = SliderImage::create($data);
      Toastr::success('Slider Image Added Successfully', 'success', ["positionClass" => "toast-top-right"]);
      return redirect()->route('admin.slider');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SliderImage  $sliderImage
     * @return \Illuminate\Http\Response
     */
    public function show(SliderImage $sliderImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SliderImage  $sliderImage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $get_slider = SliderImage::where('id',$id)->first();

        return view('admin.slider.edit',compact('get_slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SliderImage  $sliderImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        if($request->file('slider_images')!=null){
            $image=$request->file('slider_images');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('admin/images/slide'), $imageName);                                                                            
        } 
        
        $query = SliderImage::where('id',$id)->update([
            'button_text' =>$request->button_text,
            'button_url' => 'public/admin/images/slide/' . $imageName,
            'slider_images' => 'public/admin/images/slide/' . $imageName,
            'status' => 1,
        ]);
        Toastr::success('Slider Image Updated Successfully', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.slider');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SliderImage  $sliderImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = [
            'status' => 0,
        ];
        $query = SliderImage::where('id',$id)->update($data);
        Toastr::success('Slider Image Deleted Successfully', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
