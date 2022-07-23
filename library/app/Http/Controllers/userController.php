<?php

namespace App\Http\Controllers;

// use mail;
use App\Models\book;
use App\Models\User;
use App\Mail\userMail;
use App\Models\article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Mail as FacadesMail;

class userController extends Controller
{
    public function register(Request $request)
    {
        if ($request->post()) {
            $request->validate([
                "userName" => "required|unique:users,userName|max:8",
                "email" => "required|unique:users,email",
                "password" => "required|min:4",
                "mobile" => "required|min:11",
            ]);

            user::create([
                "userName" => $request->userName,
                "email" => $request->email,
                "password" => $request->password,
                "mobile" => $request->mobile,
                "role" => $request->role,
                "avatar" => "default",
            ]);

            $path = '/index' ;
            return redirect($path);
        }
    }



    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // $path = auth()->user()->role == 2 ? 'author/index' : 'writer/index';
            return redirect("/index");
        }
        return redirect()->back();
    }


    public function profile(User $user)
    {
        $follow =    Auth::user()->following->contains($user);
        $follwing =    Auth::user()->following;
        $latest_books = book::where("user_id", $user->id)->latest()->take(4)->get();
        $latest_articles = article::where("user_id", $user->id)->latest()->take(4)->get();
        if ($user->role == 2)
            return view("site.authorProfile.index", ["latest_books" => $latest_books, "latest_articles" => $latest_articles, "user" => $user, 'follow' => $follow]);

            return view("site.readerprofile.index", [ "user" => $user, 'follwing' => $follwing]);
    }

    public function editProfile(User $user)
    {
        if ($user->role == 2)
            return view("site.authorProfile.edit", compact("user"));
        else
            return view("site.readerprofile.edit" , compact("user"));
    }

    public function follow(User $user)
    {
        Auth::user()->following()->toggle($user);
        return redirect()->back();
    }


    public function updateProfile(User $user)
    {
        if ($user->role ==  2)
            $this->updateUserAbout($user);
        $this->updateUserInformation($user);

        return redirect()->back();
    }

    public function updateUserInformation($user)
    {

        request()->validate([
            "userName" => "required|unique:users,userName,".$user->id."|max:12",
            "email" => "required|unique:users,email,".$user->id,
            "mobile" => "numeric|required|min:11",
            "avatar" => "image",
        ]);

        $active =   $user->email == request()->email ?  $user->active  : 0;
       $path = isset(request()->avatar) ? request()->avatar->store('uploads/users/avatar','public')  : $user->avatar;
        $user->update(
            [
                "email" => request()->email,
                "userName" => request()->userName,
                "mobile" => request()->mobile,
                "active" => $active,
                "avatar" => $path,
            ]
        );
    }

    public function updateUserAbout($user)
    {
   request()->validate(
    [
        "about"=>"required|min:20"
    ]
    );
        $about = request()->about == $user->about ?  $user->about  : request()->about;
        $user->about->update([
            "about" => $about
        ]);
    }



    public function overView($user)
    {

       return view("site.overView" , compact("user"));

  }



  public function logout(){
    Auth::logout();
    return redirect()->back();
  }

  public function search($value){
   $books = book::where('name', 'like' , '%'.$value.'%')->where('status' , 1)->get();
   $articles = article::where('subject', 'like' , '%'.$value.'%')->where('status' , 1)->get();
   $users = user::where('userName', 'like' , '%'.$value.'%')->get();
  return view("site.search" , compact("books" , "users", 'articles'));


  }
}
