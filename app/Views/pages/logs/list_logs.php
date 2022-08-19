<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Log Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Log Users</li>
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
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th width="20%">User</th>
                            <th width="60%">Description</th>
                            <th width="20%">Time</th>
                        </tr>
                        <?php foreach ($logs as $log) : ?>
                            <tr>
                                <td><a href="<?php echo url_to('users.view', $log['user_id']) ?>"><?php echo $log['name'] ?></a> &ndash; <small class="text-muted"><?php echo $log['username'] ?></small></td>
                                <td><?php echo $log['description'] ?></td>
                                <td><?php echo date('d/m/Y H:i', strtotime($log['created_at'])) ?></td>
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