@extends('layout.app')
@section('content')
<div class="flex-dashboard">
    <sidebar>
        <div class="sidebar-title">
           <img src="img/crud1.png" >
           <h2> My Crud</h2>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{url("/")}}"> <i class="fas fa-home"></i> Menu</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="{{url('administraCategorias')}}"> <i class="fas fa-toolbox"></i> Administrar Categorias</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="{{url('/administraEstoque')}}"> <i class="fas fa-box"></i> Administrar Estoque</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href=""> <i class="fas fa-user"></i>Administrar Usuarios</a>
                </li>
            </ul>
        </div>
           
        </sidebar>
    <main>
        <header>
            <a href="{{url("/")}}"><i class="fas fa-home"></i>Menu</a>
           <a href="#"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </header>
        <div class="main-content">   
                <div class="panel-row">
                <a href="#">
                        <button class="panel panel-50" a-view="index" a-folder="usuario" onclick="fetchContent(this)">Cadastra Usuario</button>
                    </a>
                    <a href="#">
                         <button class="panel panel-50" a-view="visualizar" a-folder="usuario"  onclick="fetchContent(this)" >Visualizar Usuario</button>
                    </a>
                </div>
                 <div class="ajax-content" id="ajax-content"></div>
        </div>
    </main>
  
       
</div>
@endsection
