<?php
    $budget = mysqli_query($con, "SELECT * FROM `budget`");
    $customerDebt = mysqli_query($con, "SELECT * FROM `customerDebt`");
    $supplerDebt = mysqli_query($con, "SELECT * FROM `supplerDebt`");
    // doanh thu
    $queryRevenu = mysqli_query($con, "SELECT * FROM `sales`");
    $revenu = 0;
    while($row = mysqli_fetch_array($queryRevenu)) {
        $revenu += $row['totalMoney'];
    }
    // tổng thu từng tháng 
    $queryRevenuMonth = mysqli_query($con, "SELECT MONTH(dateTime), `totalMoney`  FROM `sales` ORDER BY `sales`.`dateTime` ASC");
    $RevenuMonth = array();
    
    $th1 = 0;$th2 = 0;$th3 = 0;$th4 = 0;$th5 = 0;$th6 = 0;$th7 = 0;$th8 = 0;$th9 = 0;$th10 = 0;$th11 = 0;$th12 = 0;
    // var_dump($th1);exit;
    while($row = mysqli_fetch_array($queryRevenuMonth)) {
        // var_dump('tháng'.$row['MONTH(dateTime)']);
        // var_dump('tiền'.$row['totalMoney']);

        // switch($row['MONTH(dateTime)']) {
        //     case 1: 
        //         $th1 += $row['totalMoney'];
        //         $th1 ? : 0;
        //         // var_dump('tháng1'.$th1);
        //     case 2: 
        //         $th2 += $row['totalMoney'];
        //         $th2 ? : 0;
        //         // var_dump('tháng2'.$th2);
        //     case 3: 
        //         $th3 += $row['totalMoney'];
        //         $th3 ? : 0;
        //         // var_dump('tháng3'.$th3);
        //     case 4: 
        //         $th4 += $row['totalMoney'];
        //         $th4 ? : 0;
        //         // var_dump('tháng4'.$th4);
        //     case 5: 
        //         $th5 += $row['totalMoney'];
        //         $th5 ? : 0;
        //         // var_dump('tháng5'.$th5);
        //     case 6: 
        //         $th6 += $row['totalMoney'];
        //         $th6 ? : 0;
        //         // var_dump('tháng6'.$th6);
        //     case 7: 
        //         $th7 += $row['totalMoney'];
        //         $th7 ? : 0;
        //         // var_dump('tháng7'.$th7);
        //     case 8: 
        //         $th8 += $row['totalMoney'];
        //         $th8 ? : 0;
        //         // var_dump('tháng'.$th8);
        //     case 9: 
        //         $th9 += $row['totalMoney'];
        //         $th9 ? : 0;
        //         // var_dump('tháng'.$th9);
        //     case 10: 
        //         $th10 += $row['totalMoney'];
        //         $th10 ? : 0;
        //         // var_dump('tháng'.$th10);
        //     case 11: 
        //         $th11 += $row['totalMoney'];
        //         $th11 ? : 0;
        //         // var_dump('tháng'.$th11);
        //     case 12: 
        //         $th12 += $row['totalMoney'];
        //         $th12 ? : 0;
        //         // var_dump('tháng'.$th12);
        // }

        if($row['MONTH(dateTime)'] == 1) { 
            $th1 += $row['totalMoney'];
            $th1 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 2) { 
            $th2 += $row['totalMoney'];
            $th2 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 3) { 
            $th3 += $row['totalMoney'];
            $th3 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 4) { 
            $th4 += $row['totalMoney'];
            $th4 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 5) { 
            $th5 += $row['totalMoney'];
            $th5 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 6) { 
            $th6 += $row['totalMoney'];
            $th6 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 7) { 
            $th7 += $row['totalMoney'];
            $th7 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 8) { 
            $th8 += $row['totalMoney'];
            $th8 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 9) { 
            $th9 += $row['totalMoney'];
            $th9 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 10) { 
            $th10 += $row['totalMoney'];
            $th10 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 11) { 
            $th11 += $row['totalMoney'];
            $th11 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 12) { 
            $th12 += $row['totalMoney'];
            $th12 ? : 0;
        }
    }
    $RevenuMonth = array($th1, $th2, $th3, $th4, $th5, $th6, $th7, $th8, $th9, $th10, $th11, $th12);

    // tổng chi hàng tháng
    $queryCostMonth = mysqli_query($con, "SELECT MONTH(dateTime), `quantity`, `price`  FROM `purchase` ORDER BY `purchase`.`dateTime` ASC");
    $CostMonth = array();
    
    $th1 = 0;$th2 = 0;$th3 = 0;$th4 = 0;$th5 = 0;$th6 = 0;$th7 = 0;$th8 = 0;$th9 = 0;$th10 = 0;$th11 = 0;$th12 = 0;
    // var_dump($th1);exit;
    while($row = mysqli_fetch_array($queryCostMonth)) {
        $totalMoney = $row['quantity'] * $row['price'];
        if($row['MONTH(dateTime)'] == 1) { 
            $th1 += $totalMoney;
            $th1 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 2) { 
            $th2 += $totalMoney;
            $th2 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 3) { 
            $th3 += $totalMoney;
            $th3 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 4) { 
            $th4 += $totalMoney;
            $th4 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 5) { 
            $th5 += $totalMoney;
            $th5 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 6) { 
            $th6 += $totalMoney;
            $th6 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 7) { 
            $th7 += $totalMoney;
            $th7 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 8) { 
            $th8 += $totalMoney;
            $th8 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 9) { 
            $th9 += $totalMoney;
            $th9 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 10) { 
            $th10 += $totalMoney;
            $th10 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 11) { 
            $th11 += $totalMoney;
            $th11 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 12) { 
            $th12 += $totalMoney;
            $th12 ? : 0;
        }
    }
    $CostMonth = array($th1, $th2, $th3, $th4, $th5, $th6, $th7, $th8, $th9, $th10, $th11, $th12);

    // ngân sách tồn 
    $queryExistMonth = mysqli_query($con, "SELECT MONTH(dateTime), `budget`  FROM `budget` ORDER BY `budget`.`dateTime` ASC");
    $ExistMonth = array();
    
    $th1 = 0;$th2 = 0;$th3 = 0;$th4 = 0;$th5 = 0;$th6 = 0;$th7 = 0;$th8 = 0;$th9 = 0;$th10 = 0;$th11 = 0;$th12 = 0;
    while($row = mysqli_fetch_array($queryExistMonth)) {
        if($row['MONTH(dateTime)'] == 1) { 
            $th1 += $row['budget'];
            $th1 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 2) { 
            $th2 += $row['budget'];
            $th2 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 3) { 
            $th3 += $row['budget'];
            $th3 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 4) { 
            $th4 += $row['budget'];
            $th4 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 5) { 
            $th5 += $row['budget'];
            $th5 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 6) { 
            $th6 += $row['budget'];
            $th6 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 7) { 
            $th7 += $row['budget'];
            $th7 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 8) { 
            $th8 += $row['budget'];
            $th8 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 9) { 
            $th9 += $row['budget'];
            $th9 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 10) { 
            $th10 += $row['budget'];
            $th10 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 11) { 
            $th11 += $row['budget'];
            $th11 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 12) { 
            $th12 += $row['budget'];
            $th12 ? : 0;
        }
    }
    $ExistMonth = array($th1, $th2, $th3, $th4, $th5, $th6, $th7, $th8, $th9, $th10, $th11, $th12);
    

    // chi phí
    $queryCost = mysqli_query($con, "SELECT * FROM `purchase`");
    $querycost = mysqli_query($con, "SELECT * FROM `purchase`");
    $cost = 0;
    $costTotal = 0;
    while($row = mysqli_fetch_array($queryCost)) {
        $cost = $row['quantity'] * $row['price'];
        $costTotal += $cost;
    }
    // lượi nhuận
    $profit = $revenu - $cost;

    // hàng tồn kho
    $queryProducts = mysqli_query($con, "SELECT * FROM `products`");
    $queryproducts = mysqli_query($con, "SELECT * FROM `products`");
    $totalProduct = 0;
    $inventoryValue = 0;
    while($row = mysqli_fetch_array($queryProducts)) {
        $totalProduct += $row['quantity'];
        $value = $row['quantity'] * $row['price'];
        $inventoryValue += $value;
    }
    // hàng sắp hết
    $queryProduct = mysqli_query($con, "SELECT * FROM `products`");
    // nợ phải thu
    $customerDebt = mysqli_query($con, "SELECT * FROM `customerDebt`");
    $customerdebt = mysqli_query($con, "SELECT * FROM `customerDebt`");
    $totalCusDebt = 0;
    while($row = mysqli_fetch_array($customerDebt)) {
        $totalCusDebt += $row['debt'];

    }
    // nownp phải trả
    $supplierDebt = mysqli_query($con, "SELECT * FROM `supplierDebt`");
    $supplierdebt = mysqli_query($con, "SELECT * FROM `supplierDebt`");
    $totalSupDebt = 0;
    while($row = mysqli_fetch_array($supplierDebt)) {
        $totalSupDebt += $row['debt'];
    }
    // 
    $productRunout = 0;
    $productOut = 0;
