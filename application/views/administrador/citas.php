<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración / Citas</title>
    <?php require_once("componentes/head.php"); ?>
    <style>
        :root {
            --primary: #5e72e4;
            --success: #2dce89;
            --danger: #f5365c;
            --warning: #fb6340;
            --info: #11cdef;
            --dark: #172b4d;
        }

        /* ===== ESTADÍSTICAS CARDS ===== */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 20px 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }

        .stat-card.today { border-left-color: var(--primary); }
        .stat-card.pending { border-left-color: var(--warning); }
        .stat-card.confirmed { border-left-color: var(--success); }
        .stat-card.cancelled { border-left-color: var(--danger); }

        .stat-icon {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: white;
        }

        .stat-card.today .stat-icon { background: linear-gradient(135deg, #5e72e4, #825ee4); }
        .stat-card.pending .stat-icon { background: linear-gradient(135deg, #fb6340, #fbb140); }
        .stat-card.confirmed .stat-icon { background: linear-gradient(135deg, #2dce89, #2dcecc); }
        .stat-card.cancelled .stat-icon { background: linear-gradient(135deg, #f5365c, #f56036); }

        .stat-info h3 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            color: var(--dark);
        }

        .stat-info p {
            margin: 0;
            color: #8898aa;
            font-size: 13px;
            font-weight: 500;
        }

        /* ===== CONTENEDOR PRINCIPAL ===== */
        .main-grid {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 25px;
        }

        @media (max-width: 1200px) {
            .main-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ===== PANEL DE CITAS ===== */
        .appointments-panel {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .panel-header {
            background: linear-gradient(135deg, #172b4d 0%, #1a3a5c 100%);
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .panel-header h2 {
            color: white;
            margin: 0;
            font-size: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .panel-header h2 i {
            font-size: 24px;
            opacity: 0.8;
        }

        .header-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-add-cita {
            background: linear-gradient(135deg, #f5365c, #f56036);
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .btn-add-cita:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(245, 54, 92, 0.4);
        }

        .btn-calendar {
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-calendar:hover {
            background: rgba(255,255,255,0.25);
        }

        /* ===== FILTROS ===== */
        .filters-bar {
            padding: 20px 25px;
            background: #f8f9fe;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 8px 18px;
            border-radius: 25px;
            border: 2px solid #e0e6ed;
            background: white;
            color: #525f7f;
            font-weight: 500;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn:hover, .filter-btn.active {
            border-color: var(--primary);
            color: var(--primary);
            background: #eef1ff;
        }

        .filter-btn.active {
            background: var(--primary);
            color: white;
        }

        /* ===== LISTA DE CITAS ===== */
        .appointments-list {
            padding: 20px;
            max-height: 600px;
            overflow-y: auto;
        }

        .appointment-card {
            background: #fafbfc;
            border-radius: 14px;
            padding: 18px 20px;
            margin-bottom: 15px;
            display: grid;
            grid-template-columns: auto 1fr auto;
            gap: 18px;
            align-items: center;
            border: 1px solid #eaecef;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .appointment-card:hover {
            background: white;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            transform: translateX(5px);
            border-color: var(--primary);
        }

        .time-badge {
            text-align: center;
            min-width: 70px;
        }

        .time-badge .time {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
        }

        .time-badge .period {
            font-size: 11px;
            color: #8898aa;
            text-transform: uppercase;
            font-weight: 600;
        }

        .appointment-info h4 {
            margin: 0 0 5px 0;
            font-size: 15px;
            font-weight: 600;
            color: var(--dark);
        }

        .appointment-info .meta {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .appointment-info .meta span {
            font-size: 12px;
            color: #8898aa;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .appointment-info .meta i {
            font-size: 11px;
        }

        .appointment-status {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
        }

        .status-badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-badge.confirmado { background: #d4edda; color: #155724; }
        .status-badge.pendiente { background: #cce5ff; color: #004085; }
        .status-badge.cancelado { background: #f8d7da; color: #721c24; }
        .status-badge.tratado { background: #d1ecf1; color: #0c5460; }

        .btn-edit {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            border: none;
            background: linear-gradient(135deg, #5e72e4, #825ee4);
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-edit:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(94, 114, 228, 0.4);
        }

        .relative-time {
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 500;
        }

        .relative-time.today { background: #fff3cd; color: #856404; }
        .relative-time.tomorrow { background: #d4edda; color: #155724; }
        .relative-time.future { background: #e2e3e5; color: #383d41; }
        .relative-time.past { background: #f8d7da; color: #721c24; }

        /* ===== PANEL LATERAL ===== */
        .side-panel {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .schedule-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .schedule-header {
            background: linear-gradient(135deg, #11cdef, #1171ef);
            padding: 20px;
            text-align: center;
        }

        .schedule-header h3 {
            color: white;
            margin: 0 0 5px 0;
            font-size: 16px;
            font-weight: 600;
        }

        .schedule-header p {
            color: rgba(255,255,255,0.8);
            margin: 0;
            font-size: 13px;
        }

        .days-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            padding: 20px;
        }

        .day-card {
            background: #f8f9fe;
            border-radius: 12px;
            padding: 15px 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .day-card:hover {
            background: #eef1ff;
            border-color: var(--primary);
        }

        .day-card.active {
            background: var(--primary);
            color: white;
        }

        .day-card .day-name {
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 600;
            opacity: 0.7;
        }

        .day-card .day-num {
            font-size: 22px;
            font-weight: 700;
        }

        .day-card .appointments-count {
            font-size: 10px;
            margin-top: 5px;
            opacity: 0.8;
        }

        /* ===== HORARIOS DISPONIBLES ===== */
        .hours-section {
            padding: 20px;
            border-top: 1px solid #eee;
        }

        .hours-section h4 {
            font-size: 14px;
            color: var(--dark);
            margin: 0 0 15px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .hours-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
        }

        .hour-chip {
            padding: 10px 8px;
            background: #e8f5e9;
            border-radius: 8px;
            text-align: center;
            font-size: 12px;
            font-weight: 600;
            color: #2e7d32;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .hour-chip:hover {
            background: #c8e6c9;
            transform: scale(1.05);
        }

        .hour-chip.occupied {
            background: #ffebee;
            color: #c62828;
            cursor: not-allowed;
            opacity: 0.6;
        }

        /* ===== DOCTORES QUICK VIEW ===== */
        .doctors-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.08);
            padding: 20px;
        }

        .doctors-card h4 {
            font-size: 14px;
            color: var(--dark);
            margin: 0 0 15px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .doctor-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            background: #f8f9fe;
            border-radius: 12px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .doctor-item:hover {
            background: #eef1ff;
        }

        .doctor-avatar {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, #5e72e4, #825ee4);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 16px;
        }

        .doctor-info h5 {
            margin: 0;
            font-size: 13px;
            font-weight: 600;
            color: var(--dark);
        }

        .doctor-info span {
            font-size: 11px;
            color: #8898aa;
        }

        .doctor-status {
            margin-left: auto;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--success);
        }

        /* ===== MODAL MEJORADO ===== */
        .modal-content {
            border-radius: 20px;
            border: none;
            overflow: hidden;
        }

        .modal-header.modern {
            background: linear-gradient(135deg, #172b4d 0%, #1a3a5c 100%);
            padding: 25px 30px;
            border: none;
        }

        .modal-header.modern .modal-title {
            color: white;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modal-header.modern .close {
            color: white;
            opacity: 0.8;
            text-shadow: none;
        }

        .modal-body.modern {
            padding: 30px;
        }

        .form-section {
            margin-bottom: 25px;
        }

        .form-section-title {
            font-size: 14px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-section-title i {
            color: var(--primary);
        }

        .form-group label {
            font-size: 12px;
            font-weight: 600;
            color: #525f7f;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control-modern {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-control-modern:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(94, 114, 228, 0.1);
        }

        .hours-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 15px;
            background: #f8f9fe;
            border-radius: 12px;
            min-height: 60px;
        }

        .hour-btn {
            padding: 10px 18px;
            background: white;
            border: 2px solid #e0e6ed;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .hour-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .hour-btn.selected {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .modal-footer.modern {
            padding: 20px 30px;
            border-top: 1px solid #f0f0f0;
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .btn-save {
            background: linear-gradient(135deg, #2dce89, #2dcecc);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(45, 206, 137, 0.4);
        }

        .btn-cancel {
            background: #f8f9fe;
            border: 2px solid #e0e6ed;
            color: #525f7f;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            background: #e9ecef;
        }

        /* ===== SCROLLBAR ===== */
        .appointments-list::-webkit-scrollbar {
            width: 6px;
        }

        .appointments-list::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .appointments-list::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 60px;
            color: #e0e6ed;
            margin-bottom: 20px;
        }

        .empty-state h4 {
            color: #8898aa;
            font-weight: 500;
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-default position-absolute w-100"></div>
    
    <main class="main-content position-relative border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Administración</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Citas</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Gestión de Citas</h6>
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
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid py-4">
            <!-- Estadísticas Rápidas -->
            <?php
                $total_hoy = 0;
                $total_pendientes = 0;
                $total_confirmadas = 0;
                $total_canceladas = 0;
                
                foreach($cita->result() as $c) {
                    $fecha_cita = strtotime($c->fecha);
                    $hoy = strtotime(date("Y-m-d"));
                    
                    if($fecha_cita == $hoy) $total_hoy++;
                    if($c->estado == "Pendiente") $total_pendientes++;
                    if($c->estado == "Confirmado") $total_confirmadas++;
                    if($c->estado == "Cancelado") $total_canceladas++;
                }
                $cita->data_seek(0); // Reset del cursor
            ?>
            
            <div class="stats-container">
                <div class="stat-card today">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <div class="stat-info">
                        <h3><?php echo $total_hoy; ?></h3>
                        <p>Citas para Hoy</p>
                    </div>
                </div>
                <div class="stat-card pending">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-info">
                        <h3><?php echo $total_pendientes; ?></h3>
                        <p>Pendientes</p>
                    </div>
                </div>
                <div class="stat-card confirmed">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3><?php echo $total_confirmadas; ?></h3>
                        <p>Confirmadas</p>
                    </div>
                </div>
                <div class="stat-card cancelled">
                    <div class="stat-icon">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3><?php echo $total_canceladas; ?></h3>
                        <p>Canceladas</p>
                    </div>
                </div>
            </div>

            <!-- Grid Principal -->
            <div class="main-grid">
                <!-- Panel de Citas -->
                <div class="appointments-panel">
                    <div class="panel-header">
                        <h2><i class="fas fa-calendar-check"></i> Lista de Citas</h2>
                        <div class="header-actions">
                            <!-- <a class="btn-calendar" target="_blank" href="<?php echo base_url(); ?>administracion/calendario">
                                <i class="fas fa-calendar-alt"></i> Ver Calendario
                            </a> -->
                            <button class="btn-add-cita" onclick="$('#AddCITA').trigger('reset');$('#Cont_Horas').empty();" data-bs-toggle="modal" data-bs-target="#AgregarPaciente">
                                <i class="fas fa-plus"></i> Nueva Cita
                            </button>
                        </div>
                    </div>

                    <div class="filters-bar">
                        <button class="filter-btn active" data-filter="all">Todas</button>
                        <button class="filter-btn" data-filter="today">Hoy</button>
                        <button class="filter-btn" data-filter="Pendiente">Pendientes</button>
                        <button class="filter-btn" data-filter="Confirmado">Confirmadas</button>
                        <button class="filter-btn" data-filter="Tratado">Tratadas</button>
                        <button class="filter-btn" data-filter="Cancelado">Canceladas</button>
                    </div>

                    <div class="appointments-list" id="appointments-list">
                        <?php 
                        $has_citas = false;
                        foreach($cita->result() as $citas) { 
                            $has_citas = true;
                            $firstDate = strtotime(date("Y-m-d"));
                            $secondDate = strtotime($citas->fecha);
                            $intvl = (($secondDate - $firstDate) / 3600) / 24;
                            
                            $relative_class = 'future';
                            $relative_text = "En {$intvl} días";
                            
                            if($intvl == 0) {
                                $relative_class = 'today';
                                $relative_text = 'Hoy';
                            } else if($intvl == 1) {
                                $relative_class = 'tomorrow';
                                $relative_text = 'Mañana';
                            } else if($intvl < 0) {
                                $relative_class = 'past';
                                $relative_text = "Hace " . abs($intvl) . " días";
                            }
                            
                            $hora_parts = explode(':', $citas->hora);
                            $hora_12 = date("g:i", strtotime($citas->hora));
                            $periodo = date("A", strtotime($citas->hora));
                            
                            $is_today = ($intvl == 0) ? 'true' : 'false';
                        ?>
                        <div class="appointment-card" 
                             data-status="<?php echo $citas->estado; ?>" 
                             data-today="<?php echo $is_today; ?>"
                             onclick="editarCita(<?php echo $citas->codigo_cita; ?>);">
                            <div class="time-badge">
                                <div class="time"><?php echo $hora_12; ?></div>
                                <div class="period"><?php echo $periodo; ?></div>
                            </div>
                            <div class="appointment-info">
                                <h4><?php echo $citas->nombre; ?></h4>
                                <div class="meta">
                                    <span><i class="fas fa-id-card"></i> <?php echo $citas->documento; ?></span>
                                    <span><i class="fas fa-phone"></i> <?php echo $citas->telefono; ?></span>
                                    <span><i class="fas fa-user-md"></i> <?php echo $citas->doctor; ?></span>
                                    <span><i class="fas fa-calendar"></i> <?php echo $citas->date_cita; ?></span>
                                </div>
                                <?php if($citas->comentarios): ?>
                                <div class="meta" style="margin-top: 5px;">
                                    <span><i class="fas fa-comment"></i> <?php echo $citas->comentarios; ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="appointment-status">
                                <span class="status-badge <?php echo strtolower($citas->estado); ?>">
                                    <?php echo $citas->estado; ?>
                                </span>
                                <span class="relative-time <?php echo $relative_class; ?>">
                                    <?php echo $relative_text; ?>
                                </span>
                                <button class="btn-edit" onclick="event.stopPropagation(); editarCita(<?php echo $citas->codigo_cita; ?>);">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <?php if(!$has_citas): ?>
                        <div class="empty-state">
                            <i class="fas fa-calendar-times"></i>
                            <h4>No hay citas registradas</h4>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Panel Lateral -->
                <div class="side-panel">
                    <!-- Próximos días -->
                    <div class="schedule-card">
                        <div class="schedule-header">
                            <h3><i class="fas fa-clock"></i> Horarios Disponibles</h3>
                            <p>Selecciona un día para ver disponibilidad</p>
                        </div>
                        <div class="days-grid">
                            <?php
                            $dias_semana = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];
                            for($i = 0; $i < 6; $i++) {
                                $fecha = date('Y-m-d', strtotime("+{$i} days"));
                                $dia_num = date('d', strtotime($fecha));
                                $dia_nombre = $dias_semana[date('w', strtotime($fecha))];
                                $active = ($i == 0) ? 'active' : '';
                                $label = ($i == 0) ? 'Hoy' : (($i == 1) ? 'Mañana' : $dia_nombre);
                            ?>
                            <div class="day-card <?php echo $active; ?>" data-date="<?php echo $fecha; ?>">
                                <div class="day-name"><?php echo $label; ?></div>
                                <div class="day-num"><?php echo $dia_num; ?></div>
                                <div class="appointments-count cont_day"></div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="hours-section">
                            <h4><i class="fas fa-clock"></i> Horas del día seleccionado</h4>
                            <div class="hours-grid" id="hours-preview">
                                <!-- Se llena dinámicamente -->
                            </div>
                        </div>
                    </div>

                    <!-- Doctores Disponibles -->
                    <div class="doctors-card">
                        <h4><i class="fas fa-user-md"></i> Doctores</h4>
                        <?php foreach($doctor->result() as $doc) { 
                            $initials = strtoupper(substr($doc->nombre, 0, 2));
                        ?>
                        <div class="doctor-item">
                            <div class="doctor-avatar"><?php echo $initials; ?></div>
                            <div class="doctor-info">
                                <h5><?php echo $doc->nombre; ?></h5>
                                <span><?php echo $doc->perfil; ?></span>
                            </div>
                            <div class="doctor-status"></div>
                        </div>
                        <?php } $doctor->data_seek(0); ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require_once("componentes/personalizar.php"); ?>

    <!-- Modal Agregar Cita (Mejorado) -->
    <div class="modal fade" id="AgregarPaciente" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form class="modal-content" id="AddCITA">
                <div class="modal-header modern">
                    <h5 class="modal-title"><i class="fas fa-calendar-plus"></i> Nueva Cita</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modern">
                    <div class="messageError"></div>
                    
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-user-md"></i> Información del Médico y Horario
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Médico</label>
                                    <select class="form-control form-control-modern" id="medico" required>
                                        <option value="">Seleccione un doctor</option>
                                        <?php foreach($doctor->result() as $doctores) { ?>
                                        <option value="<?php echo $doctores->codigo_doctor; ?>"><?php echo $doctores->nombre." (".$doctores->perfil.")"; ?></option>
                                        <?php } $doctor->data_seek(0); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control form-control-modern" id="fecha" required min="<?php echo date("Y-m-d"); ?>">
                                        <button type="button" class="btn btn-primary" id="lupa_Horario" style="border-radius: 0 10px 10px 0;">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Horarios Disponibles</label>
                                <div class="hours-container" id="Cont_Horas">
                                    <span style="color: #8898aa; font-size: 13px;">Seleccione médico y fecha para ver horarios</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-user"></i> Información del Paciente
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DNI Paciente</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-modern" id="dni" minlength="7" maxlength="11" required>
                                        <button type="button" class="btn btn-primary" id="lupa_DNI" style="border-radius: 0 10px 10px 0;">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Apellidos y Nombres</label>
                                    <input type="text" class="form-control form-control-modern" id="nombre" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Celular</label>
                                    <input type="text" class="form-control form-control-modern" id="telefono">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-info-circle"></i> Detalles de la Cita
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select class="form-control form-control-modern" id="estado" required>
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="Confirmado">Confirmado</option>
                                        <option value="Tratado">Tratado</option>
                                        <option value="Cancelado">Cancelado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Observaciones</label>
                                    <input type="text" class="form-control form-control-modern" id="observaciones" placeholder="Notas adicionales...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Campos ocultos necesarios -->
                    <div style="display:none;">
                        <select id="hora" required><option value="">Seleccionar</option></select>
                        <select id="statee"><option value="Registrar">Registrar</option><option value="Actualizar">Actualizar</option></select>
                        <input type="number" id="idee">
                    </div>
                </div>
                <div class="modal-footer modern">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar Cita</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Editar Cita (Mejorado) -->
    <div class="modal fade" id="modaleditarcita" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header modern">
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Editar Cita</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modern">
                    <div class="messageError"></div>
                    
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-user"></i> Datos del Paciente
                        </div>
                        <div class="row">
                            <input type="hidden" id="id2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DNI</label>
                                    <input type="text" class="form-control form-control-modern" id="dni2" readonly style="background: #f8f9fe;">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nombre Completo</label>
                                    <input type="text" class="form-control form-control-modern" id="nombre2" readonly style="background: #f8f9fe;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-calendar-alt"></i> Reprogramar Cita
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Médico</label>
                                    <select class="form-control form-control-modern" id="medico2">
                                        <option value="">Seleccione un doctor</option>
                                        <?php foreach($doctor->result() as $doctores) { ?>
                                        <option value="<?php echo $doctores->codigo_doctor; ?>"><?php echo $doctores->nombre." (".$doctores->perfil.")"; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <input type="date" class="form-control form-control-modern" id="fecha2" min="<?php echo date("Y-m-d"); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Hora</label>
                                    <select class="form-control form-control-modern" id="hora2">
                                        <option value="">Seleccione hora</option>
                                        <option value="08:00">8:00 AM</option>
                                        <option value="08:30">8:30 AM</option>
                                        <option value="09:00">9:00 AM</option>
                                        <option value="09:30">9:30 AM</option>
                                        <option value="10:00">10:00 AM</option>
                                        <option value="10:30">10:30 AM</option>
                                        <option value="11:00">11:00 AM</option>
                                        <option value="11:30">11:30 AM</option>
                                        <option value="12:00">12:00 PM</option>
                                        <option value="12:30">12:30 PM</option>
                                        <option value="13:00">1:00 PM</option>
                                        <option value="13:30">1:30 PM</option>
                                        <option value="14:00">2:00 PM</option>
                                        <option value="14:30">2:30 PM</option>
                                        <option value="15:00">3:00 PM</option>
                                        <option value="15:30">3:30 PM</option>
                                        <option value="16:00">4:00 PM</option>
                                        <option value="16:30">4:30 PM</option>
                                        <option value="17:00">5:00 PM</option>
                                        <option value="17:30">5:30 PM</option>
                                        <option value="18:00">6:00 PM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-tasks"></i> Estado y Observaciones
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select class="form-control form-control-modern" id="estado2">
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="Confirmado">Confirmado</option>
                                        <option value="Tratado">Tratado</option>
                                        <option value="Cancelado">Cancelado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Observaciones</label>
                                    <input type="text" class="form-control form-control-modern" id="observaciones2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modern">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn-save" id="editarcitas"><i class="fas fa-save"></i> Actualizar Cita</button>
                </div>
            </div>
        </div>
    </div>

    <?php require_once("componentes/scripts.php"); ?>
    <script src="<?php echo base_url(); ?>public/js/scripts/citas_v2.js"></script>
    
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                Reset_Horarios();
            }, 1500);

            // Filtros de citas
            $('.filter-btn').click(function() {
                $('.filter-btn').removeClass('active');
                $(this).addClass('active');
                
                var filter = $(this).data('filter');
                
                $('.appointment-card').each(function() {
                    var status = $(this).data('status');
                    var isToday = $(this).data('today');
                    
                    if (filter === 'all') {
                        $(this).fadeIn(300);
                    } else if (filter === 'today') {
                        if (isToday === true || isToday === 'true') {
                            $(this).fadeIn(300);
                        } else {
                            $(this).fadeOut(200);
                        }
                    } else if (status === filter) {
                        $(this).fadeIn(300);
                    } else {
                        $(this).fadeOut(200);
                    }
                });
            });

            // Click en tarjetas de días
            $('.day-card').click(function() {
                $('.day-card').removeClass('active');
                $(this).addClass('active');
                // Aquí puedes agregar lógica para cargar horarios del día seleccionado
            });
        });

        var arr_doctors = <?php echo json_encode($doctor->result()); ?>;
        var arr_diass = <?php echo json_encode($dias); ?>;
        var horarios_diarios = <?php echo json_encode($horarios_diarios); ?>;
    </script>
</body>
</html>