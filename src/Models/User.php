<?php

namespace Ajtarragona\WebComponents\Models;

//use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    //use HasApiTokens,Notifiable;
    use Notifiable;
    use Sortable;
    use HasApiTokens;
    
  public $sortable = ['name',
                    'username',
                    'email',
                    'id',
                    'created_at',
                    'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // public function roles(){
    //     return $this->hasMany(Role::class)->withPivot('team_id');
    // }

    
    public static function getFiltered($filters=false){
        $ret= self::sortable()->filter($filters)->paginate(10,['*'],"users");
        //dd($ret);
        return $ret;
    }
    

    public function scopeFilter($query, $filter=false)
    {
       
        if(!$filter) return;

        //filtro por la request
        //dd($filters);

        
        
        if($filter->textfilter){
            $textfilter=$filter->textfilter;
            $query->where(function ($query) use ($textfilter) {
                $query->where('email', 'like','%'.$textfilter.'%')
                 ->orWhere('name', 'like','%'.$textfilter.'%')
                 ->orWhere('username', 'like','%'.$textfilter.'%');
            });

            
        }

    }

    

    

}
