<?php
namespace Ajtarragona\WebComponents\Models\Demo;

use Ajtarragona\WebComponents\Models\BaseSortableModel as Model;
use Ajtarragona\WebComponents\Models\Demo\Item;

class Type extends Model
{
	public $table = 'ajt_types';
  public $timestamps = false;

  public static $perpage = 10;
  

  public $sortable = [
   		'id','name','description'
  ];


  protected $fillable = [
        'name','description'
	];


	public function items()
  {
      return $this->hasMany(Item::class);
  }

  public static function getFiltered($filters=false){
        $ret= self::sortable()->filter($filters)->paginate(self::$perpage,['*'],"type");
        //dd($ret);
        return $ret;
  }
    

  public function scopeFilter($query, $filter=false)
  {
       
        if(!$filter) return;

        //filtro por la request
       
       
        if($filter->textfilter){
            $textfilter=$filter->textfilter;
            $query->where(function ($query) use ($textfilter) {
                $query->where('name', 'like','%'.$textfilter.'%')
                 ->orWhere('description', 'like','%'.$textfilter.'%');
            });
            
        }

  }
}