<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\UpadateUser;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
   // public function __construct()
   // {   
      //$this->middleware('auth');
    //}

    public function createUser()
    {
        return view('createUser');
    }
    public function saveUser(Request $request)
    {

        $request->validate([
            'ime'=>'required',
            'prezime'=>'required',
            'email'=>'required|email',
            'sifra'=>'required'

        ]);
       $user=new User;
       $user->ime=$request->ime;
       $user->prezime=$request->prezime;
       $user->email=$request->email;
       $user->password=Hash::make($request->sifra);
       $user->save();

       return redirect()->back()->with('success','Uspesno ste dodali novog korisnika');
    }
    public function showUser()
    {   
        $korisnici=User::paginate(3);
        return view('users',compact('korisnici'));
    }
    public function show(User $user)
    {
        return view('viewUser', ['user' => $user]);
    }
    public function viewUser($id)
    {   
      
           $user=User::find($id);
           return view('viewUser',compact('user'));
       
    }
    public function updateUser(UpadateUser $request, $id)
    {
        $user = User::findOrFail($id);
        
        $user->ime = $request->ime;
        $user->prezime = $request->prezime;
        $user->email = $request->email;
        $user->password =Hash::make( $request->password);
       

        $user->save();
        return redirect()->back()->with('success', 'User has been updated successfuly.');

    }
    public function deleteUser(Request $request,$id)
    {
        $user=User::findOrFail($id);
        $user->delete();

        return redirect('admin/users');
    }
}
