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
  <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#newLaptopModal">Add Laptop</a> 
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
                <a href="" data-toggle="modal" data-target="#editLaptop<?= $laptops['laptop_id'] ?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
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
<?php foreach ($laptop as $lpts) : ?>
    <div class="modal fade" id="editLaptop<?= $lpts['laptop_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editLaptop<?= $lpts['laptop_id'] ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLaptop<?= $lpts['laptop_id'] ?>Label">Edit Laptop List</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="<?= base_url('admin/laptop/edit/'.$lpts['laptop_id']); ?>"  method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name='imageLama' value="<?= $lpts['laptop_image'];?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $lpts['laptop_name'] ?>" id="name" name="name" placeholder="Laptop Name">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" value="<?= $lpts['laptop_price'] ?>" id="price" name="price" placeholder="Laptop Price">
                        </div>
                        <div class="form-group">
                          <select name="harga" id="harga" class="form-control">
                          <option value="">Price Range</option>
                              <?php foreach ($harga as $h) : ?>
                                    <?php if ($lpts['harga_id'] == $h['harga_kriteria_id']) : ?>
                                        <option value="<?= $h['harga_kriteria_id']; ?>" selected> <?= $h['harga_kriteria_name']; ?> </option>
                                    <?php else : ?>
                                        <option value="<?= $h['harga_kriteria_id']; ?>"> <?= $h['harga_kriteria_name']; ?> </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <select name="memori" id="memori" class="form-control">
                          <option value="">Memory Storage</option>
                              <?php foreach ($memori as $m) : ?>
                                    <?php if ($lpts['memori_id'] == $m['memori_kriteria_id']) : ?>
                                        <option value="<?= $m['memori_kriteria_id']; ?>" selected> <?= $m['memori_kriteria_name']; ?> </option>
                                    <?php else : ?>
                                        <option value="<?= $m['memori_kriteria_id']; ?>"> <?= $m['memori_kriteria_name']; ?> </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <select name="ram" id="ram" class="form-control">
                          <option value="">RAM Capacity</option>
                              <?php foreach ($ram as $r) : ?>
                                    <?php if ($lpts['ram_id'] == $r['ram_kriteria_id']) : ?>
                                        <option value="<?= $r['ram_kriteria_id']; ?>" selected> <?= $r['ram_kriteria_name']; ?> </option>
                                    <?php else : ?>
                                        <option value="<?= $r['ram_kriteria_id']; ?>"> <?= $r['ram_kriteria_name']; ?> </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <select name="processor" id="processor" class="form-control">
                          <option value="">Processor Type</option>
                              <?php foreach ($processor as $p) : ?>
                                    <?php if ($lpts['processor_id'] == $p['processor_kriteria_id']) : ?>
                                        <option value="<?= $p['processor_kriteria_id']; ?>" selected> <?= $p['processor_kriteria_name']; ?> </option>
                                    <?php else : ?>
                                        <option value="<?= $p['processor_kriteria_id']; ?>"> <?= $p['processor_kriteria_name']; ?> </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <select name="gpu" id="gpu" class="form-control">
                          <option value="">GPU Type</option>
                              <?php foreach ($gpu as $g) : ?>
                                    <?php if ($lpts['gpu_id'] == $g['gpu_kriteria_id']) : ?>
                                        <option value="<?= $g['gpu_kriteria_id']; ?>" selected> <?= $g['gpu_kriteria_name']; ?> </option>
                                    <?php else : ?>
                                        <option value="<?= $g['gpu_kriteria_id']; ?>"> <?= $g['gpu_kriteria_name']; ?> </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-6">
                            <img src="/img/<?= $lpts['laptop_image'];?>" class="img-thumbnail img-preview1">
                          </div>
                          <div class="col-sm-6">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="image" id="image1" onchange="editPreviewImg()">
                              <label for="image" class="custom-file-label coba1"><?= $lpts['laptop_image'];?></label>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection() ?>