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
                        <li class="breadcrumb-item"><a href="<?php echo url_to('users.index') ?>">Users</a></li>
                        <li class="breadcrumb-item active">Create new</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <form action="<?php echo url_to('users.create') ?>" method="post">
                <div class="card-header">
                    <h3 class="card-title">Create new user</h3>
                </div>
                <div class="card-body">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-4">
                            <input type="text" name="nip" class="form-control <?php echo $validation->hasError('nip') ? 'is-invalid' : null ?>" id="nip" placeholder="NIP" value="<?php echo set_value('nip') ?>">
                            <?php echo $validation->showError('nip', 'custom'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-4">
                            <input type="text" name="username" class="form-control <?php echo $validation->hasError('username') ? 'is-invalid' : null ?>" id="username" placeholder="Username" value="<?php echo set_value('username') ?>">
                            <?php echo $validation->showError('username', 'custom'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" name="email" class="form-control <?php echo $validation->hasError('username') ? 'is-invalid' : null ?>" id="email" placeholder="Email" value="<?php echo set_value('email') ?>">
                            <?php echo $validation->showError('email', 'custom'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-6">
                            <input type="password" name="password" class="form-control <?php echo $validation->hasError('username') ? 'is-invalid' : null ?>" id="password" placeholder="Password" value="<?php echo set_value('password') ?>">
                            <?php echo $validation->showError('password', 'custom'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-4">
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="<?php echo set_value('phone') ?>">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </form>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<?= $this->endSection() ?>