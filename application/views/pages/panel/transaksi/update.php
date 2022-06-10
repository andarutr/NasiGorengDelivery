<div class="main-wrapper">
  <?php $this->load->view('template/panel/navbar'); ?>
  <?php $this->load->view('template/panel/sidebar'); ?>

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Update Transaksi</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></div>
          <div class="breadcrumb-item">Update Transaksi</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>Update Daftar Transaksi</h4>
              </div>
              <?php foreach($transactions->result() as $transaksi) { ?>
              <?= form_open_multipart('admin/transaksi/update/'.$transaksi->id);?>
              <div class="card-body">
                <div class="form-group">
                  <label>KD Transaksi</label>
                  <input type="text" class="form-control" name="kdtransaksi" value="<?= $transaksi->kdtransaksi; ?>">
                  <p class="text-danger"><?php echo form_error('kdtransaksi'); ?></p>
                </div>
                <div class="form-group">
                  <label>TGL Transaksi</label>
                  <input type="text" class="form-control" name="tgltransaksi" value="<?= $transaksi->tgltransaksi; ?>">
                  <p class="text-danger"><?php echo form_error('tgltransaksi'); ?></p>
                </div>
                <div class="form-group">
                  <label>Nama Pembeli</label>
                  <input type="text" class="form-control" name="nmpembeli" value="<?= $transaksi->nmpembeli; ?>">
                  <p class="text-danger"><?php echo form_error('nmpembeli'); ?></p>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="alamat" value="<?= $transaksi->alamat; ?>">
                  <p class="text-danger"><?php echo form_error('alamat'); ?></p>
                </div>
                <div class="form-group">
                  <label>No Telephone</label>
                  <input type="text" class="form-control" name="notelp" value="<?= $transaksi->notelp; ?>">
                  <p class="text-danger"><?php echo form_error('notelp'); ?></p>
                </div>
                <div class="form-group">
                  <label>Total Bayar</label>
                  <input type="text" class="form-control" name="total_bayar" value="<?= $transaksi->total_bayar; ?>">
                  <p class="text-danger"><?php echo form_error('total_bayar'); ?></p>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
              </div>
              <?= form_close(); ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php $this->load->view('template/panel/copyright'); ?>
</div>