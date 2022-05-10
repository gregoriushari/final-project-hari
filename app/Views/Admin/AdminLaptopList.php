<?= $this->extend('template/admin/layout') ?>

<?= $this->section('content') ?>
<?php if(session()->getFlashData('success')){?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('success') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>
<?php if(session()->getFlashData('failed')){?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('failed') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>

<div style="display:flex; justify-content:flex-end; width:100%; padding:0;">
  <a class="btn btn-primary mb-3" href="<?=base_url('admin/laptop/adddetail');?>">Add Laptop</a> 
</div>
<div>
  <table id="table_id" class="display">
      <thead>
          <tr>
              <th>No</th>
              <th>Laptop Name</th>
              <th>Laptop Image</th>
              <th>Last Update</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
      <?php $i = 1; ?>
      <?php foreach($laptop as $laptops): ?>
          <tr>
            <th scope="row"><?= $i; ?></th>
            <td><?= $laptops['laptop_name']; ?></td>
            <td><img src="<?= base_url('img').'/'. $laptops['laptop_image'];?>"  width="300" height="300"></td>
            <td><?= $laptops['updated_at']; ?></td>
            <td>
                <a href="<?=base_url('admin/laptop/editdetail').'/'.$laptops['laptop_id'];?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
                <a href="<?= base_url('admin/laptop/delete/' . $laptops['laptop_id']) ?>" class="badge badge-danger" onclick="return confirm('Are you sure want to delete  ?')"><i class="far fa-fw fa-trash-alt"></i></a>
            </td>
          </tr>
          <?php $i++; ?>
      <?php endforeach; ?>
      </tbody>
  </table>
</div>
<!-- Modal -->
<div class="modal fade" id="newLaptopModal" tabindex="-1" role="dialog" aria-labelledby="newLaptopModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newLaptopModalLabel">Add Laptop List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/laptop/add'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Laptop Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="price" id="price" placeholder="Laptop Price">
                    </div>
                    <div class="form-group">
                        <select name="harga" id="harga" class="form-control">
                        <option value="">Price Range</option>
                          <?php foreach ($harga as $h) : ?>
                              <option value="<?= $h['harga_kriteria_id']; ?>"><?= $h['harga_kriteria_name']; ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="memori" id="memori" class="form-control">
                        <option value="">Memory Storage</option>
                            <?php foreach ($memori as $m) : ?>
                                <option value="<?= $m['memori_kriteria_id']; ?>"><?= $m['memori_kriteria_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="ram" id="ram" class="form-control">
                        <option value="">RAM Capacity</option>
                            <?php foreach ($ram as $r) : ?>
                                <option value="<?= $r['ram_kriteria_id']; ?>"><?= $r['ram_kriteria_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="processor" id="processor" class="form-control">
                        <option value="">Processor Type</option>
                            <?php foreach ($processor as $p) : ?>
                                <option value="<?= $p['processor_kriteria_id']; ?>"><?= $p['processor_kriteria_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="gpu" id="gpu" class="form-control">
                        <option value="">GPU Type</option>
                            <?php foreach ($gpu as $g) : ?>
                                <option value="<?= $g['gpu_kriteria_id']; ?>"><?= $g['gpu_kriteria_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-6">
                        <img src="/img/default.jpg" class="img-thumbnail img-preview">
                      </div>
                      <div class="col-sm-6">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image" id="image" onchange="previewImg()">
                          <label for="Image" class="custom-file-label">Pilih Gambar....</label>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>