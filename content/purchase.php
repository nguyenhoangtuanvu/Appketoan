<?php 
// tổng nợ quá hạn
    $querySupDebt = mysqli_query($con, "SELECT * FROM `supplierdebt`");
    $DebtOver = 0;
    $TotalDebtPay = 0;
    $TotalPaid = 0;
    $now = date("y-m-d");
    while($row = mysqli_fetch_array($querySupDebt)) {
        if($row['paid'] == 'unpaid') {
            $TotalDebtPay += $row['debt'];
        }
        if($row['paid'] == 'unpaid' & strtotime($now) > strtotime($row['duration'])) {
            $DebtOver += $row['debt'];
        }
        if($row['paid'] == 'paid') {
            $TotalPaid += $row['debt'];
        }
    }
    // mua hàng
    $queryPurchase = mysqli_query($con, "SELECT * FROM `purchase` INNER JOIN `supplier` ORDER BY `purchase`.`dateTime` ASC");
    $TableTotalMoney = 0;
    // nhà cung cấp
    $querySupplier = mysqli_query($con, "SELECT * FROM `supplier` INNER JOIN `supplierDebt`");
    $count = 0;
//    sản phẩm
    $Products = mysqli_query($con, "SELECT * FROM `products`");
    $tableTotalQuantity = 0;
    $tableTotalValue = 0;
