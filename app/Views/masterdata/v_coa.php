<?= $this->extend('template/v_template') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h5>Daftar COA</h5>
      </div>
      <div class="card-body">
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_coa">Tambah COA</button>
        <?php if (!empty(session()->getFlashdata('success'))) : ?>
          <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
          <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>
        <div id="tambah_coa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="label_form" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="label_form">Tambah COA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="<?= base_url('MasterData/simpanCOA') ?>">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="form-group">
                        <label for="kode_coa">Kode COA</label>
                        <input type="text" class="form-control" name="kode_coa" id="kode_coa" placeholder="Contoh: 111" value="<?= old('kode_coa') ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label for="nama_coa">Nama COA</label>
                        <input type="text" class="form-control" name="nama_coa" id="nama_coa" placeholder="Contoh: Kas" value="<?= old('nama_coa') ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="form-group">
                        <label for="header_coa">Header COA</label>
                        <input type="text" class="form-control" name="header_coa" id="header_coa" placeholder="Contoh: 1" value="<?= old('header_coa') ?>" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="dt-responsive table-responsive">
          <table id="coa_pemilik" class="table table-striped table-bordered nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode COA</th>
                <th>Nama COA</th>
                <th>Header COA</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($coa as $c) :
                $hash_coa = substr(sha1($c['kode_coa']), 2, 7);
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $c['kode_coa'] ?></td>
                  <td><?= $c['nama_coa'] ?></td>
                  <td><?= $c['header_coa'] ?></td>
                  <td>
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit_coa_<?= $hash_coa ?>">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="hapus_coa('<?= $hash_coa ?>', '<?= $c['kode_coa'] ?>')">Hapus</button>
                  </td>
                  <div id="edit_coa_<?= $hash_coa ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="label_form" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="label_form">Edit COA</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form method="post" action="<?= base_url('MasterData/ubahCOA') ?>">
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="form-group">
                                  <label for="kode_coa">Kode COA</label>
                                  <input type="text" class="form-control" name="kode_coa" id="kode_coa" placeholder="Contoh: 111" value="<?= $c['kode_coa'] ?>" required>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                  <label for="nama_coa">Nama COA</label>
                                  <input type="text" class="form-control" name="nama_coa" id="nama_coa" placeholder="Contoh: Kas" value="<?= $c['nama_coa'] ?>" required>
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="form-group">
                                  <label for="header_coa">Header COA</label>
                                  <input type="text" class="form-control" name="header_coa" id="header_coa" placeholder="Contoh: 1" value="<?= $c['header_coa'] ?>" required>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </tr>
              <?php
              endforeach;
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection('content') ?>