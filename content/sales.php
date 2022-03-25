<?php 
// khách hàng nợ
    $queryCusDebt = mysqli_query($con, "SELECT * FROM `customerdebt`");
    $DebtCusOver = 0;
    $TotalDebtCollect = 0;
    $TotalCusCollected = 0;
    $notInvoice = 0;
    $now = date("y-m-d");
    while($row = mysqli_fetch_array($queryCusDebt)) {
        if($row['collect'] == 'collect') {
            $TotalDebtCollect += $row['debt'];
        }
        if($row['collect'] == 'collect' & strtotime($now) > strtotime($row['duration'])) {
            $DebtCusOver += $row['debt'];
        }
        if($row['collect'] == 'collected') {
            $TotalCusCollected += $row['debt'];
        }
    }
    $querySalesNotInvice = mysqli_query($con, "SELECT * FROM `sales`");
    while($row = mysqli_fetch_array($querySalesNotInvice)) {
        if($row['invoice'] == 1) {
            $notInvoice++;
        }
    }
    // bán hàng
    $querySales = mysqli_query($con, "SELECT * FROM `sales` INNER JOIN `customer` ORDER BY `sales`.`dateTime` ASC");
    $TableTotalMoney = 0;
    $salesCount = 0;
    // Khách hàng
    $queryCustomer = mysqli_query($con, "SELECT * FROM `customer` INNER JOIN `customerDebt`");
    $count = 0;
//    sản phẩm
    $Products = mysqli_query($con, "SELECT * FROM `products`");
    $tableTotalQuantity = 0;
    $tableTotalValue = 0;
