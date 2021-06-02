<style>
    .clogo {
        margin: 0.65em auto;
        display: block;
        width: 96px;
        height: 96px;
        background: linear-gradient( 45deg , #8bc34a, #4caf50);
        color: white;
        text-align: center;
        border: solid 0px;
        border-radius: 18px;
        font-size: 3.2em;
        text-shadow: 0px 0px 2px rgb(0 0 0 / 45%);
        line-height: 1.65em;
        font-family: initial;
        box-shadow: -3px 5px 18px -5px rgb(0 0 0);
        transform: scale(1.3) rotate3d(4, 2, -4, 45deg);
    }

    .cltext{
        display: block;
        text-align: center;
        margin-top: 3em;
        margin-bottom: 0.4em;
        color: #607d8b;
    }
</style>
<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="/" class="simple-text logo-normal">
        <div>
            <span class="clogo">AC</span>
        </div>
      <span class="cltext">{{ __('Asistencia Contable') }}</span>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'user' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="material-icons">person</i>
            <p>{{__('Usuarios')}}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'cliente' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('cliente.index') }}">
          <i class="material-icons">contact_phone</i>
            <p>{{__('Clientes')}}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'proveedor' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('proveedor.index') }}">
          <i class="material-icons">groups</i>
            <p>{{__('Proveedores')}}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'materiales' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('raw.index') }}">
          <i class="material-icons">storefront</i>
            <p>{{__('Materia Prima')}}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'categoria' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('categoria.index') }}">
          <i class="material-icons">category</i>
            <p>{{__('Categorías')}}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'producto' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('producto.index') }}">
          <i class="material-icons">inventory_2</i>
            <p>{{__('Productos')}}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'ordenes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('ordencompra.index') }}">
          <i class="material-icons">shopping_cart</i>
            <p>{{__('Órdenes de Compra')}}</p>
        </a>
      </li>
        <li class="nav-item{{ $activePage == 'cotizacion' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('cotizacion.index') }}">
                <i class="material-icons">assignment</i>
                <p>{{__('Cotizaciones')}}</p>
            </a>
        </li>
        <li class="nav-item{{ $activePage == 'facturacion' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('facturacion.index') }}">
                <i class="material-icons">receipt_long</i>
                <p>{{__('Facturaciones')}}</p>
            </a>
        </li>
    </ul>
  </div>
</div>
