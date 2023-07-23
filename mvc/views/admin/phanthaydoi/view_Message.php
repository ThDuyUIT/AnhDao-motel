<?php $Message = json_decode($data["get_oneMess"], true)?>
<div class="container_homepage">
    <h3 class="title">Chi tiết tin nhắn</h3>
    <?php foreach ($Message as $row) {?>
    <table class="table is-hoverable is-fullwidth main_content">
        <thead>
            <tr>
                <th>Tin nhắn gửi từ: <?php echo $row["HoTen"]?></th>
                <th>Thời gian gửi: <?php echo $row["MaTN"]?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">Số điện thoại: <?php echo $row["SDT"]?></td>
                
            </tr>

            <tr>
                <td colspan="2">Email: <?php echo $row["Email"]?></td>
            </tr>

            <tr>
                <td colspan="2">Nội dung tin nhắn: <?php echo $row["NoiDung"]?> 
                    <br>
                    <a class="button is-danger" style="margin-top:10px" onclick="delete_action('<?php echo $row['MaTN']?>')">Xóa</a>
                </td>
                
            </tr>
        </tbody>
    </table>
    <?php }?>
</div>

<script>
    function delete_action(maTN) {
        swal({
            title: "Bạn muốn xóa tin nhắn này không?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willValid) => {
            if (willValid) {
                swal("Bạn đã xóa thành công.", {
                    icon: "success",
                }).then(()=>{window.location.href = "./admin/deleteMess/" + maTN;});
                
            }else {
                swal("Thao tác xóa của bạn đã được thu hồi.");
            }
        });
        
    }
</script>