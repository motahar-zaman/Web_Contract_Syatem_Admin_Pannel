<div class="modal fade" id="product-select-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">商品選択</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="card-body">
                        <div class="form-group col-md-4 pl-0">
                            <label for="exampleInputEmail1">商品ID（完全一致）</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group col-md-4 pl-0">
                            <label for="exampleInputPassword1">商品名（あいまい）</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-primary pl-4 pr-4">検索</button>
                        <button type="submit" class="btn btn-primary ml-2">条件クリア</button>
                    </div>
                </form>
                <br/>
                <div class="card-body table-responsive p-0 ml-3" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap productTable ml-3">
                        <thead>
                        <tr>
                            <th>選択</th>
                            <th>商品ID</th>
                            <th>商品名</th>
                            <th>商品概要</th>
                            <th>公開開始日</th>
                            <th>公開終了日</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($product) && count($product) > 0) {
                            for ($i = 0; $i < count($product); $i++) {
                                $data = $product[$i];

                                $getStartDate = $data->getStartDate();
                                $repStartDate = str_replace('-"', '/', $getStartDate);
                                $startDate = date("d/m/Y", strtotime($repStartDate));

                                $getEndDate = $data->getEndDate();
                                $repEndDDate = str_replace('-"', '/', $getEndDate);
                                $endDate = date("d/m/Y", strtotime($repEndDDate));
                                ?>
                                <tr>
                                    <td onclick="selectedProduct(<?php echo $i ?>);" id="selectedProduct<?php echo $data->getId() ?>"><a href="#" style="color: #0099FF">選択</a></td>
                                    <td id="productId<?php echo $i ?>"><?php echo $data->getId() ?></td>
                                    <td id="productName<?php echo $i ?>"><?php echo $data->getName() ?></td>
                                    <td id="productNote<?php echo $i ?>"><?php echo $data->getProductNote() ?></td>
                                    <td id="productPeriodStartDate<?php echo $i ?>"><?php echo $startDate ?></td>
                                    <td id="productPeriodEndDate<?php echo $i ?>"><?php echo $endDate ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<h3>No data available</h3>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary ml-3 mt-5">選択反映</button>
            </div>
        </div>
    </div>
</div>