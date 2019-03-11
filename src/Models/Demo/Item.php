<?php
namespace Ajtarragona\WebComponents\Models\Demo;

use Ajtarragona\WebComponents\Models\BaseSortableModel as Model;
use Ajtarragona\WebComponents\Models\Demo\Type;

class Item extends Model
{
	public $table = 'ajt_items';

	public static $perpage = 10;
   
    public $sortable = [
   		'id','name','number','type_id','description','created_at'
    ];


   	protected $fillable = [
        'name','number','type_id','description'
	];

	public function type()
    {
      return $this->belongsTo(Type::class);
    }




    public static function getFiltered($filters=false){
        $ret= self::sortable()->filter($filters)->paginate(self::$perpage,['*'],"items");
        //dd($ret);
        return $ret;
    }
    

    public function scopeFilter($query, $filter=false)
    {
       
        if(!$filter) return;

        //filtro por la request
       
        if($filter->type_id){
            $query->whereIn('type_id', $filter->type_id);
        }

        if($filter->textfilter){
            $textfilter=$filter->textfilter;
            $query->where(function ($query) use ($textfilter) {
                $query->where('name', 'like','%'.$textfilter.'%')
                 ->orWhere('description', 'like','%'.$textfilter.'%');
            });
            
        }

    }


	
}