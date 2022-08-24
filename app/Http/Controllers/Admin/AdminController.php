<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function updateAdminPassword(Request $request)
    {
        if($request->isMethod('POST')){
            $data = $request->all();
            //Check if current password entered by admin correct
            if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password))
            {
                if($data['confirm_password']==$data['new_password']){
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                    return redirect()->back()->with('Success_message','Password has been updated successfully');
                }
                else
                {
                    return redirect()->back()->with('error_message','Your current password does not match new password');
                }
            }
            else
            {
                return redirect()->back()->with('error_message','Your current password is incorrect!');
            }
        }
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_password')->with(compact('adminDetails'));
    }

    public function checkAdminPassword(Request $request)
    {
        $data = $request->all();
        // echo"<pre>"; print_r($data); die;
        if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
            return "true";
        }
        else
        {
            return "false";
        }
    }

    public function updateAdminDetails(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rules = [
                'admin_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile'=>'required|numeric',
            ];

            $customMessages = [
                'admin_name.required' => 'Name is required',
                'admin_name.regex' => 'Valid Name is required',
                'admin_mobile.required' => 'Mobile is required',
                'admin_mobile.numeric' => 'Valid Mobile is required',
            ];

            $this->validate($request,$rules, $customMessages);

            //Upload Admin Image
            if($request->hasFile('admin_image'))
            {
                $image_tmpt = $request->file('admin_image');
                if($image_tmpt->isValid())
                {
                    //Get image extension
                    $extension = $image_tmpt->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'admin/images/photos/'.$imageName;
                    //Upload the Image
                    Image::make($image_tmpt)->save($imagePath);
                }

            }
            else if(!empty($data['current_admin_image']))
            {
                $imageName = $data['current_admin_image'];
            }
            else
            {
                $imageName = "";
            }

            //Update Admin Details
            Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'],'mobile'=>$data['admin_mobile'],'image'=>$imageName]);
            return redirect()->back()->with('Success_message','Admin details updated successfully');
        }
        return view ('admin.settings.update_admin_details');
    }

    public function updateVendorDetails($slug, Request $request)
    {
        if($slug=="personal")
        {
            if($request->isMethod('POST'))
            {
                $data = $request->all();
                // echo "<pre>"; print_r($data);die;

                $rules = [
                    'vendor_name'=>'required|regex:/^[\pL\s\-]+$/u',
                    'vendor_city'=>'required|regex:/^[\pL\s\-]+$/u',
                    'vendor_mobile'=>'required|numeric',
                ];

                $customMessages = [
                    'vendor_name.required' => 'Name is required',
                    'vendor_city.required' => 'Name is required',
                    'vendor_name.regex' => 'Valid Name is required',
                    'vendor_city.regex' => 'Valid Name is required',
                    'vendor_mobile.required' => 'Mobile is required',
                    'vendor_mobile.numeric' => 'Valid Mobile is required',
                ];

                $this->validate($request,$rules, $customMessages);

                //Upload Admin Image
                if($request->hasFile('vendor_image'))
                {
                    $image_tmpt = $request->file('vendor_image');
                    if($image_tmpt->isValid())
                    {
                        //Get image extension
                        $extension = $image_tmpt->getClientOriginalExtension();
                        //Generate New Image Name
                        $imageName = rand(111,99999).'.'.$extension;
                        $imagePath = 'admin/images/photos/'.$imageName;
                        //Upload the Image
                        Image::make($image_tmpt)->save($imagePath);
                    }

                }
                else if(!empty($data['current_vendor_image']))
                {
                    $imageName = $data['current_vendor_image'];
                }
                else
                {
                    $imageName = "";
                }

                //Update in Admin Table
                Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['vendor_name'],'mobile'=>$data['vendor_mobile'],'image'=>$imageName]);
                //Update in Vendor Table
                Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->update(['name'=>$data['vendor_name'],'mobile'=>$data['vendor_mobile'],'address'=>$data['vendor_address'],'city'=>$data['vendor_city'],'state'=>$data['vendor_state'],'country'=>$data['vendor_country'],'pincode'=>$data['vendor_pincode']]);
                return redirect()->back()->with('Success_message','Vendor details updated successfully');
            }
            $vendorDetails = Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        }
        else if($slug=="business")
        {

        }
        else if($slug=="bank")
        {

        }
        return view('admin.settings.update_vendor_details')->with(compact('slug','vendorDetails'));
    }

    public function login(Request $request)
    {
        if($request->isMethod('POST')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];

            $customMessages = [
                'email.required'=>'Email is required',
                'email.email'=> 'Valid Email is Required',
                'password.required'=>'Password is required'
            ];

            $this->validate($request,$rules,$customMessages);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1]))
            {
                return redirect('adminDashboard');
            }
            else
            {
                return redirect()->back()->with('error_message','invalid Email or Password');
            }
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('adminLogin');
    }
}
