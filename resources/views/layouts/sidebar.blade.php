<aside>
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav>
            <ul class="nav flex-column pt-2" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#sales" class="nav-link " data-toggle="collapse">
                        <i class="fa-solid fa-cart-shopping i-sidebar"></i>
                        <p>Bán hàng</p><span class="float-right badge badge-danger mr-2">Sales</span>
                    </a>
                    <div class="pl-4">
                        <a href="#" class="nav-link nav-dropdown collapse" id="sales">
                            <p>Bán hàng</p>
                        </a>
                        <a href="#" class="nav-link nav-dropdown collapse" id="sales">
                            <p>Đơn hàng</p>
                        </a>
                        <a href="#" class="nav-link nav-dropdown collapse" id="sales">
                            <p>Đơn hàng của bản ăn</p>
                        </a>
                        <a href="#" class="nav-link nav-dropdown collapse" id="sales">
                            <p>Khách hàng</p>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#restaurant" class="nav-link" data-toggle="collapse">
                        <i class="fa-solid fa-plate-wheat i-sidebar"></i>
                        <p>Món ăn</p><span class="float-right badge badge-danger mr-2">Sales</span>
                    </a>
                    <div class="pl-4">
                        <a href="{{ route('dishes') }}" class="nav-link nav-dropdown collapse" id="restaurant">
                            <p>Thêm món ăn</p>
                        </a>
                        <a href="#" class="nav-link nav-dropdown collapse" id="restaurant">
                            <p>Bàn ăn</p>
                        </a>
                        <a href="{{ route('foodgrs') }}" class="nav-link nav-dropdown collapse" id="restaurant">
                            <p>Nhóm món ăn</p>
                        </a>
                        <a href="#" class="nav-link nav-dropdown collapse" id="restaurant">
                            <p>Giá món ăn</p>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#hrm" class="nav-link" data-toggle="collapse">
                        <i class="fa-solid fa-handshake i-sidebar"></i>
                        <p>Nhân sự</p>
                    </a>
                    <div class="pl-4">
                        <a href="#" class="nav-link nav-dropdown collapse" id="hrm">
                            <p>Nhân viên</p>
                        </a>
                        <a href="#" class="nav-link nav-dropdown collapse" id="hrm">
                            <p>Đăng ký</p>
                        </a>
                        <a href="#" class="nav-link nav-dropdown collapse" id="hrm">
                            <p>Phân công</p>
                        </a>
                        <a href="#" class="nav-link nav-dropdown collapse" id="hrm">
                            <p>Ca làm</p>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#bills" class="nav-link" data-toggle="collapse">
                        <i class="fa-solid fa-file-invoice i-sidebar"></i>
                        <p>Quản lý hóa đơn</p>
                    </a>
                    <div class="pl-4">
                        <a href="#" class="nav-link nav-dropdown collapse" id="bills">
                            <p>Hóa đơn bán</p>
                        </a>
                        <a href="#" class="nav-link nav-dropdown collapse" id="bills">
                            <p>Doanh thu</p>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</aside>
