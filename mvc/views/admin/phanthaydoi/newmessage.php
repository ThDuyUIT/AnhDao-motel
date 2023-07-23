<div class="container_homepage">
    <h3 class="title">Tin nhắn gửi đến bạn</h3>
    <table class="table is-fullwidth main_content has-text-centered" id="tbl_data">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ và Tên</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Ngày gửi</th>
                    <th>Xem chi tiết</th>
                </tr>
            </thead>
                
                <?php
                    if(isset($data["get_NewMessage"])){ 
                        $listNewMessage = json_decode($data["get_NewMessage"], true); 
                        $stt = 1;
                ?>
            <tbody>
                <?php
                    if(!empty($listNewMessage)){ 
                        foreach ($listNewMessage as $row) {
                            echo '<tr>
                                <td>'.$stt.'</td>
                                <td>'.$row['HoTen'].'</td>
                                <td>'.$row['SDT'].'</td>
                                <td>'.$row['Email'].'</td>
                                <td>'.$row['MaTN'].'</td>
                                <td><a href="./admin/detailMessage/'.$row['MaTN'].'" class="ti-eye"></a></td>
                            </tr>';
                    
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