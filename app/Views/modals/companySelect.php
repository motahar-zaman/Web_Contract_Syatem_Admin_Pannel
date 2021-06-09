<div class="modal fade" id="company-select-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">会社選択</h4>
                <button id="companyModalClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="companySearchForm">
                    <div class="card-body">
                        <div class="form-group col-md-4 pl-0">
                            <label for="companyId">会社ID（完全一致）</label>
                            <input type="text" class="form-control" id="searchCompanyId" name="companyId" placeholder="" value="">
                        </div>
                        <div class="form-group col-md-4 pl-0">
                            <label for="companyName">会社名（あいまい）</label>
                            <input type="text" class="form-control" id="searchCompanyName" placeholder="" name="companyName" value="">
                        </div>
                        <button type="submit" id="companySearch" class="btn btn-primary pl-4 pr-4 k1Btn k1Btn2 mr-3">検索</button>
                        <span id="clearCompanySearch" class="btn btn-primary k1Btn k1Btn2">条件クリア</span>
                    </div>
                </form>
                <br />
                <div class="card-body table-responsive p-0 ml-1" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap ml-1" id="companySelectTable" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>選択</th>
                                <th>会社ID</th>
                                <th>会社名</th>
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