?>
<div class="content-wrapper sales sidebar--open">
    <div class="sales-first-function sales-function home-function">
        <div class="cash-first-wrap">
            <div class="cash-first-column-left">
                <div class="cash-operation">
                    <div class="cash-operation__heading">NGHIỆP VỤ MUA HÀNG</div>
                    <div class="sales-operation-content">
                        <div class="purchase-operation-box sales-operation-box1">Báo giá</div>
                        <div class="purchase-operation-box sales-operation-box2">Ghi nhận doanh thu</div>
                        <div class="purchase-operation-box sales-operation-box3">Trả lại hàng bán</div>
                        <div class="purchase-operation-box sales-operation-box4">Thu tiền theo hóa đơn</div>
                        <div class="purchase-operation-box sales-operation-box5">Đơn đặt hàng</div>
                        <div class="purchase-operation-box sales-operation-box6">Hợp đồng bán</div>
                        <div class="purchase-operation-box sales-operation-box7">Xuất hóa đơn</div>
                        <div class="purchase-operation-box sales-operation-box8">Giảm giá hàng bán</div>
                    </div>
                </div>
                <div class="cash-first-column-left-bottom">
                    <div class="banking-first-banking purchase-first-width">
                        <div class="cash-icon-wrap">
                            <div class="cash-first-customer-icon"></div>
                            <span class="cash-first-heading">khách hàng</span>
                        </div>
                    </div>
                    <div class="cash-first-bottom-box3 purchase-first-width">
                        <div class="cash-icon-wrap">
                            <div class="cash-first-inventory-icon"></div>
                            <span class="cash-first-heading">Hàng hóa dịch vụ</span>
                        </div>
                    </div>
                    <div class="cash-first-bottom-box3 purchase-first-width">
                        <div class="cash-icon-wrap">
                            <div class="cash-first-service-icon"></div>
                            <span class="cash-first-heading">Điều khoản thanh toán</span>
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
                    <li class="process-report-items">Sổ chi tiết doanh thu bán hàng hóa, dịch vụ</li>
                    <li class="process-report-items">Sổ chi tiết bán hàng</li>
                    <li class="process-report-items">Chi tiết công nợ phải thu khách hàng</li>
                    <li class="process-report-items">Tổng hợp bán hàng theo mặt hàng</li>
                    <li class="process-report-items">Tổng hợp công nợ phải thu khách hàng</li>
                </ul>
                <div class="process-report__footer">Tất cả báo cáo</div>
            </div>
        </div>
    </div>
    <div class="sales-second-function sales-function">
        <div class="second-header">
            <div class="second-header-heading">Giao dịch bán hàng</div>
            <button class="second-header__btn1">Thêm</button>
        </div>
        <div class="second-box">
            <div class="sales-second-box1">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= number_format($revenuYear, 0, ",",".") ?></div>
                    <div class="second-box__money-title">Doanh thu trong năm</div>
                </div>
            </div>
            <div class="sales-second-box2">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= number_format($notInvoice, 0, ",",".") ?></div>
                    <div class="second-box__money-title">Chưa xuất hóa đơn</div>
                </div>
            </div>
            <div class="sales-second-box3">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= number_format($DebtCusOver, 0, ",",".") ?></div>
                    <div class="second-box__money-title">Nợ quá hạn</div>
                </div>
            </div>
            <div class="sales-second-box4">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= number_format($TotalDebtCollect, 0, ",",".") ?></div>
                    <div class="second-box__money-title">Tổng nợ phải thu</div>
                </div>
            </div>
            <div class="sales-second-box5">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= number_format($TotalCusCollected, 0, ",",".") ?></div>
                    <div class="second-box__money-title">Đã thanh toán</div>
                </div>
            </div>
        </div>
        <div class="second-content-nav">
            <ul class="second-content-nav__list">
                <li class="second-content-nav__items second-content-nav__items--active">Bán hàng</li>
                <li class="second-content-nav__items">Hóa đơn</li>
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
                                <th class="sales-second-table__box1 table-header">Ngày hoạch toán</th>              
                                <th class="sales-second-table__box2 table-header">Số hóa đơn</th>              
                                <th class="sales-second-table__box3 table-header">Khách hàng</th>              
                                <th class="sales-second-table__box4 table-header">Tổng tiền thanh toán</th>              
                                <th class="sales-second-table__box5 table-header">TT lập hóa đơn</th>              
                                <th class="sales-second-table__box6 table-header">Chức năng</th>              
                            </tr>
                        </thead> 
                        <tbody class="second-table__body">
                            <?php while($row = mysqli_fetch_array($querySales)) {
                                $TableTotalMoney += $row['totalMoney'];
                                $invoice = $row['invoice'] == '1' ? 'Chưa lập' : 'Đã lập' ;
                                $salesCount++; 
                            ?>
                            <tr>
                                <td class="sales-second-table__box1 table-box"><?= $row['dateTime'] ?></td>              
                                <td class="sales-second-table__box2 table-box">1</td>              
                                <td class="sales-second-table__box3 table-box"><?= $row['name'] ?></td>              
                                <td class="sales-second-table__box4 table-box"><?= number_format($row['totalMoney'], 0, ",",".") ?></td>              
                                <td class="sales-second-table__box5 table-box"><?= $invoice ?></td>              
                                <td class="third-table__box6 table-box">
                                    <a href="#" class="third-table-see">Phát hành hóa đơn</a>
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
                                <th class="second-table__box1 footer-box">Tổng</th>         
                                <th class="second-table__box2 footer-box"></th>         
                                <th class="second-table__box3 footer-box"></th>         
                                <th class="second-table__box4 footer-box"><?= number_format($TableTotalMoney, 0, ",",".") ?></th>         
                                <th class="second-table__box5 footer-box"></th>         
                                <th class="second-table__box6 footer-box"></th>         
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="second-footer">
                    <div class="second-footer__label">Tổng số: <span><?= $salesCount ?></span> bản ghi</div>
                    <div class="second-footer-right">
                        <div class="second-footer__prev">Trước</div>
                        <div class="second-footer__count-paging">1</div>
                        <div class="second-footer__next">Sau</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sales-third-function sales-function">
        <div class="second-header">
            <div class="second-header-heading">Danh sách Khách hàng</div>
            <button class="second-header__btn1">Thêm</button>
        </div>
        <div class="second-box">
            <div class="second-box1">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= number_format($DebtCusOver, 0, ",",".") ?></div>
                    <div class="second-box__money-title">Nợ quá hạn</div>
                </div>
            </div>
            <div class="second-box2">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= number_format($TotalDebtCollect, 0, ",",".") ?></div>
                    <div class="second-box__money-title">Tổng nợ phải thu</div>
                </div>
            </div>
            <div class="second-box3">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= number_format($TotalCusCollected, 0, ",",".") ?></div>
                    <div class="second-box__money-title">Đã thanh toán</div>
                </div>
            </div>
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
                                <th class="second-sup-table__box1 table-header">Mã nhà cung cấp</th>              
                                <th class="second-sup-table__box2 table-header">Tên Khách hàng</th>              
                                <th class="second-sup-table__box3 table-header">Đại chỉ</th>              
                                <th class="second-sup-table__box4 table-header">Công nợ</th>              
                                <th class="second-sup-table__box5 table-header">Số điện thoại</th>              
                                <th class="second-sup-table__box6 table-header">Chức năng</th>              
                            </tr>
                        </thead> 
                        <tbody class="second-table__body">
                        <?php while($row = mysqli_fetch_array($queryCustomer)) { 
                            $debt = $row['collect'] == 'collect' ? $debt = $row['debt'] : $debt = 0;
                            $count++;
                        ?>
                            <tr>
                                <td class="second-sup-table__box1 table-box"><?= $row['id'] ?></td>              
                                <td class="second-sup-table__box2 table-box"><?= $row['name'] ?></td>              
                                <td class="second-sup-table__box3 table-box"><?= $row['location'] ?></td>              
                                <td class="second-sup-table__box4 table-box"><?= number_format($debt, 0, ",",".") ?></td>              
                                <td class="second-sup-table__box5 table-box"><?= $row['phoneNumber'] ?></td>              
                                <td class="third-table__box6 table-box">
                                    <a href="#" class="third-table-see">Lập CT bán hàng</a>
                                    <i class="fa-solid fa-angle-down"></i>
                                    <ul class="third-table-function-list">
                                        <li class="third-table-function-items">
                                            <a href="#" class="third-table-function__delete">Xem</a>
                                        </li>
                                        <li class="third-table-function-items">
                                            <a href="#" class="third-table-function__delete">Sửa</a>
                                        </li>
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
    <div class="sales-fourth-function sales-function">
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
                                <th class="second-goods-table__box4 footer-box">1.000</th>         
                                <th class="second-goods-table__box5 footer-box">10.000.000</th>         
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