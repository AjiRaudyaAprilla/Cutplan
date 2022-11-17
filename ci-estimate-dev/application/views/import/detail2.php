<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if ($this->session->flashdata('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert"> Data
        <strong>Deleted</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Detail Estimate</h1>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('import') ?>" class="btn btn-danger float-right">Back</a>
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
                            <th>Style</th>
                            <th>Portion</th>
                            <th>Table</th>
                            <th>Percentage Cutting</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($secondList as $detail) : ?>
                        <tr>
                            <form action="<?= base_url('import/edit'); ?>" method="POST">
                                <td><?= $i; ?></td>
                                <td><?= $detail->GR_NO; ?></td>
                                <td><?= $detail->COLOR_DESC; ?></td>
                                <td><?= $detail->WO_NO; ?></td>
                                <td><?= $detail->PRODUCT_CODE; ?></td>
                                <td><?= $detail->STYLE; ?></td>
                                <td><?= $detail->PORTION; ?></td>
                                <td><?= $detail->TABLE_INDEX; ?></td>



                                <td>
                                    <?php $total = $detail->TOTAL_QTY; ?>
                                    <?php $current = $detail->TOTAL_CUTTING; ?>
                                    <?php $persentase = round(($current / $total) * 100, 1) ?>

                                    <?php if ($persentase == 100) {

                                        ?>

                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                            style="width:<?php echo $persentase; ?>%" aria-valuenow="" aria-valuemin=""
                                            aria-valuemax="100">
                                            <?php echo $persentase . '%' ?></div>
                                    </div>

                                    <?php
                                        } else if ($persentase < 100) {
                                        ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                            style="width:<?php echo $persentase; ?>%" aria-valuenow="" aria-valuemin=""
                                            aria-valuemax="100">
                                            <?php echo $persentase . '%' ?></div>
                                    </div>
                                    <?php
                                        } else {
                                        ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                            style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                    <?php
                                        }

                                        ?>
                                </td>


                                <td>
                                    <input type="text" name="GR_NO" value="<?= $detail->GR_NO; ?>" hidden>

                                    <!-- <button type="submit" class="badge badge-primary">Edit</button> | -->

                                    <a href="<?php echo base_url();
                                                    ?>import/ubah/<?php echo $detail->GR_NO;
                                                                    ?>" class="badge badge-success">Edit</a> |


                                    <a href="<?php echo base_url();
                                                    ?>import/pdf/<?= $detail->GR_NO; ?>"
                                        class="badge badge-warning">PDF</a> |
                                    <!-- <a href="<?php echo base_url();
                                                        ?>import/delete/<?php //$detail->GR_NO; 
                                                                        ?>" class="badge badge-danger" onclick="return confirm('Delete?');">Delete</a> -->

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