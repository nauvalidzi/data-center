<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daily Checklists</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Daily Checklists</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body ">
                <div class="mb-4">
                    <a href="<?php echo url_to('checklist.create') ?>" class="btn btn-primary btn-sm">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>User</th>
                            <th>Shift</th>
                            <th>Date</th>
                            <th>Last update</th>
                        </tr>
                        <?php foreach ($checklists as $checklist) : ?>
                            <tr>
                                <td><a href="<?php echo url_to('users.view', $user['id']) ?>"><?php echo $user['name'] ?></a> &ndash; <small class="text-muted">(<?php echo $user['username'] ?>)</small></td>
                                <td><?php echo $checklist['shift'] ?></td>
                                <td><a href="<?php echo url_to('checklist.view', $checklist['id']) ?>"><?php echo $checklist['code'] ?></a></td>
                                <td><?php echo $checklist['description'] ?></td>
                                <td><?php echo date('d/m/Y H:i', strtotime($checklist['updated_at'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <?php echo $pager->links('default', 'pagination'); ?>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<?= $this->endSection() ?>