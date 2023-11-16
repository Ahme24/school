    <div class="content-w">
        <?php include 'fancy.php';?>
        <div class="header-spacer"></div>
      	<div class="conty">
            <div class="all-wrapper no-padding-content solid-bg-all">
	            <div class="layout-w">
                  	<div class="content-w">
                  		<div class="content-i">
                        	<div class="content-box">
                      			<div class="app-email-w">
                        			<div class="app-email-i">
                      					<div class="ae-content-w grbg">
											<div class="top-header top-header-favorit">
											    <div class="top-header-thumb">
													<img src="<?php echo base_url();?>public/uploads/<?php echo $this->crud->getInfo('bglogin');?>" class="bgcover">
												    <div class="top-header-author">
														<div class="author-thumb">
														    <img src="<?php echo base_url();?>public/uploads/<?php echo $this->crud->getInfo('logo');?>" class="authorCv">
													    </div>
													    <div class="author-content">
															<a href="javascript:void(0);" class="h3 author-name"><?php echo getEduAppGTLang('teachers');?></a>
														    <div class="country"><?php echo $this->crud->getInfo('system_name');?>  |  <?php echo $this->crud->getInfo('system_title');?></div>
													    </div>
												    </div>
											    </div>
											    <div class="profile-section bg-white">
													<div class="control-block-button">
                        							    <a href="#" class="btn btn-control bg-purple c-btn-purple" data-toggle="modal" data-target="#creardocente">
                                                            <i class="icon-feather-plus" title="<?php echo getEduAppGTLang('new_account');?>"></i>
                                                        </a>
												    </div>
											    </div>
										    </div>
            								<div class="aec-full-message-w">
                    							<div class="aec-full-message">
                    								<div class="container-fluid grbg"><br>
                        								<div class="col-sm-12">   
                    									   <div class="row">
                                                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                                                    <div class="form-group label-floating bg-white">
                                                                        <label class="control-label"><?php echo getEduAppGTLang('search');?></label>
                                                                        <input class="form-control" id="filter" type="text" required="">
                                                                    </div>
                                                                </div>
                                                            </div>
															<div class="row" id="results">
															    <?php 
    																$this->db->order_by('teacher_id', 'desc');
																    $teacher = $this->db->get('teacher')->result_array();
                                                                    foreach($teacher as $row):
                                                                ?>
                                                                <div class="col-xl-4 col-md-6 results">
                                                                    <div class="card-box widget-user ui-block list">
                                                                        <div class="more pull-right">
                                                                            <i class="icon-options"></i>                                
                                                                            <ul class="more-dropdown">
                                                                                <li><a href="javascript:void(0);" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_teacher/<?php echo $row['teacher_id'];?>');"><?php echo getEduAppGTLang('edit');?></a></li>
                                                                                <li><a onClick="return confirm('<?php echo getEduAppGTLang('confirm_delete');?>')" href="<?php echo base_url();?>admin/teachers/delete/<?php echo $row['teacher_id'];?>"><?php echo getEduAppGTLang('delete');?></a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div>
                                                                            <img src="<?php echo $this->crud->get_image_url('teacher', $row['teacher_id']);?>" class="img-responsive rounded-circle" alt="user">
                                                                            <div class="wid-u-info">
                                                                                <a href="<?php echo base_url();?>admin/teacher_profile/<?php echo $row['teacher_id'];?>/" class="h6 author-name"><h5 class="mt-0 m-b-5"> <?php echo $this->crud->get_name('teacher', $row['teacher_id']);?></h5></a>
                                                                                <p class="text-muted m-b-5 font-13">
                                                                                    <b><i class="picons-thin-icon-thin-0291_phone_mobile_contact"></i></b> <?php  echo $row['phone'];?><br>
                                                                                    <b><i class="picons-thin-icon-thin-0321_email_mail_post_at"></i></b> <?php  echo $row['email'];?><br>
                                                                                    <b><i class="picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i></b> <?php  echo $row['username'];?><br>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php endforeach;?>
    														</div>
          											    </div>
                  								    </div>
            							        </div>
            							    </div>      
    							        </div>	
      							    </div>
						        </div>  
    					    </div>
                        </div>
                    </div>
                </div>
                <div class="display-type"></div>
            </div>
        </div>
    </div>
 
    <div class="modal fade" id="creardocente" tabindex="-1" role="dialog" aria-labelledby="creardocente" aria-hidden="true">
        <div class="modal-dialog window-popup edit-my-poll-popup" role="document">
            <div class="modal-content">
                <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close"></a>
                <div class="modal-body">
                    <div class="ui-block-title mdl-header">
                        <h6 class="title text-white"><?php echo getEduAppGTLang('new_account');?></h6>
                    </div>
                    <div class="ui-block-content">
        	            <?php echo form_open(base_url() . 'admin/teachers/create' , array('enctype' => 'multipart/form-data'));?>
	                        <div class="row">
              		            <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                		            <div class="form-group">
                  			            <label class="control-label"><?php echo getEduAppGTLang('photo');?></label>
                  			            <input class="form-control" name="userfile" type="file">
	                	            </div>
              		            </div>
                          		<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            	                	<div class="form-group label-floating">
                              			<label class="control-label"><?php echo getEduAppGTLang('first_name');?></label>
                              			<input class="form-control" name="first_name" type="text" required="">
            	                	</div>
                        		</div>
                            	<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            		<div class="form-group label-floating">
                              			<label class="control-label"><?php echo getEduAppGTLang('last_name');?></label>
                              			<input class="form-control" name="last_name" type="text" required="">
                            		</div>
                          		</div>
                          		<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                          			<div class="form-group label-floating is-select">
                                        <label class="control-label"><?php echo getEduAppGTLang('gender');?></label>
                                        <div class="select">
                                            <select name="gender">
                                                <option value=""><?php echo getEduAppGTLang('select');?></option>
                                                <option value="M"><?php echo getEduAppGTLang('male');?></option>
                                                <option value="F"><?php echo getEduAppGTLang('female');?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            		<div class="form-group label-floating">
                              			<label class="control-label"><?php echo getEduAppGTLang('username');?></label>
                              			<input class="form-control" placeholder="" type="text" name="username" id="user_accountant">
                              			<small><span id="result_accountant"></span></small>
                              			<span class="input-group-addon">
            	                    		<i class="icon-feather-mail"></i>
                              			</span>
                            		</div>
                          		</div> 
                          		<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            		<div class="form-group label-floating">
                              			<label class="control-label"><?php echo getEduAppGTLang('password');?></label>
                              			<input class="form-control" placeholder="" type="password" name="password">
                              			<span class="input-group-addon">
            	                    		<i class="icon-feather-mail"></i>
                              			</span>
                            		</div>
                          		</div> 
                          		<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            		<div class="form-group label-floating">
                              			<label class="control-label"><?php echo getEduAppGTLang('email');?></label>
                              			<input class="form-control" placeholder="" type="email" id="emailx" name="email">
                              			<small><span id="result_emailx"></span></small>
                              			<span class="input-group-addon">
            	                    		<i class="icon-feather-mail"></i>
                              			</span>
                            		</div>
                          		</div>              
                          		<div class="col col-lg-6 col-md-6 col-sm-12 col-12">              
                            		<div class="form-group label-floating is-empty">
                              			<label class="control-label"><?php echo getEduAppGTLang('phone');?></label>
                              			<input class="form-control" name="phone" type="text">
                              			<span class="input-group-addon">
                                			<i class="icon-feather-phone"></i>
                              			</span>
                            		</div>
                          		</div>
                          		<div class="col col-lg-6 col-md-6 col-sm-12 col-12">              
                            		<div class="form-group label-floating is-empty">
                              			<label class="control-label"><?php echo getEduAppGTLang('identification');?></label>
                              			<input class="form-control" name="idcard" type="text">
                              			<span class="input-group-addon">
                                			<i class="icon-feather-phone"></i>
                              			</span>
                            		</div>
                          		</div>
                          		<div class="col col-lg-6 col-md-6 col-sm-12 col-12">              
                            		<div class="form-group date-time-picker label-floating">
                              			<label class="control-label"><?php echo getEduAppGTLang('birthday');?></label>
                              			<input type='text' class="datepicker-here" data-position="top left" data-language='en' name="datetimepicker" data-multiple-dates-separator="/"/>
                              			<span class="input-group-addon">
                                			<i class="icon-feather-calendar"></i>
                              			</span>
                            		</div>
                          		</div>
                          		<div class="col col-lg-6 col-md-6 col-sm-12 col-12">          
                            		<div class="form-group label-floating is-empty">
                              			<label class="control-label"><?php echo getEduAppGTLang('address');?></label>
                              			<input class="form-control" name="address" type="text">
                              			<span class="input-group-addon">
                                			<i class="icon-feather-map-pin"></i>
                              			</span>
                            		</div>        
                          		</div>                
                        	</div>
          		            <div class="form-buttons-w text-right">
	             	            <center><button class="btn btn-rounded btn-success btn-lg" id="sub_accountant" type="submit"><?php echo getEduAppGTLang('save');?></button></center>
          		            </div>
          	            <?php echo form_close();?>        
                    </div>
                </div>
            </div>
        </div>
    </div>