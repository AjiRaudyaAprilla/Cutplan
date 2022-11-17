<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if ($this->session->flashdata('flash')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert"> Data
        <?= $this->session->flashdata('flash'); ?>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Import File</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">



        </div>
        <div class="card-body">
            <?php echo form_open_multipart('import/uploadData'); ?>
            <div class="form-row mb-4">
                <div class="col-3">
                    <input type="file" class="form-control-file" id="importexcel" name="importexcel"
                        accept=".xlsx,.xls">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
                <div class="col">
                    <a href="<?= base_url('import/add') ?>" class="btn btn-danger float-right">Add Plan</a>
                </div>
            </div>
            <?php echo form_close(); ?>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order Number</th>
                            <th>Style</th>
                            <th>Color Desc</th>

                            <th>Total Order</th>
                            <th>Total Cutting</th>
                            <th>Percentage</th>
                            <th>Start Cutting</th>
                            <th>Last Cutting</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($allUploadFile as $file) : ?>
                        <tr>
                            <form action="<?= base_url('import/detail'); ?>" method="POST">
                                <td><?= $i; ?></td>

                                <td><?= $file['ORDER_NO']; ?></td>
                                <td><?= $file['STYLE']; ?></td>
                                <td><?= $file['COLOR_DESC']; ?></td>
                                <td><?= $file['TOTAL_QTY']; ?></td>
                                <td><?= $file['TOTAL_CUTTING']; ?></td>
                                <!-- <td><?php //$file['PercentageCutting']; 
                                                ?></td> -->
                                <td>
                                    <?php $total = $file['TOTAL_QTY']; ?>
                                    <?php $current = $file['TOTAL_CUTTING']; ?>
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
                                <td><?= $file['MinCTDate']; ?></td>

                                <td><?= $file['MaxCTDate']; ?></td>

                                <td>

                                    <input type="text" name="ORDER_NO" value="<?= $file['ORDER_NO']; ?>" hidden>
                                    <input type="text" name="STYLE" value="<?= $file['STYLE']; ?>" hidden>
                                    <input type="text" name="COLOR_DESC" value="<?= $file['COLOR_DESC']; ?>" hidden>

                                    <button type="submit" class="badge badge-primary">Detail</button>
                                    <!-- <button type="submit" class="badge badge-danger" onclick="return confirm('Delete?');">Delete</button> -->
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