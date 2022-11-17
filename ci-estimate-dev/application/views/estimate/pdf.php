<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRINT PDF</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        hr {
            border: 1px solid black;
        }

        @media print {
            .halaman {
                page-break-after: always;
            }
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>



<body>
    <div class="halaman">
        <div class="container">

            <!-- HEADER -->
            <div class="row">

                <div class="col" style="text-align: center;">
                    <h5>PT. LYG GARMENT INDONESIA</h5>
                </div>
            </div>
            <div class="row">
                <div class="col" style="text-align: center;">
                    <h6>GELAR REPORT</h6>
                </div>
            </div>
            <div style="border-bottom: 2px dashed black;"></div>




            <table border="0px" width="100%" style="line-height: 1,5;">
                <tr>
                    <th width=15%>STYLE</th>
                    <th>: <?php echo $header->STYLE ?></th>
                    <th width=15%><?php echo $header->TOD ?></th>
                    <th width=10% style="text-align: right;"> NO : <?php echo $header->GR_NO ?></th>
                </tr>
            </table>


            <!-- <div style="border-bottom: 2px dashed black;"></div> -->

            <table border="0px" width=100% style="line-height: 1,5;">

                <!-- HORIZONTAL SIZE SORT -->
                <tr>
                    <td width=15%><b>DATE</b></td>
                    <td width=20%>: <?php echo date('d-m-y') ?></td>
                    <td width=10%><b>SIZE</b></td>
                    <td>:</td>

                    <?php foreach ($ratio as $d) : ?>
                        <td style="text-align: center;" width="">
                            <?php echo $d->SIZE_NO ?>
                        </td>
                    <?php endforeach; ?>
                </tr>


                <tr>
                    <td width=15%><b>ORDER NO</b></td>
                    <td width=20%>: <?php echo $header->ORDER_NO ?></td>
                    <td width=10%><b>RATIO </b></td>
                    <td>:</td>

                    <?php foreach ($ratio as $d) : ?>
                        <td style="text-align: center;" width="">
                            <?php echo $d->RATIO ?>
                        </td>
                    <?php endforeach; ?>

                </tr>
            </table>

            <!-- <div style="border-bottom: 1px dashed black;"></div> -->


            <!-- HORIZONTAL 3 -->
            <table border="0px" width=100% style="line-height: 1,5;">
                <tr>
                    <td width=15%><b>FABRIC PO</b></td>
                    <td width=20%>: <ins><?php echo $header->WO_NO ?></ins></td>
                    <td width=10%><b>PORTION </b></td>


                    <td width=20%>: <ins><?php echo $header->PORTION; ?></ins></td>
                    <td width=27% style="text-align: right;"><b>QTY LBR :</b></td>

                    <td style="text-align: right;"><ins><?php echo $header->QTY_LBR ?></ins></td>
                </tr>

                <tr>
                    <td width=15%><b>NO TABLE</b></td>
                    <td width=20%>: <ins><?php echo $header->TABLE_INDEX ?></ins></td>
                    <td width=10%><b>LENGTH</b></td>
                    <td width=20%>: <ins><?php echo $header->MARKER_LENGTH; ?> <i>YARD</i></ins></td>
                    <td width=27% style="text-align: right;"><b>NO MARK :</b></td>
                    <td style="text-align: right;"><ins><?php echo $header->MARKER_NO ?></ins></td>
                </tr>

                <tr>
                    <td width=15%><b>WO</b></td>
                    <td width=20%>: <?php echo $header->WO_NO ?></td>
                    <td width=10%><b>WEIGHT</b></td>
                    <td width=20%>: <ins><?php echo $header->FAB_WEIGHT; ?> <i>GSM</i></ins></td>
                    <td width=27% style="text-align: right;"><b>WIDTH :</b></td>
                    <td style="text-align: right;"><ins><?php echo $header->FAB_WIDTH ?> <i>INCH</i></ins></td>
                </tr>

                <tr>
                    <td width=15%><b>PRODUCT CODE</b></td>
                    <td width=20%>: <ins><?php echo $header->PRODUCT_CODE ?></ins></td>
                    <td width=10%><b>LEMBARAN</b></td>
                    <td width=20%> : <?php //echo $header->MARKER_LENGTH; 
                                        ?></td>
                    <td width=27% style="text-align: right;"><b>LEBAR ACTUAL :</b></td>
                    <td><ins><?php //echo $header->MARKER_NO 
                                ?></ins></td>
                </tr>
            </table>

            <div style="border-bottom: 1px dashed black;" class="mt-2"></div>

            <table border="0px" width="100%" style="line-height: 1,5;" class="mt-2">
                <tr>
                    <th width=15%>COLOR</th>
                    <td>:</td>
                    <td class=""><?php echo $header->STYLE ?></td>
                    <td width=15% style="text-align : left">START GELAR</td>
                    <td width=15% style="text-align: left;"> WASTE PINGGIR</td>
                </tr>
            </table>

            <table border="0px" width="100%" style="line-height: 1,5;">
                <tr>
                    <th width=15%>MD CONS</th>
                    <td>: </td>
                    <td><?php echo number_format($header->MD_CONS, 4); ?></td>
                    <td width=15% style="text-align : left">FINISH GELAR</td>
                    <td width=15% style="text-align: left;"></td>
                </tr>
            </table>

            <table border="0px" width="100%" style="line-height: 1,5;">
                <tr>
                    <th width=15%>CUTT CONS.</th>
                    <td>: </td>
                    <td><?php echo number_format($header->CUT_CONS, 4); ?></td>
                    <td width=15% style="text-align : left">GELAR</td>
                    <td width=15% style="text-align: LEFT;">WASTE TENGAH</td>
                </tr>
            </table>

            <table border="0px" width="100%" style="line-height: 1,5;">
                <tr>
                    <th width=15%>CUTT CONS.</th>
                    <td>: </td>
                    <td><?php echo number_format($header->CUT_CONS, 4); ?></td>
                    <td width=15% style="text-align : left"></td>
                    <td width=15% style="text-align: LEFT;"></td>
                </tr>
            </table>

            <table border="0px" width="100%" style="line-height: 1,5;">
                <tr>
                    <th width=15%>TTL TERIMA BAHAN</th>
                    <td>: </td>
                    <td></td>
                    <td width=15% style="text-align : left">CUTTER</td>
                    <td width=15% style="text-align: LEFT;">WASTE K.KAIN</td>
                </tr>
            </table>

            <table border="0px" width="100%" style="line-height: 1,5;">
                <tr>
                    <th width=15%>QUANTITY</th>
                    <td>: </td>
                    <td><?php echo $header->TOTAL_QTY ?> Pcs</td>
                    <td width=15% style="text-align : left"></td>
                    <td width=15% style="text-align: LEFT;"></td>
                </tr>
            </table>

            <table border="0px" width="100%" style="line-height: 1,5;">
                <tr>
                    <th width=15%>FABRIC MATERIAL</th>
                    <td>: </td>
                    <td><?php echo $header->FAB_MAT ?></td>
                    <td width=15% style="text-align : left"></td>
                    <td width=15% style="text-align: LEFT;"></td>
                </tr>
            </table>


            <div style="border-bottom: 2px dashed black;" class="mt-2"></div>


        </div>
        <!-- <script>
            window.onload = function() {
                self.print();
            }
        </script> -->
    </div>
</body>

</html>