?>
<!-- <script> 
    const exitMonth = <?= $ExistMonth; ?>;
    console.log(exitMonth);
</script> -->
<div class="overview sidebar--open home-function">
    <div class="row">
        <div class="box financial-situation">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Tình hình tài chính</h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title">Tháng này</span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="box-time-line__dropdown-list">
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
                </div>
                <div class="box__money-unit">Đvt: Triệu</div>
                <div class="financial-content">
                    <ul class="financial-list">
                        <?php while($row = mysqli_fetch_array($budget)) { ?>
                        <li class="financial-items">
                            <span class="money__title">Tổng tiền</span>
                            <span class="financial__money-amount"><?= number_format($row['budget'], 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title">Tiền mặt</span>
                            <span class="financial__money-amount"><?= number_format($row['cash'], 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title">Tiền gửi</span>
                            <span class="financial__money-amount"><?= number_format($row['banking'], 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title">Phải thu</span>
                            <span class="financial__money-amount"><?= number_format($row['customerDebt'], 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title">Phải trả</span>
                            <span class="financial__money-amount"><?= number_format($row['supplierDebt'], 0, ",", ".") ?></span>
                        </li>   
                        <?php } ?>                                       
                    </ul>
                    <ul class="financial-list">
                        <li class="financial-items">
                            <span class="money__title">Doanh thu</span>
                            <span class="financial__money-amount"><?= number_format($revenu, 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title">Chi phí</span>
                            <span class="financial__money-amount"><?= number_format($cost, 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title">Lợi nhuận</span>
                            <span class="financial__money-amount"><?= number_format($profit, 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title">Hàng tồn kho</span>
                            <span class="financial__money-amount"><?= number_format($totalProduct, 0, ",", ".") ?></span>
                        </li>                                    
                    </ul>
                </div>
            </div>
        </div>
        <div class="box Aged-receivables-analysis">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Nợ phải thu theo hạn nợ</h3>
                </div>
                <div class="debt-receivables-content">
                    <div class="debt-main-summary">
                        <div class="flex">
                            <span class="debt-main-amount"><?= number_format($totalCusDebt, 0, ",", ".") ?></span>
                            <span class="debt-unit">Triệu</span>
                        </div>
                        <div class="debt-summary-title">Tổng</div>
                    </div>
                    <div class="debt-secondary-summary">
                        <div class="flex-father">
                            <div class="flex">
                                <span class="debt-secondary-amount debt-secondary-amount--hightlight">0</span>
                                <span class="debt-unit debt-secondary-amount--hightlight">Triệu</span>
                            </div>
                            <div class="flex">
                                <span class="debt-secondary-amount">0</span>
                                <span class="debt-unit">Triệu</span>
                            </div>
                        </div>
                        <div class="flex-father">
                            <div class="debt-summary-title">Quá hạn</div>
                            <div class="debt-summary-title">Trong hạn</div>
                        </div>
                    </div>
                    <div class="debt-rate-wrap">
                        <div class="debt-rate__left" style="width: 50%;"></div>
                        <div class="debt-rate__right" style="width: 50%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box Aged-payable-analysis">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Nợ phải trả theo hạn nợ</h3>
                </div>
                <div class="debt-receivables-content">
                    <div class="debt-main-summary">
                        <div class="flex">
                            <span class="debt-main-amount"><?= number_format($totalSupDebt, 0, ",", ".") ?></span>
                            <span class="debt-unit">Triệu</span>
                        </div>
                        <div class="debt-summary-title">Tổng</div>
                    </div>
                    <div class="debt-secondary-summary">
                        <div class="flex-father">
                            <div class="flex">
                                <span class="debt-secondary-amount debt-secondary-amount--hightlight">0</span>
                                <span class="debt-unit debt-secondary-amount--hightlight">Triệu</span>
                            </div>
                            <div class="flex">
                                <span class="debt-secondary-amount">0</span>
                                <span class="debt-unit">Triệu</span>
                            </div>
                        </div>
                        <div class="flex-father">
                            <div class="debt-summary-title">Quá hạn</div>
                            <div class="debt-summary-title">Trong hạn</div>
                        </div>
                    </div>
                    <div class="debt-rate-wrap">
                        <div class="debt-rate__left" style="width: 50%;"></div>
                        <div class="debt-rate__right" style="width: 50%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="box Cash-flows">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Dòng tiền</h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title">Tháng này</span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="box-time-line__dropdown-list">
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
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="flex">
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="flex">
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="cash-flows-summary">
                    <div class="debt-summary-title">Tổng thu</div>
                    <div class="debt-summary-title cash-flows-margin">Tổng chi</div>
                    <div class="debt-summary-title cash-flows-margin">Tồn</div>
                </div>
                <div class="Cash-flows-chartBox">
                    <canvas id="stackedChart"></canvas>
                </div>
            </div>
        </div>
        <div class="box Receivables-from-customer">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Nợ phải thu khách hàng</h3>
                    <div class="box-time-line">
                        <span class="financial-title">Tháng này</span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="box-time-line__dropdown-list">
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
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount"><?= number_format($totalCusDebt, 0, ",",".") ?></span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="debt-summary-title box5-7-margin-bottom">Tổng</div>
                <ul class="debt-list">
                    <?php while($row = mysqli_fetch_array($customerdebt)) { ?>
                    <li class="debt-items">
                        <div class="debt-num"><?= $row['id']; ?></div>
                        <div class="debt-items__title"><?= $row['content']; ?></div>
                        <div class="debt-items__cus-name"><?= $row['object']; ?></div>
                        <div class="debt-items__money"><?= number_format($row['debt'], 0, ",","."); ?></div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="box Revenue">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Doanh thu</h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title">Tháng này</span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="box-time-line__dropdown-list">
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
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="debt-summary-title revenue-flows-margin">Tồng</div>
                <div class="Cash-flows-linechartBox">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>
        <div class="box Payables-to-supplier">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Nợ phải trả nhà cung cấp</h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title">Tháng này</span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="box-time-line__dropdown-list">
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
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount"><?= number_format($totalSupDebt, 0, ",",".") ?></span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="debt-summary-title box5-7-margin-bottom">Tồng</div>
                <ul class="debt-list">
                <?php while($row = mysqli_fetch_array($supplierdebt)) { ?>
                    <li class="debt-items">
                        <div class="debt-num"><?= $row['id']; ?></div>
                        <div class="debt-items__title"><?= $row['content']; ?></div>
                        <div class="debt-items__cus-name"><?= $row['object']; ?></div>
                        <div class="debt-items__money"><?= number_format($row['debt'], 0, ".","."); ?></div>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="box On-hand-inventory">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Hàng hóa tồn kho</h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title">Tháng này</span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="box-time-line__dropdown-list">
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
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount"><?= number_format($inventoryValue, 0, ",",".") ?></span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="debt-summary-title box5-7-margin-bottom">Tồng</div>
                <ul class="debt-title-list">
                    <li class="box8-num">STT</li>
                    <li class="box8-items__title">Tên</li>
                    <li class="box8-items__cus-name">Số lượng</li>
                    <li class="box8-items__money">Giá trị</li>
                </ul>
                <ul class="debt-list">
                    <?php while($row = mysqli_fetch_array($queryproducts)) { 
                        $value = $row['quantity'] * $row['price'];
                    ?>
                    <li class="debt-items">
                        <div class="box8-num"><?= $row['id']; ?></div>
                        <div class="box8-items__title"><?= $row['name']; ?></div>
                        <div class="box8-items__cus-name"><?= $row['quantity']; ?></div>
                        <div class="box8-items__money"><?= number_format($value, 0, ",","."); ?></div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!-- <div class="box Receivable-due-in-5-day">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Nợ phải thu sắp đến hạn phải thu trong 5 ngày</h3>
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="debt-summary-title cash-flows-margin">Tồng</div>
                <ul class="debt-collect-title-list">
                    <li class="debt-collect-title-items">STT</li>
                    <li class="debt-collect-title-items">Hạn thanh toán</li>
                    <li class="debt-collect-title-items">Khách hàng</li>
                    <li class="debt-collect-title-items">số tiền</li>
                </ul>
                <ul class="debt-collect-list">
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">1</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">2</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">3</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">4</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                </ul>
            </div>
        </div> -->
        
        <div class="box Expense">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Chi phí</h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title">Tháng này</span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="box-time-line__dropdown-list">
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
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount"><?= number_format($costTotal, 0, ",",".") ?></span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="debt-summary-title box5-7-margin-bottom">Tồng</div>
                <ul class="expense-title-list">
                    <li class="expense-num">STT</li>
                    <li class="expense-items__content">Tên</li>
                    <li class="expense-items__money">Chi phí</li>
                </ul>
                <ul class="expense-list">
                <?php while($row = mysqli_fetch_array($querycost)) { 
                    $value = $row['quantity'] * $row['price'];
                ?>
                    <li class="expense-items">
                        <div class="expense-num"><?= $row['id'] ?></div>
                        <div class="expense-items__content"><?= $row['content'] ?></div>
                        <div class="expense-items__money"><?= number_format($value, 0, ",", ".") ?></div>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="box Running-out-of-stock-items">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Hàng hóa sắp hết</h3>
                </div>
                <ul class="last-box-list">
                    <li class="last-box1 head-text-color">Tên hàng hóa</li>
                    <li class="last-box2 head-text-color">Kho</li>
                    <li class="last-box3 head-text-color">SL tồn</li>
                    <li class="last-box4 head-text-color">SL tồn tối thiểu</li>
                </ul>
                <ul class="last-box-items-list">
                <?php while($row = mysqli_fetch_array($queryProduct)) { 
                    if($row['quantity'] == 0) {
                        $productOut++;
                    }
                    if($row['quantity'] <= $row['minimumQuantity']) {
                        $productRunout++;
                ?>
                    <li class="last-box-items">
                        <div class="last-box1"><?= $row['name'] ?></div>
                        <div class="last-box2"><?= $row['inventoryid'] ?></div>
                        <div class="last-box3"><?= $row['quantity'] ?></div>
                        <div class="last-box4"><?= $row['minimumQuantity'] ?></div>
                    </li>
                <?php
                    }
                } 
                ?>
                </ul>
            </div>
        </div>
        <!-- <div class="box Payables-due-in-5-day">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Nợ phải trả sắp đến hạn phải thu trong 5 ngày</h3>
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="debt-summary-title cash-flows-margin">Tồng</div>
                <ul class="debt-collect-title-list">
                    <li class="debt-collect-title-items">STT</li>
                    <li class="debt-collect-title-items">Hạn thanh toán</li>
                    <li class="debt-collect-title-items">Khách hàng</li>
                    <li class="debt-collect-title-items">số tiền</li>
                </ul>
                <ul class="debt-collect-list">
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">1</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">2</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">3</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">4</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                </ul>
            </div>
        </div> -->

    </div>
</div>