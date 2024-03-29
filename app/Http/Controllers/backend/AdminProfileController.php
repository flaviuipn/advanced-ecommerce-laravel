<?php

namespace App\Http\Controllers\backend;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $adminData = Admin::find(1); //iau id de la admin
        return view('admin.admin_profile_view', compact('adminData')); // cu aceasta comanda compact voi accesa toate datele 
                                                                        //oferite prin id de la admin data
    }
    public function AdminProfileEdit(){
        $editData = Admin::find(1); //iau id de la admin
        return view('admin.admin_profile_edit', compact('editData')); 
    }
    public function AdminProfileStore(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path)); // pentru a inlocui poza anterioara cu cea selectata acum  
                                                                                    // ca sa nu mai salveze toate pozele acolo

            $filename = date('YmdHi').$file->getClientOriginalName(); //cu aceasta functie vom lua poza selectata si o vom pune in folderul
            $file->move(public_path('upload/admin_images'),$filename);            // si o va pune in upload/admin_images   
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notif = array(
            'message' => 'Admin Profile Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notif);
    }
}
