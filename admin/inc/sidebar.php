<div class="grid_2">
    <div class="box sidemenu">
        <div class="block" id="section-menu">
            <ul class="section menu">
                <li><a class="menuitem">Quản lí khóa học</a>
                    <ul class="submenu">
                        <li><a href="khoahocadd.php">Thêm khóa học</a> </li>
                        <li><a href="khoahoclist.php">Tất cả khóa học</a> </li>
                    </ul>
                </li>
                <li><a class="menuitem">Quản lí chủ đề</a>
                    <ul class="submenu">
                        <li><a href="chudeadd.php">Thêm chủ đề</a> </li>
                        <li><a href="chudelist.php">Tất cả chủ đề</a> </li>
                    </ul>
                </li>
                <li><a class="menuitem">Quản lí bài học</a>
                    <ul class="submenu">
                        <li><a href="baihocadd.php">Thêm bài học</a> </li>
                        <li><a href="baihoclist.php">Tất cả bài học</a> </li>
                    </ul>
                </li>
                <li><a class="menuitem">Quản lí bình luận</a>
                    <ul class="submenu">
                        <li><a href="binhluan.php">Bài học được bình luận</a> </li>
                    </ul>
                </li>
                <li><a class="menuitem">Lịch sử học thành viên</a>
                    <ul class="submenu">
                        <li><a href="lichsulist.php">Xem chi tiết</a> </li>
                    </ul>
                </li>
                <?php 
                    if (Session::get("id_tk") == 1) {
                 ?>
                <li><a class="menuitem">Quản lí tài khoản</a>
                    <ul class="submenu">
                        <li><a href="tklist.php"><i class="fa fa-address-book-o"> </i> Xem tất cả!!!</a> </li>
                    </ul>
                </li>
                <li><a class="menuitem">Cài đặt Site</a>
                    <ul class="submenu">
                        <li><a href="settingedit.php">Show tất cả</a></li>                        
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>