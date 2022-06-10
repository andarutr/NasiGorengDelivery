<div class="main-wrapper">
  <?php $this->load->view('template/panel/navbar'); ?>
  <?php $this->load->view('template/panel/sidebar'); ?>

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Menu</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></div>
          <div class="breadcrumb-item">Menu</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Daftar list menu</h2>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4><a href="<?= base_url('admin/menu/create'); ?>" class="btn btn-outline-primary">+Tambah Menu</a></h4>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Kode Menu</th>
                      <th scope="col">Gambar</th>
                      <th scope="col">Menu Makanan</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($menus->result() as $menu){ ?>
                    <tr>
                      <td><?= $menu->kdmenu; ?></td>
                      <td><img src="<?= base_url('assets/img/produk/'); ?><?= $menu->gambar; ?>" class="img-fluid" width="100"></td>
                      <td><?= $menu->nmmenu; ?></td>
                      <td>Rp<?= number_format($menu->harga,2,',','.'); ?></td>
                      <td>
                        <a href="<?= base_url('admin/menu/update/'); ?><?= $menu->id; ?>" class="btn btn-success">Update</a>
                        <a href="<?= base_url('admin/menu/delete/'); ?><?= $menu->id; ?>" class="btn btn-danger" onclick="return confirm('Apa yakin ingin menghapus data?')">Hapus</a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php $this->load->view('template/panel/copyright'); ?>
</div>