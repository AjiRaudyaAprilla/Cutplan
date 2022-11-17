    <style>
body {
    /* padding-top: 50px; */
    background-color: #34495e;
}

.hiddenRow {
    padding: 0 !important;
}
    </style>


    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= base_url('import') ?>" class="btn btn-danger float-right">Back</a>
            </div>
            <div class="card-body" id="table">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form action="import/detail" method="POST">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>GR_NO</th>
                                    <th>Color</th>
                                    <th>WO_NO</th>
                                    <th>PO</th>
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
                                <?php //foreach ($detailList as $d) :
                                    ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td id="GR_NO"><?= $detail->GR_NO; ?></td>
                                    <td><?= $detail->COLOR_DESC; ?></td>
                                    <td><?= $detail->WO_NO; ?></td>
                                    <td>PO</td>
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
                                                style="width:<?php echo $persentase; ?>%" aria-valuenow=""
                                                aria-valuemin="" aria-valuemax="100">
                                                <?php echo $persentase . '%' ?></div>
                                        </div>

                                        <?php
                                            } else if ($persentase < 100) {
                                            ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                                style="width:<?php echo $persentase; ?>%" aria-valuenow=""
                                                aria-valuemin="" aria-valuemax="100">
                                                <?php echo $persentase . '%' ?></div>
                                        </div>
                                        <?php
                                            } else {
                                            ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                                style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
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

                                        <a id="js" href="#" class="badge badge-danger" data-toggle="collapse"
                                            data-target="#demo<?= $i; ?>" class="accordion-toggle">+</a>
                                    </td>
                                </tr>


                                <tr>
                                    <td colspan="12" class="hiddenRow">
                                        <div class="accordian-body collapse" id="demo<?= $i; ?>">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr class="info">
                                                        <th>#</th>
                                                        <th>QRNumber</th>
                                                        <th>PO</th>
                                                        <th>Fab Mat</th>
                                                        <th>Fab Type</th>
                                                        <th>Grouping</th>
                                                        <th>Lot</th>
                                                        <th>Qty Sticker Kg</th>
                                                        <th>Qty Sticker Yd</th>
                                                        <th>Inspect</th>
                                                        <th>Actual Kg</th>
                                                        <th>Actual Yd</th>
                                                        <th>Actual Width</th>
                                                        <th>Plan Width</th>
                                                        <th>Spreading</th>
                                                        <th>Cons Kg</th>
                                                        <th>Cons Yd</th>
                                                        <th>TTL Layer</th>
                                                        <th>Reject Roll</th>
                                                        <th>Residue</th>
                                                    </tr>


                                                </thead>

                                                <!-- <? // var_dump($detailList);
                                                            //die; 
                                                            ?> -->

                                                <?php //$j = 1; 
                                                    ?>
                                                <?php foreach ($detailList as $d) :
                                                    ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $detail->QRNumber; ?></td>
                                                    <td><?= $detail->PO ?></td>
                                                    <td><?= $detail->qProdDesc; ?></td>
                                                    <td><?= $detail->qFabType; ?></td>
                                                    <td><?= $detail->qGrouping; ?></td>
                                                    <td><?= $detail->qLot; ?></td>
                                                    <td><?= $detail->QtyStickerKG; ?></td>
                                                    <td><?= $detail->QtyStickerYD; ?></td>
                                                    <td><input type="checkbox" checked><?= $detail->Inspect; ?></td>
                                                    <td><?= $detail->ActualKG; ?></td>
                                                    <td><?= $detail->ActualYD; ?></td>
                                                    <td><?= $detail->ActWidth; ?></td>
                                                    <td><?= $detail->PlanWidth; ?></td>
                                                    <td><input type="checkbox" checked><?= $detail->Spreading; ?></td>
                                                    <td><?= number_format($detail->ConsKG, 4); ?></td>
                                                    <td><?= $detail->ConsYD; ?></td>
                                                    <td><?= $detail->TtlLayer; ?></td>
                                                    <td><?= number_format($detail->RejectRoll, 2); ?></td>
                                                    <td><?= number_format($detail->Residue, 2); ?></td>
                                                </tr>
                                                <?php //$j++; 
                                                        ?>
                                                <?php endforeach;  ?>
                            </tbody>
                        </form>
                    </table>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    </div>



    <script>
// $(document).ready(function() {
//     document
//         .getElementById('table');

//         $(document).on('click', #js, function() {
//             var GR_NO = $(this).val();
//             $.ajax({
//                 url: "<?php echo base_url(); ?>Import_model/getDataCoba",
//                 method: "POST",
//                 data: {
//                     GR_NO : GR_NO
//                 }
//             })
//         })

// })


// $(document).ready(function() {
//     $(document).on('click', '#js', function() {
//         var GR_NO = $($this).data('GR_NO');

//     })
// })
    </script>