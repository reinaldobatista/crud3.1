<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>
    <link rel="stylesheet" href="/../css/all.css">
    <link rel="stylesheet" href="/../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/../assets/fontawesome/css/all.min.css">
  
    
</head>
<body>
  <mainc>
    <div class="main-cad-cadastro">   
        <table class="table table-striped" >
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Imagem</th>
                <th scope="col">Produto</th>
                <th scope="col">Descrição</th>
                <th scope="col">Categoria</th>
                <th scope="col">Preço</th>
                <th  scope="col">Ações</th>
              </tr>
            </thead>
            <tbody >
              @foreach($products as $product )
                  <th scope="row">{{$product->id}}</th>
                  <td>
                    @if ($product->image)
                        <img src={{ url("storage/{$product->image}")}} alt="{{$product->name}}" style="max-width:100px">
                    @endif
                  </td>
                  <td>{{$product->name}}</td>
                  <td>{{$product->description}}</td>
                  <td>{{$product->category_category}}</td>
                  <td>{{$product->price}}</td>
                  <td>
                            <a href="{{route('products.edit',$product->id)}}">
                                    <button class="btn btn-primary">
                                      <i class="fas fa-edit"></i>
                                    </button>
                              </a>
                              <a href="">
                                <button type="submit" class="btn btn btn-warning">
                                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-basket" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.243 1.071a.5.5 0 0 1 .686.172l3 5a.5.5 0 1 1-.858.514l-3-5a.5.5 0 0 1 .172-.686zm-4.486 0a.5.5 0 0 0-.686.172l-3 5a.5.5 0 1 0 .858.514l3-5a.5.5 0 0 0-.172-.686z"/>
                                    <path fill-rule="evenodd" d="M1 7v1h14V7H1zM.5 6a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h15a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5H.5z"/>
                                    <path fill-rule="evenodd" d="M14 9H2v5a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V9zM2 8a1 1 0 0 0-1 1v5a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9a1 1 0 0 0-1-1H2z"/>
                                    <path fill-rule="evenodd" d="M4 10a.5.5 0 0 1 .5.5v3a.5.5 0 1 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 1 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 1 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 1 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 1 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                  </svg>
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
              <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                      <h5 class="modal-title" id="staticBackdropLabel">Confirma Exclusão</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body bg-danger text-white">
                      Você tem Certeza que Deseja Excluir este Registro?
                    </div>
                    <div class="modal-footer bg-danger text-white">
                      <form action="{{route('products.destroy',$product->id)}}" method="post" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-success" >Apagar</button>
                      </form>
                      <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    </div>
                  </div>
                </div>
              </div>
            </tbody>
          </table>
    </div>
</mainc> 


  <script> src="/../assets/bootstrap/js/bootstrap.min.js"</script>
  <script> src="/../assets/fontawesome/js/all.min.js"</script>
  <script> src="/../assets/fontawesome/js/fontawesome.min.js"</script>
  <script src="/../js/ajaxs.js"></script>
</body>
</html>

 