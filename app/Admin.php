<?php

namespace EBN;

use Illuminate\Database\Eloquent\Model;
use EBN\BioData;
use EBN\ArticleSource;
use EBN\ArticleAuthor;

class Admin extends Model
{
    /*
    |-----------------------------------------
    | INIT ADMIN
    |-----------------------------------------
    */
    public function initAdmin(){
    	// body
    	$admin = Admin::where('email', 'admin@ebn.ng')->first();
    	if($admin == null){
    		// create default admin
    		$this->createDefaultAdmin();
    	}
    }

    /*
    |-----------------------------------------
    | CREATE DEFAULT ADMIN
    |-----------------------------------------
    */
    public function createDefaultAdmin(){
    	// body
    	$admin 				= new Admin();
    	$admin->name 		= "Admin User";
    	$admin->email 		= "admin@anambracanbebetter.org.ng";
    	$admin->password 	= bcrypt("password12345");
    	$admin->role     	= 1;
    	$admin->status   	= true;
    	$admin->save();
    }

    /*
    |-----------------------------------------
    | CREATE DEFAULT USER
    |-----------------------------------------
    */
    public function registerNewUser($payload){
        // body
        $already_exist = Admin::where("email", $payload->email)->first();
        if($already_exist !== null){
            $data = [
                'status'  => 'error',
                'message' => $payload->email.' already exist!'
            ];
        }else{

            $user           = new Admin();
            $user->name     = $payload->firstname.' '.$payload->lastname;
            $user->email    = $payload->email;
            $user->password = bcrypt('password');
            $user->role     = 2;
            $user->status   = true;
            if($user->save()){

                $bio_data           = new BioData();
                $bio_data->admin_id = $user->id;
                $bio_data->phone    = $payload->phone;
                $bio_data->save();

                $data = [
                    'status'    => 'success',
                    'message'   => $payload->firstname.' has been created successfully!'
                ];
            }else{
                $data = [
                    'status'  => 'error',
                    'message' => 'Error creating new user!'
                ];
            }
        }

        // return
        return $data;
    }

    /*
    |-----------------------------------------
    | BIO DATA
    |-----------------------------------------
    */
    public function bio(){
        // body
        return $this->hasOne(BioData::class, 'admin_id');
    }

    /*
    |-----------------------------------------
    | TOTAL POST MADE
    |-----------------------------------------
    */
    public function articles(){
        // body
        return $this->hasMany(ArticleAuthor::class, 'admin_id');
    }
}
