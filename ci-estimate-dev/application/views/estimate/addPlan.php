<?php

var_dump($Grn);

$no = $Grn['MaxGRN'];
$no++;
$GR = "GR";
$date = date("ym");
$GRNO = $GR . $date . sprintf("%06s", $no);
var_dump($GRNO);



?>


<div class="container-fluid col-lg-10">

    <div class="card o-hidden border-0 shadow-lg">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Add Cutting Plan</h1>
                        </div>
                        <?php echo $this->session->flashdata('flash'); ?>
                        <form class="user" method="POST" action="<?= base_url('estimate/addPlan') ?>">

                            <!-- BARIS 1 -->
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="CustomerPONO">Order Number</label>
                                    <select name="on" id="CustomerPONO" class="form-control custom-select">
                                        <option value="">Choose Order Number</option>
                                        <?php foreach ($getOn as $onList) : ?>
                                            <option value="<?php echo $onList->CustomerPONO ?>"><?php echo $onList->CustomerPONO ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="selectCOLOR">Color</label>
                                    <select class="COLOR form-control custom-select" id="selectCOLOR" name="color">
                                        <option value="0">Select Color</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="StyleDesc">Style</label>
                                    <input type="text" name="StyleDesc" id="StyleDesc" class="form-control" readonly>
                                </div>
                            </div>

                            <!-- Baris 2 -->
                            <div class=" form-group row">

                                <div class="col-sm-4">
                                    <label for="floatingInput">Order Qty</label>
                                    <input type="number" step="any" name="orderQty" class="form-control" id="orderQty" readonly>
                                </div>
                                <div class="col-sm-4">
                                    <label for="floatingInput">GR_NO</label>
                                    <input type="text" class="form-control form-control-user" id="floatingInput" name="GR_NO" value="<?php echo set_value('GR_NO'); ?>">
                                    <small class="form-text text-danger"><?= form_error('GR_NO'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="buyer">Buyer</label>
                                    <select class="form-control custom-select" name="buyer">
                                        <option value="">Select Buyer</option>
                                        <option value="H&M">H&M</option>
                                        <option value="KOHL'S">KOHL'S</option>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('buyer'); ?></small>
                                </div>
                            </div>

                            <!-- Baris 3 -->
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="print_stat">Print Stat</label>
                                    <select name="print_stat" id="print_stat" class="form-control custom-select">
                                        <option value="">Select Print Stat</option>
                                        <option value="Y">Y</option>
                                        <option value="N">N</option>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('print_stat'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="print_part_qty">Print Part QTY</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Print Part Qty" name="print_part_qty" value="<?php echo set_value('print_part_qty'); ?>">
                                    <small class="form-text text-danger"><?= form_error('print_part_qty'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="print_part_qty">Print Stat</label>
                                    <select name="embro_stat" id="print_stat" class="form-control custom-select">
                                        <option value="">Select Print Stat</option>
                                        <option value="Y">Y</option>
                                        <option value="N">N</option>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('embro_stat'); ?></small>
                                </div>
                            </div>

                            <!-- BARIS 4 -->
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="embro_part_qty">Embro Part QTY</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Embro Part Qty" name="embro_part_qty" value="<?php echo set_value('embro_part_qty'); ?>">
                                    <small class="form-text text-danger"><?= form_error('embro_part_qty'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="wo_no">WO_NO</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Wo Number" name="wo_no" value="<?php echo set_value('wo_no'); ?>">
                                    <small class="form-text text-danger"><?= form_error('wo_no'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="wo_no">Product Code</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Product Code" name="product_code" value="<?php echo set_value('product_code'); ?>">
                                    <small class="form-text text-danger"><?= form_error('product_code'); ?></small>
                                </div>
                            </div>

                            <!-- BARIS 5 -->
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">Portion</label>
                                    <!-- <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Portion" name="portion" value="<?php //echo set_value('portion'); 
                                                                                                                                                                        ?>">
                                    <small class="form-text text-danger"><?php // form_error('portion'); 
                                                                            ?></small> -->
                                    <select name="portion" id="portion" class="form-control custom-select">
                                        <option value="">Choose Portion</option>
                                        <?php foreach ($getPortion as $prt) : ?>
                                            <option value="<?php echo $prt->PORTION; ?>"><?php echo $prt->PORTION; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Fab Mat</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Fab Mat" name="fab_mat" value="<?php echo set_value('fab_mat'); ?>">
                                    <small class="form-text text-danger"><?= form_error('fab_mat'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Fab Width</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Fab Width" name="fab_width" value="<?php echo set_value('fab_width'); ?>">
                                    <small class="form-text text-danger"><?= form_error('fab_width'); ?></small>
                                </div>
                            </div>

                            <!-- BARIS 6 -->
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">Fab Weight</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Fab Weight" name="fab_weight" value="<?php echo set_value('fab_weight'); ?>">
                                    <small class="form-text text-danger"><?= form_error('fab_weight'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">MD Cons.</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="MD Cons." name="md_cons" value="<?php echo set_value('md_cons'); ?>">
                                    <small class="form-text text-danger"><?= form_error('md_cons'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Cut Cons.</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Cut Cons." name="cut_cons" value="<?php echo set_value('cut_cons'); ?>">
                                    <small class="form-text text-danger"><?= form_error('cut_cons'); ?></small>
                                </div>
                            </div>

                            <!-- Baris 7 -->
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">Marker No</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Marker No" name="marker_no" value="<?php echo set_value('marker_no'); ?>">
                                    <small class="form-text text-danger"><?= form_error('marker_no'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">TOD</label>
                                    <input type="date" class="form-control form-control-user" id="exampleLastName" placeholder="TOD" name="tod" value="<?php echo set_value('tod'); ?>">
                                    <small class="form-text text-danger"><?= form_error('tod'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Season</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Season" name="season" value="<?php echo set_value('season'); ?>">
                                    <small class="form-text text-danger"><?= form_error('season'); ?></small>
                                </div>
                            </div>

                            <!-- Baris 8 -->
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">Table Index</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Table Index" name="table_index" value="<?php echo set_value('table_index'); ?>">
                                    <small class="form-text text-danger"><?= form_error('table_index'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Yard Req</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Yard Req" name="yard_req" value="<?php echo set_value('yard_req'); ?>">
                                    <small class="form-text text-danger"><?= form_error('yard_req'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Kg Req</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Kg Req" name="kg_req" value="<?php echo set_value('kg_req'); ?>">
                                    <small class="form-text text-danger"><?= form_error('kg_req'); ?></small>
                                </div>
                            </div>

                            <!-- TABEL JQUERY -->
                            <div class="col">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold "></h6>
                                </div>
                                <div class="table-responsive">


                                    <div class="card mb-3" id="tableCalculation">
                                        <!-- <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Basic Table</h6>
                                    </div> -->
                                        <div class="card-body basic-custome-color">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="pukimak" style="width: 150%;">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="3" style="text-align: center;">Color</th>
                                                            <th id="titleRasio" colspan="5" style="text-align: center;">Rasio</th>
                                                            <th rowspan="2" style="text-align: center; width: 150px;">Total</th>
                                                            <th rowspan="3" style="width: 150px; text-align: center;">Qty Layer</th>
                                                            <th rowspan="3" style="width: 150px; text-align: center;">Total Qty</th>
                                                            <th rowspan="3" style="width: 150px; text-align: center;">Marker Length</th>

                                                        </tr>

                                                        <tr id="sizeList"></tr>

                                                        <tr id="ratioList" name="ratioList">


                                                            <!-- Total -->
                                                            <th style="text-align: center;" id="totalRatio" name="totalRatio">-</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr id="qtyRatio1">
                                                            <!-- Total -->
                                                            <td style="width: 100px; text-align: center;" id="textTotalRatioQty">-</td>
                                                            <!-- Size Ratio -->

                                                            <!-- Total -->

                                                            <!-- Qty Layer -->
                                                            <td style="text-align: center;">
                                                                <input type="number" step="any" name="mdcutCons1" class="form-control" value="0">
                                                            </td>

                                                            <!-- Total Qty -->
                                                            <td style="text-align: center;">
                                                                <input type="number" step="any" name="mdcutCons2" class="form-control" value="0">
                                                            </td>

                                                            <!-- Marker Length -->
                                                            <td style="text-align: center;">
                                                                <input type="number" step="any" name="mdcutCons3" class="form-control" value="0">
                                                            </td>


                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- </div> -->
                                <!-- </div> -->
                                <!-- </div> -->
                                <button type="submit" class="btn btn-primary float-right" name="tambah" onclick="submitdata()">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Jquery Core Js -->
<script src="<?php echo base_url(); ?>assets/bundles/libscripts.bundle.js"></script>

<!-- Plugin Js-->
<script src="<?php echo base_url(); ?>assets/plugin/parsleyjs/js/parsley.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        document
            .getElementById('tableCalculation')
            .style
            .display = "none";


        // Mengambil DATA ON DAN MENAMPILKAN COLOR
        $('#CustomerPONO').change(function() {
            var CustomerPONO = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>Estimate/getColor",
                method: "POST",
                data: {
                    CustomerPONO: CustomerPONO
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '<option id="selectionColor" value="0">Select Color</option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].COLOR + '">' + data[i].COLOR + '</option>';
                    }
                    $('.COLOR').html(html);
                }
            });
        });

        // GET COLOR UNTUK MENAMPILKAN STYLE, QUANTITY, DAN TABEL YANG DIBAWAH
        $('#selectCOLOR').change(function() {
            var CustomerPONO = $("#CustomerPONO").val();
            var selectCOLOR = $("#selectCOLOR").val();
            var StyleDesc = $("#StyleDesc").val(); //ADD AJI
            var style = document.getElementById("StyleDesc").value

            console.log(selectCOLOR); //ADD AJI
            $.ajax({
                url: "<?php echo base_url(); ?>Estimate/getDetailOn",
                method: "POST",
                data: {
                    CustomerPONO: CustomerPONO,
                    selectCOLOR: selectCOLOR,

                },
                async: false,
                dataType: 'json',
                beforeSend: function() {
                    $('body').append(
                        '<div style="" id="loadingDiv"><div class="loader"></div></div>'
                    );
                    $('body').css({
                        'background-color': 'rgba(0,0,0,0.5)'
                    });
                },
                success: function(data) {
                    var getData = data;
                    console.log(data);
                    $('.prepend').remove();
                    // var html = ''; var i = 0;
                    var html = '<td id="removeSize" style="width: 150px; text-align: center;"></td>';
                    var html2 = '<td id="removeRatioSize" style="width: 150px; text-align: center;"></td>';
                    var html3 = '<td class="prepend" style="width: 150px; text-align: center;">-</td>';
                    for (var k in data) {
                        $('#' + k + '').val(data[k]);
                    }
                    // for (var make in data.sizeList) {
                    console.log(data.sizeList);
                    for (let i = 0; i < data.sizeList.length; i++) {
                        var make = data.sizeList[i];
                        var model = make['SIZE'];
                        console.log(model)
                        var models = parseInt(make['SOQTY']);
                        // var models = parseInt(data.sizeList[make]['SOQTY']);
                        html += '<td style="width: 150px; text-align: center;"><input type="text" name="sizeNoList[]" class' +
                            '="form-control" value="' + model + '" required readonly></td>';
                        html2 += '<td class="prepend" style="width: 150px; text-align: center;" prepended="yes">' +
                            models + '</td>';
                        //AMBIL INPUT RATIO
                        html3 += '<td class="prepend" style="width: 150px; text-align: center;"><input type="num' +
                            'ber" step="any" id="' + i + 'pret" onchange="getTotal(' + i + ')" name="totRatio[]" class' +
                            '="form-control" value="0" required></td>';
                        // alert(make + ', ' + model);
                        // }
                    }

                    $('#sizeList').html(html);
                    $('#ratioList').prepend(html2);
                    $('#qtyRatio1').prepend(html3);

                    $("#titleRasio").attr('colspan', '' + data.sizeList.length + '');
                    document
                        .getElementById('tableCalculation')
                        .style
                        .display = "block";
                    removeLoader();
                    getTotal(0, data.sizeList.length);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                    alert(thrownError);
                }
            })
        })



        function submitdata() {
            var style = document.getElementById("StyleDesc").value;
        }

        // $("#addrow").click(function() {
        // $('#qtyRatio')
        //     .clone()
        //     .appendTo('#pukimak');
        // var $div = $('tr[id^="qtyRatio"]:last');
        // var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
        // var $klon = $div.clone().prop('id', 'qtyRatio' + num).appendTo('#pukimak');
        // addrows(num);

        //     console.log(arr);
        // })

        $('#3pret').blur(function() {
            console.log('pret');

        })

        function removeLoader() {
            $("#loadingDiv").fadeOut(500, function() {
                // fadeOut complete. ReBmove the loading div
                $("#loadingDiv").remove(); //makes page more lightweight
                $("#selectionColor").remove();
                $("#removeSize").remove();
                $("#removeRatioSize").remove();
                $('body').removeAttr('style');
            });
        }


    });
    var arr = [];
    var sum = 0;
    var totalData = [];

    function getTotal(id, data) {
        let qwerty = $('#' + id + 'pret').val();
        if (qwerty >= 1) {
            sum = 0;
            arr[id] = qwerty;
            console.log('edit');
        } else {
            arr.push(qwerty);
        }
        $.each(arr, function() {
            sum += parseFloat(this) || 0;
        });
        $("#textTotalRatioQty").html(sum);
        console.log(arr);
        console.log('id = ' + id);
    }
</script>

<!-- Jquery Page Js -->
<script src="<?php echo base_url(); ?>assets/js/template.js"></script>
<script>
    $(function() {
        // initialize after multiselect
        $('#basic-form').parsley();
    });
</script>