?>
<div class="content-wrapper purchase sidebar--open">
    <div class="purchase-first-function purchase-function home-function">
        <div class="cash-first-wrap">
            <div class="cash-first-column-left">
                <div class="cash-operation">
                    <div class="cash-operation__heading">NGHIỆP VỤ MUA HÀNG</div>
                    <div class="purchase-operation-content">
                        <div class="purchase-operation-box purchase-operation-box1">Đơn mua hàng</div>
                        <div class="purchase-operation-box purchase-operation-box2">Nhận hàng hóa, dịch vụ</div>
                        <div class="purchase-operation-box purchase-operation-box3">Trả lại hàng mua</div>
                        <div class="purchase-operation-box purchase-operation-box4">Trả tiền theo hóa đơn</div>
                        <div class="purchase-operation-box purchase-operation-box5">Hợp đồng mua hàng</div>
                        <div class="purchase-operation-box purchase-operation-box6">Nhận hóa đơn</div>
                        <div class="purchase-operation-box purchase-operation-box7">Giảm giá hàng mua</div>
                    </div>
                </div>
                <div class="cash-first-column-left-bottom">
                    <div class="cash-first-bottom-box3 purchase-first-width">
                        <div class="cash-icon-wrap">
                            <div class="cash-first-supplier-icon"></div>
                            <span class="cash-first-heading">Nhà cung cấp</span>
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
                    <li class="process-report-items">Sổ chi tiết mua hàng</li>
                    <li class="process-report-items">Chi tiết công nợ phải trả nhà cung cấp</li>
                    <li class="process-report-items">Tổng hợp mua hàng theo mặt hàng</li>
                    <li class="process-report-items">Tổng hợp công nợ phải trả nhà cung cấp</li>
                    <li class="process-report-items">Biên bản đối chiều và xác nhận công nợ phải trả</li>
                </ul>
                <div class="process-report__footer">Tất cả báo cáo</div>
            </div>
        </div>
    </div>
    <div class="purchase-second-function purchase-function">
        <div class="second-header">
            <div class="second-header-heading">Giao dịch mua hàng</div>
            <button class="second-header__btn1">Thêm</button>
        </div>
        <div class="second-box">
            <div class="second-box1">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= number_format($DebtOver, 0, ",",".") ?></div>
                    <div class="second-box__money-title">Nợ quá hạn</div>
                </div>
            </div>
            <div class="second-box2">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= number_format($TotalDebtPay, 0, ",",".") ?></div>
                    <div class="second-box__money-title">Tổng nợ phải trả</div>
                </div>
            </div>
            <div class="second-box3">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= number_format($TotalPaid, 0, ",",".") ?></div>
                    <div class="second-box__money-title">Đã thanh toán</div>
                </div>
            </div>
        </div>
        <div class="second-content-nav">
            <ul class="second-content-nav__list">
                <li class="second-content-nav__items second-content-nav__items--active">Mua hàng hóa, dịch vụ</li>
                <li class="second-content-nav__items">Nhận hóa đơn</li>
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
                                <th class="second-table__box1 table-header">Ngày hoạch toán</th>              
                                <th class="second-table__box2 table-header">STT</th>              
                                <th class="second-table__box3 table-header">Nội dung</th>              
                                <th class="second-table__box4 table-header">Số tiền</th>              
                                <th class="second-table__box5 table-header">Đối tượng</th>              
                                <th class="second-table__box6 table-header">Thu/chi</th>              
                            </tr>
                        </thead> 
                        <tbody class="second-table__body">
                            <?php while($row = mysqli_fetch_array($queryPurchase)) {
                                $Money = $row['quantity'] * $row['price'];
                                $TableTotalMoney += $Money;
                            ?>
                            <tr>
                                <td class="second-table__box1 table-box"><?= $row['dateTime'] ?></td>              
                                <td class="second-table__box2 table-box">1</td>              
                                <td class="second-table__box3 table-box"><?= $row['content'] ?></td>              
                                <td class="second-table__box4 table-box"><?= number_format($Money, 0, ",",".") ?></td>              
                                <td class="second-table__box5 table-box"><?= $row['name'] ?></td>              
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
    <div class="purchase-third-function purchase-function">
        <div class="second-header">
            <div class="second-header-heading">Danh sách nhà cung cấp</div>
            <button class="second-header__btn1">Thêm</button>
        </div>
        <div class="second-box">
            <div class="second-box1">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= number_format($DebtOver, 0, ",",".") ?></div>
                    <div class="second-box__money-title">Nợ quá hạn</div>
                </div>
            </div>
            <div class="second-box2">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= number_format($TotalDebtPay, 0, ",",".") ?></div>
                    <div class="second-box__money-title">Tổng nợ phải trả</div>
                </div>
            </div>
            <div class="second-box3">
                <div class="second-box-wrap">
                    <div class="second-box__money-total"><?= number_format($TotalPaid, 0, ",",".") ?></div>
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
                                <th class="second-sup-table__box2 table-header">Tên nhà cung cấp</th>              
                                <th class="second-sup-table__box3 table-header">Đại chỉ</th>              
                                <th class="second-sup-table__box4 table-header">Công nợ</th>              
                                <th class="second-sup-table__box5 table-header">Mã số thuế</th>              
                                <th class="second-sup-table__box6 table-header">Chức năng</th>              
                            </tr>
                        </thead> 
                        <tbody class="second-table__body">
                        <?php while($row = mysqli_fetch_array($querySupplier)) { 
                            $debt = $row['paid'] == 'unpaid' ? $debt = $row['debt'] : $debt = 0;
                            $count++;
                        ?>
                            <tr>
                                <td class="second-sup-table__box1 table-box"><?= $row['id'] ?></td>              
                                <td class="second-sup-table__box2 table-box"><?= $row['name'] ?></td>              
                                <td class="second-sup-table__box3 table-box"><?= $row['location'] ?></td>              
                                <td class="second-sup-table__box4 table-box"><?= number_format($debt, 0, ",",".") ?></td>              
                                <td class="second-sup-table__box5 table-box"><?= $row['tax'] ?></td>              
                                <td class="third-table__box6 table-box">
                                    <a href="#" class="third-table-see">Lập CT mua hàng</a>
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
    <div class="purchase-fourth-function purchase-function">
        <div class="second-header">
            <div class="second-header-heading">Danh sách hàng hóa dich vụ</div>
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
                        <div class="header-end__search-icon"></div>
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