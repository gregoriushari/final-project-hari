<?= $this->extend('template/admin/layout') ?>

<?= $this->section('content') ?>
<div style="display:flex; justify-content:flex-end; width:100%; padding:0;">
  <a href="<?= base_url('admin/kriteria/processor') ?>" class="btn btn-primary mb-3 ">Add Processor</a> 
</div>
<div>
  <table id="table_id" class="display">
      <thead>
      <?php $i = 1; ?>
          <tr>
              <th>No</th>
              <th>List Processor</th>
              <th>Bobot</th>
              <th>Last Update</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          <tr>
            <th scope="row"><?= $i; ?></th>
            <td><?= $i++; ?></td>
            <td><?= $i++; ?></td>
            <td><?= $i++; ?></td>
            <td>
                <a href="<?= base_url('admin/kriteria/processor') ?>"  class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
                <a href="<?= base_url('admin/kriteria/processor') ?>" class="badge badge-danger" onclick="return confirm('Are you sure want to delete  ?')"><i class="far fa-fw fa-trash-alt"></i></a>
            </td>
          </tr>
          <?php $i++; ?>
      </tbody>
  </table>
</div>
<?= $this->endSection() ?>