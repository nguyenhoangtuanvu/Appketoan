<?php 
    // hàng nhập xuất kho
    $queryInventoryHistory = mysqli_query($con, "SELECT * FROM `inventoryHistory` INNER JOIN `products` INNER JOIN `employee` ORDER BY `inventoryHistory`.`dateTime` ASC");
    $TableTotalProduct = 0;
    // kiểm kê kho
    $queryCheckInventoty = mysqli_query($con, "SELECT * FROM `checkinventory` INNER JOIN `inventory` INNER JOIN `products` WHERE checkinventory.productid = products.id ORDER BY `checkinventory`.`dateTimeFrom` ASC");
//    sản phẩm
    $Products = mysqli_query($con, "SELECT * FROM `products`");
    $tableTotalQuantity = 0;
    $tableTotalValue = 0;
?>
<div class="content-wrapper inventory sidebar--open">
    <div class="inventory-first-function inventory-function home-function">
        <div class="cash-first-wrap">
            <div class="cash-first-column-left">
                <div class="cash-operation">
                    <div class="cash-operation__heading">NGHIỆP VỤ KHO</div>
                    <div class="inventory-operation-content">
                        <div class="purchase-operation-box inventory-operation-box1">Lệnh sản xuất</div>
                        <div class="purchase-operation-box inventory-operation-box2">Xuất kho</div>
                        <div class="purchase-operation-box inventory-operation-box3">Chuyển kho</div>
                        <div class="purchase-operation-box inventory-operation-box4">Lắp ráp, tháo dỡ</div>
                        <div class="purchase-operation-box inventory-operation-box5">Nhập kho</div>
                        <div class="purchase-operation-box inventory-operation-box6">Tính giá xuất kho</div>
                        <div class="purchase-operation-box inventory-operation-box7">Kiểm kê</div>
                    </div>
                </div>
                <div class="cash-first-column-left-bottom">
                    <div class="cash-first-bottom-box3 purchase-first-width">
                        <div class="cash-icon-wrap">
                            <div class="cash-first-store-icon"></div>
                            <span class="cash-first-heading">Kho</span>
                        </div>
                    </div>
                    <div class="cash-first-bottom-box3 purchase-first-width">
                        <div class="cash-icon-wrap">
                            <div class="cash-first-inventory-icon"></div>
                            <span class="cash-first-heading">Vật tư hàng hóa</span>
                        </div>
                    </div>
                    <div class="cash-first-bottom-box3 purchase-first-width">
                        <div class="cash-icon-wrap">
                            <div class="cash-first-unit-icon"></div>
                            <span class="cash-first-heading">Đơn vị tính</span>
                        </div>
                    </div>
                    <div class="cash-first-bottom-box3 purchase-first-width">
                        <div class="cash-icon-wrap">
                            <div class="cash-first-tool-icon"></div>
                            <span class="cash-first-heading">Tiện ích</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="process-report">
                <div class="process-report__heading">Báo cáo</div>
                <ul class="process-report-list">
                    <li class="process-report-items">Sổ chi tiết vật liệu, dụng cụ, sản phẩm, hàng hóa</li>
                    <li class="process-report-items">Tổng hợp tồn kho</li>
                    <li class="process-report-items">Báo cáo tiến độ sản xuất</li>
                    <li class="process-report-items">Đối chiếu giá trị nhập, xuất kho của lệnh lắp ráp, tháo dỡ</li>
                    <li class="process-report-items">Tổng hợp nhập xuất tồn trên nhiều kho</li>
                </ul>
                <div class="process-report__footer">Tất cả báo cáo</div>
            </div>
        </div>
    </div>
    <div class="inventory-second-function inventory-function">
        <div class="second-header">
            <div class="second-header-heading">Danh sách hàng hóa dịch vụ</div>
            <button class="second-header__btn1">Thêm</button>
        </div>
        <div class="fourth-box">
            <div class="fourth-box1">
                <div class="fourth-box1-icon"></div>
                <div class="fourth-box__summary">
                    <div class="fourth-box__money orange-color text-align-right"><?= $productRunout ?></div>
                    <div class="fourth-box__money-title text-align-right">Hàng hóa</div>
                    <div class="fourth-box__money-summary text-align-right">Sắp hết hàng</div>
                </div>
            </div>
            <div class="fourth-box2">
                <div class="fourth-box2-icon"></div>
                <div class="fourth-box__summary">
                    <div class="fourth-box__money red-color"><?= $productOut ?></div>
                    <div class="fourth-box__money-title">Hàng hóa</div>
                    <div class="fourth-box__money-summary">Hết hàng</div>
                </div>
            </div>
        </div>
        <div class="second-content-nav">
            <ul class="second-content-nav__list">
                <li class="second-content-nav__items second-content-nav__items--active">Tất cả</li>
                <li class="second-content-nav__items">Nhập kho</li>
                <li class="second-content-nav__items">Xuất kho</li>
                <li class="second-content-nav__items">Chuyển kho</li>
            </ul>
        </div>
        <div class="second-content">
            <div class="second-content-wrap">
                <div class="second-content-header">
                    <div class="second-content__filter">
                        <span class="second-content__filter-label">Lọc</span>
                        <i class="fa-solid fa-angle-down"></i>
                        <div class="second-content-time-line__dropdown-list">
                            <span class="dropdown-label">Thu, chi</span>
                            <div class="dropdown-box-wrap"> 
                                <input type="text" class="dropdown-input" placeholder="Tất cả">
                                <i class="fa-solid fa-angle-down"></i>
                                <ul class="dropdown-box-list">
                                    <li class="dropdown-items dropdown-items--active">Tất cả</li>
                                    <li class="dropdown-items">Thu</li>
                                    <li class="dropdown-items">Chi</li>
                                </ul>
                            </div>
                            <span class="dropdown-label">Thời gian</span>
                            <div class="dropdown-box-wrap">
                                <input type="text" class="dropdown-input" placeholder="Hôm nay">
                                <i class="fa-solid fa-angle-down"></i>
                                <ul class="dropdown-box-list">
                                    <li class="dropdown-items dropdown-items--active">Hôm nay</li>
                                    <li class="dropdown-items">Tuần này</li>
                                    <li class="dropdown-items">Tháng này</li>
                                    <li class="dropdown-items">Tháng 1</li>
                                    <li class="dropdown-items">Tháng 2</li>
                                    <li class="dropdown-items">Tháng 3</li>
                                    <li class="dropdown-items">Tháng 4</li>
                                    <li class="dropdown-items">Tháng 5</li>
                                    <li class="dropdown-items">Tháng 6</li>
                                    <li class="dropdown-items">Tháng 7</li>
                                    <li class="dropdown-items">Tháng 8</li>
                                    <li class="dropdown-items">Tháng 9</li>
                                    <li class="dropdown-items">Tháng 10</li>
                                    <li class="dropdown-items">Tháng 11</li>
                                    <li class="dropdown-items">Tháng 12</li>
                                </ul>
                            </div>
                            <button class="dropdown-btn">Lọc</button>
                        </div>
                    </div>
                    <span class="second-content-filter__value">Hôm nay</span>
                    <div class="header-search">
                        <input type="text" class="header-search__input" placeholder="Nhập từ khóa tìm kiếm">
                        <div class="header-end__search-icon"></div>
                    </div>
                </div>   
                <div class="second-content-table">
                    <table class="second-table">
                        <thead class="second-table__thead">
                            <tr>
                                <th class="second-inventory-table__box1 table-header">Ngày hoạch toán</th>              
                                <th class="second-inventory-table__box2 table-header">STT</th>              
                                <th class="second-inventory-table__box3 table-header">Nội dung</th>              
                                <th class="second-inventory-table__box4 table-header">Hàng hóa</th>              
                                <th class="second-inventory-table__box5 table-header">Số lượng</th>              
                                <th class="second-inventory-table__box6 table-header">Người giao/ nhận</th>              
                                <th class="second-inventory-table__box7 table-header">Chức năng</th>              
                            </tr>
                        </thead> 
                        <tbody class="second-table__body">
                        <?php while($row = mysqli_fetch_array($queryInventoryHistory)) { 
                            $TableTotalProduct += $row['quantity'];
                        ?>
                            <tr>
                                <td class="second-inventory-table__box1 table-box"><?= $row['dateTime'] ?></td>              
                                <td class="second-inventory-table__box2 table-box">1</td>              
                                <td class="second-inventory-table__box3 table-box"><?= $row['content'] ?></td>              
                                <td class="second-inventory-table__box4 table-box"><?= $row['proname'] ?></td>              
                                <td class="second-inventory-table__box5 table-box"><?= $row['inventotyQuantity'] ?></td>              
                                <td class="second-inventory-table__box6 table-box"><?= $row['staffName'] ?></td>              
                                <td class="third-table__box6 table-box">
                                    <a href="#" class="third-table-see">Xem</a>
                                    <i class="fa-solid fa-angle-down"></i>
                                    <ul class="third-table-function-list">
                                        <li class="third-table-function-items">
                                            <a href="#" class="third-table-function__delete">Nhân bản</a>
                                        </li>
                                    </ul>
                                </td>              
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot class="second-table__footer">
                            <tr>
                                <th class="second-inventory-table__box1 footer-box">Tổng</th>         
                                <th class="second-inventory-table__box2 footer-box"></th>         
                                <th class="second-inventory-table__box3 footer-box"></th>         
                                <th class="second-inventory-table__box4 footer-box"></th>         
                                <th class="second-inventory-table__box5 footer-box"><?= number_format($TableTotalProduct, 0, ",",".") ?></th>         
                                <th class="second-inventory-table__box6 footer-box"></th>         
                                <th class="second-inventory-table__box7 footer-box"></th>         
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="second-footer">
                    <div class="second-footer__label">Tổng số: <span>3</span> bản ghi</div>
                    <div class="second-footer-right">
                        <div class="second-footer__prev">Trước</div>
                        <div class="second-footer__count-paging">1</div>
                        <div class="second-footer__next">Sau</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="inventory-third-function inventory-function">
        <div class="second-header">
            <div class="second-header-heading">Kiểm kê vật tư hàng hóa</div>
            <button class="second-header__btn1">Thêm bảng kiểm kê</button>
        </div>
        <div class="second-content">
            <div class="second-content-wrap">
                <div class="second-content-table">
                    <table class="second-table">
                        <thead class="second-table__thead">
                            <tr>
                                <th class="inventory-third-table__box1 table-header">Ngày</th>              
                                <th class="inventory-third-table__box2 table-header">Kiểm kê kho</th>              
                                <th class="inventory-third-table__box3 table-header">Đến ngày</th>              
                                <th class="inventory-third-table__box4 table-header">Mục đích</th>              
                                <th class="inventory-third-table__box5 table-header">Kết luận</th>              
                                <th class="third-table__box6 table-header">Chức năng</th>              
                            </tr>
                        </thead> 
                        <tbody class="second-table__body">
                            <?php 
                                $count = 0;
                                while($row = mysqli_fetch_array($queryCheckInventoty)) {  
                                    $count++;
                            ?>
                            <tr>
                                <td class="inventory-third-table__box1 table-box"><?= $row['dateTimeFrom'] ?></td>              
                                <td class="inventory-third-table__box2 table-box"><?= $row['name'] ?></td>              
                                <td class="inventory-third-table__box3 table-box"><?= $row['dateTimeTo'] ?></td>              
                                <td class="inventory-third-table__box4 table-box"><?= $row['content'] ?></td>              
                                <td class="inventory-third-table__box5 table-box"><?= $row['conclude'] ?></td>              
                                <td class="third-table__box6 table-box">
                                    <a href="#" class="third-table-see">Xem</a>
                                    <i class="fa-solid fa-angle-down"></i>
                                    <ul class="third-table-function-list">
                                        <li class="third-table-function-items">
                                            <a href="#" class="third-table-function__delete">Xóa</a>
                                        </li>
                                    </ul>
                                </td>              
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="second-footer">
                    <div class="second-footer__label">Tổng số: <span><?= $count ?></span> bản ghi</div>
                    <div class="second-footer-right">
                        <div class="second-footer__prev">Trước</div>
                        <div class="second-footer__count-paging">1</div>
                        <div class="second-footer__next">Sau</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="inventory-fourth-function inventory-function">
        <div class="second-header">
            <div class="second-header-heading">Danh sách hàng hóa dịch vụ</div>
            <button class="second-header__btn1">Thêm</button>
        </div>
        <div class="fourth-box">
            <div class="fourth-box1">
                <div class="fourth-box1-icon"></div>
                <div class="fourth-box__summary">
                    <div class="fourth-box__money orange-color text-align-right"><?= $productRunout ?></div>
                    <div class="fourth-box__money-title text-align-right">Hàng hóa</div>
                    <div class="fourth-box__money-summary text-align-right">Sắp hết hàng</div>
                </div>
            </div>
            <div class="fourth-box2">
                <div class="fourth-box2-icon"></div>
                <div class="fourth-box__summary">
                    <div class="fourth-box__money red-color"><?= $productOut ?></div>
                    <div class="fourth-box__money-title">Hàng hóa</div>
                    <div class="fourth-box__money-summary">Hết hàng</div>
                </div>
            </div>
        </div>
        <div class="second-content-nav">
            <ul class="second-content-nav__list">
                <li class="second-content-nav__items second-content-nav__items--active">Tất cả</li>
                <li class="second-content-nav__items">Nhập kho</li>
                <li class="second-content-nav__items">Xuất kho</li>
                <li class="second-content-nav__items">Chuyển kho</li>
            </ul>
        </div>
        <div class="second-content">
            <div class="second-content-wrap">
                <div class="second-content-header">
                    <div class="second-content__filter">
                        <span class="second-content__filter-label">Lọc</span>
                        <i class="fa-solid fa-angle-down"></i>
                        <div class="second-content-time-line__dropdown-list">
                            <span class="dropdown-label">Thu, chi</span>
                            <div class="dropdown-box-wrap"> 
                                <input type="text" class="dropdown-input" placeholder="Tất cả">
                                <i class="fa-solid fa-angle-down"></i>
                                <ul class="dropdown-box-list">
                                    <li class="dropdown-items dropdown-items--active">Tất cả</li>
                                    <li class="dropdown-items">Thu</li>
                                    <li class="dropdown-items">Chi</li>
                                </ul>
                            </div>
                            <span class="dropdown-label">Thời gian</span>
                            <div class="dropdown-box-wrap">
                                <input type="text" class="dropdown-input" placeholder="Hôm nay">
                                <i class="fa-solid fa-angle-down"></i>
                                <ul class="dropdown-box-list">
                                    <li class="dropdown-items dropdown-items--active">Hôm nay</li>
                                    <li class="dropdown-items">Tuần này</li>
                                    <li class="dropdown-items">Tháng này</li>
                                    <li class="dropdown-items">Tháng 1</li>
                                    <li class="dropdown-items">Tháng 2</li>
                                    <li class="dropdown-items">Tháng 3</li>
                                    <li class="dropdown-items">Tháng 4</li>
                                    <li class="dropdown-items">Tháng 5</li>
                                    <li class="dropdown-items">Tháng 6</li>
                                    <li class="dropdown-items">Tháng 7</li>
                                    <li class="dropdown-items">Tháng 8</li>
                                    <li class="dropdown-items">Tháng 9</li>
                                    <li class="dropdown-items">Tháng 10</li>
                                    <li class="dropdown-items">Tháng 11</li>
                                    <li class="dropdown-items">Tháng 12</li>
                                </ul>
                            </div>
                            <button class="dropdown-btn">Lọc</button>
                        </div>
                    </div>
                    <span class="second-content-filter__value">Hôm nay</span>
                    <div class="header-search">
                        <input type="text" class="header-search__input" placeholder="Nhập từ khóa tìm kiếm">
                        <i class="fa-solid fa-magnifying-glass header-end__search-icon"></i>
                    </div>
                </div>   
                <div class="second-content-table">
                    <table class="second-table">
                        <thead class="second-table__thead">
                            <tr>
                                <th class="second-goods-table__box1 table-header">Tên</th>              
                                <th class="second-goods-table__box2 table-header">Mã</th>              
                                <th class="second-goods-table__box3 table-header">Loại mặt hàng</th>              
                                <th class="second-goods-table__box4 table-header">Số lượng tồn</th>              
                                <th class="second-goods-table__box5 table-header">Giá trị tồn</th>              
                                <th class="second-goods-table__box6 table-header">Chức năng</th>              
                            </tr>
                        </thead> 
                        <tbody class="second-table__body">
                        <?php
                            $count2 = 0;
                            while($row = mysqli_fetch_array($Products)) { 
                            $value = $row['quantity'] * $row['price'];
                            $tableTotalQuantity += $row['quantity'];
                            $tableTotalValue += $value;
                            $count2++;
                        ?>
                            <tr>
                                <td class="second-goods-table__box1 table-box"><?= $row['proname'] ?></td>              
                                <td class="second-goods-table__box2 table-box">D001</td>              
                                <td class="second-goods-table__box3 table-box"><?= $row['nature'] ?></td>              
                                <td class="second-goods-table__box4 table-box"><?= number_format($row['quantity'], 0, ",",".") ?></td>              
                                <td class="second-goods-table__box5 table-box"><?= number_format($value, 0, ",",".") ?></td>              
                                <td class="third-table__box6 table-box">
                                    <a href="#" class="third-table-see">Sửa</a>
                                    <i class="fa-solid fa-angle-down"></i>
                                    <ul class="third-table-function-list">
                                        <li class="third-table-function-items">
                                            <a href="#" class="third-table-function__delete">Nhân bản</a>
                                        </li>
                                        <li class="third-table-function-items">
                                            <a href="#" class="third-table-function__delete">Xóa</a>
                                        </li>
                                    </ul>
                                </td>              
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot class="second-table__footer">
                            <tr>
                                <th class="second-goods-table__box1 footer-box">Tổng</th>         
                                <th class="second-goods-table__box2 footer-box"></th>         
                                <th class="second-goods-table__box3 footer-box"></th>         
                                <th class="second-goods-table__box4 footer-box"><?= number_format($tableTotalQuantity, 0, ",",".") ?></th>         
                                <th class="second-goods-table__box5 footer-box"><?= number_format($tableTotalValue, 0, ",",".") ?></th>         
                                <th class="second-goods-table__box6 footer-box"></th>         
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="second-footer">
                    <div class="second-footer__label">Tổng số: <span><?= $count2 ?></span> bản ghi</div>
                    <div class="second-footer-right">
                        <div class="second-footer__prev">Trước</div>
                        <div class="second-footer__count-paging">1</div>
                        <div class="second-footer__next">Sau</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>