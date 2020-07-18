<link rel="stylesheet" href="bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css">
<script src="bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
<script src="bootstrap-datepicker-master/dist/locales/bootstrap-datepicker.th.min.js"></script>

<link rel="stylesheet" href="ChartJs/Chart.min.css">
<script src="ChartJs/Chart.bundle.min.js"></script>

<div class="row"><div class="col-md"></div></div>

<div class="jumbotron">
    <h1>ฟอร์มต้อหิน</h1>
</div>

<form action="index.php" method="post">
    <fieldset class="border p-2">
        <legend  class="w-auto">ข้อมูลทั่วไป</legend>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="yot" class="font-weight-bold">ยศ/คำนำหน้าชื่อ</label>
                    <input type="text" class="form-control" id="yot" name="yot" value="นาง">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="name" class="font-weight-bold">ชื่อ</label>
                    <input type="text" class="form-control" id="name" name="name" value="วาณี">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="surname" class="font-weight-bold">สกุล</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="อิศระ">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="idcard" class="font-weight-bold">เลขที่บัตรประชาชน</label>
                    <input type="text" class="form-control" id="idcard" name="idcard" value="">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="hn" class="font-weight-bold">HN</label>
                    <input type="text" class="form-control" id="hn" name="hn" value="51-5149">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="font-weight-bold">โรคประจำตัว</label>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="congenital[]" id="congenital1" value="Osteoporosis">
                        <label class="custom-control-label" for="congenital1">Osteoporosis</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="congenital[]" id="congenital2" value="HT">
                        <label class="custom-control-label" for="congenital2">HT</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="congenital[]" id="congenital3" value="DM">
                        <label class="custom-control-label" for="congenital3">DM</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="congenital[]" id="congenital4" value="DLS">
                        <label class="custom-control-label" for="congenital4">DLS</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="congenital[]" id="congenital5" value="ESRD">
                        <label class="custom-control-label" for="congenital5">ESRD</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="congenital[]" id="congenital6" value="GOUT">
                        <label class="custom-control-label" for="congenital6">GOUT</label>
                    </div>
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
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="diag[]" id="diag1" value="POAG">
                    <label class="custom-control-label" for="diag1">POAG</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="diag[]" id="diag2" value="PACG">
                    <label class="custom-control-label" for="diag2">PACG</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="diag[]" id="diag3" value="APAC">
                    <label class="custom-control-label" for="diag3">APAC</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="diag[]" id="diag4" value="Angle">
                    <label class="custom-control-label" for="diag4">Angle</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="diag[]" id="diag5" value="Recess">
                    <label class="custom-control-label" for="diag5">Recess</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="diag[]" id="diag6" value="Glaucoma">
                    <label class="custom-control-label" for="diag6">Glaucoma</label>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="font-weight-bold">ยาโรคต้อหิน</label>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="drugGlaucoma[]" id="drugGlaucoma1" value="Alphagan">
                    <label class="custom-control-label" for="drugGlaucoma1">Alphagan</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="drugGlaucoma[]" id="drugGlaucoma2" value="Cosopt">
                    <label class="custom-control-label" for="drugGlaucoma2">Cosopt</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="drugGlaucoma[]" id="drugGlaucoma3" value="Travatan">
                    <label class="custom-control-label" for="drugGlaucoma3">Travatan</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="drugGlaucoma[]" id="drugGlaucoma4" value="Taflotan">
                    <label class="custom-control-label" for="drugGlaucoma4">Taflotan</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="drugGlaucoma[]" id="drugGlaucoma5" value="Lanotan">
                    <label class="custom-control-label" for="drugGlaucoma5">Lanotan</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="retinal_date" class="font-weight-bold">จอประสาทตา</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="retinal_date" name="retinal_date" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="retinal_img">เลือกรูป</label>
                <input type="file" class="form-control-file" name="retinal_img" id="retinal_img" accept="image/*" onchange="loadFile(event,'retinalExample')">
                <div>
                    <img id="retinalExample" class="img-fluid img-thumbnail" style="max-width: 300px; max-height: 300px;" src="">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="ctvf_date" class="font-weight-bold">CTVF</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="ctvf_date" name="ctvf_date" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="ctvf_img">เลือกรูป</label>
                <input type="file" class="form-control-file" name="ctvf_img" id="ctvf_img" accept="image/*" onchange="loadFile(event,'ctvfExample')">
                <div>
                    <img id="ctvfExample" class="img-fluid img-thumbnail" style="max-width: 300px; max-height: 300px;" src="">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="oct_date" class="font-weight-bold">OCT</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="oct_date" name="oct_date" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="oct_img">เลือกรูป</label>
                <input type="file" class="form-control-file" name="oct_img" id="oct_img" accept="image/*" onchange="loadFile(event,'octExample')">
                <div>
                    <img id="octExample" class="img-fluid img-thumbnail" style="max-width: 300px; max-height: 300px;" src="">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="iop_date" class="font-weight-bold">เลือกวันที่</label>
                <input type="text" class="form-control mx-sm-3" id="iop_date" name="iop_date" value="">
            </div>
            <div class="form-group">
                <label for="iop_right" class="font-weight-bold">ขวา</label>
                <input type="text" class="form-control mx-sm-3" id="iop_right" name="iop_right" value="">
            </div>
            <div class="form-group">
                <label for="iop_left" class="font-weight-bold">ซ้าย</label>
                <input type="text" class="form-control mx-sm-3" id="iop_left" name="iop_left" value="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="retinal_date" class="font-weight-bold">ความดันลูกตา</label>
            </div>
            <table class="table">
                <tr>
                    <th>วันที่</th>
                    <th>02-07-63</th>
                    <th>10-07-63</th>
                    <th>13-07-63</th>
                    <th>15-07-63</th>
                    <th></th>
                </tr>
                <tr>
                    <td>ขวา</td>
                    <td>10</td>
                    <td>13</td>
                    <td>12</td>
                    <td>15</td>
                    <td></td>
                </tr>
                <tr>
                    <td>ซ้าย</td>
                    <td>10</td>
                    <td>-</td>
                    <td>11</td>
                    <td>-</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <button type="submit" class="btn btn-primary btn-lg btn-block" formenctype="multipart/form-data">บันทึกข้อมูล</button>
            <input type="hidden" name="action" value="save">
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