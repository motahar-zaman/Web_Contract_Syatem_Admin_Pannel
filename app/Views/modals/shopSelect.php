<div class="modal fade" id="shop-select-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">店舗選択</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="card-body">
                        <div class="form-group col-md-4 pl-0">
                            <label for="shopId">店舗ID（完全一致）</label>
                            <input type="text" class="form-control" id="shopId" name="shopId" placeholder="" value="">
                        </div>
                        <div class="form-group col-md-4 pl-0">
                            <label for="shopName">店舗名（あいまい）</label>
                            <input type="text" class="form-control" id="shopName" placeholder="" name="shopName" value="">
                        </div>
                        <span id="shopSearch" class="btn btn-primary pl-4 pr-4 k1Btn mr-3">検索</span>
                        <span onclick="shopSearchClear()" class="btn btn-primary k1Btn">条件クリア</span>
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
                <button type="submit" class="btn btn-primary ml-3 mt-5 k1Btn">選択反映</button>
            </div>
        </div>
    </div>
</div>