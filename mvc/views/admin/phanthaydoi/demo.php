        <?php
            header('Content-Disposition: attachment;filename="export.xlsx"'); // Trả về file đính kèm
            header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet'); // Trả về file excel 2007 trở lên
            header('Content-Length: '.filesize('export.xlsx')); // Trả về dung lượng file
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: no-cache');
            readfile('export.xlsx');
            return;
        ?>