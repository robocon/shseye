<?php 



?>
<link rel="stylesheet" href="bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css">
<script src="bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
<script src="bootstrap-datepicker-master/dist/locales/bootstrap-datepicker.th.min.js"></script>

<link rel="stylesheet" href="ChartJs/Chart.min.css">
<script src="ChartJs/Chart.bundle.min.js"></script>

<div class="row"><div class="col-md">&nbsp;</div></div>
<div class="jumbotron">
    <h1>ฟอร์มต้อหิน</h1>
</div>

<?php 

$part = input('part');
if (empty($part)) {
    ?>
    <div class="row">
        <div class="col-md">
            <form action="index.php?page=form" method="post">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <input type="text" class="form-control mb-2" placeholder="เลขบัตรประชาชน" name="idcard">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-2">ค้นหา</button>
                        <input type="hidden" name="part" value="searchIdcard">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php 
}elseif($part==='searchIdcard' || $part === 'edit') {

    $idcard = input('idcard');
    $user = [];
    $status = 'new';
    if ($part==='edit') {
        
        $db = Mysql::load();

        $id = input_get('id');
        $treatmentId = input_get('treatment');
        
        $db->select("SELECT * FROM `patients` WHERE `id` = '$id'");
        $user = $db->get_item();
        $idcard = $user['idcard'];
        $userId = $user['id'];

        $db->select("SELECT * FROM `treatment` WHERE `id` = '$treatmentId'");
        $tm = $db->get_item();
        $tmId = $tm['id'];

        $db->select("SELECT * FROM `iop` WHERE `treatmentId` = '$tmId' ");
        $iop = $db->get_item();

        $status = 'edit';
    }

    ?>
    <form action="index.php" method="post">
        <fieldset class="border p-2">
            <legend  class="w-auto">ข้อมูลทั่วไป</legend>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="yot" class="font-weight-bold">ยศ/คำนำหน้าชื่อ</label>
                        <input type="text" class="form-control" id="yot" name="yot" value="<?=$user['yot'];?>">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">ชื่อ</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?=$user['name'];?>">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="surname" class="font-weight-bold">สกุล</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="<?=$user['surname'];?>">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="idcard" class="font-weight-bold">เลขที่บัตรประชาชน</label>
                        <input type="text" class="form-control" id="idcard" name="idcard" value="<?=$idcard;?>">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="hn" class="font-weight-bold">HN</label>
                        <input type="text" class="form-control" id="hn" name="hn" value="<?=$user['hn'];?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="font-weight-bold">อายุ</label>
                        <input type="text" class="form-control" id="age" name="age" value="<?=$user['age'];?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="font-weight-bold">โรคประจำตัว</label>
                        <?php 
                        $congenitalList = ['Osteoporosis','HT','DM','DLS','ESRD','GOUT'];
                        $coni = 1;
                        foreach ($congenitalList as $key => $conItem) {
                            $checked = ( in_array($conItem, json_decode($user['congenital'])) ) ? 'checked="checked"' : '' ;
                            ?>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="congenital[]" id="congenital<?=$coni;?>" value="<?=$conItem;?>" <?=$checked;?>>
                                <label class="custom-control-label" for="congenital<?=$coni;?>"><?=$conItem;?></label>
                            </div>
                            <?php
                            $coni++;
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="font-weight-bold">สายตาสั้นเกิน 4.00D</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" name="myopia" id="myopia1" value="1">
                            <label class="custom-control-label" for="myopia1">ใช่</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" name="myopia" id="myopia2" value="0">
                            <label class="custom-control-label" for="myopia2">ไม่ใช่</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="font-weight-bold">ประวัติครอบครัวมีโรคต้อหิน</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" name="family" id="family1" value="1">
                            <label class="custom-control-label" for="family1">ใช่</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" name="family" id="family2" value="0">
                            <label class="custom-control-label" for="family2">ไม่ใช่</label>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="font-weight-bold">วินิจฉัยโรค</label>
                    <?php 
                    $diagList = ['POAG','PACG','APAC','Angle','Recess','Glaucoma'];
                    $coni = 1;
                    foreach ($diagList as $key => $diagItem) {
                        $checked = ( in_array($diagItem, json_decode($tm['diag'])) ) ? 'checked="checked"' : '' ;
                        ?>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="diag[]" id="diag<?=$coni;?>" value="<?=$diagItem;?>" <?=$checked;?>>
                            <label class="custom-control-label" for="diag<?=$coni;?>"><?=$diagItem;?></label>
                        </div>
                        <?php
                        $coni++;
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="font-weight-bold">ยาโรคต้อหิน</label>

                    <?php 
                    $drugList = ['Alphagan','Cosopt','Travatan','Taflotan','Lanotan'];
                    $coni = 1;
                    foreach ($drugList as $key => $drugItem) {
                        $checked = ( in_array($drugItem, json_decode($tm['drugGlaucoma'])) ) ? 'checked="checked"' : '' ;
                        ?>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="drugGlaucoma[]" id="drugGlaucoma<?=$coni;?>" value="<?=$drugItem;?>" <?=$checked;?>>
                            <label class="custom-control-label" for="drugGlaucoma<?=$coni;?>"><?=$drugItem;?></label>
                        </div>
                        <?php
                        $coni++;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="retinal_date" class="font-weight-bold">จอประสาทตา</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="retinal_date" name="retinal_date" value="<?=$tm['retinalDate'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="retinal_img">เลือกรูป</label>
                    <?php 
                    $src = '';
                    if (!empty($tm['retinalImg'])) {
                        $src = 'uploads/'.$user['idcard'].'/'.$tm['retinalImg'];
                    }
                    ?>
                    <input type="file" class="form-control-file" name="retinal_img" id="retinal_img" accept="image/*" onchange="loadFile(event,'retinalExample')">
                    <div>
                        <img id="retinalExample" class="img-fluid img-thumbnail" style="max-width: 300px; max-height: 300px;" src="<?=$src;?>">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ctvf_date" class="font-weight-bold">CTVF</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="ctvf_date" name="ctvf_date" value="<?=$tm['ctvfDate'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ctvf_img">เลือกรูป</label>
                    <?php 
                    $src = '';
                    if (!empty($tm['ctvfImg'])) {
                        $src = 'uploads/'.$user['idcard'].'/'.$tm['ctvfImg'];
                    }
                    ?>
                    <input type="file" class="form-control-file" name="ctvf_img" id="ctvf_img" accept="image/*" onchange="loadFile(event,'ctvfExample')">
                    <div>
                        <img id="ctvfExample" class="img-fluid img-thumbnail" style="max-width: 300px; max-height: 300px;" src="<?=$src;?>">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="oct_date" class="font-weight-bold">OCT</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="oct_date" name="oct_date" value="<?=$tm['octDate'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="oct_img">เลือกรูป</label>
                    <?php 
                    $src = '';
                    if (!empty($tm['octImg'])) {
                        $src = 'uploads/'.$user['idcard'].'/'.$tm['octImg'];
                    }
                    ?>
                    <input type="file" class="form-control-file" name="oct_img" id="oct_img" accept="image/*" onchange="loadFile(event,'octExample')">
                    <div>
                        <img id="octExample" class="img-fluid img-thumbnail" style="max-width: 300px; max-height: 300px;" src="<?=$src;?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="iop_date" class="font-weight-bold">เลือกวันที่</label>
                    <input type="text" class="form-control mx-sm-3" id="iop_date" name="iop_date" value="<?=$iop['iopDate'];?>">
                </div>
                <div class="form-group">
                    <label for="iop_right" class="font-weight-bold">ขวา</label>
                    <input type="text" class="form-control mx-sm-3" id="iop_right" name="iop_right" value="<?=$iop['right'];?>">
                </div>
                <div class="form-group">
                    <label for="iop_left" class="font-weight-bold">ซ้าย</label>
                    <input type="text" class="form-control mx-sm-3" id="iop_left" name="iop_left" value="<?=$iop['left'];?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="retinal_date" class="font-weight-bold">ความดันลูกตา</label>
                </div>
                <?php 
                $sql = "SELECT * FROM `iop` WHERE `patientId` = '$userId' ORDER BY `iopDate` ASC LIMIT 5";
                $iopItems = $db->get_items($sql);
                dump($sql);
                dump($iopItems);
                $iopDateList = [];
                $iopLeftList = [];
                $iopRightList = [];
                foreach ($iopItems as $key => $iopItem) {
                    $iopDateList[] = $iopItem['iopDate'];
                    $iopLeftList[] = $iopItem['left'];
                    $iopRightList[] = $iopItem['right'];
                }

                dump($iopDateList);
                ?>
                <table class="table">
                    <tr>
                        <th>วันที่</th>
                        <?php 
                        foreach ($iopDateList as $key => $itemDate) {
                            ?>
                            <th><?=$itemDate;?></th>
                            <?php
                        }
                        ?>
                    </tr>
                    <tr>
                        <th>ขวา</th>
                        <?php 
                        foreach ($iopRightList as $key => $eyeRight) {
                            ?>
                            <td><?=$eyeRight;?></td>
                            <?php
                        }
                        ?>
                    </tr>
                    <tr>
                        <th>ซ้าย</th>
                        <?php 
                        foreach ($iopLeftList as $key => $eyeLeft) {
                            ?>
                            <td><?=$eyeLeft;?></td>
                            <?php
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <button type="submit" class="btn btn-primary btn-lg btn-block" formenctype="multipart/form-data">บันทึกข้อมูล</button>
                <input type="hidden" name="action" value="save">
                <input type="hidden" name="status" value="<?=$status;?>">
            </div>
        </div>
        <div class="row"><div class="col-md">&nbsp;</div></div>
    </form>

    <script>
        // Upload Preview Image
        var loadFile = function(event,divId) {
            var output = document.getElementById(divId);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

        $('#retinal_date').datepicker({
            format: "yyyy-mm-dd",
            language: "th",
            todayHighlight: true,
            clearBtn: true,
            todayBtn: true
        });

        $('#ctvf_date').datepicker({
            format: "yyyy-mm-dd",
            language: "th",
            todayHighlight: true,
            clearBtn: true,
            todayBtn: true
        });
        
        $('#oct_date').datepicker({
            format: "yyyy-mm-dd",
            language: "th",
            todayHighlight: true,
            clearBtn: true,
            todayBtn: true
        });

        $('#iop_date').datepicker({
            format: "yyyy-mm-dd",
            language: "th",
            todayHighlight: true,
            clearBtn: true,
            todayBtn: true
        });
    </script>
    <?php 
}