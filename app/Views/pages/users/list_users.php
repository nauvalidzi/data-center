<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Users</li>
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
                    <a href="<?php echo url_to('users.create') ?>" class="btn btn-primary btn-sm">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>NIP</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Last login</th>
                        </tr>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?php echo $user['nip'] ?></td>
                                <td><a href="<?php echo url_to('users.view', $user['id']) ?>"><?php echo $user['name'] ?></a> &ndash; <small class="text-muted">(<?php echo $user['username'] ?>)</small></td>
                                <td><?php echo $user['email'] ?></td>
                                <td><?php echo $user['status'] ?></td>
                                <td><?php echo date('d/m/Y H:i') ?></td>
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