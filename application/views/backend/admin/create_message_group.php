    <div class="full-chat-middle b-b">
        <div class="chat-head">
            <div class="user-actions">
                <h4><?php echo getEduAppGTLang('create_new_group');?></h4>
            </div>
        </div>
        <div class="chat-content-w">
            <div class="chat-content text-center">
                <form action="<?php echo base_url();?>admin/group/create_group/" method="post">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label"><?php echo getEduAppGTLang('name');?></label>
                            <input class="form-control" type="text" name="group_name" required="">
                            <span class="material-input"></span>
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <?php
                        $user_array = ['student', 'teacher', 'parent','admin','accountant', 'librarian'];
                        for ($i=0; $i < sizeof($user_array); $i++):
                        $user_list = $this->db->get($user_array[$i])->result_array();
                    ?>
                    <div class="col-md-12 op-10">
                        <table  class="table table-bordered table-striped">
                            <h4 class="col-md-6 col-users"><b><?php echo getEduAppGTLang(ucfirst($user_array[$i])); ?></b></h4>
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="<?php echo $user_array[$i]; ?>" onchange="checkAllBoxes(this)">&nbsp;<?php echo getEduAppGTLang('select_all');?></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th class="grbg2 text-white"><?php echo getEduAppGTLang('select');?></th>
                                    <th class="grbg2 text-white"><?php echo getEduAppGTLang('user');?></th>
                                    <th class="grbg2 text-white"><?php echo getEduAppGTLang('name');?></th>
                                </tr>
                            </thead>
                            <?php foreach ($user_list as $user):?>
                                <tr>
                                    <td width = "20%"><input type="checkbox" class="<?php echo $user_array[$i]; ?>" name="user[]" value="<?php echo $user_array[$i].'_'.$user[$user_array[$i].'_id']; ?>"></td>
                                    <td width = "25%"><?php echo $user['username'] ?></td>
                                    <td width = "55%"><?php echo $user['first_name']." ".$user['last_name'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                <?php endfor; ?>
                    <div class="pull-right">
                        <button type="submit" name="submit" class="btn btn-purple btn-rounded"><?php echo getEduAppGTLang('create_group');?></button>
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
    </div> 