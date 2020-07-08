@extends('layout.app')
@section('content')
        <mainc>
            <form action="{{route('usuario.store')}}" method="post" enctype="multipart/form-data">
                <div class="main-cad-cadastro">   
                    <div class="panel-cad-cadastro">
                        @csrf
                        <input class="form-control" type="text" name="name" placeholder="Nome:" value="{{$product->name ?? old('name')}}"><br>
                        <input class="form-control"  type="email" name="email" placeholder="email:"  value="{{$product->price?? old('email')}}"><br>
                        <input class="form-control"  type="text" name="password" placeholder="Senha:"  value="{{$product->description??old('password')}}"><br>
                        <button type="submit" class="btn btn-success"> Salvar </button>
                    </div>
                   
                </div>
            </form> 
        </mainc>
 @endsection