<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>AGREGAR CRÉDITO</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
            text-align: center;
            background-image: url("../Imagenes/fondo.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            
        }

        /* Asegúrate de que el menú esté sobre el formulario */
        .navbar {
            z-index: 1000; /* Asegúrate de que sea mayor que el z-index del formulario */
            text-align: left;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .form-column {
            flex: 1;
            min-width: 300px;
        }

        .form-row .form-column label,
        .form-row .form-column input,
        .form-row .form-column select,
        .form-row .form-column textarea {
            width: 100%;
            margin-bottom: 10px;
        }

        #form-credito {
            display: none;
        }

        /* Estilos para el modal */
        .modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }


        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
            border-radius: 8px;
            position: relative;
        }

        
        .modal-contentProp {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 500px;
            border-radius: 8px;
            position: relative;
        }

        

        .close, .close-2, .close-3 {
            color: #aaa;
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover, .close:focus, .close-2:hover, .close-2:focus, .close-3:hover, .close-3:focus {
            color: black;
            text-decoration: none;
        }

        .form-check {
            display: flex;
            flex-direction: row;
            margin-top: 10px;
            text-align: left;
        }

        #solicitud-elaborada {
            width: 30px;
        }

        .form-check-label {
            text-align: left;
            margin-left: 5px;
            margin-top: 3px;
        }

        input{
            text-transform: UPPERCASE;
        }


    </style>
</head>
<body>

    <!-- BARRA DEL MENU -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                </a>
                <a class="brand">DEPTO CRÉDITO</a>
                <div class="navbar nav-collapse collapse">
                    <ul class="nav">
                        <li><a href="../index.php">Inicio</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">MOROSOS<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="formulario.php">SUBIR ARCHIVO</a></li>
                                <li><a href="consultar.php">CONSULTAR MOROSOS</a></li>
                                <li><a href="buscar.php">BUSCAR</a></li>
                                <li><a href="aval.php">AGREGAR AVALES</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">DESEMBOLSO DE CRÉDITO<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="../Credito-Nuevo.php">DESEMBOLSO EFECTIVO</a></li>
                                <li><a href="../Credito-Registros.php">TODOS LOS REGISTROS</a></li>
                                <li><a href="../Credito-Buscar.php">BUSCAR DOCUMENTO POR FOLIO</a></li>
                                <li><a href="../Credito-Resumen.php">RESUMEN DE DESEMBOLSOS</a></li>
                                <li><a href="../Credito-Cancelacion.php">CANCELACIÓN DOCUMENTO</a></li>
                                <li><a href="../presupuesto.php">PRESUPUESTO</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">CHECKLIST<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="../checkList/agregarCredito.php">AGREGAR</a></li>
                                <li><a href="#">LISTADO</a></li>
                                <li><a href="#">PENDIENTES</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>                
            </div>
        </div>
    </div>

    <div class="container">
        <h1>CHECK LIST DE REQUISITOS DE CRÉDITO CON RIESGO</h1></br></br>

        <!-- Formulario -->
        <form id="form-validation">
            <div class="form-row">
                <!-- Primera columna -->
                <div class="form-column">
                    <label for="fecha-solicitud">Fecha Solicitud</label>
                    <input type="date" class="form-control" id="fecha-solicitud" required>
                    
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre de Socio" required>

                    <label for="parte-social-1">Parte Social 1</label>
                    <select class="form-select" id="parte-social-1">
                        <option value="" selected>Seleccione</option>
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>

                    <!-- Modal 1 -->
                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h2>Parte Social</h2>
                            <form id="modal-form1">
                                <div class="form-group">
                                    <label for="parte-social-input1">Ingrese información:</label>
                                    <input type="number" id="parte-social-input1" name="parte-social-input1" required>
                                </div>
                                <button type="submit">Enviar</button>
                            </form>
                        </div>
                    </div>

                    <label for="gradualidad">Gradualidad</label>
                    <input type="text" class="form-control" id="gradualidad" required>
                    
                    <label for="aval-opcion">Aval</label>
<select id="aval-opcion" class="form-select" onchange="manejadorAvales()">
    <option value="">Selecciona una opción...</option>
    <option value="form1">Con Aval ≤ $5,000.00</option>
    <option value="form2">Con Aval > $5,000.00 o ≤ $10,000.00</option>
    <option value="form3">Propiedad > $10,000.00</option>
</select>

