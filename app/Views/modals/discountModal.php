<div class="modal fade" id="discount-select-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">割引サービス</h4>
                <button id="contractorModalClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="mb-5">
                    <div class="card-body">
                        <div class="form-group col-md-4 pl-0">
                            <label>稟議No（完全一致） Ringi No (Exact match)</label>
                            <input name="ringiNoSearch" id="ringiNoSearch" type="text" class="form-control" value="">
                        </div>
                        <span onclick="ringiSearch()" id="ringiSearch" class="btn btn-primary pl-4 pr-4 k1Btn k1Btn2 mr-3">検索(Search)</span>
                    </div>
                </form>

                <div class="card mt-3 text-left">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>契約種別(Contract Type)</label>
                                    <span class="form-control d-none" id="ringiNo"></span>
                                    <span class="form-control d-none" id="applicantName"></span>
                                    <span class="form-control" id="ringiType"></span>
                                </div>
                                <div class="form-group">
                                    <label>対象区分(Target classification)</label>
                                    <span class="form-control" id="targetArea"></span>
                                </div>
                                <div class="form-group">
                                    <label>対象名(Target Name)</label>
                                    <span class="form-control" id="targetName"></span>
                                </div>
                                <div class="form-group">
                                    <label>内容項目(Content Item)</label>
                                    <span class="form-control" id="discountServiceType"></span>
                                </div>
                                <div class="form-group">
                                    <label>内容詳細(Content detail)</label>
                                    <span class="form-control h100px" id="ringiDetail"></span>
                                </div>
                                <div class="form-group ">
                                    <label>条件(Condition)</label>
                                    <span class="form-control h100px" id="summaryCondition"></span>
                                </div>
                            </div>

                            <div class="col-md-12  mt-3">
                                <label>税抜き価格</label>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group " >
                                    <label>サービス前</label>
                                    <span class="form-control" id="beforeSummaryPrice"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>サービス前</label>
                                    <span class="form-control" id="afterSummaryPrice"></span>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <label>摘要期間(Applicable period)</label>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>月数</label>
                                    <span class="form-control" id="summaryPeriod"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>開始日</label>
                                    <span class="form-control" id="startDate"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>終了日</label>
                                    <span class="form-control" id="endDate"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>目標(Purpose)</label>
                                    <span class="form-control h100px" id="purpose"></span>
                                </div>
                                <div class="form-group">
                                    <label>備考(Remarks)</label>
                                    <span class="form-control h100px" id="memo"></span>
                                </div>
                            </div>
                            <span onclick="addDiscountWithContract()" class="btn btn-primary ml-2 mt-2 k1Btn k1Btn2" data-dismiss="modal" aria-label="Close">摘要(Apply)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>