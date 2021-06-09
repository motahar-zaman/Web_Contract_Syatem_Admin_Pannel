<div class="modal fade" id="group-select-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">グループ選択</h4>
                <button id="groupModalClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="groupSearchForm">
                    <div class="card-body">
                        <div class="form-group col-md-4 pl-0">
                            <label for="groupId">商品ID（完全一致）</label>
                            <input type="text" class="form-control" id="searchGroupId" name="groupId" placeholder="" value="">
                        </div>
                        <div class="form-group col-md-4 pl-0">
                            <label for="groupName">商品名（あいまい）</label>
                            <input type="text" class="form-control" id="searchGroupName" placeholder="" name="groupName" value="">
                        </div>
                        <button type="submit" id="groupSearch" class="btn btn-primary pl-4 pr-4 k1Btn k1Btn2 mr-3">検索</button>
                        <span id="clearGroupSearch" class="btn btn-primary k1Btn k1Btn2">条件クリア</span>
                    </div>
                </form>
                <br />
                <div class="card-body table-responsive p-0 ml-1" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap ml-1" id="groupSelectTable" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>選択</th>
                                <th>グループID</th>
                                <th>グループ名</th>
                                <th>代表者名</th>
                                <th>住所</th>
                                <th>電話番号</th>
                                <th>メールアドレス</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
