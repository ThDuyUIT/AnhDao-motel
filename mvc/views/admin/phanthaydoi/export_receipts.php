
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div class="container_homepage">
    <h3 class="title">Xuất hóa đơn.</h3>
    <?php $listYears = json_decode($data["get_years"], true)?>
    <form action="./admin/export_receipts" method="POST">
        <div class="form_admin">
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Tháng</label>
                    </div>
                    <select name="sltMonths">
                        <?php $i = 1;?>
                        <?php while($i < 13){?>
                            <option value="<?php echo $i?>"><?php echo $i?></option>
                        <?php $i++;
                        }?>
                    </select>
                    
                </div> 
                <div class="column">
                    <div>
                        <label>Năm</label>
                    </div>
                    <select name="sltYears">
                        <?php foreach ($listYears as $row) {?>
                            <option value="<?php echo $row["Nam"]?>">
                                <?php echo $row["Nam"]?>
                            </option>
                        <?php }?>
                    </select>
                </div>
            </div>     
            
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <button class="button is-primary" name="btnDownload">Tải xuống</button>
                    </div>
                </div>
            </div>      
        </div>
    </form>
</div>

<script>
    function Fail(){
        swal(
            'Truy xuất dữ liệu không thành công',
            'Không tồn tại dữ liệu phù hợp với mốc thời gian.',
            'warning'
        );
    }
</script>

<?php
    if(isset($data["result_check_time"])){
        if(!$data["result_check_time"]){
            echo '<script type="text/javascript">Fail();</script>';
        }
    }
?>