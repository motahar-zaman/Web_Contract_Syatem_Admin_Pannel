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
                <form>
                    <div class="card-body">
                        <div class="form-group col-md-4 pl-0">
                            <label for="groupId">商品ID（完全一致）</label>
                            <input type="text" class="form-control" id="searchGroupId" name="groupId" placeholder="" value="">
                        </div>
                        <div class="form-group col-md-4 pl-0">
                            <label for="groupName">商品名（あいまい）</label>
                            <input type="text" class="form-control" id="searchGroupName" placeholder="" name="groupName" value="">
                        </div>
                        <span id="productSearch" class="btn btn-primary pl-4 pr-4 k1Btn k1Btn2 mr-3">検索</span>
                        <span onclick="groupSearchClear()" class="btn btn-primary k1Btn k1Btn2">条件クリア</span>
                    </div>
                </form>
                <br />
                <div class="card-body table-responsive p-0 ml-1" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap ml-1" id="groupSelectTable">
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
                        <tbody>
                            <?php
                                if(isset($group) && count($group) > 0){
                                    for($i = 0; $i < count($group); $i++){
                                        $data = $group[$i];
                                        ?>
                                        <tr>
                                            <td onclick="selectedGroup(<?php echo $i ?>, this)" id="selectedGroup<?php echo $data->getId() ?>"><a href="#">選択</a></td>
                                            <td id="groupId<?php echo $i ?>"><?php echo $data->getId() ?></td>
                                            <td id="groupName<?php echo $i ?>"><?php echo $data->getName() ?></td>
                                            <td id="groupRepresentative<?php echo $i ?>"><?php echo $data->getRepresentative() ?></td>
                                            <td id="groupAddress1<?php echo $i ?>"><?php echo $data->getAddress01() ?></td>
                                            <td id="groupPhn<?php echo $i ?>"><?php echo $data->getTelNo() ?></td>
                                            <td id="groupMail<?php echo $i ?>"><?php echo $data->getMailAddress() ?></td>
                                        </tr>
                                        <input id="groupNameKana<?php echo $i ?>" type="hidden" value="<?php echo $data->getNameKana() ?>">
                                        <input id="groupRepresentativeKana<?php echo $i ?>" type="hidden" value="<?php echo $data->getRepresentativeKana() ?>">
                                        <input id="groupPostCode<?php echo $i ?>" type="hidden" value="<?php echo $data->getZipCode() ?>">
                                        <input id="groupAddress2<?php echo $i ?>" type="hidden" value="<?php echo $data->getAddress02() ?>">
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