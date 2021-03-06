<?php
namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;



class User extends Authenticatable
{

 
use Notifiable;
/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $fillable = [
'name', 'email', 'password', 'usertype',
];
/**
* The attributes that should be hidden for arrays.
*
* @var array
*/
protected $hidden = [
'password', 'remember_token',
];

protected $guarded =[];
/**
* The attributes that should be cast to native types.
*
* @var array
*/
protected $casts = [
'email_verified_at' => 'datetime',
];

    public function studentcourse()
    {
        return $this->hasMany('App\StudentRegisterCourse',);
    }

    public function tutorcourse()
    {
        return $this->hasMany('App\TutorRegisterCourse', 'user_id');
    }
   public function slots()
    {
        return $this->hasMany('App\AvailableTimeSlot');
    }

    public function TutorProfile()
    {

      return $this->hasOne(TutorProfile::class);
    }

    public function student_profile()
    {

      return $this->hasOne(StudentProfile::class);
    }
/*
    public function TutorCoure()
    {
        return $this->hasMany('App\TutorRegisterCourse', 'registered');
    }*/

    public function friends() 
    {
        return $this->hasMany('App\FriendRequest', 'sender');
    }
    public function friends1() 
    {
        return $this->hasMany('App\FriendRequest', 'recipient');
    }

    /**
     * A user can have many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
      return $this->hasMany('App\Message', 'from');
    }
    public function messages1()
    {
      return $this->hasMany('App\Message', 'to');
    }

    public function meetings() 
    {
        return $this->hasMany('App\Meeting', 'student_id');
    }

     public function meetings1() 
    {
        return $this->hasMany('App\Meeting', 'tutor_id');
    }

      public function assignment() 
    {
        return $this->hasMany('App\Assignment', 'tutor_id');
    }

      public function assignment1() 
    {
        return $this->hasMany('App\Assignment', 'student_id');
    }


}

