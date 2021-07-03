<form action="/includes/user/components/update-profile.php" method="post" enctype="multipart/form-data" id="UploadForm">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#general" data-toggle="tab">General</a></li>
      <li><a href="#personal" data-toggle="tab">Personal</a></li>
      <li><a href="#socialmedia" data-toggle="tab">Social Media</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade in active" id="general">         
            <div class="col-md-6">
                <div class="form-group float-label-control">                      
                    <label for="">First Name</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['member_firstname'];?>" name="member_firstname" value="<?php echo $rws['member_firstname'];?>">
                </div>
                <div class="form-group float-label-control">  
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['member_lastname'];?>" name="member_lastname" value="<?php echo $rws['member_lastname'];?>">
                </div>
                <div class="form-group float-label-control">
                    <label for="">Avatar</label>
                    <input name="ImageFile" type="file" id="uploadFile"/>
                    <div class="col-md-6">
                        <div class="shortpreview">
                            <label for="">Previous Avatar </label>
                            <br> 
                            <img src="/memberfiles/avatars/<?php echo $rws['member_avatar'];?>" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="shortpreview" id="uploadImagePreview">
                            <label for="">Current Uploaded Avatar </label>
                            <br> 
                            <div id="imagePreview"></div>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-md-6">
                <label for="">membername</label>
                <div class="form-group float-label-control">
                    <a href="https://www.andrewchumchal.com/user/profile.php/?username=<?php echo $rws['username'];?>">
                            <span class="input-group-addon">https://www.andrewchumchal.com/user/profile.php/?username=</span>
                            <fieldset disabled>
                                <input type="text" class="form-control" placeholder="<?php echo $rws['username'];?>" name="member_membername" value="<?php echo $rws['username'];?>" id="disabledTextInput" autocomplete="off">
                            </fieldset>
                     </a>
                </div>
                <div class="form-group float-label-control">
                    <label for="">Password</label>
                    <fieldset disabled>
                      <input type="password" class="form-control" placeholder="<?php echo $rws['password'];?>" name="member_password" value="<?php echo $rws['password'];?>">
                    </fieldset>
                    <h6> If you need to change your password please email account@andrewchumchal.com </h6>
                </div>
                <div class="form-group float-label-control">
                    <label for="">Email</label> 
                    <input type="text" class="form-control" placeholder="<?php echo $rws['email'];?>" name="member_email" value="<?php echo $rws['email'];?>">
                </div>  
            </div>
        </div>
        <div class="tab-pane fade" id="personal">
            <div class="col-md-6">
                <div class="form-group float-label-control">
                    <label for="">Short Bio</label>
                    <textarea class="form-control" placeholder="<?php echo $rws['member_shortbio'];?>" rows="10" placeholder="<?php echo $rws['member_shortbio'];?>" name="member_shortbio" value="<?php echo $rws['member_shortbio'];?>"><?php echo $rws['member_shortbio'];?></textarea>
                </div>
                <div class="form-group float-label-control">
                    <label for="">Birthday</label>   
                    <input type="date" class="form-control" placeholder="<?php echo $rws['member_dob'];?>" name="member_dob" value="<?php echo $rws['member_dob'];?>">      
                </div>
                <div class="form-group float-label-control">
                    <label for="">Profession</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['member_profession'];?>" name="member_profession" value="<?php echo $rws['member_profession'];?>" id="profession">    
                </div>  
                <label for="">Gender</label>              
                <div class="form-group float-label-control">
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="member_gender" id="optionsRadios1" value="Male" checked>Male</label>
                    </div>              
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="member_gender" id="optionsRadios1" value="Female">Female</label>
                    </div>
                </div>
                <div class="form-group float-label-control">
                    <label for="">Country</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['member_country'];?>" name="member_country" value="<?php echo $rws['member_country'];?>" id="country">    
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group float-label-control">
                    <label for="">Address</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['member_address'];?>" name="member_address" value="<?php echo $rws['member_address'];?>">    
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="socialmedia">
          <div class="col-md-6">
          <label for="">Website</label>
                <div class="form-group float-label-control">
                    <div class="input-group">                  
                        <span class="input-group-addon">https://</span>
                        <input type="text" class="form-control" placeholder="<?php echo $rws['member_website'];?>" name="member_website" value="<?php echo $rws['member_website'];?>">                  
                    </div>
                </div> 
                <label for="">Facebook</label>
                <div class="form-group float-label-control">
                    <div class="input-group">                  
                        <span class="input-group-addon">https://</span>
                        <input type="text" class="form-control" placeholder="<?php echo $rws['member_facebook'];?>" name="member_facebook" value="<?php echo $rws['member_facebook'];?>">                  
                    </div>
                </div>
                <label for="">Twitter</label>
                <div class="form-group float-label-control">
                    <div class="input-group">                  
                        <span class="input-group-addon">https://</span>
                        <input type="text" class="form-control" placeholder="<?php echo $rws['member_twitter'];?>" name="member_twitter" value="<?php echo $rws['member_twitter'];?>">                  
                    </div>
                </div>
                <label for="">Goolge Plus</label>
                <div class="form-group float-label-control">
                    <div class="input-group">
                        <span class="input-group-addon">https://</span>
                        <input type="text" class="form-control" placeholder="<?php echo $rws['member_googleplus'];?>" name="member_googleplus" value="<?php echo $rws['member_googleplus'];?>">                  
                    </div>
                </div>
                <label for="">Skype</label>
                <div class="form-group float-label-control">
                    <div class="input-group">
                        <span class="input-group-addon">https://</span>
                        <input type="text" class="form-control" placeholder="<?php echo $rws['member_skype'];?>" name="member_skype" value="<?php echo $rws['member_skype'];?>">                  
                    </div>
                </div>
               </div>
               <div class="col-md-6">
                <label for="">Github</label>
                <div class="form-group float-label-control">
                    <div class="input-group">
                        <span class="input-group-addon">https://</span>
                        <input type="text" class="form-control" placeholder="<?php echo $rws['member_github'];?>" name="member_github" value="<?php echo $rws['member_github'];?>">                  
                    </div>
                </div>
                <label for="">Youtube</label>
                <div class="form-group float-label-control">
                    <div class="input-group">
                        <span class="input-group-addon">https://</span>
                        <input type="text" class="form-control" placeholder="<?php echo $rws['member_youtube'];?>" name="member_youtube" value="<?php echo $rws['member_youtube'];?>">                  
                    </div>
                </div>
                <label for="">Vimeo</label>
                <div class="form-group float-label-control">
                    <div class="input-group">
                        <span class="input-group-addon">https://</span>
                        <input type="text" class="form-control" placeholder="<?php echo $rws['member_vimeo'];?>" name="member_vimeo" value="<?php echo $rws['member_vimeo'];?>">                  
                    </div>
                </div>
                <label for="">Pinterest</label>
                <div class="form-group float-label-control">
                    <div class="input-group">
                        <span class="input-group-addon">https://</span>
                        <input type="text" class="form-control" placeholder="<?php echo $rws['member_pinterest'];?>" name="member_pinterest" value="<?php echo $rws['member_pinterest'];?>">                  
                    </div>
                </div>
              </div>
            </div>
          </div>
    <br>
    <div class="submit">
        <center>
            <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" />Save Your Profile</button>
        </center>
    </div>
</form>