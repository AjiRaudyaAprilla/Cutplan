<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Detail Estimate</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('estimate/addPlan') ?>" class="btn btn-primary">Add Cutting Plan</a>
            <a href="<?= base_url('plan') ?>" class="btn btn-danger float-right">Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>GR_NO</th>
                            <th>Color</th>
                            <th>WO_NO</th>
                            <th>Product Code</th>
                            <th>Portion</th>
                            <th>Table</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($secondList as $detail) : ?>
                            <tr>
                                <form action="<?= base_url('plan/detailList'); ?>" method="POST">
                                    <td><?= $i; ?></td>
                                    <td><?= $detail->GR_NO; ?></td>
                                    <td><?= $detail->COLOR_DESC; ?></td>
                                    <td><?= $detail->WO_NO; ?></td>
                                    <td><?= $detail->PRODUCT_CODE; ?></td>
                                    <td><?= $detail->PORTION; ?></td>
                                    <td><?= $detail->TABLE_INDEX; ?></td>
                                    <td>
                                        <a href="<?php echo base_url();
                                                    ?>plan/edit/<?= $detail->GR_NO; ?>" class="badge badge-success">Edit</a> |
                                        <a href="<?php echo base_url();
                                                    ?>plan/pdf/<?= $detail->GR_NO; ?>" class="badge badge-warning">PDF</a>
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