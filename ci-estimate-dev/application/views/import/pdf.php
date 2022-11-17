<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRINT PDF</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
    hr {
        border: 1px solid black;
    }


    .garis_verikal {
        border-left: 1px black solid;
        height: auto;
        width: 0px;
        position: absolute;
        margin-right: 2;
        display: inline-flex;
    }

    .garis_verikal_2 {
        border-right: 1px black solid;
        height: auto;
        width: 0px;
        position: absolute;
        /* right: 0; */
        /* display: inline; */
    }

    body {
        font-family: Calibri, Helvetica, Arial, sans-serif;
    }

    h3 {
        font-family: Cambria, "Times New Roman", serif;
    }

    #paragraf2 {
        font-family: Georgia, serif;
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
                <div class="col" style="text-align: left;">
                    <h6>GELAR REPORT</h6>
                </div>
                <div class="col" style="text-align: center;">
                    <h6><b>PT. LYG GARMENT INDONESIA</b></h6>
                </div>
                <div class="col" style="text-align: right;">
                    <h6>GRNO : <?php echo $header->GR_NO ?></h6>
                </div>
            </div>


            <!-- <div class="row">
                <div class="col-4" style="text-align: center;">
                    <h6></h6>
                </div>
                <div class="col-4" style="text-align: center;">
                    <h6>GELAR REPORT</h6>
                </div>
                <div class="col-4" style="text-align: right;">
                    <h6>GRNO : <?php //echo $header->GR_NO 
                                ?></h6>
                </div>
            </div> -->

            <div style="border-bottom: 2px dashed black;"></div>
            <div class="garis_verikal"></div>
            <div class="garis_verikal_2"></div>




            <table border="0px" width="100%" style="line-height: 1.1;">
                <tr>
                    <th width=15%>STYLE</th>
                    <th>: <?php echo $header->STYLE ?></th>
                    <th width=20%><?php echo date('D, d-M-Y', strtotime($header->TOD)); ?></th>
                    <!-- <th width=10% style="text-align: right;"> GRNO : <?php //echo $header->GR_NO 
                                                                            ?></th> -->
                </tr>
            </table>


            <!-- <div style="border-bottom: 2px dashed black;"></div> -->

            <table border="0px" width=100% style="line-height: 1.1;">

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

                <!-- </table>

            <div style="border-bottom: 1px dashed black;"></div>

            <table border="0px" width=100% style="line-height: 1.1;">


                <tr> -->
                <td width=15%><b></b></td>
                <td width=20%></td>
                <td width=10%><b>RATIO </b></td>
                <td>:</td>

                <?php foreach ($ratio as $d) : ?>
                <td style="text-align: center;" width="">
                    <?php echo $d->RATIO ?>
                </td>
                <?php endforeach; ?>

                </tr>
            </table>

            <div style="border-bottom: 1px dashed black;"></div>


            <!-- HORIZONTAL 3 -->
            <table border="0px" width=100% style="line-height: 1.1;">

                <tr>
                    <td width=15%><b>ORDER NO</b></td>
                    <td width=20%>: <?php echo $header->ORDER_NO ?></td>
                    <td width=10%><b>PORTION </b></td>


                    <td width=20%>: <?php echo $header->PORTION; ?></td>
                    <td width=27% style="text-align: right;"><b>QTY LBR</b></td>

                    <td style="text-align: left;"> : <?php echo $header->QTY_LBR ?></td>
                </tr>
                <tr>
                    <td width=15%><b>FABRIC PO</b></td>
                    <td width=20%>: <?php echo $header->FabricPO ?></td>
                    <td width=10%><b>LENGTH </b></td>


                    <td width=20%>: <?php echo $header->MARKER_LENGTH; ?> <i>YARD</td>
                    <td width=27% style="text-align: right;"><b>NO MARK</b></td>

                    <td style="text-align: left;">: <?php echo $header->MARKER_NO ?></td>
                </tr>

                <tr>
                    <td width=15%><b>NO TABLE</b></td>
                    <td width=20%>: <?php echo $header->TABLE_INDEX ?></td>
                    <td width=10%><b>WEIGHT</b></td>
                    <td width=20%>: <?php echo $header->FAB_WEIGHT; ?> <i>GSM</i></td>
                    <td width=27% style="text-align: right;"><b>WIDTH</b></td>
                    <td style="text-align: left;">: <?php echo $header->FAB_WIDTH ?> <i>INCH</i></td>
                </tr>

                <tr>
                    <td width=15%><b>WO</b></td>
                    <td width=20%>: <?php echo $header->WO_NO ?></td>
                    <td width=10%><b>LEMBARAN</b></td>
                    <td width=20%>:</td>
                    <td width=27% style="text-align: right;"><b>LEBAR ACTUAL</b></td>
                    <td style="text-align: left;">: </td>
                </tr>

                <tr>
                    <td width=15%><b>PROD. CODE</b></td>
                    <td width=20% colspan="5">: <?php echo $header->PRODUCT_CODE ?></td>

                </tr>
                <!-- <div style="border-bottom: 1px dashed black;" class="mt-2"></div> -->
            </table>

            <div style="border-bottom: 1px dashed black;" class=""></div>

            <table border="0px" width=100% style="line-height: 1.1;">

                <tr>
                    <td width=15%><b>MD CONS</b></td>
                    <td width=20%>: <?php echo number_format($header->MD_CONS, 4); ?></td>
                    <td width=10%><b>FAB MAT </b></td>


                    <td width=20% colspan="5"> : <?php echo $header->FAB_MAT; ?></td>
                </tr>
                <tr>
                    <td width=15%><b>CUT CONS</b></td>
                    <td width=20%>: <?php echo number_format($header->CUT_CONS, 4); ?></td>
                    <td width=10%><b>COLOR </b></td>


                    <td width=30%>: <?php echo $header->COLOR_DESC ?></td>
                </tr>



                <tr>
                    <td width=15%><b>QUANTITY</b></td>
                    <td width=20%> : <?php echo $header->TOTAL_QTY ?> Pcs</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td></td>

                </tr>
                <!-- <div style="border-bottom: 1px dashed black;" class="mt-2"></div> -->
            </table>

            <!-- <table border="0px" width=100% style="line-height: 1.1;">

                <tr>
                    <td width=15%><b>COLOR</b></td>
                    <td width="" colspan="2">: <?php //echo $header->COLOR_DESC 
                                                ?></td>

                    <td width=5%><b>FAB MAT</b></td>
                    <td width=20% colspan="2"> : <?php //echo $header->FAB_MAT; 
                                                    ?></td>

                </tr>

                <tr>
                    <td width=15%><b>MD CONS</b></td>
                    <td width="" colspan="2">: <?php //echo number_format($header->MD_CONS, 4); 
                                                ?></td>

                    <td width=5%><b>QUANTITY</b></td>
                    <td width=20% colspan="2"> : <?php //echo $header->TOTAL_QTY 
                                                    ?> Pcs</td>
                </tr>

                <tr>
                    <td width=15%><b>CUT CONS</b></td>
                    <td width=20%>: <?php //echo number_format($header->CUT_CONS, 4); 
                                    ?></td>
                </tr>


            </table> -->

            <div style="border-bottom: 2px dashed black;" class="mt-0"></div>

            <!-- <table border="1px" width="100%" style="line-height: 1.1;">
                <tr>
                    <th width=15%>COLOR</th>
                    <td>:</td>
                    <td class=""><?php //echo $header->COLOR_DESC 
                                    ?></td>
                    <th width=20% style="text-align : left">FABRIC MATERIAL</th>
                    <td width="" style="text-align: left;"> : <?php //echo $header->FAB_MAT 
                                                                ?></td>
                </tr>
            </table>

            <table border="1px" width="100%" style="line-height: 1.1;">
                <tr>
                    <th width=15%>MD CONS</th>
                    <td>:</td>
                    <td class="" width="25%"><?php //echo number_format($header->MD_CONS, 4); 
                                                ?></td>
                    <th width=20% style="text-align : left">QUANTITY</th>
                    <td width="" style="text-align: left;">: <?php //echo $header->TOTAL_QTY 
                                                                ?> Pcs</td>
                </tr>
            </table> -->

            <!-- <table border="1px" width="100%" style="line-height: 1.1;">
                <tr>
                    <th width=15%>MD CONS</th>
                    <td>:</td>
                    <td><?php //echo number_format($header->MD_CONS, 4); 
                        ?></td>
                    <th width=20% style="text-align : left">QUANTITY</th>
                    <td width="" style="text-align: left;"> : <?php //echo $header->TOTAL_QTY 
                                                                ?> Pcs</td>
                </tr>
            </table> -->

            <!-- <table border="1px" width="100%" style="line-height: 1.1;">
                <tr>
                    <th width=15%>CUTT CONS.</th>
                    <td>:</td>
                    <td class="" width=""><?php //echo number_format($header->CUT_CONS, 4); 
                                            ?></td>
                </tr>
            </table> -->

            <!-- <table border="1px" width="100%" style="line-height: 1.1;">
                <tr>
                    <th width=15%>QUANTITY</th>
                    <td>: </td>
                    <td><?php //echo $header->TOTAL_QTY 
                        ?> Pcs</td>
                    <td width=15% style="text-align : left"></td>
                    <td width=15% style="text-align: LEFT;"></td>
                </tr>
            </table> -->

            <!-- <table border="0px" width="100%" style="line-height: 1.1;">
                <tr>
                    <th width=15%>FABRIC MATERIAL</th>
                    <td>: </td>
                    <td><?php //echo $header->FAB_MAT 
                        ?></td>
                    <td width=15% style="text-align : left"></td>
                    <td width=15% style="text-align: LEFT;"></td>
                </tr>
            </table> -->


            <!-- <div style="border-bottom: 2px dashed black;" class="mt-2 mb-2"></div> -->
            <!-- 
            <form>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1"><b>NOTE : </b></label>
                </div>
            </form> -->


        </div>
        <script>
        window.onload = function() {
            self.print();
        }
        </script>
    </div>


</body>

</html>