<!-- Modal -->
<div id="myModal4" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal4()">&times;</span>

        <!-- Formulario 1 -->
        <div id="form1" class="form-section">
            <h2>Formulario para Aval ≤ $5,000.00</h2>
            <form>
                <!-- Campos del formulario 1 -->
                <select name="selectSocio1" id="issocio1">
                    <option value="no" selected>No</option>
                    <option value="yes">Si</option>
                </select>
                <label for="numeroSocio1" id="numero_container1">Número del Socio
                <input type="number" name="numSocio1" id="numeroSocio1">
                </label>
                <label for="ine1" id="label-ine1">Identificación Oficial: 
                <input type="checkbox" name="ine1" id="ine1">
                </label>
                <label for="cdom1" id="label-cdom1">Comprobante Domiciliario: 
                <input type="checkbox" name="cdom1" id="cdom1">
                </label>
                <label for="cing1" id="label-cing1">Comprobante Ingresos: 
                <input type="checkbox" name="cing1" id="cing1">
                </label>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>

        <!-- Formulario 2 -->
        <div id="form2" class="form-section">
            <h2>Formulario para Aval > $5,000.00 o ≤ $10,000.00</h2>
            <form>
                <!-- Campos del formulario 2 -->
                <select name="selectSocio2" id="issocio2">
                    <option value="no" selected>No</option>
                    <option value="yes">Si</option>
                </select>
                <label for="numeroSocio2" id="numero_container2">Número del Socio
                <input type="number" name="numSocio2" id="numeroSocio2">
                </label>
                <label for="ine2" id="label-ine2">Identificación Oficial: 
                <input type="checkbox" name="ine2" id="ine2">
                </label>
                <label for="cdom2" id="label-cdom2">Comprobante Domiciliario: 
                <input type="checkbox" name="cdom2" id="cdom2">
                </label>
                <label for="cing2" id="label-cing2">Comprobante Ingresos: 
                <input type="checkbox" name="cing2" id="cing2">
                </label>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>

        <!-- Formulario 3 -->
        <div id="form3" class="form-section">
            <h2>Formulario para Propiedad > $10,000.00</h2>
            <form id="aval-property">
                <!-- Acreditación de la Garantía -->
                <label for="tipoAcreditacion">Acreditación de la Garantía: </label>
                <select name="tipoAcreditacion" id="tipoAcreditacion">
                    <option value="predial">PREDIAL</option>
                    <option value="cedula">CEDULA CATASTRAL</option>
                    <option value="escrituras">ESCRITURAS</option>
                </select>

                <!-- Propiedad Libre de Gravamen -->
                <label for="libreGravamen">Propiedad Libre de Gravamen: </label>
                <select name="libreGravamen" id="libreGravamen">
                    <option value="no">NO</option>
                    <option value="si">SI</option>
                </select>

                <!-- Dirección del Predio -->
                <label for="direcPredio">Dirección del Predio: </label>
                <input type="text" name="direcPredio" id="direcPredio">

                <!-- Propietarios del Predio -->
                <label for="propertyPredio">Propietarios del Predio:</label>
                <div id="propertyContainer">
                    <input type="text" name="propertyPredio[]" id="propertyPredio">
                    <p id="aumentador" onclick="addPropietario()">&#43;</p>
                </div>

                <!-- Avales -->
                <label for="propertyAval">Avales:</label>
                <div id="containerAval">
                    <input type="text" name="propertyAval[]" id="propertyAval">
                    <p id="aumentadorAval" onclick="addAval()">&#43;</p>
                </div>

                <!-- Botón de Enviar -->
                <button type="submit" class="btn btn-primary" id="buttonProperty">Enviar</button>
            </form>
        </div>
    </div>
