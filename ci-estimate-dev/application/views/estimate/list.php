<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if ($this->session->flashdata('flash2')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert"> Data
            <strong>Added</strong> <?= $this->session->flashdata('flash2'); ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Estimate</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('estimate/addPlan') ?>" class="btn btn-primary">Add Cutting Plan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order No</th>
                            <th>Style</th>
                            <th>Color</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($firstList as $list) : ?>
                            <tr>
                                <form action="<?= base_url('estimate/detailList'); ?>" method="POST">
                                    <td><?= $i; ?></td>
                                    <td><?= $list['ORDER_NO'] ?></td>
                                    <td><?= $list['STYLE'] ?></td>
                                    <td><?= $list['COLOR_DESC'] ?></td>
                                    <td>
                                        <input type="text" name="ORDER_NO" value="<?= $list['ORDER_NO']; ?>" hidden>
                                        <input type="text" name="STYLE" value="<?= $list['STYLE']; ?>" hidden>
                                        <input type="text" name="COLOR_DESC" value="<?= $list['COLOR_DESC']; ?>" hidden>


                                        <button type="submit" class="badge badge-primary">Detail</button>
                                    </td>
                                </form>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->