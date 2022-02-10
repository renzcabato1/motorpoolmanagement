<?php

namespace App\Http\Controllers;
use App\Brand;
use Illuminate\Http\Request;
use URL;
class BrandController extends Controller
{
    //

    public function brands()
    {

        $brands = Brand::get();
        return view('brands',
        array(
            'subheader' => '',
            'header' => "Brands",
            'brands' => $brands,
        ));
    }

    public function new_brand(Request $request)
    {
        $this->validate($request, [
            'brand_name' => 'unique:brands',
        ]);

        $brand = new Brand;
        $brand->brand_name = $request->brand_name;
        if($request->hasFile('file'))
        {
            $attachment = $request->file('file');
            $original_name = $attachment->getClientOriginalName();
            $name = time().'_'.$attachment->getClientOriginalName();
            $attachment->move(public_path().'/brand_image/', $name);
            $file_name = '/brand_image/'.$name;
            $brand->logo = $file_name;
        }
        $brand->save();
        $request->session()->flash('status','Successfully created');
        return back();
        
    }

    public function edit_brand(Request $request,$id)
    {
        $this->validate($request, [
            'brand_name' => 'unique:brands,brand_name,' . $id,
        ]);

        $brand = Brand::where('id',$id)->first();
        $brand->brand_name = $request->brand_name;
        if($request->hasFile('file'))
        {
            $attachment = $request->file('file');
            $original_name = $attachment->getClientOriginalName();
            $name = time().'_'.$attachment->getClientOriginalName();
            $attachment->move(public_path().'/brand_image/', $name);
            $file_name = '/brand_image/'.$name;
            $brand->logo = $file_name;
        }
        $brand->save();
        $request->session()->flash('status','Successfully updated');
        return back();
        
    }
        

    public function deactivate_brand(Request $request)
    {
        $brand = Brand::where('id',$request->id)->first();
        $brand->status = 1;
        $brand->save();

        return "success";
        // return $brand;

    }
    public function activate_brand(Request $request)
    {
        $brand = Brand::where('id',$request->id)->first();
        $brand->status = "";
        $brand->save();

        return "success";
        // return $brand;

    }
}
