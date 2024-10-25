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

  <!-- Main content -->
  <section class="content">

    <!-- Dashboard cards -->
    <div class="container mt-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
          <div class="card leads">
            <h5>15 Leads</h5>
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
            <h5>1 Ventas</h5>
            <p>24 Oct 2024</p>
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

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Agrega los scripts de Bootstrap y el estilo personalizado -->

<style>
  .card {
    text-align: center;
    font-size: 1.2rem;
    padding: 20px;
    color: white;
    transition: all 0.3s ease;
  }
  .card.leads {
    background-color: #f8f9fa;
    color: black;
  }
  .card.notificaciones-pendientes {
    background-color: #dc3545;
  }
  .card.notificaciones-ejecutadas {
    background-color: #28a745;
  }
  .card.ventas {
    background-color: #007bff;
  }
  .card.total {
    background-color: #dc3545;
  }
  .card.recursos-ventas {
    background-color: #17a2b8;
  }

  /* Ajustes para pantallas pequeñas */
  @media (max-width: 576px) {
    .card {
      font-size: 1rem;
      padding: 15px;
    }
  }

  @media (max-width: 768px) {
    .card {
      font-size: 1.1rem;
      padding: 18px;
    }
  }
</style>
