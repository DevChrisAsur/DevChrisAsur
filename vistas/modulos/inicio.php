<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Inicio
      <small>Panel de Control</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Inicio</li>
    </ol>
  </section>

  <section class="content">
    <!-- Sección de tarjetas principales -->
    <div class="container mt-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
          <div class="card leads">
          <?php
            // Llamamos al controlador para obtener el número de leads registrados hoy
            $totalLeadsHoy = ControladorLeads::ctrContarLeadsDiarios();
          ?>
          <h5><?php echo $totalLeadsHoy; ?> Leads</h5>
          <p>Hoy</p>
        </div>
      </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
          <div class="card notificaciones-pendientes">
            <h5>0</h5>
            <p>Notificaciones<br>PARA HOY PENDIENTES</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
          <div class="card notificaciones-ejecutadas">
            <h5>1</h5>
            <p>Notificaciones<br>EJECUTADAS HOY</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
          <div class="card recursos-ventas">
            <p>Recursos Ventas</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
          <div class="card ventas">
            <?php
                // Llamada al controlador para obtener el total de ventas en proceso
                $totalVentas = ControladorCuotas::ctrContarVentasDiarios();
            ?>
            <h5><?php echo $totalVentas; ?> Ventas</h5>
            <p><?php echo date("d M Y"); ?></p> <!-- Fecha actual -->
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
          <div class="card total">
            <h5>$ Total</h5>
            <p>Ventas Hoy</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Filtro de rango de fechas con estilo especial -->
    <div class="container mt-4">
      <div class="row filtro-fechas-row mb-4"> <!-- Clase especial para el tamaño -->
        <div class="col-12">
            <h5 class="text-center">Seleccione Rango de Fechas</h5>
            <form>
            <div class="form-row align-items-center">
              <div class="col-md-5 mb-2">
                <input type="date" class="form-control" placeholder="Fecha inicio">
              </div>
              <div class="col-md-5 mb-2">
                <input type="date" class="form-control" placeholder="Fecha fin">
              </div>
              <div class="col-md-2 text-center text-md-left">
                <button type="submit" class="btn btn-primary w-100">Consultar</button>
              </div>
            </div>
            </form>
        </div>
      </div>

      <!-- Nueva fila de tarjetas de detalle -->
      <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
      <div class="card detalle transfer">
          <?php
              $montosTransfer = ControladorCuotas::ctrVerTransfer();
              $montoCOPTransfer = $montosTransfer ? number_format($montosTransfer['monto_cop'], 2) : 0;
              $montoUSDTransfer = $montosTransfer ? number_format($montosTransfer['monto_usd'], 2) : 0;
              $rangoFechaTransfer = $montosTransfer ? $montosTransfer['rango_fecha'] : '';
          ?>
          <h5>Transfer: $<?php echo $montoCOPTransfer; ?> COP</h5>
          <h5>Equivalent: $<?php echo $montoUSDTransfer; ?> USD</h5>
          <p>De: <?php echo $rangoFechaTransfer; ?></p>
          <button class="btn btn-light">Ver Detalle</button>
      </div>

      </div>

        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
        <div class="card detalle proceso">
            <?php
                $montosProceso = ControladorCuotas::ctrVerProceso();
                $montoCOPProceso = $montosProceso ? number_format($montosProceso['monto_cop'], 2) : 0;
                $montoUSDProceso = $montosProceso ? number_format($montosProceso['monto_usd'], 2) : 0;
                $rangoFechaProceso = $montosProceso ? $montosProceso['rango_fecha'] : '';
            ?>
            <h5>Proceso: $<?php echo $montoCOPProceso; ?> COP</h5>
            <h5>Equivalent: $<?php echo $montoUSDProceso; ?> USD</h5>
            <p>De: <?php echo $rangoFechaProceso; ?></p>
            <button class="btn btn-light">Ver Detalle</button>
        </div>


        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
          <div class="card detalle recaudo">
            <?php
                $montosRecaudo = ControladorCuotas::ctrVerRecaudo();
                $montoCOPRecaudo = $montosRecaudo ? number_format($montosRecaudo['monto_cop'], 2) : 0;
                $montoUSDRecaudo = $montosRecaudo ? number_format($montosRecaudo['monto_usd'], 2) : 0;
                $rangoFechaRecaudo = $montosRecaudo ? $montosRecaudo['rango_fecha'] : '';
            ?>
            <h5>Recaudo: $<?php echo $montoCOPRecaudo; ?> COP</h5>
            <h5>Equivalent: $<?php echo $montoUSDRecaudo; ?> USD</h5>
            <p>De: <?php echo $rangoFechaRecaudo; ?></p>
            <button class="btn btn-light">Ver Detalle</button>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
          <div class="card detalle caida">
            <h5>Caída: $529</h5>
            <p>De: 16 Oct 2024 A 31 Oct 2024</p>
            <button class="btn btn-light">Ver Detalle</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<style>
  .row {
    border-bottom-width: 10px;
    padding-bottom: 5px;
    padding-top: 5px;
    padding-right: 5px;
    padding-left: 5px;
  }

  /* Estilo especial para el row de filtro de fechas */
  .filtro-fechas-row {
    padding-top: 20px;
    padding-bottom: 20px;
  }

  .card {
    text-align: center;
    padding: 20px;
    color: white;
    transition: all 0.3s ease;
  }

  .card.leads { background-color: #f8f9fa; color: black; }
  .card.notificaciones-pendientes { background-color: #dc3545; }
  .card.notificaciones-ejecutadas { background-color: #28a745; }
  .card.recursos-ventas { background-color: #17a2b8; }
  .card.ventas { background-color: #007bff; }
  .card.total { background-color: #dc3545; }
  .card.transfer { background-color: #000066; }
  .card.proceso { background-color: #000066; }
  .card.recaudo { background-color: #000066; }
  .card.caida { background-color: #000066; }
  .detalle { padding: 15px; }

  .filtro-fechas {
    background-color: #f8f9fa;
    color: #343a40;
  }

  /* Ajustes de tamaño de las tarjetas para mantener consistencia */
  .card h5 {
    font-size: 1.5rem;
    margin-bottom: 10px;
  }

  .card p {
    font-size: 1rem;
  }

  /* Ajustes para pantallas pequeñas */
  @media (max-width: 576px) {
    .card { font-size: 0.9rem; padding: 15px; }
  }

  @media (max-width: 768px) {
    .card { font-size: 1rem; padding: 18px; }
  }
</style>
