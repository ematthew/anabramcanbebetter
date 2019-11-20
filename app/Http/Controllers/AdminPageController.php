<?php

namespace EBN\Http\Controllers;

use Illuminate\Http\Request;
use EBN\Admin;
use EBN\User;
use Auth;

class AdminPageController extends Controller
{
	/*
	|-----------------------------------------
	| AUTHENTICATE USERS
	|-----------------------------------------
	*/
	public function __construct(){
		// body
		$this->middleware('auth:admin')->except('login');
        $this->middleware('admin_access')->only('users');
	}

    /*
    |-----------------------------------------
    | SHOW LOGIN VIEW
    |-----------------------------------------
    */
    public function login(){
    	// body
        $admin = new Admin;
        $admin->initAdmin();

    	return view('admin.login');
    }

    /*
    |-----------------------------------------
    | ADMIN DASHBOARD
    |-----------------------------------------
    */
    public function dashboard(Request $request){
    	// body
    	return view('admin.dashboard');
    }

    /*
    |-----------------------------------------
    | ARTICLES
    |-----------------------------------------
    */
    public function articles(){
        // body
        return view("admin.articles");
    }

    /*
    |-----------------------------------------
    | MUSICS        
    |-----------------------------------------
    */
    public function musics(){
        // body
        return view("admin.musics");
    }

    /*
    |-----------------------------------------
    | EVENTS
    |-----------------------------------------
    */
    public function events(){
        // body
        return view("admin.events");
    }

    /*
    |-----------------------------------------
    | VIDEOS
    |-----------------------------------------
    */
    public function videos(){
        // body
        return view("admin.videos");
    }

    /*
    |-----------------------------------------
    | CHARTS PAGE
    |-----------------------------------------
    */
    public function charts(){
        // body
        return view("admin.charts");
    }

    /*
    |-----------------------------------------
    | WNEWS PAGE
    |-----------------------------------------
    */
    public function wnews(){
        // body
        return view("admin.wnews");
    }

    /*
    |-----------------------------------------
    | USERS PAGE
    |-----------------------------------------
    */
    public function users(){
        // body
        $users = Admin::orderBy('created_at', 'DESC')->get();
        // return $users;
        return view("admin.users", compact('users'));
    }

    /*
    |-----------------------------------------
    | SETTINGS PAGE
    |-----------------------------------------
    */
    public function settings(){
        // body
        return view("admin.settings");
    }

    /*
    |-----------------------------------------
    | UNAUTHORIZED ERROR PAGE
    |-----------------------------------------
    */
    public function unauthorized(){
        // body
        return view("admin.unauthorized");
    }

    /*
    |-----------------------------------------
    | LOGOUT
    |-----------------------------------------
    */
    public function logout(){
        // body
        Auth::logout();
        return redirect()->route('login_admin_view');
    }
}
