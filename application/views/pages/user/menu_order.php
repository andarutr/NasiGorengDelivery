<div class="container mt-5 mx-auto">
  <?php if($this->session->has_userdata('berhasil')){
 ?>
  <div class="alert alert-primary" role="alert">
    Berhasil ORDER! Silahkan tunggu notifikasi selanjutnya :)
  </div>
  <?php } ?>
  <div class="card shadow">
    <div class="card-body text-center mt-5 mb-5">
      <h5>Pilih makanan sesuai selera mu!</h5>
      <div class="container mt-5">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Gambar</th>
            <th scope="col">Nama Menu</th>
            <th scope="col">Harga</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($menus->result() as $menu){ ?>
          <tr>
            <td><img src="<?= base_url('assets/img/produk/'); ?><?= $menu->gambar; ?>" class="img-fluid" width="100"></td>
            <td><?= $menu->nmmenu; ?></td>
            <td>Rp<?= number_format($menu->harga,2,',','.'); ?></td>
            <td><a href="<?= base_url('user/transaction/'); ?><?= $menu->id; ?>" class="btn btn-success">ORDER</a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>