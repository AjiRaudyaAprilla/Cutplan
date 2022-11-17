<div class="container">

    <!-- HEADER -->
    <div class="row">

        <div class="col" style="text-align: center;">
            <h5>PT. LYG GARMENT INDONESIA</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-4" style="text-align: center;">
            <h6></h6>
        </div>
        <div class="col-4" style="text-align: center;">
            <h6>GELAR REPORT</h6>
        </div>
        <div class="col-4" style="text-align: right;">
            <h6>GRNO : <?php echo $header->GR_NO ?></h6>
        </div>

    </div>


    <table class="table ">
        <tbody>
            <tr>
                <th scope="row">STYLE</th>
                <td>: <?php echo $header->STYLE ?></td>
                <td colspan="<?= $getCollSpan; ?>">
                    <?php echo date('D, d-M-Y', strtotime($header->TOD)); ?></td>
            </tr>
            <tr>
                <th scope="row">DATE</th>
                <td>: <?php echo date('d-m-y') ?></td>
                <th>SIZE_NO</th>
                <?php foreach ($ratio as $d) : ?>
                    <td style="text-align: center;" width="">
                        <?php echo $d->SIZE_NO ?>
                    </td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <th scope="row">ORDER NO</th>
                <td>: <?php echo $header->ORDER_NO ?></td>
                <th>RATIO</th>
                <?php foreach ($ratio as $d) : ?>
                    <td style="text-align: center;" width="">
                        <?php echo $d->RATIO ?>
                    </td>
                <?php endforeach; ?>
            </tr>

        </tbody>
    </table>

    <table class="table table-borderless">

        <tbody>
            <tr>
                <th scope="row">FABRIC PO</th>
                <td>: <?php echo $header->FabricPO ?></td>
                <th>PORTION</th>
                <td>: <?php echo $header->PORTION ?></td>
                <th>QTY LBR</th>
                <td>: <?php echo $header->QTY_LBR ?></td>
            </tr>
            <tr>
                <th scope="row">TABLE</th>
                <td>: <?php echo $header->TABLE_INDEX ?></td>
                <th>LENGTH</th>
                <td>: <?php echo $header->MARKER_LENGTH ?> YARD</td>
                <th>NO MARK</th>
                <td>: <?php echo $header->MARKER_NO ?></td>
            </tr>
            <tr>
                <th scope="row">WO</th>
                <td>: <?php echo $header->WO_NO ?></td>
                <th>WEIGHT</th>
                <td>: <?php echo $header->FAB_WEIGHT ?> GSM</td>
                <th>WIDTH</th>
                <td>: <?php echo $header->FAB_WIDTH ?> INCH</td>
            </tr>
            <tr>
                <th scope="row">PRODUCT CODE</th>
                <td>: <?php echo $header->PRODUCT_CODE ?></td>
                <th>LEMBARAN</th>
                <td>: -</td>
                <th>LEBAR ACTUAL</th>
                <td>: -</td>
            </tr>

            <tr>
                <th scope="row">COLOR</th>
                <td>: <?php echo $header->PRODUCT_CODE ?></td>
                <th>LEMBARAN</th>
                <td>: -</td>
                <th>LEBAR ACTUAL</th>
                <td>: -</td>
            </tr>

        </tbody>
    </table>