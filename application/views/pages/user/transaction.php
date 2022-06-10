<div class="container mt-5 mx-auto">
  <div class="card shadow">
    <div class="card-body mt-5 mb-5">
      <h5>Isi data dibawah ini!</h5>
      <div class="container mt-5">
      <?php foreach($products->result() as $menu){ ?>
          <img src="<?= base_url('assets/img/produk/'); ?><?= $menu->gambar; ?>" class="img-fluid" width="250">
      <form action="<?= base_url('user/transaction/'); ?><?= $menu->id; ?>" method="POST">
        <div class="mb-3">
          <label for="nmmenu" class="form-label">Nama Menu</label>
          <input type="text" class="form-control" name="nmmenu" value="<?= $menu->nmmenu; ?>" disabled>
        </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga</label>
          <input type="text" class="form-control" name="harga" value="<?= $menu->harga; ?>" disabled>
        </div>
        <div class="mb-3">
          <label for="nmpembeli" class="form-label">Nama Pembeli</label>
          <input type="text" class="form-control" name="nmpembeli" >
          <p class="text-danger"><?php echo form_error('nmpembeli'); ?></p>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" name="alamat" >
          <p class="text-danger"><?php echo form_error('alamat'); ?></p>
        </div>
        <div class="mb-3">
          <label for="notelp" class="form-label">NoHp</label>
          <input type="text" class="form-control" name="notelp" >
          <p class="text-danger"><?php echo form_error('notelp'); ?></p>
        </div>
        <div class="mb-3">
          <label for="total_bayar" class="form-label">Total Bayar</label>
          <input type="text" class="form-control" name="total_bayar" >
          <p class="text-danger"><?php echo form_error('total_bayar'); ?></p>
        </div>
        <button type="submit" class="btn btn-success">ORDER</button>
      </form>
      <?php } ?>
      </div>
    </div>
  </div>
</div>