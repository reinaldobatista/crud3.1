@extends('layout.app')
@section('content')
        <mainc>
            <form action="{{route('story.store')}}" method="post" enctype="multipart/form-data">
                <div class="main-cad-cadastro">   
                    <div class="panel-cad-cadastro">
                        @csrf
                        Estoque:
                        <input class="form-control" type="text" name="story" value="{{ old('story')}}"><br>
                        <button type="submit" class="btn btn-success"> Salvar </button>
                    </div>
                   
                </div>
            </form> 
        </mainc>
 @endsection