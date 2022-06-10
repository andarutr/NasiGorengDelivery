<div class="main-wrapper">
  <?php $this->load->view('template/panel/navbar'); ?>
  <?php $this->load->view('template/panel/sidebar'); ?>

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Transaksi</h4>
              </div>
              <div class="card-body">
                <?= $total_transaksi; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-pencil-ruler"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Menu</h4>
              </div>
              <div class="card-body">
                <?= $total_menu; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <h2 class="text-center">Tidak dapat memuat datatable</h2>
  </div>
  <?php $this->load->view('template/panel/copyright'); ?>
</div>