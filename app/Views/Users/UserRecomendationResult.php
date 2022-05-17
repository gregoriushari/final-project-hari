<?= $this->extend('template/user/layout') ?>

<?= $this->section('content') ?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
          </div>
        </div>
      </div>
    </div>
<div class="row">
<?php foreach($hasil as $laptops): ?>
	<div class="col-lg-4 d-flex align-items-stretch">
		<div class="card">
    <img src="<?= base_url('img').'/'. $laptops['laptop_image'];?>" class="card-img-top" alt="...">
			<div class="card-body">
				<div class="card-title">
          <h4><?= $laptops['laptop_name']; ?></h4>
        </div>
        <br><br>
				<h5>Rp. <?= number_format($laptops['laptop_price'],2,',','.'); ?></h5>
			</div>
      <div class="card-footer">
        <a href="<?= base_url('laptop').'/'.$laptops['laptop_id']; ?>" class="btn btn-primary" target="_blank">Detail</a>
			</div>
		</div>
	</div>
  <?php endforeach; ?>
</div>

<?= $this->endSection() ?>