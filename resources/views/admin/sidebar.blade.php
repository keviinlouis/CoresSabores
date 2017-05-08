<div class="sidebar" data-color="orange" data-image="../assets/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->

    <div class="logo">
        <a href="#" class="simple-text">
            Cores e Sabores
        </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
            <li @if(array_get(explode('@', array_get(explode(rtrim('\ '), Route::currentRouteAction()), 4)),0) == 'AdminController') class="active" @endif  >
                <a href="{{route('adminHome')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Home</p>
                </a>
            </li>
            <li @if(array_get(explode('@', array_get(explode(rtrim('\ '), Route::currentRouteAction()), 4)),0) == 'HeaderController') class="active" @endif>
                <a href="{{route('headerHome')}}">
                    <i class="material-icons">person</i>
                    <p>Header</p>
                </a>
            </li>
            <li @if(array_get(explode('@', array_get(explode(rtrim('\ '), Route::currentRouteAction()), 4)),0) == 'ServicosController') class="active" @endif>
                <a href="table.html">
                    <i class="material-icons">content_paste</i>
                    <p>Serviços</p>
                </a>
            </li>
            <li @if(array_get(explode('@', array_get(explode(rtrim('\ '), Route::currentRouteAction()), 4)),0) == 'ProdutosController') class="active" @endif>
                <a href="typography.html">
                    <i class="material-icons">library_books</i>
                    <p>Produtos</p>
                </a>
            </li>
            <li @if(array_get(explode('@', array_get(explode(rtrim('\ '), Route::currentRouteAction()), 4)),0) == 'SobreController') class="active" @endif>
                <a href="icons.html">
                    <i class="material-icons">bubble_chart</i>
                    <p>Sobre</p>
                </a>
            </li>
            <li @if(array_get(explode('@', array_get(explode(rtrim('\ '), Route::currentRouteAction()), 4)),0) == 'TimeController') class="active" @endif>
                <a href="maps.html">
                    <i class="material-icons">location_on</i>
                    <p>Time</p>
                </a>
            </li>
            <li @if(array_get(explode('@', array_get(explode(rtrim('\ '), Route::currentRouteAction()), 4)),0) == 'ClientesController') class="active" @endif>
                <a href="notifications.html">
                    <i class="material-icons text-gray">notifications</i>
                    <p>Clientes</p>
                </a>
            </li>
            <li @if(array_get(explode('@', array_get(explode(rtrim('\ '), Route::currentRouteAction()), 4)),0) == 'ContatoController') class="active" @endif>
                <a href="upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Contato</p>
                </a>
            </li>
        </ul>
    </div>
</div>