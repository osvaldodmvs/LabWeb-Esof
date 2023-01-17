<div class="flex-shrink-0 p-3 bg-white float-left" style="height:100%;">
    <a href="{{route('dashboard')}}" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-5 fw-semibold" id="home">Home</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn_green_hover btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#users-collapse" aria-expanded="false">
          Utilizadores
        </button>
        <div class="collapse" id="users-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal small px-3">
            <li><a href="{{route('users_index')}}" class="link-dark d-inline-flex text-decoration-none rounded">Listar</a></li>
            <li><a href="{{route('users_create')}}" class="link-dark d-inline-flex text-decoration-none rounded">Cria</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn_green_hover btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#products-collapse" aria-expanded="false">
          Produtos
        </button>
        <div class="collapse" id="products-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal small px-3">
            <li><a href="{{route('products_index')}}" class="link-dark d-inline-flex text-decoration-none rounded">Listar</a></li>
            <li><a href="{{route('products_create')}}" class="link-dark d-inline-flex text-decoration-none rounded">Cria</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn_green_hover btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#items-collapse" aria-expanded="false">
          Items (Marcações)
        </button>
        <div class="collapse" id="items-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal small px-3">
            <li><a href="{{route('items_index')}}" class="link-dark d-inline-flex text-decoration-none rounded">Listar</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn_green_hover btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          Encomendas
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal small px-3">
            <li><a href="{{route('orders_index')}}" class="link-dark d-inline-flex text-decoration-none rounded">Listar</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn_green_hover btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#payments-collapse" aria-expanded="false">
          Pagamentos
        </button>
        <div class="collapse" id="payments-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal small px-3">
            <li><a href="{{route('payments_index')}}" class="link-dark d-inline-flex text-decoration-none rounded">Listar</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
    </ul>
  </div>

  <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>