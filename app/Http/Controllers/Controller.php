<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUpdateProductRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create()
    {
    return view('ajax.produto.cadastraProduto');
    }
    public function show($id)
    {
            return view('ajax.produto.visualizarProduto');
    }
    public function store(StoreUpdateProductRequest $request)
    {
        
        $data= $request->only('name','description','price','category');

        if ($request->hasFile('image') && $request->image->isValid()) {
            // $nameFile=$request->name . '.' . $request->image->extension();
            $imagePath= $request->image->store('products');

            $data['image']= $imagePath;
        }
        $this->repository->create($data);

        return redirect()->route('products.index');
        
       
    }

 }
