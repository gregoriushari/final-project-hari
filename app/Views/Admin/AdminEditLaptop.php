<?= $this->extend('template/admin/layout') ?>

<?= $this->section('content') ?>
<div class="card card-default">
		<div class="card-header">
			<a href="<?= base_url('admin/laptop') ?>" title="" class="btn btn-danger btn-sm float-right text-right">
				<i class="fas fa-arrow-left"></i> Kembali
			</a>
		</div>
		<form  action="<?= base_url('admin/laptop/edit/'.$laptop['laptop_id']); ?>"  method="post" enctype="multipart/form-data">
      <?= csrf_field(); ?>
      <input type="hidden" name='imageLama' value="<?= $laptop['laptop_image'];?>">
			<div class="card-body">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6">
						<div class="form-group">
                <label for="name">Laptop Name</label>
                <input type="text" class="form-control col-md-6 form-control-sm" value="<?= $laptop['laptop_name'] ?>" id="name" name="name" placeholder="Laptop Name">
            </div>
            <div class="form-group">
                <label for="name">Laptop Price</label>
                <input type="number" class="form-control col-md-6 form-control-sm " value="<?= $laptop['laptop_price'] ?>" id="price" name="price" placeholder="Laptop Price">
            </div>
            <div class="form-group">
                <label for="name">Laptop Price Range</label>
                <select name="harga" id="harga" class="form-control form-control-sm col-md-4">
                <option value="">Price Range</option>
                    <?php foreach ($harga as $h) : ?>
                          <?php if ($laptop['harga_id'] == $h['harga_kriteria_id']) : ?>
                              <option value="<?= $h['harga_kriteria_id']; ?>" selected> <?= $h['harga_kriteria_name']; ?> </option>
                          <?php else : ?>
                              <option value="<?= $h['harga_kriteria_id']; ?>"> <?= $h['harga_kriteria_name']; ?> </option>
                          <?php endif; ?>
                      <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="name">Laptop Memory Storage</label>
                <select name="memori" id="memori" class="form-control form-control-sm col-md-4">
                <option value="">Memory Storage</option>
                    <?php foreach ($memori as $m) : ?>
                          <?php if ($laptop['memori_id'] == $m['memori_kriteria_id']) : ?>
                              <option value="<?= $m['memori_kriteria_id']; ?>" selected> <?= $m['memori_kriteria_name']; ?> </option>
                          <?php else : ?>
                              <option value="<?= $m['memori_kriteria_id']; ?>"> <?= $m['memori_kriteria_name']; ?> </option>
                          <?php endif; ?>
                      <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="name">Laptop RAM Storage</label>
                  <select name="ram" id="ram" class="form-control form-control-sm col-md-4">
                    <option value="">RAM Capacity</option>
                      <?php foreach ($ram as $r) : ?>
                          <?php if ($laptop['ram_id'] == $r['ram_kriteria_id']) : ?>
                              <option value="<?= $r['ram_kriteria_id']; ?>" selected> <?= $r['ram_kriteria_name']; ?> </option>
                          <?php else : ?>
                              <option value="<?= $r['ram_kriteria_id']; ?>"> <?= $r['ram_kriteria_name']; ?> </option>
                          <?php endif; ?>
                      <?php endforeach; ?>
                </select>
              </div>          
              <div class="form-group">
              <label for="name">Laptop Processor</label>
                <select name="processor" id="processor" class="form-control form-control-sm col-md-4">
                <option value="">Processor Type</option>
                    <?php foreach ($processor as $p) : ?>
                          <?php if ($laptop['processor_id'] == $p['processor_kriteria_id']) : ?>
                              <option value="<?= $p['processor_kriteria_id']; ?>" selected> <?= $p['processor_kriteria_name']; ?> </option>
                          <?php else : ?>
                              <option value="<?= $p['processor_kriteria_id']; ?>"> <?= $p['processor_kriteria_name']; ?> </option>
                          <?php endif; ?>
                      <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
              <label for="name">Laptop GPU</label>
                <select name="gpu" id="gpu" class="form-control form-control-sm col-md-4">
                <option value="">GPU Type</option>
                    <?php foreach ($gpu as $g) : ?>
                          <?php if ($laptop['gpu_id'] == $g['gpu_kriteria_id']) : ?>
                              <option value="<?= $g['gpu_kriteria_id']; ?>" selected> <?= $g['gpu_kriteria_name']; ?> </option>
                          <?php else : ?>
                              <option value="<?= $g['gpu_kriteria_id']; ?>"> <?= $g['gpu_kriteria_name']; ?> </option>
                          <?php endif; ?>
                      <?php endforeach; ?>
                </select>
              </div>
          </div>						
					<div class="col-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="">Upload Photo</label>
							<div class="col-md-3">
								<div class="form-group text-center">
                  <img src="/img/<?= $laptop['laptop_image'];?>" class="img-thumbnail img-preview">
								</div>
								<div class="form-group text-center">
                <label for="image" class="btn btn-info btn-sm"> <i class="fas fa-upload"></i> Browse File</label>
                  <!-- <label for="image" class="custom-file-label"><?= $laptop['laptop_image'];?></label> -->
                  <input type="file" class="custom-file-input" name="image" id="image" onchange="editpreviewImg()">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-primary btn-sm swalDefaultInfo"> <i class="fas fa-save"></i> Save</button>
			</div>
		</form>
	</div>
  <script>
    function editpreviewImg(){
      const image = document.getElementById('image')
      const imgPreview = document.querySelector('.img-preview')

      console.log(image.files)
      const fileImage = new FileReader()
      fileImage.readAsDataURL(image.files[0])

      fileImage.onload = function(e){
        imgPreview.src = e.target.result
    }
  }
  </script>
<?= $this->endSection() ?>