<?php
session_start();

// Borra la variable de sesión 'evento_id' si existe
if (isset($_SESSION['evento_id'])) {
    unset($_SESSION['evento_id']);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Optimización SEO -->
    <title>Iniciar Sesión - Asistencia Uninorte</title>
    <meta name="description" content="Inicia sesión en el sistema de Asistencia Uninorte para gestionar y registrar asistencia fácilmente." />

    <!-- CSS externo para estilos personalizados -->
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../public/img/icono.ico">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .bg-header {
            background-color: #007bff;
        }
        .logo {
            max-width: 150px;
            height: auto;
        }
        .bg-footer {
            background-color: #f0f0f0af;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="bg-header py-2">
        <div class="container">
            <h1 class="text-center text-white"><img src="../img/uninorte-logo.png" alt="Logo Uninorte" class="logo"></h1>
        </div>
    </header>

      <div class="container mt-5 py-5">
        <h2 class="text-center">Iniciar Sesión en Asistencia Uninorte</h2>
        <p class="text-center">Accede al sistema de Asistencia Uninorte para gestionar tus registros de manera rápida y sencilla.</p>
        
        <!-- Formulario de inicio de sesión -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-secondary">
                    <div class="card-header text-white bg-primary">
                        <strong>➪ INICIAR SESIÓN</strong>
                    </div>
                    <div id="registration-form" class="p-5" method="POST" action="registrar/participantes.php">
                        <div class="alert alert-warning" role="alert" style="display: none;" id="noregistrado">
                            No estás registrado, puedes registrarte ahora.
                        </div>
                        <div class="alert alert-success" role="alert" style="display: none;" id="registradoco">
                            ¡Registrado Correctamente!
                        </div>

                        <div class="mb-3 row align-items-center">
                            <label class="form-label mt-4">N° de Cédula:</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" id="cedula" name="txt_ci" placeholder="Introduzca su Cedula de Identidad" autofocus required>
                            </div>
                            <div class="col-md-2 d-flex align-items-center justify-content-center py-4">
                                <input type="button" class="btn btn-primary" id="btn_ci" onclick="buscarCi()" value="Buscar">
                            </div>
                        </div>

                        <div id="campos-confirmacion" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label mt-4">Nombre Completo(*):</label>
                                <input type="text" class="form-control" id="nombres" placeholder="Introduzca su Nombre Completo" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apellido Completo(*):</label>
                                <input type="text" class="form-control" id="apellidos" placeholder="Introduzca su Apellido Completo" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-mail(*):</label>
                                <input type="email" class="form-control" id="correo" placeholder="Introduzca su Correo Electrónico" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">N° de Teléfono(*):</label>
                                <input type="text" class="form-control" id="telefono" placeholder="Introduzca su Número de Teléfono" autofocus required>
                            </div>

                            <!-- Campos adicionales -->
                            <div id="campos-adicionales">
                                <div class="mb-3">
                                    <label class="form-label">Universidad(*):</label>
                                    <input type="text" class="form-control" id="universidad" placeholder="Introduzca su Universidad" autofocus required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Carrera(*):</label>
                                    <input type="text" class="form-control" id="carrera" placeholder="Introduzca su Carrera" autofocus required>
                                </div>

                                <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                    <a class="btn btn-primary" onclick="login()">Iniciar Sesión</a>
                                </div>
                            </div>
                        </div>

                        <div id="campos-adicionales1" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label">Universidad(*):</label>
                                <select id="cmbuniversidad" class="form-select form-control" name="txt_uni">
                                    <option value="0" selected>Seleccione su Universidad</option>
                                    <option value="1">Universidad del norte</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Carrera(*):</label>
                                <select class="form-select form-control" name="txt_carrera" id="cmbcarrera">
                                    <option value="0" selected>Seleccione su Carrera</option>
                                    <option value="1">Ingeniería Informática</option>
                                    <option value="2">Ingeniería Comercial</option>
                                    <option value="3">Ciencia Contables</option>
                                    <option value="4">Derecho</option>
                                    <option value="5">Administracion de Empresas</option>
                                    <option value="6">Medicina</option>
                                    <option value="7">Ingeniería Electromecánica</option>
                                    <option value="8">Bioquímica</option>
                                    <option value="9">Comercio Exterior y Relaciones Internacionales</option>
                                    <option value="10">Enfermería</option>
                                    <option value="11">Escribanía Pública</option>
                                    <option value="12">Fisioterapia y Kinesiologia</option>
                                    <option value="13">Ingeniería en Telecomunicaciones</option>
                                    <option value="14">Mercadotecnia</option>
                                    <option value="15">Nutrición</option>
                                    <option value="16">Odontología</option>
                                    <option value="17">Periodismo</option>
                                    <option value="18">Psicología</option>
                                    <option value="19">Docente u otro</option>
                                </select>
                            </div>
                            <div class="alert alert-danger" role="alert" style="display: none;" id="rellenacampos">
                                Por favor, completa todos los campos.
                            </div>
                            <div class="alert alert-danger" role="alert" style="display: none;" id="rellenacorreo">
                                Correo electrónico no válido.
                            </div>
                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                <a class="btn btn-primary" onclick="registrarUsuario()">Registrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-footer py-2 mt-auto">
        <div class="container text-center">
            <h5>Contáctanos</h5>
            <ul class="list-unstyled">
                <li class="mb-2">Avda. España 676 casi Boquerón</li>
                <li class="mb-2">Tel: (595-21) 229-450</li>
                <li class="mb-2">Tel: +595 983-225-523</li>
                <li class="mb-2">E-mail: info@uninorte.edu.py</li>
            </ul>
        </div>
    </footer>

    <!-- Cargar los scripts al final para mejorar rendimiento -->
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script defer src="/scripts/buscarci.js"></script>
</body>

</html>
