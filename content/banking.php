<?php 
// tổng thu cả năm
    $queryRevenuYear = mysqli_query($con, "SELECT YEAR(dateTime), `totalMoney`  FROM `sales` ORDER BY `sales`.`dateTime` ASC");
    $revenuYear = 0;
    $now = getdate();
    while($row = mysqli_fetch_array($queryRevenuYear)) {
        if($row['YEAR(dateTime)'] == $now['year']) {
            $revenuYear += $row['totalMoney'];
        }
    }
    // tổng chi cả năm
    $queryCostYear = mysqli_query($con, "SELECT YEAR(dateTime), `quantity`, `price`  FROM `purchase` ORDER BY `purchase`.`dateTime` ASC");
    $CostYear = 0;
    while($row = mysqli_fetch_array($queryCostYear)) {
        $totalMoney = $row['quantity'] * $row['price'];
        if($row['YEAR(dateTime)'] == $now['year'])
        $CostYear += $totalMoney;
    }
    // tồn tiền cả năm
    $queryExistYear = mysqli_query($con, "SELECT YEAR(dateTime), `budget`  FROM `budget` ORDER BY `budget`.`dateTime` ASC");
    $ExistYear = 0;
    while($row = mysqli_fetch_array($queryExistYear)) {
        if($row['YEAR(dateTime)'] == $now['year']) {
            $ExistYear += $row['budget'];
        }
    }
    // query tiền mặt
    $queryBanking = mysqli_query($con, "SELECT * FROM `banking` ORDER BY `banking`.`dateTime` ASC");
    $bankingTotal = 0;
?>
<div class="content-wrapper banking sidebar--open">
    <div class="banking-first-function banking-function home-function">
        <div class="cash-first-wrap">
            <div class="cash-first-column-left">
                <div class="cash-operation">
                    <div class="cash-operation__heading">NGHIỆP VỤ TIỀN GỬI</div>
                    <div class="cash-operation-content">
                        <div class="purchase-operation-box cash-operation-box1">Thu tiền</div>
                        <div class="purchase-operation-box cash-operation-box2">Chi tiền</div>
                        <div class="purchase-operation-box cash-operation-box3">Đối chiếu ngân hàng</div>
                    </div>
                </div>
                <div class="cash-first-column-left-bottom">
                    <div class="banking-first-banking">
                        <div class="cash-icon-wrap">
                            <div class="cash-first-banking-icon"></div>
                            <span class="cash-first-heading">Khách hàng</span>
                        </div>
                    </div>
                    <div class="cash-first-bottom-box3 banking-first-width">
                        <div class="cash-icon-wrap">
                            <div class="cash-first-customer-icon"></div>
                            <span class="cash-first-heading">Khách hàng</span>
                        </div>
                    </div>
                    <div class="cash-first-bottom-box3 banking-first-width cash-first-bottom-box-center">
                        <div class="cash-icon-wrap">
                            <div class="cash-first-supplier-icon"></div>
                            <span class="cash-first-heading">Nhà cung cấp</span>
                        </div>
                    </div>
                    <div class="cash-first-bottom-box3 banking-first-width">
                        <div class="cash-icon-wrap">
                            <div class="cash-first-employee-icon"></div>
                            <span class="cash-first-heading">Nhân viên</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="process-report">
                <div class="process-report__heading">Báo cáo</div>
                <ul class="process-report-list">
                    <li class="process-report-items">Sổ chi phí, sản xuất kinh doanh</li>
                    <li class="process-report-items">Sổ tiền gửi ngân hàng</li>
                    <li class="process-report-items">Bảng kê số dư ngân hàng</li>
                    <li class="process-report-items">Bảng kê số dư theo ngày</li>
                </ul>
                <div class="process-report__footer">Tất cả báo cáo</div>
            </div>
        </div>
    </div>
    <div class="banking-second-function banking-function">
        <div class="second-header">
            <div class="second-header-heading">Thu chi tiền mặt</div>
            <button class="second-header__btn1">Thêm thu tiền</button>
            <button class="second-header__btn2">Thêm chi tiền</button>
        </div>
        <div class="second-box">
            <div class="second-box1">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= $revenuYear ?></div>
                    <div class="second-box__money-title">Tổng thu đầu năm đến hiện tại</div>
                </div>
            </div>
            <div class="second-box2">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= $CostYear ?></div>
                    <div class="second-box__money-title">Tổng chi đầu năm đến hiện tại</div>
                </div>
            </div>
            <div class="second-box3">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= $ExistYear ?></div>
                    <div class="second-box__money-title">Tồn quỹ hiện tại</div>
                </div>
            </div>
        </div>
        <div class="second-content-nav">
            <ul class="second-content-nav__list">
                <li class="second-content-nav__items second-content-nav__items--active">Tất cả</li>
                <li class="second-content-nav__items">Thu tiền</li>
                <li class="second-content-nav__items">Chi tiền</li>
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
                                <th class="second-table__box1 table-header">Ngày hoạch toán</th>              
                                <th class="second-table__box2 table-header">STT</th>              
                                <th class="second-table__box3 table-header">Nội dung</th>              
                                <th class="second-table__box4 table-header">Số tiền</th>              
                                <th class="second-table__box5 table-header">Đối tượng</th>              
                                <th class="second-table__box6 table-header">Thu/chi</th>              
                            </tr>
                        </thead> 
                        <tbody class="second-table__body">
                        <?php while($row = mysqli_fetch_array($queryBanking)) { 
                            $bankingTotal += $row['totalAmount'];    
                        ?>
                            <tr>
                                <td class="second-table__box1 table-box"><?= $row['dateTime'] ?></td>              
                                <td class="second-table__box2 table-box"><?= $row['id'] ?></td>              
                                <td class="second-table__box3 table-box"><?= $row['content'] ?></td>              
                                <td class="second-table__box4 table-box"><?= number_format($row['totalAmount'], 0, ",",".") ?></td>              
                                <td class="second-table__box5 table-box"><?= $row['object'] ?></td>              
                                <td class="third-table__box6 table-box">
                                    <a href="#" class="third-table-see">Xem</a>
                                    <i class="fa-solid fa-angle-down"></i>
                                    <ul class="third-table-function-list">
                                        <li class="third-table-function-items">
                                            <a href="#" class="third-table-function__link">Nhân bản</a>
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
                                <th class="second-table__box4 footer-box"><?= number_format($bankingTotal, 0, ",",".") ?></th>         
                                <th class="second-table__box5 footer-box"></th>         
                                <th class="second-table__box6 footer-box"></th>         
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
    <div class="banking-third-function banking-function"></div>
</div>