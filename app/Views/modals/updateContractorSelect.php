<div class="modal fade" id="contractor-select-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">契約者選択</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="card-body">
                        <div class="form-group col-md-4 pl-0">
                            <label for="exampleInputEmail1">契約者ID（完全一致）</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group col-md-4 pl-0">
                            <label for="exampleInputPassword1">契約者名（あいまい）</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-primary pl-4 pr-4">検索</button>
                        <button type="submit" class="btn btn-primary ml-2">条件クリア</button>
                    </div>
                </form>
                <br />
                <div class="card-body table-responsive p-0 ml-1" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap ml-1">
                        <thead>
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

                                if($data->getCompanyId()){
                                    $companyData = implode("=>",$idMappedCompany[$contractor[$i]->getCompanyId()]);
                                }
                                else{
                                    $companyData = null;
                                }
                                if($data->getGroupId()){
                                    $groupData = implode("=>",$idMappedGroup[$contractor[$i]->getGroupId()]);
                                }
                                else{
                                    $groupData = null;
                                }
                                ?>
                                <tr>
                                    <td onclick="selectedContractorUpdate(<?php echo $i; ?>)" id="selectedContractorUpdate<?php echo $data->getId(); ?>"><a href="#">選択</a></td>
                                    <td id="contractorId<?php echo $i ?>"><?php echo $data->getId() ?></td>
                                    <td id="contractorName<?php echo $i ?>"><?php echo $data->getName() ?></td>
                                    <td id="contractorAddress1<?php echo $i ?>"><?php echo $data->getAddress01() ?></td>
                                    <td id="contractorPhn<?php echo $i ?>"><?php echo $data->getTelNo() ?></td>
                                    <td id="contractorMail<?php echo $i ?>"><?php echo $data->getMailAddress() ?></td>
                                </tr>
                                <input id="contractorNameKana<?php echo $i ?>" type="hidden" value="<?php echo $data->getNameKana() ?>">
                                <input id="contractorPostCode<?php echo $i ?>" type="hidden" value="<?php echo $data->getZipCode() ?>">
                                <input id="contractorAddress2<?php echo $i ?>" type="hidden" value="<?php echo $data->getAddress02() ?>">
                                <input id="contractorCompany<?php echo $i ?>" type="hidden" value="<?php echo $companyData ?>">
                                <input id="contractorGroup<?php echo $i ?>" type="hidden" value="<?php echo $groupData ?>">
                                <?php
                            }
                        }
                        else{
                            echo "<h3>No data available</h3>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>