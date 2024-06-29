<nav class="navbar bg-transparent navbar-expand-lg " >
    <div class="container-fluid">
      <p class="navbar-brand" >Fórum <span class="badge rounded-pill text-bg-dark text-info">{{$total}} dúvidas</span></p>
      <form  action="{{route('forum.create')}}" method="get">
        <button class=" btn btn-dark" type="submit"><i class="bi bi-plus-circle"></i> Nova dúvida</button>
      </form>
    </div>


  </nav>
  <nav class="navbar bg-transparent navbar-expand-lg">
    <div class="container-fluid">
        <form class="d-flex" action="{{route('forum.index')}}" method="get" data-bs-theme="dark">
            <input name="filter" class="form-control me-2" type="text" placeholder="pesquisar" value="{{ $filters['filter']  ?? ''}}">
        </form>
    </div>
  </nav>
