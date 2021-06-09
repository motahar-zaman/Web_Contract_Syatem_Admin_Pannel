<div class="modal fade" id="shop-select-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">店舗選択</h4>
                <button id="shopModalClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="shopSearchForm">
                    <div class="card-body">
                        <div class="form-group col-md-4 pl-0">
                            <label for="shopId">店舗ID（完全一致）</label>
                            <input type="text" class="form-control" id="searchShopId" name="shopId" placeholder="" value="">
                        </div>
                        <div class="form-group col-md-4 pl-0">
                            <label for="shopName">店舗名（あいまい）</label>
                            <input type="text" class="form-control" id="searchShopName" placeholder="" name="shopName" value="">
                        </div>
                        <button type="submit" id="shopSearch" class="btn btn-primary pl-4 pr-4 k1Btn k1Btn2 mr-3">検索</button>
                        <span id="clearShopSearch" class="btn btn-primary k1Btn k1Btn2 ">条件クリア</span>
                    </div>
                </form>
                <br/>
                <div class="card-body table-responsive p-0 ml-3" style="height: 300px;">
                    <table class="table  text-nowrap ml-3" id="shopSelectTable" style="width: 100%;">
                        <thead class="k1TableTitleBG">
                            <tr>
                                <th>選択</th>
                                <th>店舗ID</th>
                                <th>店舗名</th>
                                <th>住所</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
