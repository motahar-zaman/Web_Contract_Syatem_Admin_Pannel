<div class="modal fade" id="shop-select-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">店舗選択</h4>
                <?php
                //                    var_dump($product); die();
                ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="card-body">
                        <div class="form-group col-md-4 pl-0">
                            <label for="exampleInputEmail1">店舗ID（完全一致）</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group col-md-4 pl-0">
                            <label for="exampleInputPassword1">店舗名（あいまい）</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-primary pl-4 pr-4">検索</button>
                        <button type="submit" class="btn btn-primary ml-2">条件クリア</button>
                    </div>
                </form>
                <br/>
                <div class="card-body table-responsive p-0 ml-3" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap ml-3">
                        <thead>
                        <tr>
                            <th>選択</th>
                            <th>店舗ID</th>
                            <th>店舗名</th>
                            <th>住所</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($shop) && count($shop) > 0) {
                            for ($i = 0; $i < count($shop); $i++) {
                                $data = $shop[$i];
                                ?>
                                <tr>
                                    <td onclick="selectedShop(<?php echo $i ?>)" id="selectedShop<?php echo $data->getId() ?>"><a href="#">選択</a></td>
                                    <td id="shopId<?php echo $i ?>"><?php echo $data->getId() ?></td>
                                    <td id="shopName<?php echo $i ?>"><?php echo $data->getName() ?></td>
                                    <td style="display: none" id="shopRepresentativeName<?php echo $i ?>"><?php echo $data->getRepresentativeKana() ?></td>
                                    <td style="display: none" id="shopPrefecture<?php echo $i ?>"><?php echo $data->getPrefecture() ?></td>
                                    <td id="shopAddress<?php echo $i ?>"><?php echo $data->getAddress01() ?></td>
                                    <td style="display: none" id="shopPhoneNumber<?php echo $i ?>"><?php echo $data->getTelNo() ?></td>
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