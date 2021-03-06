<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>	

    <div class="col-md-8">
            <h3>Pedido</h3>
            <span class="file-input btn btn-primary btn-file">
                <input tipo="Pedido" type="file">Añadir pedido
            </span>
            <div id="Pedido"></div>
            <script>
                var Pedido = {!! json_encode($DocumentosP->toArray(), JSON_HEX_TAG) !!} ;
                generarTablas("#Pedido",Pedido);
            </script>

        </div>
        <div class="col-md-8">
            <h3>Albaran</h3>
            <span class="file-input btn btn-primary btn-file">
                <input tipo="Albaran" type="file">Añadir albaran
            </span>
            <div id="Albaran"></div>
            <script>
                var Albaran = {!! json_encode($DocumentosA->toArray(), JSON_HEX_TAG) !!} ;
                generarTablas("#Albaran",Albaran);
            </script>

        </div>
        <div class="col-md-8">
            <h3>Factura</h3>
            <span class="file-input btn btn-primary btn-file">
                <input tipo="Factura" type="file">Añadir factura
            </span>
            <div id="Factura"></div>
            <script>
                var Factura = {!! json_encode($DocumentosF->toArray(), JSON_HEX_TAG) !!} ;
                generarTablas("#Factura",Factura);
            </script>

        </div>
        <div class="col-md-8">
            <h3>DocumentoY</h3>
            <span class="file-input btn btn-primary btn-file">
                <input tipo="DocumentoY" type="file">Añadir documentoY
            </span>
            <div id="DocumentoY"></div>
            <script>
                var DocumentoY = {!! json_encode($DocumentosY->toArray(), JSON_HEX_TAG) !!} ;
                generarTablas("#DocumentoY",DocumentoY);
            </script>


        </div>
        <div class="col-md-8">
            <h3>DocumentoX</h3>
            <span class="file-input btn btn-primary btn-file">
                <input tipo="DocumentoX" type="file">Añadir documentoX
            </span>
                <div id="DocumentoX"></div>
                <script>
                    var DocumentoX = {!! json_encode($DocumentosX->toArray(), JSON_HEX_TAG) !!} ;
                    generarTablas("#DocumentoX",DocumentoX);
                </script>
                </div>   
        </div>
        <div id="subirArchivos"></div>

   <script>
        $(document).on('change', '.btn-file :file', function() {
            var file = $(this).prop('files')[0];
            if(validarPDF(file)){
                var form = $('<form action="/subirDocumento/{{ $venta->Id }}" enctype="multipart/form-data" method="POST" id="subidaDocumento"></form>').appendTo("#subirArchivos");
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                form.append("<input name='_token' value='" + csrfToken + "' type='hidden'>");
                var file = $(this).prop('files')[0];
                var tipo = $(this).attr("tipo");
                crearElemento(form,"input",undefined,{"type":"hidden","name":"tipo","value":tipo});
                var newDocument = $(this).clone().appendTo(form);
                form.submit();
                $('input').hide();
            }
            
        }) 
        
        function validarPDF(file){ 
            var extension = file.name.substr(-4);
            if(extension === ".pdf") {
                return true;
            }
            else {
                generarErrores("El archivo debe estar en formato PDF");
                return false;
            }   
        }

        var ventas = {!! json_encode($venta->toArray(), JSON_HEX_TAG) !!};

        
    </script>
