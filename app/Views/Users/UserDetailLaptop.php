<?= $this->extend('template/user/layout') ?>

<?= $this->section('content') ?>
<div class="card card-default">
		<div class="card-header">
			<a href="<?= base_url('laptop') ?>" title="" class="btn btn-danger btn-sm float-right text-right">
				<i class="fas fa-arrow-left"></i> Kembali
			</a>
		</div>
			<div class="card-body">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6">
						<div class="form-group">
                <label for="name">Laptop Name</label>
                <input type="text" class="form-control col-md-6 form-control-sm" value="<?= $laptop['laptop_name'] ?>" id="name" name="name" disabled>
            </div>
            <div class="form-group">
                <label for="name">Laptop Price</label>
                <input type="number" class="form-control col-md-6 form-control-sm " value="<?= $laptop['laptop_price'] ?>" id="price" name="price" disabled>
            </div>
            <div class="form-group">
                <label for="name">Laptop Memory Storage</label>
                <input type="text" class="form-control col-md-6 form-control-sm " value="<?= $laptop['memori_kriteria_name'] ?>" id="price" name="price" disabled>
            </div>
            <div class="form-group">
                <label for="name">Laptop Processor</label>
                <input type="text" class="form-control col-md-6 form-control-sm " value="<?= $laptop['processor_kriteria_name'] ?>" id="price" name="price" disabled>
            </div>
            <div class="form-group">
                <label for="name">Laptop GPU</label>
                <input type="text" class="form-control col-md-6 form-control-sm " value="<?= $laptop['gpu_kriteria_name'] ?>" id="price" name="price" disabled>
            </div>
            <div class="form-group">
                <label for="name">Laptop RAM Capacity</label>
                <input type="text" class="form-control col-md-6 form-control-sm " value="<?= $laptop['ram_kriteria_name'] ?>" id="price" name="price" disabled>
            </div>
          </div>
					<div class="col-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="">Laptop Photo</label>
							<div class="col-md-6">
								<div class="form-group text-center">
                  <img src="/img/<?= $laptop['laptop_image'];?>" class="img-thumbnail img-preview">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
<?= $this->endSection() ?>