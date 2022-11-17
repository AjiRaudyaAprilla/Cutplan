<div class="container-fluid col-lg-10">

    <div class="card o-hidden border-0 shadow-lg">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit List</h1>
                        </div>
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
                        <?php endif; ?>
                        <form class="user" method="POST" action="">
                            <input type="hidden" name="gr_no" value="<?= $list['GR_NO']; ?>">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="on" class="d-flex justify-content-center">Order Number</label>
                                    <input type="text" name="on" id="on" class="form-control" value="<?= $list['ORDER_NO']; ?>" disabled>
                                </div>
                                <div class="col-sm-4">
                                    <label for="color" class="d-flex justify-content-center">Color</label>
                                    <input type="text" name="color" id="color" class="form-control" value="<?= $list['COLOR_DESC']; ?>" disabled>
                                </div>
                                <div class="col-sm-4">
                                    <label for="style" class="d-flex justify-content-center">Style</label>
                                    <input type="text" name="style" id="style" class="form-control" value="<?= $list['STYLE']; ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="product_code" class="d-flex justify-content-center">Product Code</label>
                                    <input type="text" name="product_code" id="product_code" class="form-control" value="<?= $list['PRODUCT_CODE']; ?>">
                                    <small class="form-text text-danger"><?= form_error('product_code'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="wo_no" class="d-flex justify-content-center">Wo Number</label>
                                    <input type="text" name="wo_no" id="wo_no" class="form-control" value="<?= $list['WO_NO']; ?>">
                                    <small class="form-text text-danger"><?= form_error('wo_no'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="portion" class="d-flex justify-content-center">Portion</label>
                                    <input type="text" name="portion" id="portion" class="form-control" value="<?= $list['PORTION']; ?>">
                                    <small class="form-text text-danger"><?= form_error('portion'); ?></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="fab_mat" class="d-flex justify-content-center">Fab Mat</label>
                                    <input type="text" name="fab_mat" id="fab_mat" class="form-control" value="<?= $list['FAB_MAT']; ?>">
                                    <small class="form-text text-danger"><?= form_error('fab_mat'); ?></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="fab_width" class="d-flex justify-content-center">Fab Width</label>
                                    <input type="text" name="fab_width" id="fab_width" class="form-control" value="<?= $list['FAB_WIDTH']; ?>">
                                    <small class="form-text text-danger"><?= form_error('fab_width'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="fab_weight" class="d-flex justify-content-center">Fab Weight</label>
                                    <input type="text" name="fab_weight" id="fab_weight" class="form-control" value="<?= $list['FAB_WEIGHT']; ?>">
                                    <small class="form-text text-danger"><?= form_error('fab_weight'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="fab_mat" class="d-flex justify-content-center">Marker No</label>
                                    <input type="text" name="marker_no" id="marker_no" class="form-control" value="<?= $list['MARKER_NO']; ?>">
                                    <small class="form-text text-danger"><?= form_error('marker_no'); ?></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="cut_cons" class="d-flex justify-content-center">Cut Cons.</label>
                                    <input type="text" name="cut_cons" id="cut_cons" class="form-control" value="<?= number_format($list['CUT_CONS'], 4); ?>">
                                    <small class="form-text text-danger"><?= form_error('cut_cons'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="md_cons" class="d-flex justify-content-center">MD Cons.</label>
                                    <input type="text" name="md_cons" id="md_cons" class="form-control" value="<?= number_format($list['MD_CONS'], 4); ?>">
                                    <small class="form-text text-danger"><?= form_error('md_cons'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="table_index" class="d-flex justify-content-center">Table Index</label>
                                    <input type="text" name="table_index" id="table_index" class="form-control" value="<?= $list['TABLE_INDEX']; ?>">
                                    <small class="form-text text-danger"><?= form_error('table_index'); ?></small>
                                </div>
                            </div>

                            <!-- TABEL RASIO -->
                            <div class="col">
                                <!-- <div class="card mb-3"> -->
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold "></h6>
                                </div>
                                <!-- <div class="card-body basic-custome-color"> -->
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="pukimak" style="width: 150%;">
                                        <thead>
                                            <tr>
                                                <!-- TABLE HEAD -->
                                                <th id="titleRasio" colspan="<?= $getCollSpan; ?>" style="text-align: center;">Rasio</th>
                                                <th rowspan="3" style="text-align: center; width: 150px;">Total</th>
                                                <th rowspan="3" style="width: 150px; text-align: center;">Qty Layer</th>
                                                <th rowspan="3" style="width: 150px; text-align: center;">Total Qty</th>
                                                <th rowspan="3" style="width: 150px; text-align: center;">Marker Length</th>
                                            </tr>

                                            <tr id="sizeList"></tr>

                                            <tr id="ratioList" name="ratioList">

                                                <!-- QUERY SIZE NO -->
                                                <?php foreach ($sizeratio as $ratio) : ?>
                                                    <td style="width: 150px; text-align: center;"><?php echo $ratio->SIZE_NO ?></td>
                                                <?php endforeach; ?>

                                            <tr id="ratioList" name="ratioList">

                                                <!-- QUERY RATIO -->
                                                <?php foreach ($sizeratio as $ratio) : ?>
                                                    <td style="width: 150px; text-align: center;"><?php echo $ratio->RATIO ?></td>
                                                <?php endforeach; ?>

                                                <!-- QUERY TH -->
                                                <td style="width: 150px; text-align: center;"><?= $list['TOTAL_RATIO']; ?></td>
                                                <td style="width: 150px; text-align: center;"><?= $list['QTY_LBR']; ?></td>
                                                <td style="width: 150px; text-align: center;"><?= $list['TOTAL_QTY']; ?></td>
                                                <td style="width: 150px; text-align: center;"><?= $list['MARKER_LENGTH']; ?></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="qtyRatio1">


                                                <!-- INPUT RATIO -->
                                                <?php
                                                for ($i = 0; $i < $getCollSpan; $i++) {
                                                    echo "<td><input type='number' step='any' name='mdcutCons1' class='form-control' value='0'></td>";
                                                }
                                                ?>
                                                <!-- Input Total Ratio-->
                                                <td style="text-align: center;">
                                                    <input type="number" step="any" name="input_total_ratio" class="form-control" value="">
                                                </td>

                                                <!-- Input Qty Layer -->
                                                <td style="text-align: center;">
                                                    <input type="number" step="any" name="input_qty_layer" class="form-control" value="0">
                                                </td>

                                                <!-- Input Total QTY -->
                                                <td style="text-align: center;">
                                                    <input type="number" step="any" name="input_total_qty" class="form-control" value="0">
                                                </td>

                                                <!-- Input Marker length -->
                                                <td style="text-align: center;">
                                                    <input type="number" step="any" name="marker_length_input" class="form-control" value="0">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-primary float-right mt-3 mb-3" name="edit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>