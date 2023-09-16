<?php
namespace App\Http\Controllers\Backened;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;
use App\Models\Amentesis;
class ProperttyTypeController extends Controller
{
    public function AllType(){
        $types=PropertyType::latest()->get();
        return view('backend.type.all_type',compact('types'));
    }//end method
    public function Addtype(){
        return view('backend.type.add_type');
    }//end method
    public function StoreType(Request $request){
        //validate
        $request->validate([
            'type_name'=>'required|unique:property_types|max:200',
            'type_icon'=>'required'
        ]);
        PropertyType::insert([
            'type_name'=>$request->type_name,
            'type_icon'=>$request->type_icon,
        ]);
        $notification=array(
            'message'=>'property_type created Succesfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.type')->with($notification);
    }//end method
    public function EditType($id){
        $types=PropertyType::findOrFail($id);
        return view('backend.type.edit_type',compact('types'));
    }
    public function UpdateType(Request $request){
       $pid=$request->id;
        PropertyType::findOrFail($pid)->update([
            'type_name'=>$request->type_name,
            'type_icon'=>$request->type_icon,
        ]);
        $notification=array(
            'message'=>'property_type updated Succesfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.type')->with($notification);
}//end method
public function DeleteType($id){
     PropertyType::findOrFail($id)->delete(); 
     $notification=array(
         'message'=>'property_type Deleted Succesfully',
         'alert-type'=>'success'
     );
     return redirect()->back()->with($notification);
}//end method
////////////amenities all method
public function AllAmenitie(){
    $amenities=Amentesis::latest()->get();
        return view('backend.amenities.all_amenities',compact('amenities'));
    }//end method
    public function AddAmenitie(){
        return view('backend.amenities.add_amenities');
    }//end method
    public function StoreAminities(Request $request){
        
    Amentesis::insert([
            'amenitis_name'=>$request->amenitis_name,
        ]);
        $notification=array(
            'message'=>'amenities created Succesfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.amenitie')->with($notification);
    }//end method
    public function DeleteEminities($id){
        Amentesis::findOrFail($id)->delete(); 
        $notification=array(
            'message'=>'Amenities Deleted Succesfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
   }//end method
   public function EditEminitie($id){
    $amenities=Amentesis::findOrFail($id);
    return view('backend.amenities.edit_amenities',compact('amenities'));
}//end method
public function UpdateAminitie(Request $request){
    $ame_id=$request->id;
        
    Amentesis::findOrFail($ame_id)->update([
            'amenitis_name'=>$request->amenitis_name,
        ]);
        $notification=array(
            'message'=>'amenities updated Succesfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.amenitie')->with($notification);
    }//end method
}
