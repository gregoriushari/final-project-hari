<?= $this->extend('template/user/layout') ?>

<?= $this->section('content') ?>
<div class="jumbotron" style = 'text-align:center;'>
  <h2><b>SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN LAPTOP</b></h2>
</div>
<div>
  <h3>Our Laptop List</h3>
  <div style="display:flex; justify-content:flex-end; width:100%; padding:0;">
    <a class="btn btn-primary mb-3" href="<?=base_url('laptop');?>">Other Product</a> 
  </div>
</div>
<div class="row">
<?php foreach($laptop as $laptops): ?>
	<div class="col-lg-3 d-flex align-items-stretch">
		<div class="card">
    <img src="<?= base_url('img').'/'. $laptops['laptop_image'];?>" class="card-img-top" alt="...">
			<div class="card-body">
				<div class="card-title">
          <h4><?= $laptops['laptop_name']; ?></h4>
        </div>
        <br><br>
				<h5>Rp. <?= number_format($laptops['laptop_price'],2,',','.'); ?></h5>
			</div>
		</div>
	</div>
  <?php endforeach; ?>
</div>
<?= $this->endSection() ?>