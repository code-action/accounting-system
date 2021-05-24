<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'cliente' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('cliente.index') }}">
          <i class="material-icons">groups</i>
            <p>{{__('Clientes')}}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'proveedor' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('proveedor.index') }}">
          <i class="material-icons">groups</i>
            <p>{{__('Proveedores')}}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'materia' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('raw.index') }}">
          <i class="material-icons">storefront</i>
            <p>{{__('Materia Prima')}}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'ordenes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('ordencompra.index') }}">
          <i class="material-icons">shopping_cart</i>
            <p>{{__('Órdenes de Compra')}}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
