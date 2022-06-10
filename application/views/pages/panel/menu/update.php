<div class="main-wrapper">
  <?php $this->load->view('template/panel/navbar'); ?>
  <?php $this->load->view('template/panel/sidebar'); ?>

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Update Menu</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></div>
          <div class="breadcrumb-item">Update Menu</div>
        </div>
      </div>
      <?php if($this->session->has_userdata('gagal')){ ?>
      <div class="alert alert-danger" role="alert">
        Gambar anda salah!
      </div>
      <?php } ?>
      <div class="section-body">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>Update Menu Makanan</h4>
              </div>
              <?php foreach($menus->result() as $menu){ ?>
              <?= form_open_multipart('admin/menu/update/'.$menu->id);?>
              <div class="card-body">
                <div class="form-group">
                  <label>KD Menu</label>
                  <input type="text" class="form-control" name="kdmenu" value="<?= $menu->kdmenu; ?>">
                  <p class="text-danger"><?php echo form_error('kdmenu'); ?></p>
                </div>
                <div class="form-group">
                  <label>Nama Menu</label>
                  <input type="text" class="form-control" name="nmmenu" value="<?= $menu->nmmenu; ?>">
                  <p class="text-danger"><?php echo form_error('nmmenu'); ?></p>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" class="form-control" name="harga" value="<?= $menu->harga; ?>">
                  <p class="text-danger"><?php echo form_error('harga'); ?></p>
                </div>
                <div class="form-group">
                  <label>Foto Makanan</label>
                  <input type="file" class="form-control" name="gambar">
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