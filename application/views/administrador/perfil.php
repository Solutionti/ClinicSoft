
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <?php require_once("componentes/head.php"); ?>
    <style>
        /* ===== ESTILOS PERSONALIZADOS PERFIL ===== */
        .profile-header-card {
            background:  #172b4d !important;
            border-radius: 20px;
            padding: 0;
            overflow: hidden;
            margin-top: -50px;
            position: relative;
        }

        .profile-cover {
            height: 150px;
            background: linear-gradient(135deg, #172b4d 0%, #233f6e 50%, #5e72e4 100%);
            background-size: 200% 200%;
            animation: gradientShift 8s ease infinite;
            position: relative;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .profile-cover::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            background: linear-gradient(to top, #172b4d, transparent);
        }

        .profile-info-section {
            padding: 0 30px 25px;
            display: flex;
            align-items: flex-end;
            gap: 25px;
            margin-top: -60px;
            position: relative;
            z-index: 2;
            flex-wrap: wrap;
        }

        .profile-avatar-wrapper {
            position: relative;
            flex-shrink: 0;
        }

        .profile-avatar-wrapper img {
            width: 120px;
            height: 120px;
            border-radius: 20px;
            border: 4px solid #172b4d;
            object-fit: cover;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            transition: transform 0.3s ease;
        }

        .profile-avatar-wrapper img:hover {
            transform: scale(1.05);
        }

        .avatar-edit-btn {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #5e72e4, #825ee4);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            border: 3px solid #172b4d;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 12px;
        }

        .avatar-edit-btn:hover {
            transform: scale(1.1);
            background: #fb6340;
        }

        .profile-details {
            flex: 1;
            padding-bottom: 10px;
        }

        .profile-details h2 {
            color: white;
            font-size: 24px;
            font-weight: 700;
            margin: 0 0 8px 0;
        }

        .profile-role {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(94, 114, 228, 0.3);
            color: #a4b8ff;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .profile-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #2dce89;
            font-size: 13px;
            margin-left: 15px;
        }

        .profile-status::before {
            content: '';
            width: 8px;
            height: 8px;
            background: #2dce89;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.1); }
        }

        .profile-actions-top {
            display: flex;
            gap: 10px;
            padding-bottom: 10px;
        }

        .btn-profile-action {
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
        }

        .btn-profile-action.primary {
            background: linear-gradient(135deg, #fb6340, #fbb140);
            color: white;
        }

        .btn-profile-action.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(251, 99, 64, 0.4);
        }

        .btn-profile-action.secondary {
            background: rgba(255,255,255,0.1);
            color: white;
            border: 1px solid rgba(255,255,255,0.2);
        }

        .btn-profile-action.secondary:hover {
            background: rgba(255,255,255,0.2);
        }

        /* ===== TABS DE NAVEGACIÓN ===== */
        .profile-nav-tabs {
            display: flex;
            gap: 5px;
            padding: 15px 30px;
            background: rgba(0,0,0,0.2);
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .nav-tab-btn {
            padding: 10px 20px;
            background: transparent;
            border: none;
            border-radius: 10px;
            color: rgba(255,255,255,0.6);
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-tab-btn:hover {
            color: white;
            background: rgba(255,255,255,0.1);
        }

        .nav-tab-btn.active {
            background: rgba(94, 114, 228, 0.3);
            color: white;
        }

        /* ===== CONTENIDO PRINCIPAL ===== */
        .profile-content {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 25px;
            margin-top: 25px;
        }

        @media (max-width: 1100px) {
            .profile-content {
                grid-template-columns: 1fr;
            }
        }

        /* ===== CARDS DE INFORMACIÓN ===== */
        .info-section-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 25px;
        }

        .info-section-header {
            padding: 20px 25px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .info-section-header h4 {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            color: #172b4d;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-section-header h4 i {
            width: 35px;
            height: 35px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: white;
        }

        .info-section-header h4 i.bg-primary { background: linear-gradient(135deg, #5e72e4, #825ee4); }
        .info-section-header h4 i.bg-success { background: linear-gradient(135deg, #2dce89, #2dcecc); }
        .info-section-header h4 i.bg-info { background: linear-gradient(135deg, #11cdef, #1171ef); }
        .info-section-header h4 i.bg-warning { background: linear-gradient(135deg, #fb6340, #fbb140); }

        .info-section-body {
            padding: 25px;
        }

        /* ===== CAMPOS DEL FORMULARIO ===== */
        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        .form-field {
            margin-bottom: 5px;
        }

        .form-field label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 600;
            color: #8898aa;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }

        .form-field label i {
            color: #5e72e4;
            font-size: 14px;
        }

        .form-field input,
        .form-field select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-size: 14px;
            color: #172b4d;
            font-weight: 500;
            transition: all 0.3s ease;
            background: white;
        }

        .form-field input:focus,
        .form-field select:focus {
            outline: none;
            border-color: #5e72e4;
            box-shadow: 0 0 0 4px rgba(94, 114, 228, 0.1);
        }

        .form-field input[readonly] {
            background: #f8f9fe;
            color: #525f7f;
            cursor: not-allowed;
        }

        .form-field input.editable {
            background: white;
            cursor: text;
        }

        .form-field input.editable:hover {
            border-color: #5e72e4;
        }

        /* ===== SIDEBAR CARDS ===== */
        .sidebar-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .sidebar-card-header {
            padding: 20px;
            background: linear-gradient(135deg, #172b4d 0%, #1a3a5c 100%);
            text-align: center;
        }

        .sidebar-card-header h5 {
            color: white;
            margin: 0;
            font-size: 15px;
            font-weight: 600;
        }

        .sidebar-card-body {
            padding: 20px;
        }

        /* ===== STATS MINI ===== */
        .stats-mini {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .stat-mini-item {
            text-align: center;
            padding: 15px 10px;
            background: #f8f9fe;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .stat-mini-item:hover {
            background: #eef1ff;
            transform: translateY(-3px);
        }

        .stat-mini-item .number {
            font-size: 24px;
            font-weight: 700;
            color: #172b4d;
            display: block;
        }

        .stat-mini-item .label {
            font-size: 11px;
            color: #8898aa;
            text-transform: uppercase;
            font-weight: 600;
        }

        /* ===== ACCIONES RÁPIDAS ===== */
        .quick-action-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: #f8f9fe;
            border-radius: 12px;
            margin-bottom: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            color: #172b4d;
        }

        .quick-action-item:hover {
            background: #eef1ff;
            transform: translateX(5px);
            color: #5e72e4;
        }

        .quick-action-item:last-child {
            margin-bottom: 0;
        }

        .quick-action-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: white;
            flex-shrink: 0;
        }

        .quick-action-item span {
            font-weight: 600;
            font-size: 13px;
            flex: 1;
        }

        .quick-action-item i.arrow {
            color: #c0c6cc;
            transition: all 0.3s ease;
        }

        .quick-action-item:hover i.arrow {
            color: #5e72e4;
            transform: translateX(3px);
        }

        /* ===== INFORMACIÓN DE CONTACTO SIDEBAR ===== */
        .contact-info-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .contact-info-item:last-child {
            border-bottom: none;
        }

        .contact-info-item i {
            width: 35px;
            height: 35px;
            background: #f8f9fe;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #5e72e4;
            font-size: 14px;
        }

        .contact-info-item .info {
            flex: 1;
        }

        .contact-info-item .info label {
            display: block;
            font-size: 11px;
            color: #8898aa;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .contact-info-item .info span {
            font-size: 14px;
            color: #172b4d;
            font-weight: 500;
        }

        /* ===== BOTÓN GUARDAR FLOTANTE ===== */
        .save-floating-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            padding: 15px 30px;
            background: linear-gradient(135deg, #2dce89, #2dcecc);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            box-shadow: 0 10px 40px rgba(45, 206, 137, 0.4);
            transition: all 0.3s ease;
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 10px;
            transform: translateY(100px);
            opacity: 0;
        }

        .save-floating-btn.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .save-floating-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 50px rgba(45, 206, 137, 0.5);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .profile-info-section {
                flex-direction: column;
                align-items: center;
                text-align: center;
                padding: 0 20px 20px;
            }

            .profile-actions-top {
                justify-content: center;
            }

            .profile-nav-tabs {
                overflow-x: auto;
                padding: 15px 20px;
            }

            .nav-tab-btn {
                white-space: nowrap;
            }
        }
    </style>
</head>
<body class="g-sidenav-show bg-gray-100">
    <div class="position-absolute bg-default w-100 min-height-300 top-0">
        <span class="mask bg-default opacity-6"></span>
    </div>
    
    <?php require_once("componentes/menu.php"); ?>
    
    <div class="main-content position-relative max-height-vh-100 h-100">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Administración</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Perfil</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Mi Perfil</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="<?php echo base_url(); ?>cerrarsesion" class="nav-link text-white font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Cerrar Sesión</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php $informaciones = $informacion->result()[0]; ?>
        <br>
        <div class="container-fluid py-4">
            <!-- Profile Header Card -->
            <div class="profile-header-card bg-default">
                <div class="profile-cover"></div>
                <div class="profile-info-section">
                    <div class="profile-avatar-wrapper">
                        <img src="<?php echo base_url(); ?>public/img/theme/team-41.jpg" alt="<?php echo $informaciones->nombre; ?>">
                        <div class="avatar-edit-btn" title="Cambiar foto">
                            <i class="fas fa-camera"></i>
                        </div>
                    </div>
                    
                    <div class="profile-details">
                        <h2><?php echo $informaciones->nombre . " " . $informaciones->apellido; ?></h2>
                        <span class="profile-role">
                            <i class="fas fa-shield-alt"></i>
                            <?php echo $informaciones->rol_usuario; ?>
                        </span>
                        <span class="profile-status">En línea</span>
                    </div>
                    
                    <div class="profile-actions-top">
                        
                        <button class="btn-profile-action primary" id="btnEditMode">
                            <i class="fas fa-edit"></i> Editar
                        </button>
                    </div>
                </div>

                <div class="profile-nav-tabs">
                    <button class="nav-tab-btn active" data-tab="info">
                        <i class="fas fa-user"></i> Información
                    </button>
                    
                    <button class="nav-tab-btn" data-tab="activity">
                        <i class="fas fa-history"></i> Actividad
                    </button>
                </div>
            </div>

            <!-- Contenido Principal -->
            <div class="profile-content">
                <!-- Columna Principal -->
                <div class="main-column">
                    <!-- Tab: Información -->
                    <div class="tab-pane active" id="tab-info">
                        <!-- Información Personal -->
                        <div class="info-section-card">
                            <div class="info-section-header">
                                <h4>
                                    <i class="fas fa-user bg-primary"></i>
                                    Información Personal
                                </h4>
                            </div>
                            <div class="info-section-body">
                                <div class="form-row">
                                    <div class="form-field">
                                        <label><i class="fas fa-id-badge"></i> Usuario</label>
                                        <input type="text" value="<?php echo $informaciones->usuario; ?>" readonly>
                                    </div>
                                    <div class="form-field">
                                        <label><i class="fas fa-envelope"></i> Correo Electrónico</label>
                                        <input type="email" value="<?php echo $informaciones->email; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-field">
                                        <label><i class="fas fa-user-tag"></i> Nombres</label>
                                        <input type="text" value="<?php echo $informaciones->nombre; ?>" readonly>
                                    </div>
                                    <div class="form-field">
                                        <label><i class="fas fa-user-tag"></i> Apellidos</label>
                                        <input type="text" value="<?php echo $informaciones->apellido; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-field">
                                        <label><i class="fas fa-birthday-cake"></i> Fecha de Nacimiento</label>
                                        <input type="date" value="" readonly>
                                    </div>
                                    <div class="form-field">
                                        <label><i class="fas fa-phone"></i> Teléfono</label>
                                        <input type="text" id="telefono" class="editable" value="<?php echo $informaciones->telefono; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Información Laboral -->
                        <div class="info-section-card">
                            <div class="info-section-header">
                                <h4>
                                    <i class="fas fa-briefcase bg-info"></i>
                                    Información Laboral
                                </h4>
                            </div>
                            <div class="info-section-body">
                                <div class="form-row">
                                    <div class="form-field">
                                        <label><i class="fas fa-building"></i> Empresa / Dirección</label>
                                        <input type="text" value="<?php echo $informaciones->empresa; ?>" readonly>
                                    </div>
                                    <div class="form-field">
                                        <label><i class="fas fa-user-tie"></i> Rol / Cargo</label>
                                        <input type="text" value="<?php echo $informaciones->rol_usuario; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-field">
                                        <label><i class="fas fa-toggle-on"></i> Estado de la Cuenta</label>
                                        <input type="text" value="Activo" readonly style="color: #2dce89; font-weight: 600;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab: Seguridad -->
                    <div class="tab-pane" id="tab-security" style="display: none;">
                        <div class="info-section-card">
                            <div class="info-section-header">
                                <h4>
                                    <i class="fas fa-shield-alt bg-warning"></i>
                                    Seguridad de la Cuenta
                                </h4>
                            </div>
                            <div class="info-section-body">
                                <div class="quick-action-item" onclick="cambiarPassword()">
                                    <div class="quick-action-icon" style="background: linear-gradient(135deg, #5e72e4, #825ee4);">
                                        <i class="fas fa-key"></i>
                                    </div>
                                    <span>Cambiar Contraseña</span>
                                    <i class="fas fa-chevron-right arrow"></i>
                                </div>
                                <div class="quick-action-item">
                                    <div class="quick-action-icon" style="background: linear-gradient(135deg, #2dce89, #2dcecc);">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <span>Autenticación de Dos Factores</span>
                                    <i class="fas fa-chevron-right arrow"></i>
                                </div>
                                <div class="quick-action-item">
                                    <div class="quick-action-icon" style="background: linear-gradient(135deg, #11cdef, #1171ef);">
                                        <i class="fas fa-desktop"></i>
                                    </div>
                                    <span>Dispositivos Conectados</span>
                                    <i class="fas fa-chevron-right arrow"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab: Actividad -->
                    <div class="tab-pane" id="tab-activity" style="display: none;">
                        <div class="info-section-card">
                            <div class="info-section-header">
                                <h4>
                                    <i class="fas fa-history bg-success"></i>
                                    Actividad Reciente
                                </h4>
                            </div>
                            <div class="info-section-body">
                                <div class="quick-action-item" style="cursor: default;">
                                    <div class="quick-action-icon" style="background: linear-gradient(135deg, #2dce89, #2dcecc);">
                                        <i class="fas fa-sign-in-alt"></i>
                                    </div>
                                    <div style="flex: 1;">
                                        <span style="display: block;">Inicio de sesión exitoso</span>
                                        <small style="color: #8898aa;">Windows - Chrome</small>
                                    </div>
                                    <small style="color: #adb5bd;">Hace 5 min</small>
                                </div>
                                <div class="quick-action-item" style="cursor: default;">
                                    <div class="quick-action-icon" style="background: linear-gradient(135deg, #5e72e4, #825ee4);">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    <div style="flex: 1;">
                                        <span style="display: block;">Perfil actualizado</span>
                                        <small style="color: #8898aa;">Teléfono modificado</small>
                                    </div>
                                    <small style="color: #adb5bd;">Hace 2 días</small>
                                </div>
                                <div class="quick-action-item" style="cursor: default;">
                                    <div class="quick-action-icon" style="background: linear-gradient(135deg, #11cdef, #1171ef);">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div style="flex: 1;">
                                        <span style="display: block;">Módulo Citas</span>
                                        <small style="color: #8898aa;">Accediste al módulo</small>
                                    </div>
                                    <small style="color: #adb5bd;">Hace 3 días</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="sidebar-column">
                    <!-- Estadísticas -->
                    <div class="sidebar-card">
                        <div class="sidebar-card-header">
                            <h5><i class="fas fa-chart-bar me-2"></i> Estadísticas</h5>
                        </div>
                        <div class="sidebar-card-body">
                            <div class="stats-mini">
                                <div class="stat-mini-item">
                                    <span class="number">30</span>
                                    <span class="label">Días Activo</span>
                                </div>
                                <div class="stat-mini-item">
                                    <span class="number">45</span>
                                    <span class="label">Sesiones</span>
                                </div>
                                <div class="stat-mini-item">
                                    <span class="number">12</span>
                                    <span class="label">Este Mes</span>
                                </div>
                                <div class="stat-mini-item">
                                    <span class="number" style="color: #2dce89;">✓</span>
                                    <span class="label">Activo</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Información de Contacto -->
                    <div class="sidebar-card">
                        <div class="sidebar-card-header">
                            <h5><i class="fas fa-address-card me-2"></i> Contacto Rápido</h5>
                        </div>
                        <div class="sidebar-card-body">
                            <div class="contact-info-item">
                                <i class="fas fa-envelope"></i>
                                <div class="info">
                                    <label>Email</label>
                                    <span><?php echo $informaciones->email; ?></span>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <i class="fas fa-phone"></i>
                                <div class="info">
                                    <label>Teléfono</label>
                                    <span><?php echo $informaciones->telefono; ?></span>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <i class="fas fa-user"></i>
                                <div class="info">
                                    <label>Usuario</label>
                                    <span><?php echo $informaciones->usuario; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón Guardar Flotante -->
    <button class="save-floating-btn" id="saveBtn">
        <i class="fas fa-save"></i> Guardar Cambios
    </button>

    <?php require_once("componentes/personalizar.php"); ?>
    <?php require_once("componentes/scripts.php"); ?>

    <script>
        $(document).ready(function() {
            // Cambio de tabs
            $('.nav-tab-btn').click(function() {
                const tabId = $(this).data('tab');
                
                // Actualizar botones
                $('.nav-tab-btn').removeClass('active');
                $(this).addClass('active');
                
                // Actualizar contenido
                $('.tab-pane').hide();
                $('#tab-' + tabId).fadeIn(300);
            });

            // Mostrar botón guardar cuando cambia campo editable
            $('.form-field input.editable').on('input', function() {
                $('#saveBtn').addClass('visible');
            });

            // Acción del botón guardar
            $('#saveBtn').click(function() {
                const telefono = $('#telefono').val();
                const btn = $(this);
                
                btn.html('<i class="fas fa-spinner fa-spin"></i> Guardando...');
                
                // Aquí puedes agregar tu lógica AJAX para guardar
                setTimeout(() => {
                    btn.html('<i class="fas fa-check"></i> ¡Guardado!');
                    btn.css('background', 'linear-gradient(135deg, #2dce89, #2dcecc)');
                    
                    setTimeout(() => {
                        btn.removeClass('visible');
                        btn.html('<i class="fas fa-save"></i> Guardar Cambios');
                    }, 1500);
                }, 1000);
            });

            // Modo edición
            $('#btnEditMode').click(function() {
                const isEditing = $(this).hasClass('editing');
                
                if (isEditing) {
                    $(this).removeClass('editing');
                    $(this).html('<i class="fas fa-edit"></i> Editar');
                } else {
                    $(this).addClass('editing');
                    $(this).html('<i class="fas fa-times"></i> Cancelar');
                    $('.form-field input.editable').first().focus();
                }
            });
        });
    </script>
</body>
</html>