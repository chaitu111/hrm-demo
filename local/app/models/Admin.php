<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Admin extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

    public  static $rules=[
        'name'  =>  'required',
        'email' =>  'required|email'
    ];

    public  static $rules_password=[
        'password'              =>  'required|confirmed',
        'password_confirmation' =>  'required|min:5'
    ];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
    protected $fillable = ['name' ,'email', 'password'];

}
