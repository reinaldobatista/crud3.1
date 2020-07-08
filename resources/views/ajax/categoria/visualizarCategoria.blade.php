@extends('layout.app')
@section('content')
        <mainc>
            <div class="main-cad-cadastro">   
                <table class="table table-striped" >
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">categoria</th>
                        <th scope="col">Açoes</th>
                      </tr>
                    </thead>
                    <tbody >
                      @foreach($categorys as $category )
                      <th scope="row">{{$category->id}}</th>
                      <td>{{$category->category}}</td>
                      <td>
                                <a href="#">
                                        <button class="btn btn-primary">
                                          <i class="fas fa-edit"></i>
                                        </button>
                                  </a>
                                  <a >    
                                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                        </svg>
                                      </button>                              
                                  </a>   
                      </td>
                    </tr>
                  @endforeach
                    </tbody>
                  </table>
            </div>
        </mainc> 
@endsection
 