</div>
                </div>

                    <!-- Modal 4 (propiedad) -->
                    <div id="myModalP" class="modal">
                        <div class="modal-contentProp">
                            <span class="close" onclick="closeModal4()">&times;</span>
                            <div id="form3" class="form-section">
                                <h2>Formulario para Propiedad > $10,000.00</h2>
                                <form id="aval-property">
                                    <!-- Campos del formulario 3 -->
                                    <label for="tipoAcreditacion">Acreditación de la Garantía: </label>
                                    <select name="selecttipoAcreditacion" id="tipoAcreditacion">
                                        <option value="0" selected>PREDIAL</option>
                                        <option value="1">CEDULA CATASTRAL</option>
                                        <option value="2">ESCRITURAS</option>
                                    </select>
                                    <select name="selecttipoAcreditacion" id="tipoAcreditacion">
                                        <option value="0" selected>NO</option>
                                        <option value="1">SI</option>
                                        
                                    </select>
                                    <label for="propertyValue">Valor de la Propiedad:</label>
                                    <input type="number" id="propertyValue" name="propertyValue">

                                    <label for="direcPredio">Dirección del Predio: </label>
                                    <input type="text" name="direcPredio" id="direcPredio">

                                    <label for="propertyPredio"  id="addPropietario">Propietarios del Predio:</label>
                                    <div id="propertyContainer">
                                    <input type="text" name="propertyPredio" id="propertyPredio">
                                    <p id="aumentador">&#43;</p>
                                    </div>

                                    <label for="propertyAval"  id="addAval">Avales:</label>
                                    <div id="containerAval">
                                    <input type="text" name="propertyAval" id="propertyAval">
                                    <p id="aumentadorAval">&#43;</p>
                                    </div>

                                    <label for="issocioAval">Socio: </label>
                                    <select name="socioAval" id="issocioAval">
                                        <option value="no" selected>No</option>
                                        <option value="yes">Si</option>
                                    </select>
                                    <br>
                                    <button type="submit" class="btn btn-primary" id="buttonProperty">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>

                <!-- Segunda columna -->
                <div class="form-column">
                    <label for="tipo-firma">Tipo de Firma</label>
                    <select class="form-select" id="tipo-firma" aria-label="Tipo de Firma">
                        <option value="" selected></option>
                        <option value="1">HUELLA</option>
                        <option value="2">FIRMA</option>
                    </select>

                    <label for="telefono">Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" placeholder="Número Celular" required>
                   
                    <label for="parte-social-2">Parte Social 2</label>
                    <select class="form-select" id="parte-social-2">
                        <option value="" selected>Seleccione</option>
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select> 
                    
                    <!-- Modal 2 -->
                    <div id="myModal2" class="modal">
                        <div class="modal-content">
                            <span class="close-2">&times;</span>
                            <h2>Parte Social 2</h2>
                            <form id="modal-form2">
                                <div class="form-group">
                                    <label for="parte-social-input2">Ingrese Monto:</label>
                                    <input type="number" id="parte-social-input2" name="parte-social-input2" required>
                                </div>
                                <button type="submit">Enviar</button>
                            </form>
                        </div>
                    </div>
                
                    <label for="riesgo">Riesgo</label>
                    <select id="riesgo" class="form-select">
                        <option value="1">Bajo</option>
                        <option value="2">Medio</option>
                        <option value="3">Alto</option>
                    </select>

                    <label for="credito-promo">Crédito Promocional Vigente</label>
                    <select class="form-select" id="credito-promo">
                        <option value="no">No</option>
                        <option value="yes">Sí</option>
                    </select>
                    
                    <!-- Modal 3 -->
                    <div id="myModal3" class="modal">
                        <div class="modal-content">
                            <span class="close-3">&times;</span>
                            <h2>CRÉDITO PROMOCIONAL VIGENTE</h2>
                            <form id="modal-form3">
                                <div class="form-group">
                                
                                    <label for="saldo">Saldo:</label>
                                    <input type="text" id="saldo" name="saldo" required>
                                    <br>
                                    <label for="credito-promo">Esta al día</label>
                                    <select class="form-select" id="credito-dia">
                                        <option value="no">No</option>
                                        <option value="yes">Sí</option>
                                    </select>
                                    
                                </div>
                                <button type="submit">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Tercera columna -->
                <div class="form-column">
                    <label for="numero-socio">Número de Socio</label>
                    <input type="text" class="form-control" id="numero-socio" placeholder="Número de Socio" required>
                    
                    <label for="monto-solicitado">Monto Solicitado</label>
                    <input type="number" min=0 max=130000 class="form-control" id="monto-solicitado" required>

                    <label for="ahorro">Ahorro</label>
                    <input type="number" class="form-control" id="ahorro" placeholder="Ahorros del socio" required>
                    
                    <label for="totales">Monto Total</label>
                    <input type="number" class="form-control" id="totales" placeholder="Total" required>
                 
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="identificacion-oficial">
                        <label class="form-check-label" for="identificacion-oficial">Identificación Oficial</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="comprobante-domicilio">
                        <label class="form-check-label" for="comprobante-domicilio">Comprobante Domicilio</label>
                    </div>
                    
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script>
        // Modal 1
        var modal1 = document.getElementById("myModal");
        var span1 = document.getElementsByClassName("close")[0];
        var parteSocialSelect1 = document.getElementById("parte-social-1");

        parteSocialSelect1.addEventListener('change', function() {
            if (this.value === '1') {
                modal1.style.display = "flex";
                modal1.style.margin = "auto"; 
            } else {
                modal1.style.display = "none";
            }
        });

        span1.onclick = function() {
            modal1.style.display = "none";
            parteSocialSelect1.value = "";
        }

        window.onclick = function(event) {
            if (event.target === modal1) {
                modal1.style.display = "none";
            }
        }

        // Modal 2
        var modal2 = document.getElementById("myModal2");
        var span2 = document.getElementsByClassName("close-2")[0];
        var parteSocialSelect2 = document.getElementById("parte-social-2");

        parteSocialSelect2.addEventListener('change', function() {
            if (this.value === '1') {
                modal2.style.display = "flex";
                modal2.style.margin = "auto"; 
            } else {
                modal2.style.display = "none";
            }
        });

        span2.onclick = function() {
            modal2.style.display = "none";
            parteSocialSelect2.value = "";
        }

        window.onclick = function(event) {
            if (event.target === modal2) {
                modal2.style.display = "none";
            }
        }

        // Modal 3
        var modal3 = document.getElementById("myModal3");
        var span3 = document.getElementsByClassName("close-3")[0];
        var creditoPromoSelect = document.getElementById("credito-promo");

        creditoPromoSelect.addEventListener('change', function() {
            if (this.value === 'yes') {
                modal3.style.display = "flex";
                modal3.style.margin = "auto"; 
            } else {
                modal3.style.display = "none";
            }
        });

        span3.onclick = function() {
            modal3.style.display = "none";
            creditoPromoSelect.value = "";
        }

        window.onclick = function(event) {
            if (event.target === modal3) {
                modal3.style.display = "none";
            }
        }

        //Detección de cual modal mostrar
        function manejadorAvales() {
            const valorSeleccionado = document.getElementById('aval-opcion').value;
            document.querySelectorAll(".form-section").forEach(form => {
                form.style.display = "none";
            });

            if (valorSeleccionado) {
                document.getElementById(valorSeleccionado).style.display = "block";
            }
        }
        
    
        function showModal() {
            // Obtiene el modal
            var modal4 = document.getElementById('myModal4');

            //Obtiene las opciones de la opción Aval <= 5,000
            var contenedorIne1 = document.getElementById('label-ine1');
            var checkIne1 = document.getElementById('ine1');
            var contenedorCdom1 = document.getElementById('label-cdom1');
            var checkDom1 = document.getElementById('cdom1');
            var numSocio1 = document.getElementById('numero_container1');
            var contenedorCing1 = document.getElementById('label-cing1');
            var checkIng1 = document.getElementById('cing1');

            //Obtiene las opciones de la opción  Aval > 5000 o <= 10,000
            var contenedorIne2 = document.getElementById('label-ine2');
            var checkIne2 = document.getElementById('ine2');
            var contenedorCdom2 = document.getElementById('label-cdom2');
            var checkDom2 = document.getElementById('cdom2');
            var contenedorCing2 = document.getElementById('label-cing2');
            var checkIng2 = document.getElementById('cing2');
            var numSocio2 = document.getElementById('numero_container2');

           
            // Oculta todas las secciones de formularios
            document.querySelectorAll('.form-section').forEach(form => form.style.display = 'none');
            
            //Estilos generales del modal
            modal4.style.display = 'flex';
            modal4.style.margin = 'auto';

            // Muestra el modal de la opción Aval <= 10,000
            numSocio1.style.display = 'none';
            contenedorIne1.style.display = 'flex';
            contenedorIne1.style.flexDirection = 'row';
            contenedorIne1.style.justifyContent = 'center';
            contenedorIne1.style.marginTop = '10px';
            checkIne1.style.width = '50px';
            checkIne1.style.marginLeft = '33px';
            contenedorCdom1.style.display = 'flex';
            contenedorCdom1.style.flexDirection = 'row';
            contenedorCdom1.style.justifyContent = 'center';
            contenedorCdom1.style.marginTop = '15px';
            checkDom1.style.width = '50px';
            contenedorCing1.style.display = 'flex';
            contenedorCing1.style.flexDirection = 'row';
            contenedorCing1.style.justifyContent = 'center';
            contenedorCing1.style.marginTop = '15px';
            checkIng1.style.width = '50px';
            checkIng1.style.marginLeft = '18px';

            // Muestra el modal de la opción Aval > 5000 o <= 10,000
            numSocio2.style.display = 'none';
            contenedorIne2.style.display = 'flex';
            contenedorIne2.style.flexDirection = 'row';
            contenedorIne2.style.justifyContent = 'center';
            contenedorIne2.style.marginTop = '10px';
            checkIne2.style.width = '50px';
            checkIne2.style.marginLeft = '33px';
            contenedorCdom2.style.display = 'flex';
            contenedorCdom2.style.flexDirection = 'row';
            contenedorCdom2.style.justifyContent = 'center';
            contenedorCdom2.style.marginTop = '15px';
            checkDom2.style.width = '50px';
            contenedorCing2.style.display = 'flex';
            contenedorCing2.style.flexDirection = 'row';
            contenedorCing2.style.justifyContent = 'center';
            contenedorCing2.style.marginTop = '15px';
            checkIng2.style.width = '50px';
            checkIng2.style.marginLeft = '18px';

            // Muestra la sección del formulario correspondiente
            var selectedValue = document.getElementById('aval-opcion').value;
            if (selectedValue) {
                document.getElementById(selectedValue).style.display = 'block';
            }

            //Muestra la sección de si es socio o no para la opción de Aval > 5000 o <= 10,000
            var ComponenteSocio2 = document.getElementById('issocio2');

            ComponenteSocio2.addEventListener('change', () => {
                var ValueSocio2 = ComponenteSocio2.value;
                if(ValueSocio2 == 'yes'){
                    numSocio2.style.display = 'block';
                    numSocio2.style.margin = 'auto';
                    numSocio2.style.width = '200px';
                    numSocio2.style.marginBottom = '15px';
                } else {
                    numSocio2.style.display = 'none';
                }
            });

            //Muestra la sección de si es socio o no para la opción de Aval <= 5,000
            var ComponenteSocio1 = document.getElementById('issocio1');

            ComponenteSocio1.addEventListener('change', () => {
                var ValueSocio1 = ComponenteSocio1.value;
                if(ValueSocio1 == 'yes'){
                    numSocio1.style.display = 'block';
                    numSocio1.style.margin = 'auto';
                    numSocio1.style.width = '200px';
                    numSocio1.style.marginBottom = '15px';
                } else {
                    numSocio1.style.display = 'none';
                }
            });    
        }

        //Función solo para el modal4 de propiedad
        var CountProp = 1;
        var CountAval = 1;
        document.getElementById('aumentador').addEventListener('click', addPropietario);
        document.getElementById('aumentadorAval').addEventListener('click', addAval);
        
        function showModalPropiedad() {
            // Obtiene el modal
            var modalp = document.getElementById('myModalP');

            //Obtiene las opciones para Propiedad
            var contenedorProp = document.getElementById('propertyContainer');
            var inputAdd = document.getElementById('propertyPredio');
            var Add = document.getElementById('aumentador');

            var contenedorAval = document.getElementById('containerAval');
            var inputAddAval = document.getElementById('propertyAval');
            var AddAval = document.getElementById('aumentadorAval');

            var SelectAval = document.getElementById('issocioAval');
            var inputDirec = document.getElementById('direcPredio');
            
            //Estilos generales del modal
            modalp.style.display = 'flex';
            modalp.style.margin = 'auto';

            //Muestra el modal de la opción con propiedad
            contenedorProp.style.display = 'flex';
            inputAdd.style.width = '300px';
            contenedorProp.style.justifyContent = 'center';
            Add.style.marginLeft = '10px';
            Add.style.fontSize = '30px';
            Add.style.cursor = 'pointer';
            inputDirec.style.width = '400px';

            contenedorAval.style.display = 'flex';
            contenedorAval.style.justifyContent = 'center';
            inputAddAval.style.width = '300px';
            AddAval.style.marginLeft = '10px';
            AddAval.style.fontSize = '30px';
            AddAval.style.cursor = 'pointer';      

            document.getElementById('form3').style.display = 'block';
        }

        //Funcion que añade a los nuevos propietarios
        function addPropietario() {
            const container = document.getElementById("propertyContainer");
            const nuevoInput = document.createElement("input");
            nuevoInput.type = "text";
            nuevoInput.name = "propertyPredio[]";
            container.appendChild(nuevoInput);
        }



        //Funcion que añade a los nuevos avales (en caso de ser más de uno)
        function addAval() {
            const container = document.getElementById("containerAval");
            const nuevoInput = document.createElement("input");
            nuevoInput.type = "text";
            nuevoInput.name = "propertyAval[]";
            container.appendChild(nuevoInput);
        }

            function closeModal4() {
            document.getElementById("myModal4").style.display = "none";
        }


        // Cierra el modal si el usuario hace clic fuera del contenido del modal
        window.onclick = function(event) {
            var modal4 = document.getElementById('myModal4');
            if (event.target === modal4) {
                modal4.style.display = 'none';
            }
        }
       

    </script>
</body>
</html>
