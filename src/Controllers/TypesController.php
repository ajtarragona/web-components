<?php

namespace Ajtarragona\WebComponents\Controllers; 

use Ajtarragona\WebComponents\Models\Demo\Type;
use Ajtarragona\WebComponents\Models\Demo\TypeFilter;
use Ajtarragona\WebComponents\Requests\TypeValidate;
use Illuminate\Http\Request;
use Ajtarragona\WebComponents\Controllers\BaseController as Controller;
use Exception;  //si no se importa coge la Exception de PhP


class TypesController extends Controller
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
       $typefilter=session('typefilter',new TypeFilter());
       $types=Type::getFiltered($typefilter);

       return $this->view('demo.types.list', compact('typefilter','types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type=new Type;
        return $this->view('demo.types.new', compact('type'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeValidate $request)
    {
         try{
            $type=Type::create($request->all());
            
            $body=__('record.created',['id'=>$type->id]);
            
            $body.=" <a href='". route('webcomponents.demo.types.show',[$type->id])."' class='btn btn-success btn-xs'>".__("Access")." ".icon('arrow-right')."</a>";

            return redirect()
                    ->route('webcomponents.demo.types.index')
                    ->with(['success'=>$body]);
            
        }catch(Exception $e){
             // dd($e);
             return redirect()
                ->route('webcomponents.demo.types.index')
                ->with(['error'=>__('record.saveerror')]); 
        }     
    }

    /**
     * Display the specified resource.
     *
     * @param  Ajtarragona\WebComponents\Models\Demo\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return $this->view('demo.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Ajtarragona\WebComponents\Models\Demo\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
        $this->show($type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ajtarragona\WebComponents\Models\Demo\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(TypeValidate $request, Type $type)
    {
       	
        try{
            $type->update($request->all());
            return redirect()
                    ->route('webcomponents.demo.types.show',[$type->id])
                    ->with(['success'=>__('record.updated',['id'=>$type->id])]);
            
        }catch(Exception $e){
        	 
             return redirect()
                 ->route('webcomponents.demo.types.index')
                ->with(['error'=>__('record.saveerror')]); 
        }       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Ajtarragona\WebComponents\Models\Demo\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //borra la categoria
        try{
            $type->delete();
            return redirect()->route('webcomponents.demo.types.index')->with(['success'=>__('record.removed')]); 
         }catch(Exception $e){
             
             return redirect()->route('webcomponents.demo.types.index')->with(['error'=>__('record.removeerror')]); 
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
           session(['typefilter'=> new TypeFilter()]);
        }else{
            session(['typefilter'=> new TypeFilter($request->all())]);
        }
        
        return redirect()->route('webcomponents.demo.types.index');
    }


    public function typemodal($type_id=false)
    {
        $type=new Type;
        if($type_id) $type=Type::find($type_id);

        return $this->view('demo.types.modalform', compact('type'));
    }
}