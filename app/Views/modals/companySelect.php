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
                <form>
                    <div class="card-body">
                        <div class="form-group col-md-4 pl-0">
                            <label for="companyId">会社ID（完全一致）</label>
                            <input type="text" class="form-control" id="searchCompanyId" name="companyId" placeholder="" value="">
                        </div>
                        <div class="form-group col-md-4 pl-0">
                            <label for="companyName">会社名（あいまい）</label>
                            <input type="text" class="form-control" id="searchCompanyName" placeholder="" name="companyName" value="">
                        </div>
                        <span id="productSearch" class="btn btn-primary pl-4 pr-4 k1Btn mr-3">検索</span>
                        <span onclick="companySearchClear()" class="btn btn-primary k1Btn">条件クリア</span>
                    </div>
                </form>
                <br />
                <div class="card-body table-responsive p-0 ml-1" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap ml-1">
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
                        <tbody>
                            <?php
                                if(isset($company) && count($company) > 0){
                                    for($i = 0; $i < count($company); $i++){
                                        $data = $company[$i];
                                        ?>
                                        <tr>
                                            <td class="" onclick="selectedCompany(<?php echo $i ?>)" id="selectedCompany<?php echo $data->getId() ?>"><a href="#">選択</a></td>
                                            <td id="companyId<?php echo $i ?>"><?php echo $data->getId() ?></td>
                                            <td id="companyName<?php echo $i ?>"><?php echo $data->getName() ?></td>
                                            <td id="companyRepresentative<?php echo $i ?>"> <?php echo $data->getRepresentative() ?></td>
                                            <td id="companyAddress1<?php echo $i ?>"><?php echo $data->getAddress01() ?></td>
                                            <td id="companyPhn<?php echo $i ?>"><?php echo $data->getTelNo() ?></td>
                                            <td id="companyMail<?php echo $i ?>"><?php echo $data->getMailAddress() ?></td>
                                        </tr>
                                        <input id="companyNameKana<?php echo $i ?>" type="hidden" value="<?php echo $data->getNameKana() ?>">
                                        <input id="companyRepresentativeKana<?php echo $i ?>" type="hidden" value="<?php echo $data->getRepresentativeKana() ?>">
                                        <input id="companyPostCode<?php echo $i ?>" type="hidden" value="<?php echo $data->getZipCode() ?>">
                                        <input id="companyAddress2<?php echo $i ?>" type="hidden" value="<?php echo $data->getAddress02() ?>">
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