<div class="modal fade" id="contractor-select-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">契約者選択</h4>
                <button id="contractorModalClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="card-body">
                        <div class="form-group col-md-4 pl-0">
                            <label for="contractorId">契約者ID（完全一致）</label>
                            <input type="text" class="form-control" id="searchContractorId" name="contractorId" placeholder="" value="">
                        </div>
                        <div class="form-group col-md-4 pl-0">
                            <label for="contractorName">契約者名（あいまい）</label>
                            <input type="text" class="form-control" id="searchContractorName" name="contractorName" placeholder="" value="">
                        </div>
                        <span id="productSearch" class="btn btn-primary pl-4 pr-4 k1Btn k1Btn2 mr-3">検索</span>
                        <span onclick="contractorSearchClear()" class="btn btn-primary  k1Btn k1Btn2">条件クリア</span>
                    </div>
                </form>
                <br />
                <div class="card-body table-responsive p-0 ml-1" style="height: 300px;">
                    <table class="table text-nowrap ml-1" id="contractorSelectTable">
                        <thead class="k1TableTitleBG">
                            <tr>
                                <th>選択</th>
                                <th>契約者ID</th>
                                <th>契約者名	</th>
                                <th>住所</th>
                                <th>電話番号</th>
                                <th>メールアドレス</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($contractor) && count($contractor) > 0){
                                    for($i = 0; $i < count($contractor); $i++){
                                        $data = $contractor[$i];
                                        ?>
                                        <tr>
                                            <td onclick="selectedContractor(<?php echo $i ?>, this)" id="selectedContractor<?php echo $data->getId() ?>"><a href="#">選択</a></td>
                                            <td id="contractorIdM<?php echo $i ?>"><?php echo $data->getId() ?></td>
                                            <td id="contractorNameM<?php echo $i ?>"><?php echo $data->getName() ?></td>
                                            <td id="contractorAddress1M<?php echo $i ?>"><?php echo $data->getAddress01() ?></td>
                                            <td id="contractorPhnM<?php echo $i ?>"><?php echo $data->getTelNo() ?></td>
                                            <td id="contractorMailM<?php echo $i ?>"><?php echo $data->getMailAddress() ?></td>
                                        </tr>
                                        <input id="contractorNameKana<?php echo $i ?>" type="hidden" value="<?php echo $data->getNameKana() ?>">
                                        <input id="contractorPostCode<?php echo $i ?>" type="hidden" value="<?php echo $data->getZipCode() ?>">
                                        <input id="contractorAddress2<?php echo $i ?>" type="hidden" value="<?php echo $data->getAddress02() ?>">
                                        <?php
                                    }
                                }
                                else{
                                    echo "<h3>データがありません！</h3>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>