<div class="container_homepage">
    <h3 class="title">Danh sách hóa đơn.</h3>
    <table class="table is-fullwidth main_content has-text-centered" id="tbl_data">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên hóa đơn</th>
                    <th>Năm</th>
                </tr>
            </thead>
                
                <?php
                    if(isset($data["list_receipts"])){ 
                        $list_receipts = json_decode($data["list_receipts"], true); 
                        $stt = 1;
                ?>
            <tbody>
                <?php
                    if(!empty($list_receipts)){ 
                        foreach ($list_receipts as $row) {
                            echo '<tr>
                                <td>'.$stt.'</td>
                                <td>'.$row['TenHD'].'</td>
                                <td>'.$row['Nam'].'</td>
                            </tr>';
                            $stt++;
                        }
                    }else{
                        echo '<tr>
                            <td colspan="7">Hiện không có dữ liệu tương ứng để hiện thị.</td>
                        </tr>';
                    }
                }
                ?>
               
            </tbody>
    </table>
</div>