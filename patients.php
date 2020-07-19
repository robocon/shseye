<?php 
$db = Mysql::load();

$part = input('part');
$where = '';
if (!empty($part) && $part === 'searchAction') {
    $search = input_post('search');
    $where = "AND (a.`name` LIKE '%$search%' OR a.`surname` LIKE '%$search%') ";
}


?>
<div class="row"><div class="col-md">&nbsp;</div></div>
<div class="jumbotron">
    <h1>ข้อมูลการรักษา</h1>
</div>
<div class="row">
    <div class="col-md">
        <form action="index.php?page=patients" method="post">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <input type="text" class="form-control mb-2" placeholder="ค้นหาตามชื่อ" name="search">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">ค้นหา</button>
                    <input type="hidden" name="part" value="searchAction">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <?php 
        $sql = "SELECT a.*,b.`dateTreatment`,b.`diag`,b.`id` AS `treatmentId` 
        FROM `patients` AS a 
        LEFT JOIN `treatment` AS b ON b.`patientId` = a.`id` 
        WHERE a.`status` = 1 AND b.`status` = 1 
        $where 
        ORDER BY a.`id` DESC ";
        $db->select($sql);
        if ($db->get_rows() > 0) {
            $items = $db->get_items();
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">วันที่ทำการรักษา</th>
                        <th scope="col">ชื่อ-สกุล</th>
                        <th scope="col">อายุ</th>
                        <th scope="col">Diag</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $i = 0;
                foreach ($items as $key => $item) { 
                    ++$i;
                    $diag = json_decode($item['diag']);
                    ?>
                    <tr>
                        <th scope="row"><?=$i;?></th>
                        <td><?=$item['dateTreatment'];?></td>
                        <td><?=$item['yot'].$item['name'].' '.$item['surname'];?></td>
                        <td><?=$item['age'];?></td>
                        <td><?=implode(', ', $diag);?></td>
                        <td class="mx-auto">
                            <a href="index.php?page=form&part=edit&id=<?=$item['id'];?>&treatment=<?=$item['treatmentId'];?>" ><span class="icon"><i class="fas fa-user-edit" title="แก้ไขข้อมูล"></i></span></a>
                            <a href="index.php?action=deleteTreatment&id=<?=$item['treatmentId'];?>" onclick="return uConfirm();"><span class="icon"><i class="fas fa-trash-alt" title="ลบข้อมูล"></i></span></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <?php
        }else{
            ?><p>ไม่พบข้อมูล</p><?php
        }
        ?>
    </div>
</div>
<script>
function uConfirm(){
    return confirm("ยืนยันการลบข้อมูล");
}
</script>