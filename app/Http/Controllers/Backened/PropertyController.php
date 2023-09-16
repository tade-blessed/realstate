<?php

namespace App\Http\Controllers\Backened;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\MultiImage;
use App\Models\Facility;
use App\Models\Amentesis;
use App\Models\PropertyType;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\carbon;

class PropertyController extends Controller
{
    public function AllProperty(){
        $property=property::latest()->get();
        return view('backend.property.all_property',compact('property'));
    }//end method
    public function AddProperty(){
        $propertytype=PropertyType::latest()->get();
        $amenities=Amentesis::latest()->get();
        $activeAgent=User::where('status','active')->where('role','agent')->latest()->get();
        return view('backend.property.add_property',compact('propertytype','amenities','activeAgent'));
    }//end method
    public function StoreProperty(Request $request){
        $amen=$request->amenitis_id;
        $amenities=implode(",",$amen);
        $pcode=IdGenerator::generate(['table'=>'properties','field'=>'property-code','length'=>5,'prefix'=>'pc']);
        $image=request()->file('property_thambnail');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(370,250)->save('upload/property/thambnail/'.$name_gen);
        $save_url='upload/property/thambnail/'.$name_gen;
        $property_id=Property::insertGetId([
            'ptype_id'=>request->ptype_id,
            'amenitis_id'=>$amenities,
            'property_name'=>$request->property_name,
            'property_slug'=>strtolower(str_replace('','-',$request->property_name) ),
            'property_code'=>$pcode,
            'ptype_id'=>request->ptype_id,

            'property_status'=>request->property_status,
            'lowest_price'=>request->lowest_price,
            'max_price'=>request->max_price,
            'short_descp'=>request->short_desc,
            'long_descp'=>request->short_desc,
            'bedrooms'=>request->bedrooms,
            'bathrooms'=>request->bathrooms,
            'garage'=>request->garage,

            'garage_size'=>request->garage_size,
            'property_size'=>request->property_size,
            'address'=>request->address,
            'latitude'=>request->latitude,
            'longtude'=>request->longtude,
            'city'=>request->city,
            'state'=>request->state,
            'property_video'=>request->property_video,
            'neighborhood'=>request->neighborhood,
            'featured'=>request->featured,
            'hot'=>request->hot,
            'agent_id'=>request->agent_id,
            'status'=>1,
            'property_thambnail	'=>request->$save_url,
            'created_at'=>Carbon::now(),

        ]);
        ///////start multiImage/////
        $images=request->file('multi_image');
        foreach($images as $img){
        $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(370,250)->save('upload/property/multi_image/'.$name_gen);
        $save_path='upload/property/multi_image/'.$make_name;
        MultiImage::insert([
            'property_id'=>'property_id',
            'photo_name'=>'$save_path',
            'created_at'=>Carbon::now(),

        ]);
        }//end foreach
         ///////end multiImage/////

    }//end method
}
