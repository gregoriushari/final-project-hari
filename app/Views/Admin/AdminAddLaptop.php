<?= $this->extend('template/admin/layout') ?>

<?= $this->section('content') ?>
<?php if(session()->getFlashData('error')){?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4>Periksa Entrian Form</h4>
    </hr />
    <?= session()->getFlashData('error') ?>
    
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>

<div class="card card-default">
		<div class="card-header">
			<a href="<?= base_url('admin/laptop') ?>" title="" class="btn btn-danger btn-sm float-right text-right">
				<i class="fas fa-arrow-left"></i> Kembali
			</a>
		</div>
		<form  action="<?= base_url('admin/laptop/add'); ?>"  method="post" enctype="multipart/form-data">
      <?= csrf_field(); ?>
			<div class="card-body">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6">
						<div class="form-group">
                <label>Laptop Name</label>
                <input type="text" class="form-control col-md-6 form-control-sm" value="<?= old('name'); ?>"id="name" name="name" >
            </div>
            <div class="form-group">
                <label>Laptop Price</label>
                <input type="number" class="form-control col-md-6 form-control-sm " value="<?= old('price'); ?>"id="price" name="price" >
            </div>
            <div class="form-group">
                <label>Laptop Price Range</label>
                <select name="priceRange" id="priceRange" class="form-control form-control-sm col-md-4">
                    <option hidden>Price Range</option>
                      <?php foreach ($harga as $h) : ?>
                          <option <?= (old('priceRange') == $h['harga_kriteria_id']) ? 'selected' : ''; ?> value="<?= $h['harga_kriteria_id']; ?>"><?= $h['harga_kriteria_name']; ?></option>
                      <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Laptop Memory Storage</label>
                <select name="memori" id="memori" class="form-control form-control-sm col-md-4">
                <option value="">Memory Storage</option>
                <?php foreach ($memori as $m) : ?>
                    <option <?= (old('memori') == $m['memori_kriteria_id']) ? 'selected' : ''; ?> value="<?= $m['memori_kriteria_id']; ?>"><?= $m['memori_kriteria_name']; ?></option>
                <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Laptop RAM Storage</label>
                  <select name="ram" id="ram" class="form-control form-control-sm col-md-4">
                  <option value="">RAM Capacity</option>
                    <?php foreach ($ram as $r) : ?>
                      <option <?= (old('ram') == $r['ram_kriteria_id']) ? 'selected' : ''; ?> value="<?= $r['ram_kriteria_id']; ?>"><?= $r['ram_kriteria_name']; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>          
              <div class="form-group">
              <label>Laptop Processor</label>
                <select name="processor" id="processor" class="form-control form-control-sm col-md-4">
                <option value="">Processor Type</option>
                  <?php foreach ($processor as $p) : ?>
                      <option <?= (old('processor') == $p['processor_kriteria_id']) ? 'selected' : ''; ?> value="<?= $p['processor_kriteria_id']; ?>"><?= $p['processor_kriteria_name']; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
              <label>Laptop GPU</label>
                <select name="gpu" id="gpu" class="form-control form-control-sm col-md-4">
                <option value="">GPU Type</option>
                    <?php foreach ($gpu as $g) : ?>
                      <option <?= (old('gpu') == $g['gpu_kriteria_id']) ? 'selected' : ''; ?> value="<?= $g['gpu_kriteria_id']; ?>"><?= $g['gpu_kriteria_name']; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
          </div>						
					<div class="col-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label>Upload Photo</label>
							<div class="col-md-3">
								<div class="form-group text-center">
                  <img src="/img/default.jpg" class="img-thumbnail img-preview">
								</div>
								<div class="form-group text-center">
                  <label for="image" class="btn btn-info btn-sm"> <i class="fas fa-upload"></i> Browse File</label>
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