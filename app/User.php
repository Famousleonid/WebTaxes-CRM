<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use Notifiable;
    use InteractsWithMedia;
    use \HighIdeas\UsersOnline\Traits\UsersOnlineTrait;

    protected $fillable = ['name', 'email', 'password', 'is_admin', 'phone', 'address','role', 'chat'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function firms () {
        return $this->hasMany(Firm::class);
    }
    public function isAdmin() {
        return $this->is_admin === 1;
    }
    public function registerAllMediaConversions(): void
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50)
            ->nonOptimized();
    }

    public function message() {
        return $this->hasMany("App\Message");
    }

//    public function getOnlineAttribute() {
//        $activity = DB::table('sessions')->where('user_id',$this->id)->where('last_activity','>',strtotime("-15 minutes"))->count();
//        return $activity ? 'Online' : 'Offline' ;
//    }

}
