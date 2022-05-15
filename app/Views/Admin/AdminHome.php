<?= $this->extend('template/admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $laptopCount ;?></h3>
              <p>Laptop Total</p>
          </div>
          <div class="icon">
            <i class="nav-icon fa-solid fa-laptop"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?= $userCount ;?></h3>
              <p>Admin User</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data update per <?= date('d M Y') ?></h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered" id="example1">
              <thead>
                <tr>
                  <th rowspan="2" class="align-middle">No.</th>
                  <th rowspan="2" class="align-middle">Nama Laptop</th>
                  <th rowspan="2" class="align-middle">Last Update</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
                <?php foreach($laptop as $laptops): ?>
                <tr>
                  <td><?= $i;?></td>
                  <td><?= $laptops['laptop_name']; ?></td>
                  <td><?= $laptops['updated_at']; ?></td>
                </tr>
                <?php $i++ ?>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
    
<?= $this->endSection() ?>