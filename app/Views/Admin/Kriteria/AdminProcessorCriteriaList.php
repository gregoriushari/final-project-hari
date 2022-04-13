<?= $this->extend('template/admin/layout') ?>

<?= $this->section('content') ?>
<?php if(session()->getFlashData('success')):?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('success') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif ; ?>

<div style="display:flex; justify-content:flex-end; width:100%; padding:0;">
  <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#newProcessorModal">Add Processor</a> 
</div>
<div>
  <table id="table_id" class="display">
      <thead>
          <tr>
              <th>No</th>
              <th>List Processor</th>
              <th>Bobot</th>
              <th>Last Update</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
      <?php $i = 1; ?>
      <?php foreach($processor as $processors): ?>
          <tr>
            <th scope="row"><?= $i; ?></th>
            <td><?= $processors['processor_kriteria_name']; ?></td>
            <td><?= $processors['processor_kriteria_bobot']; ?></td>
            <td><?= $processors['updated_at']; ?></td>
            <td>
                <a href="" data-toggle="modal" data-target="#editProcessor<?= $processors['processor_kriteria_id'] ?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
                <a href="<?= base_url('admin/processor/delete/' . $processors['processor_kriteria_id']) ?>" class="badge badge-danger" onclick="return confirm('Are you sure want to delete  ?')"><i class="far fa-fw fa-trash-alt"></i></a>
            </td>
          </tr>
          <?php $i++; ?>
      <?php endforeach; ?>
      </tbody>
  </table>
</div>
<!-- Modal -->
<div class="modal fade" id="newProcessorModal" tabindex="-1" role="dialog" aria-labelledby="newProcessorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newProcessorModalLabel">Add Processor Criteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/processor/add'); ?>" method="post">
            <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Processor">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="bobot" id="bobot" placeholder="Bobot">
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

<?php foreach ($processor as $processors) : ?>
    <div class="modal fade" id="editProcessor<?= $processors['processor_kriteria_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editprocessor<?= $processors['processor_kriteria_id'] ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editprocessor<?= $processors['processor_kriteria_id'] ?>Label">Edit Harga Criteria</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="<?= base_url('admin/processor/edit/'.$processors['processor_kriteria_id']); ?>"  method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $processors['processor_kriteria_name'] ?>" id="name" name="name" placeholder="Memory Storage">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" value="<?= $processors['processor_kriteria_bobot'] ?>" id="bobot" name="bobot" placeholder="Bobot">
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