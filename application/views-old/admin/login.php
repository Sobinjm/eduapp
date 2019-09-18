<?php
$this->load->view('front/header');
?>
    <!--Section-->
    <section class="blockClass fluidHeightSection studenLoginBg">
        <div class="container">
            <div class="centerPatch">
                <!--Left Part-->
                <div class="centerPatchContainer blockClass">
                    <h1 class="heading" style="margin-bottom: 25px">Admin/Trainer Login</h1>
                    <p class="paraMedium">Welcome to EDCE-Learning Platform,
                        <br /> Please Log in to Manage courses
                    </p>
                    <?php 
						$csrf = array(
								'name' => $this->security->get_csrf_token_name(),
								'hash' => $this->security->get_csrf_hash()
							);
					?>
					<form action="<?php echo base_url(); ?>admin/login/authenticate" class="blockClass" id="adm_login" method="post" autocomplete="off">
                        <div class="form-control blockClass">
                            <input type="email" class="blockClass fontInput" name="email" placeholder="Username" />
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="form-control blockClass">
                            <input type="password" name="password" class="blockClass fontInput" placeholder="Password" />
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </div>
                        <div class="form-control blockClass">
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                            <button type="submit"  class="blockClass fontButton">Login</button>
							<div class="form-group has-error">
								<?php echo $this->session->flashdata('error'); ?>
							</div>
                        </div>
                        <div class="form-control blockClass form-control-link">
                            <u><?php echo $this->session->flashdata('error'); ?></u>
                            <u>Where is my log in details?</u>
                        </div>
                    </form>
                </div>
                <!--Left Part-->

                <!--Right Part-->
                <div class="centerPatchContainer centerPatchContainerColored blockClass">
                    <h2 class="heading headingIcon" style="margin-bottom: 25px">
                        How does it work?
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                    </h2>
                    <p class="paraMedium">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys
                        standard dummy text ever since the when an unknown printer took a galley of type an.
                    </p>
                    <button class="blockClass fontButton fontButtonBorder">
                        <i class="fa fa-video-camera" aria-hidden="true"></i> Tutorial Video
                    </button>
                </div>
                <!--Right Part-->
            </div>
        </div>
    </section>
    <!--Section-->
<?php
$this->load->view('front/footer');
?>
