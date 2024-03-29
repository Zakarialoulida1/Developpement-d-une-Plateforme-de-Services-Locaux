<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\categorie;
use App\Models\profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class profilcontroller extends Controller
{
    public function index()
    {
        
        $profiles = profiles::orderBy('created_at', 'desc')->paginate(6);


        // $profiles = profiles::select('categories.name AS categoryname', 'profiles.*')
        // ->join('categories', 'profiles.category_id', '=', 'categories.id')
        // ->get();

        // $profiles=DB::table('profiles')
        // ->select('categories.name AS categoryname ','profiles.*')
        // ->join('categories','profiles.category_id','=','categories.id')
        // ->paginate(9);




        return view('profil.index', compact('profiles'));
    }
    // public function show(Request $request){
    //    $id= $request->id;
    //     $profil=profiles::findorfail($id);  //find  function that fetch the profil **  findorfail function have the same feature find in addition to fail when the profil not found
    // //  if($profil === Null){
    // //    return  abort(404);  abort send to page not found
    // //  }

    //     return view('profil.detailProfil',compact('profil'));
    // }
    public function show(profiles $profil)
    {
       
        return view('profil.detailProfil', compact('profil'));
    }


    public function create()
   
    {
        $categories = categorie::all();
        return view('profil.create', compact('categories'));
    }


    // public function store(Request $request)
    // {
    //     $name = $request->name;
    //     $email = $request->email;
    //     $password =Hash::make( $request->password);


    //     $bio = $request->bio;
    //     //valiodation
    //     $request->validate([
    //         'name' => 'required|unique:profiles',    //  |max:20|min:3|between: 3,10  |boolean (true or false* 0 or1)|date|email|url|unique:(defines which tables it's necessary)   
    //         'email' => 'required|email|unique:profiles',   
    //         'password' => 'regex:/^(?=.*[A-Za-z])(?=.*\d).{8,}$/|required|confirmed',
    //         'bio' => 'min:40',
    //     ]);
    //     //insertion


    //     profiles::create([

    //         //$request->post()  there is also this method post who simplify the code using the post but it must the names in the form similar to the data base
    //         'name' => $name,
    //         'email' => $email,
    //         'password' => $password,
    //         'bio' => $bio,
    //     ]);
    //     //redirection
    //     //redirect('url')
    //     // redirect()->route('profile', ['id' => 1]);  => For convenience and to minimise the syntax, Laravel also offers the global to_route function****to_route('profile', ['id' => 1])***
    //     //redirect->action
    //     //back()->withinput(request) return to the previous page
    //     return redirect()->route('profil.index')->with('success', $name . '  votre compte est bien crée ');
    // }



    public function store(StorePostRequest $request)
    {

        $validated = $request->validated();
        $validated['user_id']=Auth::id();
        
        profiles::create($validated);
        return redirect()->route('profil.index')->with('success', '  votre service est bien crée ');
    }


    public function editshow(profiles $profil)
    {
        $categories = categorie::all();

        return view('profil.edit', compact('profil', 'categories'));
    }
    public function Updateservice(profiles $profil ,StorePostRequest $request)
    {
    
         $profil->update($request->validated());

        return redirect()->route('profil.index')->with('success', 'votre service est bien Modifiée ');
    }
    public function deleteservice(profiles $profil){
        $profil->delete();
       return to_route('profil.index')->with('success', '  votre service est bien supprimée ');
    }
}
