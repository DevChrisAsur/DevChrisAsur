<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<?php
setlocale(LC_TIME, 'es_CO.UTF-8');
date_default_timezone_set('America/Bogota');
$fecha = strftime("%d de %B de %Y");
?>

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

    <!-- Tarjetas de resumen -->
    <section class="card-container">
      <article class="card-resumen">
        <div class="card-header">
          <span class="card-header-date"><?= $fecha ?></span>
        </div>
        <div class="card-body">
          <h4>Leads Hoy</h4>
          <p><?= ControladorLeads::ctrContarLeadsDiarios(); ?> Leads</p>
        </div>
      </article>

      <article class="card-resumen">
        <div class="card-header">
          <span class="card-header-date"><?= $fecha ?></span>
        </div>
        <div class="card-body">
          <h4>Ventas</h4>
          <p><?= ControladorCuotas::ctrContarVentasDiarios(); ?> Ventas</p>
        </div>
      </article>

      <article class="card-resumen tall-card">
        <div class="card-header">
          <span class="card-header-date"><?= $fecha ?></span>
        </div>
        <div class="card-body">
          <h4>Total de ventas</h4>
          <p>$ <?= number_format(ControladorCuotas::ctrTotalVentasHoy(), 2); ?></p>
        </div>
      </article>
    </section>


    <!-- Tarjetas de transacciones -->
    <section class="card-container mt-5">
      <?php
      $transfer = ControladorCuotas::ctrVerTransfer();
      $proceso = ControladorCuotas::ctrVerProceso();
      $recaudo = ControladorCuotas::ctrVerRecaudo();
      ?>

      <?php foreach (
        [
          ['title' => '💸 Transfer', 'data' => $transfer, 'accion' => 'VerDetallesTransfer'],
          ['title' => '⏳ Proceso', 'data' => $proceso, 'accion' => 'VerDetallesProceso'],
          ['title' => '📥 Recaudo', 'data' => $recaudo, 'accion' => 'VerDetallesRecaudo'],
          // ['title' => '📉 Caída', 'data' => $caida, 'accion' => 'VerDetallesRecaudo']
        ] as $item
      ): ?>
        <article class="card-resumen">
          <div class="card-header">
            <span class="card-header-date"><?= $item['title'] ?></span>
          </div>
          <div class="card-body">
            <h4>$<?= number_format($item['data']['monto_cop'] ?? 0, 2) ?> COP</h4>
            <p><?= $item['data']['rango_fecha'] ?></p>
            <button class="card-button"
                    data-accion="<?= $item['accion'] ?>"
                    data-tipo="<?= strip_tags($item['title']) ?>">
                    Ver Detalle →
            </button>          
          </div>
        </article>
      <?php endforeach;?>
      
    </section>


  </section>

</div>

<!-- Modal Detalle de Transacciones -->
<div class="modal fade" id="modalDetalle" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetalleLabel"></h5>
      </div>
      <div class="modal-body">
        <p>Cargando detalles...</p>
      </div>
    </div>
  </div>
</div>


<style>
  .card-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 20px;
    padding: 20px;
  }

  .card-resumen {
    display: flex;
    flex-direction: column;
    background-color: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .card-resumen:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  }

  .card-header {
    background-color: #444;
    padding: 12px 16px;
    color: #fff;
    font-size: 0.9rem;
    font-weight: bold;
    display: flex;
    justify-content: center;
  }

  .card-header-date {
    font-size: 1.2rem;
    font-weight: 400;
  }

  .card-body {
    padding: 20px;
    text-align: center;
  }

  .card-body h4 {
    font-size: 2.3rem;
    font-weight: bold;
    margin-bottom: 8px;
    color: #222;
  }

  .card-body h6 {
    font-size: 1rem;
    margin-bottom: 6px;
    color: #333;
  }

  .card-body p {
    font-size: 1.5rem;
    margin-bottom: 16px;
    color: #666;
  }

  .card-button {
    background-color: #ded95c;
    border: none;
    border-radius: 12px;
    padding: 10px 16px;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    color: #000;
    transition: background-color 0.3s ease;
  }

  .card-button:hover {
    background-color: #c8c340;
  }

  .modal-content{
    border-radius: 20px;
  }

  @media (max-width: 768px) {
    .card-container {
      grid-template-columns: 1fr;
    }
  }
</style>



