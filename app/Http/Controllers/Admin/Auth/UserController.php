<?php

namespace App\Http\Controllers\Admin\Auth;

use App\DataTables\CMSDataTable;
use App\DataTables\ContactUsDataTable;
use App\DataTables\registrationDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;
use App\Http\Requests\blog\UserRequest;
use App\Http\Requests\blog\AdminRequest;
use App\Http\Requests\User\About_usRequest;
use App\Http\Requests\User\AdminsettingRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Models\Admin;
use App\Models\CMS;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function indexUser(registrationDataTable $dataTable)
    {
        $registration = User::get();
        return $dataTable->render('admin.layout.userlist');
    }
    public function showUser($id)
    {
        $registration = User::find($id);
        return view('admin.layout.showuser', ['registration' => $registration]);
    }
    public function destroy($id)
    {
        $registration = User::find($id);
        $registration->delete();
        return redirect()->back()->with('error', 'data deleted');
    }
    public function editUser($id)
    {
        $registration = User::find($id);
        return view('admin.layout.userchangepass', ['registration' => $registration]);
    }
    public function editAdmin($id)
    {
        $admins = Admin::find($id);
        return view('admin.layout.adminchanagepass', ['admins' => $admins]);
    }
    public function updateUserpass(UserRequest $request)
    {
        $registration = User::find($request->id);
        if (Hash::check($request->password, $registration->password)) {
            $registration->fill([
                'password' => Hash::make($request->new_password),
            ])->save();
            $request->session()->flash('success', 'Password changed');
            return redirect()->route('admin.user');
        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->back();
        }
    }
    public function adminchanagepass(AdminRequest $request)
    {
        $admins = Admin::find($request->id);
        if (Hash::check($request->password, $admins->password)) {
            $admins->fill([
                'password' => Hash::make($request->new_password),
            ])->save();
            $request->session()->flash('success', 'Password changed');
            return view('admin.dashboard');
        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->back();
        }
    }
    public function settingedit($id){
        $setting = Setting::find($id);
        return view('admin.layout.settings', ['setting' => $setting]);
    }

    public function settingupdate(AdminsettingRequest $request){
        $setting = Setting::find($request->id);
        $images = uploadFile($request['logo'], 'profile');
        $setting->logo = $images;
        $setting->website = $request['website'];
        $setting->link_1 = $request['link_1'];
        $setting->link_2 = $request['link_2'];
        $setting->link_3 = $request['link_3'];
        $setting->save();
        $request->session()->flash('success', 'Your Data inserted successfully ');
        return redirect()->route('admin.dashboard');
    }

    //about us
    public function indexAbout(CMSDataTable $dataTable)
    {
        $cms = CMS::get();
        return $dataTable->render('admin.layout.about_index');
    }
    public function aboutusedit($id){
        $cms = CMS::find($id);
        return view('admin.layout.about_us', ['cms' => $cms]);
    }
    public function aboutusupdate(About_usRequest $request){
        $cms = CMS::find($request->id);
        $images = uploadFile($request['image'], 'profile');
        $cms->title = $request['title'];
        $cms->description = $request['description'];
        $cms->image = $images;
        $cms->save();
        $request->session()->flash('success', 'Your Data inserted successfully ');
        return redirect()->route('admin.about_show');
    }
    public function destroyAbout($id)
    {
        $cms = CMS::find($id);
        $cms->delete();
        return redirect()->back()->with('error', 'data deleted');
    }

    //Contact Us 
    public function indexContact(ContactUsDataTable $dataTable){

        $contact = ContactUs::get();
        return $dataTable->render('admin.layout.contact_index');
    }
    public function destroyContact($id)
    {
        $contact = ContactUs::find($id);
        $contact->delete();
        return redirect()->back()->with('error', 'data deleted');
    }
}
