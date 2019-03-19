<?php
$this->load->view('front/header');
$length=sizeof($result);
$lesson=$this->uri->segment(3);
?>

    <!--Section : Header Sub Section-->
    <section class="blockClass headerSubSection">
        <div class="container">
        E-Learning Slider > <?php echo $course_info['0']['course_name'];?> > Lesson <?php  echo $lesson_data['0']['lesson_order'];?> -  <?php echo $lesson_data['0']['lesson_name']; ?>
        </div>
    </section>
    <!--Section : Header Sub Section-->

    <!--Section : Section Heading-->
    <section class="blockClass sectionSubHeading">
        <div class="container">
            <h3 class="heading">E-Learning Slider:</h3>
            <small class="smallFont">Slider display the course Content slides.</small>
        </div>
    </section>

    <!--Section : Section Heading-->

    <!--Section-->
    <section class="blockClass mainSection">
        <!--Video Wrapper-->
        <div class="blockClass videoFrameWrapper" style="position: relative;">
            <div class="table_padding">
                    </div>
                        <div id="vid_div" align="center" class="embed-responsive embed-responsive-16by9">
                            <?php 
                            if(sizeof($result) >=1){
                            
                                if($result['0']['slide_mode'] == 'video' || $result['0']['slide_mode'] == 'audio' )
                                {                                   
                            ?>
                            <video id="my-player" class="video-js vjs-big-play-centered" data-setup='{"fluid": true}' controls preload="auto" poster="<?php echo base_url(); ?>front/images/elearnvid.png" onended="change_vid()">
                              <source src="<?php echo base_url().$result['0']['slide_file']; ?>" type="video/mp4"></source>
                              <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank">
                                  supports HTML5 video
                                </a>
                              </p>
                            </video>
                            
                            <?php
                                } 
                                else
                                {
                            ?>      
                                <img src="<?php echo base_url().$result['0']['slide_file']; ?>" class="img-responsive"/>
                                <div class="overlay">
                                    <button class="blockClass fontButton fontButtonAbsolute" id="next">Next</button>
                                </div>
                            <?php       
                                }
                            }
                            
                            ?>
                        </div>
                        <div class="table_padding bordered_video_desc">
                            <?php if(sizeof($result)>=1){echo $result[0]['slide_description']; }?>
                        </div>
                        <?php 
                            if(sizeof($result) >=1){?>
                             <!--Absolute Overlay-->
                            <div class="overlay">
                                <button class="blockClass fontButton fontButtonAbsolute" id="start">Start Now
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </button>
                                <button class="blockClass fontButton fontButtonAbsolute" id="next" style="display: none;">Next</button>
                            </div>
                            <?php 
                            }
                            ?>
                <!-- Script for the video player -->

                 <div class="bottom_right" style="display: none;">
                     <button class="blockClass fontButton fontButtonAbsolute" id="next_img" style="top:80%;left:89%;">Next
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </button>
                    <a href="<?php echo base_url();?>lesson/assignment/<?php echo $lesson;?>"><button class="blockClass fontButton fontButtonAbsolute" id="last_slide" style="top:80%;left:89%;display: none;">
                        Goto Quiz
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </button></a>
                 </div>  
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
                <script>
                    // function player_slide(){
                    //     var myPlayer = document.getElementById("my-player");
                    //     myPlayer.play();
                    //     var overlay=$('.overlay');
                    //     overlay.css("display","none");
                    // }  

                        function change_vid(){

                            var overlay=$('.overlay');
                            $('#start').css('display','none');
                            overlay.css("display","block");
                            $('#next').css('display','block');
                        } 
                    $(document).ready(function(){
                        var base_url='<?php echo base_url();?>';
                        var slider_number=0;
                        var total='<?php echo $length;?>';
                        total=total-1;
                        <?php
                            $lesson_id=$this->crc_encrypt->decode($this->uri->segment(3));
                         ?>
                         var lesson_id='<?php echo $lesson_id ?>';
                        var myPlayer=document.getElementById("my-player");
                        var overlay=$('.overlay');
                        var sl_title='<?php echo $result[0]['slide_title'] ?>';
                        $('.slide_title').html(sl_title);
                        $('#start').click(function(){
                            myPlayer=document.getElementById("my-player");
                            myPlayer.play();
                            overlay.css("display","none");
                        });
                       $('#next').click(function(){
                            slider_number++;
                            $.ajax({
                                 type: "GET",
                                 url: base_url + "/index.php/lesson/get_slide/", 
                                 data: {slider_no : slider_number, ls_id : lesson_id},
                                 contentType: 'json',
                                 success: function(result){
                                    var obj=JSON.parse(result);
                                    var html=obj.data;
                                    var type=obj.type;
                                    var last=obj.comp;
                                    var sl_html=obj.sl_title;
                                    $('.slide_title').html(sl_html);
                                    if(type!='image'){
                                        $('#vid_div').html(html);
                                        overlay.css("display","block");
                                        $('#next').css("display","none");
                                        $('#next_img').css("display","none");
                                        $('#start').css("display","block");
                                        $('#last_slide').css("display","none");
                                    }
                                    else{
                                       $('#vid_div').html(html);
                                       overlay.css("display","none");
                                        $('#next').css("display","none");
                                        $('#start').css("display","none");
                                       $('.bottom_right').css("display","block");
                                        $('#next_img').css("display","block");
                                        $('#last_slide').css("display","none");
                                    }
                                    
                                    if(slider_number==total){
                                        $('#next').css("display","none");
                                        $('#start').css("display","none");
                                        $('.bottom_right').css("display","block");
                                        $('#next_img').css("display","none");
                                        $('#last_slide').css("display","block");
                                    }
                                    
                                 },
                                 error:function(ex){
                                    alert(JSON.stringify(ex));
                                }
                            });
                       });
                    });
                </script>
        </div>
        <!--Video Wrapper-->

        <!--Content Wrapper-->
        <div class="blockClass contentWrapper">
            <div class="container">
            <?php if(sizeof($result) <1){echo "<h3>There are no coursed added to this lesson yet.</h3>";}?>
                <h2 class="heading">
                    <span class="slide_title"></span>
                    <br />
                    <small class="smallFont">Lesson <?php  echo $lesson_data['0']['lesson_order'];?>
                        <span class="darkSmallFont">| <?php echo $lesson_data['0']['lesson_name']; ?></span>
                    </small>
                </h2>

                <div class="blockClass labelAndButton">
                    <!--Left-->
                    <div class="labelContainer">
                        <span class="labelIcon">
                            <i class="fa fa-car" aria-hidden="true"></i>
                        </span>
                        <?php 
                                                echo $course_info['0']['course_name'];
                                            ?>
                    </div>
                    <!--Left-->

                    <!--Right-->
                    
                    <!--Right-->
                </div>

                <div class="blockClass mainContentWrapper">
                    <h4 class="heading">Transcript</h4>
                    <p class="paraSmall">To begin your lesson please click start now</p>
                </div>
            </div>
        </div>
        <!--Content Wrapper-->
    </section>
    <!--Section-->
<?php
$this->load->view('front/inner-footer');
?>