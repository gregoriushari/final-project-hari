<?= $this->extend('template/user/layout') ?>

<?= $this->section('content') ?>
<?= $this->extend('template/user/layout') ?>

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
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
          </div>
        </div>
      </div>
    </div>
<div class="card card-default">
    <form  action="<?= base_url('recomendation/result'); ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field(); ?>
			<div class="card-body">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Laptop Price</label>
                <select name="harga" id="harga" class="form-control  col-md-6">
                  <option value="">Price Range</option>
                    <?php foreach ($harga as $h) : ?>
                        <option <?= (old('harga') == $h['harga_kriteria_id']) ? 'selected' : ''; ?> value="<?= $h['harga_kriteria_id']; ?>"><?= $h['harga_kriteria_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Laptop Memory Storage</label>
                <select name="memori" id="memori" class="form-control  col-md-6">
                  <option value="" >Choose Memori</option>
                  <option <?= (old('memori') == 1) ? 'selected' : ''; ?> value="1">Really Not Important</option>
                  <option <?= (old('memori') == 2) ? 'selected' : ''; ?> value="2">Not Important</option>
                  <option <?= (old('memori') == 3) ? 'selected' : ''; ?> value="3">Neutral</option>
                  <option <?= (old('memori') == 4) ? 'selected' : ''; ?> value="4">Important</option>
                  <option <?= (old('memori') == 5) ? 'selected' : ''; ?> value="5">Really Important</option>
                </select>
            </div>
            <div class="form-group">
                <label >Laptop Processor</label>
                <select name="processor" id="processor" class="form-control  col-md-6">
                  <option value="">Choose Processor</option>
                  <option <?= (old('processor') == 1) ? 'selected' : ''; ?> value="1">Really Not Important</option>
                  <option <?= (old('processor') == 2) ? 'selected' : ''; ?> value="2">Not Important</option>
                  <option <?= (old('processor') == 3) ? 'selected' : ''; ?> value="3">Neutral</option>
                  <option <?= (old('processor') == 4) ? 'selected' : ''; ?> value="4">Important</option>
                  <option <?= (old('processor') == 5) ? 'selected' : ''; ?> value="5">Really Important</option>
                </select>
            </div>
          </div>
					<div class="col-12 col-md-6 col-lg-6">
            <div class="form-group">
              <label>Laptop GPU</label>
              <select class="form-control  col-md-6" name="gpu" id="gpu">
                  <option value="">Choose GPU</option>
                  <option <?= (old('gpu') == 1) ? 'selected' : ''; ?> value="1">Really Not Important</option>
                  <option <?= (old('gpu') == 2) ? 'selected' : ''; ?> value="2">Not Important</option>
                  <option <?= (old('gpu') == 3) ? 'selected' : ''; ?> value="3">Neutral</option>
                  <option <?= (old('gpu') == 4) ? 'selected' : ''; ?> value="4">Important</option>
                  <option <?= (old('gpu') == 5) ? 'selected' : ''; ?> value="5">Really Important</option>
                </select>
            </div>
            <div class="form-group">
              <label >Laptop RAM Capacity</label>
              <select class="form-control  col-md-6" name="ram" id="ram">
                  <option value="">Choose RAM</option>
                  <option <?= (old('ram') == 1) ? 'selected' : ''; ?> value="1">Really Not Important</option>
                  <option <?= (old('ram') == 2) ? 'selected' : ''; ?> value="2">Not Important</option>
                  <option <?= (old('ram') == 3) ? 'selected' : ''; ?> value="3">Neutral</option>
                  <option <?= (old('ram') == 4) ? 'selected' : ''; ?> value="4">Important</option>
                  <option <?= (old('ram') == 5) ? 'selected' : ''; ?> value="5">Really Important</option>
                </select>
            </div>
					</div>
				</div>
			</div>
      <div class="card-footer">
				<button type="submit" class="btn btn-primary btn-sm swalDefaultInfo"> <i class="fas fa-arrow-right"></i>  GO</button>
			</div>
    </form>
	</div>
<?= $this->endSection() ?>
<?= $this->endSection() ?>