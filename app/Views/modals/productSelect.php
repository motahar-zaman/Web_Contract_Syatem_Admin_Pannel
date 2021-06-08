<div class="modal fade" id="product-select-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">商品選択</h4>
                <button id="productModalClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productFilterForm">
                    <div class="card-body">
                        <div class="form-group col-md-4 pl-0">
                            <label for="productId">商品ID（完全一致）</label>
                            <input type="text" class="form-control" id="searchProductId" name="productId" placeholder="" value="">
                        </div>
                        <div class="form-group col-md-4 pl-0">
                            <label for="productName">商品名（あいまい）</label>
                            <input type="text" class="form-control" id="searchProductName" placeholder="" name="productName" value="">
                        </div>
                        <span id="productSearch" class="btn btn-primary pl-4 pr-4 k1Btn k1Btn2 mr-3">検索</span>
                        <span id="crealProductSearch" class="btn btn-primary k1Btn k1Btn2">条件クリア</span>
                    </div>
                </form>
                <br/>
                <div class="card-body table-responsive p-0 ml-3" style="height: 300px;">
                    <table class="table text-nowrap productTable ml-3" id="productSelectTable">
                        <thead class="k1TableTitleBG">
                            <tr>
                                <th>選択</th>
                                <th>商品ID</th>
                                <th>商品名</th>
                                <th>商品概要</th>
                                <th>公開開始日</th>
                                <th>公開終了日</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary ml-3 mt-5 k1Btn k1Btn2" id="addSelectedProductsBtn" data-dismiss="modal" aria-label="Close">選択反映</button>
            </div>
        </div>
    </div>
</div>
