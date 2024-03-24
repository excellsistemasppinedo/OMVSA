<!-- Usa Bootstrap 3.3.7 -->
<?php
    include 'datos.php';
    class _screen extends _datos{
        #region Vitales
        public function _head(){
            $_lcCadena = <<<html
                <head>
                    <title>LogIn</title>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                    <link rel="stylesheet" href="./css/main.css">
                    <link rel="stylesheet" href="./css/ovmsa.css">                    
                </head>
                html;
            return $_lcCadena;
        }

        public function js(){
            $_lcCadena = <<<html
                <script src="./js/jquery-3.1.1.min.js"></script>
                <script src="./js/bootstrap.min.js"></script>
                <script src="./js/material.min.js"></script>
                <script src="./js/ripples.min.js"></script>
                <script src="./js/sweetalert2.min.js"></script>
                <script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
                <script src="./js/main.js"></script>
                <script src="./js/omvsa.js"></script>
                <script>
                    $.material.init();
                </script>
            html;
            return $_lcCadena;
        }
        #endregion
        #region Login
        public function login_body(){
            $_lcCadena = <<<html

                <div class="full-box login-container cover">
                    <form action="home.php" method="" autocomplete="off" class="logInForm">
                        <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
                        <p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
                        <div class="form-group label-floating">
                          <label class="control-label" for="UserName">Usuario</label>
                          <input class="form-control" id="UserName" type="text">
                          <p class="help-block">Escribe aquí nombre de usuario</p>
                        </div>
                        <div class="form-group label-floating">
                          <label class="control-label" for="UserPass">Contraseña</label>
                          <input class="form-control" id="UserPass" type="text">
                          <p class="help-block">Escribe aquí contraseña</p>
                        </div>
                        <div class="form-group text-center">
                            <input type="button" value="Iniciar sesión" class="btn btn-info" style="color: #FFF;" id="btnAcceder">
                        </div>
                    </form>
                </div>
            html;
            return $_lcCadena;
        }
        #endregion
        #region Home
        public function barra_de_lado(){
            $_lcCadena = <<<html
                                <section class="full-box cover dashboard-sideBar">
                                    <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
                                    <div class="full-box dashboard-sideBar-ct">
                                        <!--SideBar Title -->
                                        <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
                                            company <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
                                        </div>
                                        <!-- SideBar User info -->
                                        <div class="full-box dashboard-sideBar-UserInfo">
                                            <figure class="full-box">
                                                <img src="./assets/avatars/AdminMaleAvatar.png" alt="UserIcon">
                                                <figcaption class="text-center text-titles">User Name</figcaption>
                                            </figure>
                                            <ul class="full-box list-unstyled text-center">
                                                <li>
                                                    <a href="my-data.html" title="Mis datos">
                                                        <i class="zmdi zmdi-account-circle"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="my-account.html" title="Mi cuenta">
                                                        <i class="zmdi zmdi-settings"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!" title="Salir del sistema" class="btn-exit-system">
                                                        <i class="zmdi zmdi-power"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- SideBar Menu -->
                                        <ul class="list-unstyled full-box dashboard-sideBar-Menu">
                                            <li>
                                                <a href="home.html">
                                                    <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Bienvenido
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" class="btn-sideBar-SubMenu">
                                                    <i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración <i class="zmdi zmdi-caret-down pull-right"></i>
                                                </a>
                                                <ul class="list-unstyled full-box">
                                                    <li id ="mnuConsulta">
                                                        <a href="#"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Consulta</a>
                                                    </li>
                                                    <!--<li>
                                                        <a href="category.html"><i class="zmdi zmdi-labels zmdi-hc-fw"></i> Categorías</a>
                                                    </li>
                                                    <li>
                                                        <a href="provider.html"><i class="zmdi zmdi-truck zmdi-hc-fw"></i> Proveedores</a>
                                                    </li>
                                                    <li>
                                                        <a href="book.html"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Nuevo libro</a>
                                                    </li>-->
                                                </ul>
                                        <!--    </li>
                                            <li>
                                                <a href="#!" class="btn-sideBar-SubMenu">
                                                    <i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Usuarios <i class="zmdi zmdi-caret-down pull-right"></i>
                                                </a>
                                                <ul class="list-unstyled full-box">
                                                    <li>
                                                        <a href="admin.html"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Administradores</a>
                                                    </li>
                                                    <li>
                                                        <a href="client.html"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Clientes</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="catalog.html">
                                                    <i class="zmdi zmdi-book-image zmdi-hc-fw"></i> Catalogo
                                                </a>
                                            </li> -->
                                        </ul>
                                    </div>
                                </section>
            html;
            return $_lcCadena;
        }

        public function contenido(){
            $lcCadena = <<<html
                                <section class="full-box dashboard-contentPage">
                                    <!-- NavBar -->
                                    <nav class="full-box dashboard-Navbar">
                                        <ul class="full-box list-unstyled text-right">
                                            <li class="pull-left">
                                                <a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
                                            </li>
                                            <li>
                                                <a href="search.html" class="btn-search">
                                                    <i class="zmdi zmdi-search"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <!-- Content page -->
                                    <div id="contenido">

                                    </div>
                                </section>
                          html;
                          echo $lcCadena;
        }

        public function consulta_tabla(){
            $lcCadena = <<<html
                            <div class="container-fluid">
                                <div class="page-header">
                                    <h1 class="text-titles"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Tabla de  <small>Articulos</small></h1>
                                </div>
                                <p class="lead">Desde esta tabla usted podra llevar a cabo las consultas de las piezas automovilisticas, y al darle click podra tener la informacion necesaria en la cabecera!</p>
                            </div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button">Go!</button>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Buscar para ..." id="txtbusqueda">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                                <input type="text" class="form-control" id="txtexistencia" disabled>
                                        </div>
                                        <div class="col-md-3">
                                                <input type="text" class="form-control" id="txtfucompra" disabled>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">ID</th>
                                                            <th class="text-center">Articulo</th>
                                                            <th class="text-center">Fecha Ultima Compra</th>
                                                            <th class="text-center">Uventa</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tab_articulos"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                </div>
                            html;
                           return $lcCadena;
        }

        public function linea_tiempo(){
            $lctiempo = <<<html
                            <div class="container-fluid">
                                <div class="page-header">
                                <h1 class="text-titles">System <small>TimeLine</small></h1>
                                </div>
                                <section id="cd-timeline" class="cd-container">
                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img">
                                            <img src="assets/avatars/StudetMaleAvatar.png" alt="user-picture">
                                        </div>
                                        <div class="cd-timeline-content">
                                            <h4 class="text-center text-titles">1 - Name (Admin)</h4>
                                            <p class="text-center">
                                                <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                                                <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                                            </p>
                                            <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
                                        </div>
                                    </div>  
                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img">
                                            <img src="assets/avatars/StudetMaleAvatar.png" alt="user-picture">
                                        </div>
                                        <div class="cd-timeline-content">
                                            <h4 class="text-center text-titles">2 - Name (Teacher)</h4>
                                            <p class="text-center">
                                                <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                                                <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                                            </p>
                                            <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
                                        </div>
                                    </div>
                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img">
                                            <img src="assets/avatars/StudetMaleAvatar.png" alt="user-picture">
                                        </div>
                                        <div class="cd-timeline-content">
                                            <h4 class="text-center text-titles">3 - Name (Student)</h4>
                                            <p class="text-center">
                                                <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                                                <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                                            </p>
                                            <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
                                        </div>
                                    </div>
                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img">
                                            <img src="assets/avatars/StudetMaleAvatar.png" alt="user-picture">
                                        </div>
                                        <div class="cd-timeline-content">
                                            <h4 class="text-center text-titles">4 - Name (Personal Ad.)</h4>
                                            <p class="text-center">
                                                <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                                                <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                                            </p>
                                            <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
                                        </div>
                                    </div>   
                                </section>

                            </div>

                        html;
        }
        public function dashboard(){
            $lcCadena = <<<html
                                <!-- Content page -->
                                <div class="container-fluid">
                                    <div class="page-header">
                                    <h1 class="text-titles">System <small>Tiles</small></h1>
                                    </div>
                                </div>
                                <div class="full-box text-center" style="padding: 30px 10px;">
                                    <article class="full-box tile">
                                        <div class="full-box tile-title text-center text-titles text-uppercase">
                                            Admin
                                        </div>
                                        <div class="full-box tile-icon text-center">
                                            <i class="zmdi zmdi-account"></i>
                                        </div>
                                        <div class="full-box tile-number text-titles">
                                            <p class="full-box">7</p>
                                            <small>Register</small>
                                        </div>
                                    </article>
                                    <article class="full-box tile">
                                        <div class="full-box tile-title text-center text-titles text-uppercase">
                                            Teacher
                                        </div>
                                        <div class="full-box tile-icon text-center">
                                            <i class="zmdi zmdi-male-alt"></i>
                                        </div>
                                        <div class="full-box tile-number text-titles">
                                            <p class="full-box">10</p>
                                            <small>Register</small>
                                        </div>
                                    </article>
                                    <article class="full-box tile">
                                        <div class="full-box tile-title text-center text-titles text-uppercase">
                                            Student
                                        </div>
                                        <div class="full-box tile-icon text-center">
                                            <i class="zmdi zmdi-face"></i>
                                        </div>
                                        <div class="full-box tile-number text-titles">
                                            <p class="full-box">70</p>
                                            <small>Register</small>
                                        </div>
                                    </article>
                                </div>
                        html;
            return $lcCadena;
        }


        #endregion
    }