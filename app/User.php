<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin','form_title','name_of_institution','postal_address',
        'phone_no','buildingname','streetname','town','country','qualification','licence_no',
        'doctors_name','doctors_licence_no','resident','fulltime','periodicsupervision',
        'Salesperson','Branch','Terms',
        'role',

 'update_status','update_values'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(){
        return ($this->admin == 1);
    }

    public function isSubAdmin(){
        return ($this->admin !== null);
    }

    public function isStaff(){
        return ($this->staff == 2);
    }

     public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    public function lalamishi()
    {
    return $this->hasMany(Complain::class,'users_id');
    }

// Admins  Roles Sections
    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

        public function authorizeRoles($roles)
    {
    if ($this->hasAnyRole($roles)) {
        return true;
    }
    abort(401, 'This action is unauthorized.');
    }
    public function hasAnyRole($roles)
    {
    if (is_array($roles)) {
        foreach ($roles as $role) {
        if ($this->hasRole($role)) {
            return true;
        }
        }
    } else {
        if ($this->hasRole($roles)) {
        return true;
        }
    }
    return false;
    }
    public function hasRole($role)
    {
    if ($this->roles()->where('name', $role)->first()) {
        return true;
    }
    return false;
    }


}
