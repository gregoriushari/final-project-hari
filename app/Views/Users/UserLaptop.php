<?= $this->extend('template/user/layout') ?>

<?= $this->section('content') ?>
<div class="row">
<?php foreach($laptop as $laptops): ?>
	<div class="col-lg-4 d-flex align-items-stretch">
		<div class="card">
    <img src="<?= base_url('img').'/'. $laptops['laptop_image'];?>" class="card-img-top" alt="...">
			<div class="card-body">
				<div class="card-title">
          <h4><?= $laptops['laptop_name']; ?></h4>
        </div>
        <br><br>
				<h5>Rp. <?= $laptops['laptop_price']; ?></h5>
			</div>
      <div class="card-footer">
        <a href="<?= base_url('laptop').'/'.$laptops['laptop_id']; ?>" class="btn btn-primary">Detail</a>
			</div>
		</div>
	</div>
  <?php endforeach; ?>
</div>

<?= $this->endSection() ?>