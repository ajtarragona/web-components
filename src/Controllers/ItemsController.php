<?php

namespace Ajtarragona\WebComponents\Controllers; 

use Ajtarragona\WebComponents\Models\Demo\Item;
use Ajtarragona\WebComponents\Models\Demo\Type;
use Ajtarragona\WebComponents\Models\Demo\ItemFilter;
use Ajtarragona\WebComponents\Requests\ItemValidate;
use Illuminate\Http\Request;
use Ajtarragona\WebComponents\Controllers\BaseController as Controller;
use Exception;  //si no se importa coge la Exception de PhP


class ItemsController extends Controller
{
    

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $this->publishPackageAssets();
       
       /* $user = Adldap::search()->users()->find('martinez');
       return $user;*/
       $itemfilter=session('itemfilter',new ItemFilter());
       $types=Type::getAllCombo();
       
       $items=Item::getFiltered($itemfilter);

       return $this->view('demo.items.list', compact('items','itemfilter','types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=Type::getAllCombo();
        $item=new Item;
        return $this->view('demo.items.new', compact('item','types'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemValidate $request)
    {
         try{
            $item=Item::create($request->all());
            
            $body=__('record.created',['id'=>$item->id]);
            
            $body.=" <a href='". route('webcomponents.demo.items.show',[$item->id])."' class='btn btn-success btn-xs'>".__("Access")." ".icon('arrow-right')."</a>";

            return redirect()
                    ->route('webcomponents.demo.items.index')
                    ->with(['success'=>$body]);
            
        }catch(Exception $e){
             // dd($e);
             return redirect()
                ->route('webcomponents.demo.items.index')
                ->with(['error'=>__('record.saveerror')]); 
        }     
    }

    /**
     * Display the specified resource.
     *
     * @param  Ajtarragona\WebComponents\Models\Demo\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $types=Type::getAllCombo();
        return $this->view('demo.items.show', compact('item','types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Ajtarragona\WebComponents\Models\Demo\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        $this->show($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ajtarragona\WebComponents\Models\Demo\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemValidate $request, Item $item)
    {
       
        try{
            $item->update($request->all());
            return redirect()
                    ->route('webcomponents.demo.items.show',[$item->id])
                    ->with(['success'=>__('record.updated',['id'=>$item->id])]);
            
        }catch(Exception $e){
             return redirect()
                 ->route('webcomponents.demo.items.index')
                ->with(['error'=>__('record.saveerror')]); 
        }       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Ajtarragona\WebComponents\Models\Demo\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //borra la categoria
        try{
            $item->delete();
            return redirect()->route('webcomponents.demo.items.index')->with(['success'=>__('record.removed')]); 
         }catch(Exception $e){
             
             return redirect()->route('webcomponents.demo.items.index')->with(['error'=>__('record.removeerror')]); 
        }
    }



    /**
     * Filters the resource .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function filter(Request $request){
        //dd($request->all());
        if($request->submitaction=="clear"){
           session(['itemfilter'=> new ItemFilter()]);
        }else{
            session(['itemfilter'=> new ItemFilter($request->all())]);
        }
        
        return redirect()->route('webcomponents.demo.items.index');
    }


    public function itemmodal($item_id=false)
    {
        $types=Type::getAllCombo();
        $item=new Item;
        if($item_id) $item=Item::find($item_id);

        return $this->view('demo.items.modalform', compact('item','types'));
    }
}