@extends('layout.app')
@section('content')
        <mainc>
            <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                <div class="main-cad-cadastro">   
                    <div class="panel-cad-cadastro">
                        @csrf
                        <input class="form-control"  type="text" name="category" placeholder="Categoria:"  value="{{$product->description??old('category_category')}}"><br>
                        <button type="submit" class="btn btn-success"> Salvar </button>
                    </div>
                   
                </div>
            </form> 
        </mainc>
 @endsection