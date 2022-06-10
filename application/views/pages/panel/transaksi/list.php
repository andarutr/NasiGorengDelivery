<div class="main-wrapper">
  <?php $this->load->view('template/panel/navbar'); ?>
  <?php $this->load->view('template/panel/sidebar'); ?>

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Transaksi</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></div>
          <div class="breadcrumb-item">Transaksi</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Daftar list transaksi</h2>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4><a href="<?= base_url('admin/transaksi/create'); ?>" class="btn btn-outline-primary">+Tambah Transaksi</a></h4>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Kode Transaksi</th>
                      <th scope="col">Tgl Transaksi</th>
                      <th scope="col">Nama Pembeli</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">NoHp</th>
                      <th scope="col">Total Bayar</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($transactions->result() as $transaksi){ ?>
                    <tr>
                      <td><?= $transaksi->kdtransaksi; ?></td>
                      <td><?= $transaksi->tgltransaksi; ?></td>
                      <td><?= $transaksi->nmpembeli; ?></td>
                      <td><?= $transaksi->alamat; ?></td>
                      <td><?= $transaksi->notelp; ?></td>
                      <td>Rp<?= number_format($transaksi->total_bayar,2,',','.'); ?></td>
                      <td>
                        <a href="<?= base_url('admin/transaksi/update/'); ?><?= $transaksi->id; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('admin/transaksi/delete/'); ?><?= $transaksi->id; ?>" class="btn btn-danger" onclick="return confirm('Apa yakin ingin menghapus data?')"><i class="fas fa-trash"></i></a>
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