<div class="modal fade" id="company-select-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">会社選択</h4>
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
                                if(isset($company) && count($company) > 0){
                                    for($i = 0; $i < count($company); $i++){
                                        $data = $company[$i];
                                        ?>
                                        <tr>
                                            <td onclick="selectedCompany(<?php echo $i ?>)" id="selectedCompany<?php echo $data->getId() ?>"><a href="#">選択</a></td>
                                            <td id="companyId<?php echo $i ?>"><?php echo $data->getId() ?></td>
                                            <td id="companyName<?php echo $i ?>"><?php echo $data->getName() ?></td>
                                            <td id="companyAddress1<?php echo $i ?>"><?php echo $data->getAddress01() ?></td>
                                            <td id="companyPhn<?php echo $i ?>"><?php echo $data->getTelNo() ?></td>
                                            <td id="companyMail<?php echo $i ?>"><?php echo $data->getMailAddress() ?></td>
                                        </tr>
                                        <input id="companyNameKana<?php echo $i ?>" type="hidden" value="<?php echo $data->getNameKana() ?>">
                                        <input id="companyRepresentative<?php echo $i ?>" type="hidden" value="<?php echo $data->getRepresentative() ?>">
                                        <input id="companyRepresentativeKana<?php echo $i ?>" type="hidden" value="<?php echo $data->getRepresentativeKana() ?>">
                                        <input id="companyPostCode<?php echo $i ?>" type="hidden" value="<?php echo $data->getZipCode() ?>">
                                        <input id="companyAddress2<?php echo $i ?>" type="hidden" value="<?php echo $data->getAddress02() ?>">
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