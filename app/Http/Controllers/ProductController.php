<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Carrinho;
use App\Models\Category;
use App\Models\Deposito;
use App\Models\ModelProduct;
use App\Models\Product;
use App\Models\Story;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $objUser;
    private $repository;
    private $repositoryuser;
    private $repositorycategory;
    private $objProduct;
    private $objCategory;
    private $objDeposito;
    private $objStory;
    private $objCarrinho;
    protected $request;
    public function __construct(Request $request, Product $product,User $user, Category $categoria,Story $story)
    {
        $this->repository=$product;
        $this->repositoryuser=$user;
        $this->repositorystory=$story;
        $this->repositorycategory=$categoria;
        $this->objUser=new User();
        $this->objProduct=new Product();
        $this->objCategory=new Category();
        $this->objStory=new Story();
        $this->objStory=new Carrinho();
        $this->objDeposito=new Deposito();
       // $this->middleware('auth'); coloca autenticação em tudo

      /* $this->middleware('auth')->only([
            'create','store'
       ]);*///coloca autenticação nas selecionadas

       //$this->middleware('auth')->except('index'); coloca autenticação em todas exceto as selecionadas
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('index');
        $products= Product::paginate(10);
        return view('index', [
            'products'=>$products,
        ]);
    }
    public function visualizarProduto()
    {
        // return view('index');
        $products= Product::paginate(10);
        return view('ajax.produto.visualizarProduto', [
            'products'=>$products,
        ]);
    }
    public function visualizarUsuario()
    {
        // return view('index');
        $users= User::paginate(10);
        return view('ajax.usuario.visualizarUsuario', [
            'users'=>$users,
        ]);
    }
    public function visualizarCategory()
    {
        // return view('index');
        $categorys= Category::paginate(10);
        return view('ajax.categoria.visualizarCategoria', [
            'categorys'=>$categorys,
        ]);
    }
    public function visualizarStory()
    {
        // return view('index');
        $storys= Story::paginate(10);
        return view('ajax.estoque.visualizarEstoque', [
            'storys'=>$storys,
        ]);
    }
    public function visualizarDeposito()
    {
        // return view('index');
        $categorys= Category::paginate(10);
        return view('ajax.categoria.visualizarCategoria', [
            'categorys'=>$categorys,
        ]);
    }
    public function visualizarCarrinho()
    {
        // return view('index');
        $categorys= Category::paginate(10);
        return view('ajax.categoria.visualizarCategoria', [
            'categorys'=>$categorys,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProducts()
    {
        $categorys= Category::paginate(10);
        $category=$this->objCategory->all();
        return view('ajax.produto.cadastraProduto',['categorys'=>$categorys]);
    }
    public function createCategory()
    {
        $categorys= Category::paginate(10);
        return view('ajax.categoria.CadastraCategoria');
    }
    public function createuser()
    {
        return view('ajax.usuario.CadastraUsuario');
    }
    public function createStory()
    {
        return view('ajax.estoque.cadastraEstoque');
    }
    public function createDeposito()
    {
        $categorys= Category::paginate(10);
        $category=$this->objCategory->all();
        return view('ajax.produto.cadastraProduto',['categorys'=>$categorys]);
    }
    public function createCarrinho()
    {
        $categorys= Category::paginate(10);
        $category=$this->objCategory->all();
        return view('ajax.produto.cadastraProduto',['categorys'=>$categorys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Requests\StoreUpdateProductRequest
     */
    public function productStore(StoreUpdateProductRequest $request)
    {
        
        $data= $request->only('name','description','price','category_category');

        if ($request->hasFile('image') && $request->image->isValid()) {
            // $nameFile=$request->name . '.' . $request->image->extension();
            $imagePath= $request->image->store('products');

            $data['image']= $imagePath;
        }
        $this->repository->create($data);

        return redirect()->route('products.index');
        
       
    }
    public function userStore(Request $request)
    {
        
        $data= $request->only('name','email','password');
        $this->repositoryuser->create($data);
        return redirect()->route('products.index');
        
       
    }
    public function categoryStore(Request $request)
    {
        $data= $request->only('category');
        $this->repositorycategory->create($data);
        return redirect()->route('administra.index');
    }
    public function storyStore(Request $request)
    {
        
        $data= $request->only('story');
        $this->repositorystory->create($data);
        return redirect()->route('administra.story');
    }
    public function depositoStore(StoreUpdateProductRequest $request)
    {
        
        $data= $request->only('name','email','password');

        if ($request->hasFile('image') && $request->image->isValid()) {
            // $nameFile=$request->name . '.' . $request->image->extension();
            $imagePath= $request->image->store('products');

            $data['image']= $imagePath;
        }
        $this->repository->create($data);

        return redirect()->route('products.index');
    }
    public function carrinhoStore(StoreUpdateProductRequest $request)
    {
        
        $data= $request->only('name','email','password');

        if ($request->hasFile('image') && $request->image->isValid()) {
            // $nameFile=$request->name . '.' . $request->image->extension();
            $imagePath= $request->image->store('products');

            $data['image']= $imagePath;
        }
        $this->repository->create($data);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function productShow($id)
    {
        if(!$product=  $this->repository->find($id))
          return redirect()->back();

        return view('admin.pages.products.show',[
            'product'=>$product
        ]);
    }
    public function categoryShow($id)
    {
        if(!$product=  $this->repository->find($id))
          return redirect()->back();

        return view('admin.pages.products.show',[
            'product'=>$product
        ]);
    }
    public function userShow($id)
    {
        if(!$product=  $this->repository->find($id))
          return redirect()->back();

        return view('admin.pages.products.show',[
            'product'=>$product
        ]);
    }
    public function depositoShow($id)
    {
        if(!$product=  $this->repository->find($id))
          return redirect()->back();

        return view('admin.pages.products.show',[
            'product'=>$product
        ]);
    }
    public function storyShow($id)
    {
        if(!$product=  $this->repository->find($id))
          return redirect()->back();

        return view('admin.pages.products.show',[
            'product'=>$product
        ]);
    }
    public function carrinhoShow($id)
    {
        if(!$product=  $this->repository->find($id))
          return redirect()->back();

        return view('admin.pages.products.show',[
            'product'=>$product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productEdit($id)
    {
        if(!$product=  $this->repository->find($id))
        return redirect()->back();

      return view('admin.pages.products.edit',compact('product'));
    }
    public function categoryEdit($id)
    {
        if(!$product=  $this->repository->find($id))
        return redirect()->back();

      return view('admin.pages.products.edit',compact('product'));
    }
    public function userEdit($id)
    {
        if(!$product=  $this->repository->find($id))
        return redirect()->back();

      return view('admin.pages.products.edit',compact('product'));
    }
    public function depositoEdit($id)
    {
        if(!$product=  $this->repository->find($id))
        return redirect()->back();

      return view('admin.pages.products.edit',compact('product'));
    }
    public function storyEdit($id)
    {
        if(!$product=  $this->repository->find($id))
        return redirect()->back();

      return view('admin.pages.products.edit',compact('product'));
    }
    public function carrinhoEdit($id)
    {
        if(!$product=  $this->repository->find($id))
        return redirect()->back();

      return view('admin.pages.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProducts(StoreUpdateProductRequest $request, $id)
    { 
        if(!$product=  $this->repository->find($id))
        return redirect()->back();

        $data=$request->all();

        if ($request->hasFile('image') && $request->image->isValid()) {
            if ($product->image && Storage::exists($product->image))
            {
                    Storage::delete($product->image);
            }
            $imagePath= $request->image->store('products');
            
            $data['image']= $imagePath;
        }

        $product->update($data);

        return redirect()->route('products.index');
    }
    public function updateCategory(StoreUpdateProductRequest $request, $id)
    { 
        
    }
    public function updateUser(StoreUpdateProductRequest $request, $id)
    { 
        
    }
    public function updateStory(StoreUpdateProductRequest $request, $id)
    { 
        
    }
    public function updateDeposito(StoreUpdateProductRequest $request, $id)
    { 
        
    }
    public function updatecarrinho(StoreUpdateProductRequest $request, $id)
    { 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyProduct($id)
    {
        $product=  $this->repository->where('id',$id)->first();
        if(!$product)
        {
            return redirect()->back();
        }
        if ($product->image && Storage::exists($product->image))
        {
             Storage::delete($product->image);
        }

          $product->delete();

          return redirect()->route('products.index');
    }
    public function search(Request $request)
    {
      $filters=$request->except('_token');

      $products=$this->repository->search($request->filter);

      return view('admin.pages.products.index', [
        'products'=>$products,
        'filters'=>$filters,
        ]);
    }
    public function destroyCategory($id)
    {

    }
    public function destroyUser($id)
    {
        
    }
    public function destroyStory($id)
    {
        
    }
    public function destroyDeposito($id)
    {
        
    }
    public function destroyCarrinho($id)
    {
        
    }
}
