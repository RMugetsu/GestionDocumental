<!-- resources/views/layouts/app.blade.php -->
@include('base')
@include('components.user')
<div class="col-md-8" id="reemplazarDocumento">

<div class="container-fluid">
    <div class="row">
        <!-- Titulo  -->
        <h1 class="containerfluidmargen">GestionDocumental/Ventas</h1>
    </div>
    <div class="row">
        <h2 class="containerfluidmargen">Detalle<!-- Pasar por POST el nombre del cliente + el id del pedido--></h2>
        {{ Breadcrumbs::render('Venta',$venta['Cliente'],$venta['Id'] ) }}
    </div>
    <div class="row">

        <div class="col-md-8 containerfluidmargen">
            
            @include('data.listadoDocumentos')            
            
        </div>
        <div class="col-md-1 containerfluidmargen"></div>
        <div class="col-md-3 containerfluidmargen"  id="errores"></div>
    </div>
</div>