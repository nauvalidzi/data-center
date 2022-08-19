<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Groups</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo url_to('groups.index') ?>">Groups</a></li>
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
            <form action="<?php echo url_to('groups.create') ?>" method="post">
                <div class="card-header">
                    <h3 class="card-title">Create new user</h3>
                </div>
                <div class="card-body">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-4">
                            <input type="text" name="code" class="form-control <?php echo $validation->hasError('code') ? 'is-invalid' : null ?>" id="code" placeholder="Code" value="<?php echo set_value('code') ?>">
                            <?php echo $validation->showError('code', 'custom'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-4">
                            <input type="text" name="name" class="form-control <?php echo $validation->hasError('name') ? 'is-invalid' : null ?>" id="name" placeholder="Name" value="<?php echo set_value('name') ?>">
                            <?php echo $validation->showError('name', 'custom'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-4">
                            <textarea name="description" id="description" class="form-control" placeholder="Description"><?php echo set_value('phone') ?></textarea>
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