<?php
$this->load->view('front/header');
?>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript">

// Ajax post for refresh captcha image.
$(document).ready(function() {
$("a.refresh").click(function() {
 
$.ajax({
url: "<?php echo base_url(); ?>" + "captcha_controller/captcha_refresh",
type: 'get',
  dataType: 'html',        
  success: function(res) {
    // alert(res);
    jQuery("div.image").html(res);
  },
  error: function(data) {
    alert(JSON.stringify(data));
  }
});
});
});
</script>
    <!--Section-->
    <section class="blockClass fluidHeightSection studenLoginBg">
        <div class="container">
            <div class="centerPatch">
                <!--Left Part-->
                <div class="centerPatchContainer blockClass">
                    <h1 class="heading" style="margin-bottom: 25px">STUDENT Login</h1>
                    <p class="paraMedium">Welcome to EDCE-Learning Platform,
                        <br /> Please Log in to Manage courses
                    </p>
                    <?php 
						$csrf = array(
								'name' => $this->security->get_csrf_token_name(),
								'hash' => $this->security->get_csrf_hash()
							);
					?>
                    <form action="<?php echo base_url(); ?>login/authenticate" class="blockClass" id="adm_login" method="post" autocomplete="off">
                    
                    
                        <div class="form-control blockClass">
                            <input type="password" class="blockClass fontInput" name="Snumber" placeholder="Student Number" />
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="form-control blockClass">
                            <input type="text" name="Tnumber" class="blockClass fontInput" placeholder="Traffic Number" />
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="form-control blockClass">
                            <input type="text" name="Fnumber" class="blockClass fontInput" placeholder="File Number" />
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </div>
                        <div class="form-control blockClass">
                            <input type="text" name="Bnumber" class="blockClass fontInput" placeholder="Branch Number" />
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </div>
                        <div class="form-control " style='display:inline-block'>
                            <div class='image' style='display:inline-block'>
                                <?php 

                                    echo $image;
                                    
                                    echo "</div>";
                                    echo "<a href='#' class ='refresh' style='display:inline-block'><img id = 'ref_symbol' width='40' height='40' src =".base_url()."img/refresh.png></a>";
                                    // Calling for refresh captcha image.
                                   
                                    echo "<br>";
                                    echo "<br>";

                                    // Captcha word field.
                                    echo form_label('Captcha');
                                    
                                    ?>
                            </div>
                            <div class="form-control blockClass" style='display:inline-block'>
                                <?php 
                            $data_captcha = array(
                                    'name' => 'captcha',
                                    'class' => 'input_box blockClass  fontInput',
                                    'color' => 'white',
                                    'placeholder' => '',
                                    'id' => 'captcha'
                                    );
                                    echo form_input($data_captcha);
                                    ?>
                        </div>
                        <div class="form-control blockClass">
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                            <button type="submit"  class="blockClass fontButton">Login</button>
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
