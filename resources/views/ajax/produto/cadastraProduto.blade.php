@extends('layout.app')
@section('content')
        <mainc>
            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                <div class="main-cad-cadastro">   
                    <div class="panel-cad-cadastro">
                        @csrf
                        <input class="form-control" type="text" name="name" placeholder="Nome:" value="{{$product->name ?? old('name')}}"><br>
                        <input class="form-control"  type="text" name="price" placeholder="Preço:"  value="{{$product->price?? old('price')}}"><br>
                        <input class="form-control"  type="text" name="description" placeholder="Descrição:"  value="{{$product->description??old('description')}}"><br>
                        <select class="form-control" name="category_category"  id="category_category" required><br>
                            <option value="{{$category->category ?? ''}}">{{$category->category ?? 'Selecione a categoria'}}</option>
                            @foreach($categorys as $category)
                                <option value="{{$category->category}}">{{$category->category}}</option>
                            @endforeach
                        </select><br>
                        <input class="form-control" type="file" name="image" class="form-control"><br>
                        <button type="submit" class="btn btn-success"> Salvar </button>
                    </div>
                </div>
            </form> 
        </mainc>
 @endsection