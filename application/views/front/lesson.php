<?php
$this->load->view('front/header');
$length=sizeof($result);
$lesson=$this->uri->segment(3);
$current_row=$current_slide-1;
// echo $current_slide;
// die();
if($current_row==-1)
{
    $current_row=0;
}
elseif($current_row>=$length)
{
    $current_row=$length-1;
}
// $current_row=0;
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>admdist/bower_components/jquery/dist/jquery.min.js"></script>
    <!--Section : Header Sub Section-->
    <section class="blockClass headerSubSection">
        <div class="container">
        <a href="<?php echo base_url(); ?>dashboard/">Home</a> > E-Learning Slider >  <?php // echo $lesson_data['0']['lesson_order'];?>   <?php echo $lesson_data['0']['lesson_name']; ?>
        </div>
    </section>
    <!--Section : Header Sub Section-->

    <!--Section : Section Heading-->
    <section class="blockClass sectionSubHeading">
        <div class="container">
            <h3 class="heading">E-Learning Slider</h3>
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
                            
                                if($result[$current_row]['slide_mode'] == 'video' || $result[$current_row]['slide_mode'] == 'audio' )
                                {                                   
                            ?>
                            <video style="min-height:540px; max-height:540px;" id="my-player" class="video-js vjs-big-play-centered" data-setup='{"fluid": true}' controls preload="auto" poster="<?php echo base_url(); ?>front/images/elearnvid.png" onended="change_vid()">
                              <source src="<?php echo base_url().$result[$current_row]['slide_file']; ?>" type="video/mp4"></source>
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
                                <img src="<?php echo base_url().$result[$current_row]['slide_file']; ?>" class="img-responsive"/> <?php if(sizeof($result) >1 ){
                                    ?>
                                <!-- <div class="overlay">
                                    <button class="blockClass fontButton fontButtonAbsolute d" id="next">Next</button>
                                </div> -->
                                <?php
                                }
                                
                                ?>
                                
                            <?php       
                                }
                            }
                            
                            ?>
                        </div>
                        <div class="table_padding bordered_video_desc">
                            <?php  
                            // if(sizeof($result)>=1){echo $result[0]['slide_description']; }
                            ?>
                        </div>
                        <?php 
                            if(sizeof($result) >1 ){
                                if($result[$current_row]['slide_mode'] == 'video' || $result[$current_row]['slide_mode'] == 'audio')
                                {
                                ?>
                             <!--Absolute Overlay-->
                            <div class="overlay">
                               
                            </div>
                            <?php 
                            }
                            // else{
                                 
                                   
                            //         ?>
                            <!-- //     <div class="overlay">
                            //             <button class="blockClass fontButton fontButtonAbsolute a" id="next">Next</button>
                            //         </div> -->
                                <?php
                            // }
                            }
                            ?>
                <!-- Script for the video player -->

                 <div class="bottom_right testdiv" <?php  if((sizeof($result) >1 || sizeof($result)!= $current_row+1) && $result[$current_row]['slide_mode'] != 'image'){ echo'style="display: none;"';}else{  echo'style="display: block;"'; } ?>>
                 <?php  if((sizeof($result) ==1 || (sizeof($result)==$current_row+1)) && ($result[$current_row]['slide_mode'] != 'video' || $result[$current_row]['slide_mode'] != 'audio')){
                     ?>
                       
                    <a href="<?php echo base_url();?>lesson/assignment/<?php echo $lesson;?>"><button class="blockClass fontButton fontButtonAbsolute" id="last_slide" style="top:80%;left:89%;">
                        Goto Quiz
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                    <script>
                    $('#start').css('display','none');
                    </script>
                     <?php


                 }else if(sizeof($result)==1){  echo'<!--<button class="blockClass fontButton fontButtonAbsolute b" id="next_img" style="display:none;top:80%;left:89%;">Next
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </button>-->';
                    ?>
                     <a href="<?php echo base_url();?>lesson/assignment/<?php echo $lesson;?>"><button class="blockClass fontButton fontButtonAbsolute" id="last_slide" style="top:80%;left:89%;">
                        Goto Quiz
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                    <?php }
                    else{
                        // echo sizeof($result);
                        echo'<!--<button class="blockClass fontButton fontButtonAbsolute b" id="next_img" style="display:none;top:80%;left:89%;">Next
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </button>-->';
                    ?>
                     <a href="<?php echo base_url();?>lesson/assignment/<?php echo $lesson;?>"><button class="blockClass fontButton fontButtonAbsolute" id="last_slide" style="top:80%;left:89%;">
                        Goto Quiz
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                    <?php
                    } ?>
                     
                   
                 </div>  
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
                <script>
                    function player_slide(){
                        var myPlayer = document.getElementById("my-player");
                        myPlayer.play();
                        var overlay=$('.overlay');
                        overlay.css("display","none");
                    }  
                   
                        var currentslide=<?php echo $current_row; ?>;
                        if(currentslide>0)
                        {
                            var slider_number=currentslide+1;
                        }
                        else{
                            var slider_number=0;
                        }
                        
                        var total='<?php echo $length;?>';;
                        function change_vid(){

                            var overlay=$('.overlay');
                            $('#start').css('display','none');
                            $('.start').css('display','block');
                            $('#next').css('display','block');
                            overlay.css("display","block");
                            // alert(slider_number+'=='+total);
                            if(slider_number==total){
                                        
                                        $('#last_slide').css("display","block");
                                        
                                    }
                                    else{
                                        $('#next').css('display','block');
                                    }
                            
                            // $('.start').css('display','block');
                        } 
                    jQuery(document).ready(function(){
                        var base_url='<?php echo base_url();?>';
                        // var slider_number=0;
                        // var currentslide=0;
                         total='<?php echo $length;?>';
                        total=total-1;
                        <?php
                            $lesson_id=$this->crc_encrypt->decode($this->uri->segment(3));
                         ?>
                         var lesson_id='<?php echo $lesson_id ?>';
                        var myPlayer=document.getElementById("my-player");
                        var overlay=$('.overlay');
                        var sl_title='<?php echo $result[0]['slide_title'] ?>';
                        $('.slide_title').html(sl_title);
                        $('.start').click(function(){
                            myPlayer=document.getElementById("my-player");
                            myPlayer.play();
                            $(this).css("display","none");
                            overlay.css("display","none");
                            
                        });
                        $('#start').click(function(){
                            myPlayer=document.getElementById("my-player");
                            myPlayer.play();
                            $(this).css("display","none");
                            overlay.css("display","none");
                        });
                       $('#next').click(function(){
                            currentslide = slider_number;
                            // slider_number++;
                            slider_number=parseInt(currentslide)+1;
                            // alert(slider_number);
                            var slide_ccount=$('#slide_ccount').val();
                            
                            $.ajax({
                                 type: "GET",
                                 url: base_url + "/lesson/get_slide/", 
                                 data: {slider_no : slider_number, ls_id : lesson_id},
                                 contentType: 'json',
                                 success: function(result){
                                     console.log(result);
                                    var obj=JSON.parse(result);
                                    var html=obj.data;
                                    var type=obj.type;
                                    var last=obj.comp;
                                    var sl_html=obj.sl_title;
                                    $('.slide_title').html(sl_html);
                                    if(slide_ccount<(parseInt(currentslide)+2))
                                    {
                                        var j=parseInt(slide_ccount)+1;
                                        $('#slide_ccount').val(j);
                                        $('.dropdown-content').append("<a data-slideno="+parseInt(slide_ccount)+">Slide "+(parseInt(j)-1)+"</a>");
                                        


                                    }
                                    $('#nav_slide_count').html(parseInt(currentslide)+2);
                                    if(type!='image'){
                                        // alert(type);
                                        $('#vid_div').html(html);
                                        overlay.css("display","block");
                                        $('#next').css("display","none");
                                        $('#previous').css("display","block");
                                        $('#next_img').css("display","none");
                                        $('#start').css("display","block");
                                        $('#last_slide').css("display","none");
                                    }
                                    else{
                                        // alert(slider_number+'=='+total);
                                       $('#vid_div').html(html);
                                       overlay.css("display","none");
                                       $('#previous').css("display","block");
                                        $('#next').css("display","block");
                                        $('#start').css("display","none");
                                       $('.bottom_right').css("display","block");
                                        $('#next_img').css("display","block");
                                        $('#last_slide').css("display","none");
                                    }
                                    
                                    if(slider_number==total){
                                        if(type!='image'){
                                        $('#next').css("display","none");
                                        $('#previous').css("display","block");
                                        $('#start').css("display","block");
                                        $('.bottom_right').css("display","block");
                                        $('#next_img').css("display","none");
                                        $('#last_slide').css("display","none");
                                        }
                                        else{
                                            $('#next').css("display","none");
                                        $('#previous').css("display","block");
                                        $('#start').css("display","none");
                                        $('.bottom_right').css("display","block");
                                        $('#next_img').css("display","none");
                                        $('#last_slide').css("display","block");
                                        }
                                    }
                                    if(slider_number==0){
                                       
                                        $('#previous').css("display","none");
                                        }
                                    
                                 },
                                 error:function(ex){
                                    alert(JSON.stringify(ex));
                                }
                            });
                       });

                       $('#previous').click(function(){
                        
                            $.ajax({
                                 type: "GET",
                                 url: base_url + "/lesson/get_nextslide/", 
                                 data: {slider_no : currentslide, ls_id : lesson_id},
                                 contentType: 'json',
                                 success: function(result){
                                    currentslide--;
                                    slider_number--;
                                    var obj=JSON.parse(result);
                                    var html=obj.data;
                                    var type=obj.type;
                                    var last=obj.comp;
                                    var sl_html=obj.sl_title;
                                    $('.slide_title').html(sl_html);
                                    $('#nav_slide_count').html(parseInt(currentslide)+2);
                                    if(type!='image'){
                                        // alert(type);
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
                                    
                                    if(currentslide==0){
                                        $('#next').css("display","none");
                                        $('#start').css("display","none");
                                        $('.bottom_right').css("display","block");
                                        $('#next_img').css("display","none");
                                        $('#last_slide').css("display","block");
                                    }
                                    if(slider_number==0){
                                       
                                       $('#previous').css("display","none");
                                       }
                                    
                                 },
                                 error:function(ex){
                                    alert(JSON.stringify(ex));
                                }
                            });
                       });



                   
                       $('a[data-slideno]').on('click',function(){
                        alert();
                        slider_number = $(this).attr("data-slideno");   
                        currentslide = parseInt(slider_number)-1;
                            $.ajax({
                                 type: "GET",
                                 url: base_url + "/lesson/get_slide/", 
                                 data: {slider_no : slider_number, ls_id : lesson_id},
                                 contentType: 'json',
                                 success: function(result){

                                    var obj=JSON.parse(result);
                                    var html=obj.data;
                                    var type=obj.type;
                                    var last=obj.comp;
                                    var sl_html=obj.sl_title;
                                    $('.slide_title').html(sl_html);
                                    $('#nav_slide_count').html(parseInt(currentslide)+2);
                                    if(type!='image'){
                                        // alert(type);
                                        $('#vid_div').html(html);
                                        overlay.css("display","block");
                                        $('#next').css("display","none");
                                        $('#previous').css("display","block");
                                        $('#next_img').css("display","none");
                                        $('#start').css("display","block");
                                        $('#last_slide').css("display","none");
                                    }
                                    else{
                                        // alert(slider_number+'=='+total);
                                       $('#vid_div').html(html);
                                       overlay.css("display","none");
                                       $('#previous').css("display","block");
                                        $('#next').css("display","block");
                                        $('#start').css("display","none");
                                       $('.bottom_right').css("display","block");
                                        $('#next_img').css("display","block");
                                        $('#last_slide').css("display","none");
                                    }
                                    
                                    if(slider_number==total){
                                        if(type!='image'){
                                        $('#next').css("display","none");
                                        $('#previous').css("display","block");
                                        $('#start').css("display","block");
                                        $('.bottom_right').css("display","block");
                                        $('#next_img').css("display","none");
                                        $('#last_slide').css("display","none");
                                        }
                                        else{
                                            $('#next').css("display","none");
                                        $('#previous').css("display","block");
                                        $('#start').css("display","none");
                                        $('.bottom_right').css("display","block");
                                        $('#next_img').css("display","none");
                                        $('#last_slide').css("display","block");
                                        }
                                    }
                                    if(slider_number==0){
                                       
                                       $('#previous').css("display","none");
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
            <div class="row">
                <div class="col-lg-8">
            <?php if(sizeof($result) <1){echo "<h3>There are no slides added to this lesson yet.</h3>";}?>
                <h2 class="heading">
                    <span class="slide_title"></span>
                    <br />
                    <small class="smallFont"> <?php  echo $lesson_data['0']['lesson_name'];?>
                        <span class="darkSmallFont">| <?php echo $lesson_data['0']['description']; ?></span>
                    </small>
                </h2>

                
              
   
                </div>
                <div class="col-lg-4">
                <div class="dropdown" style="float:right;margin-right:10px;">
                <?php //print_r($result); ?>
                    <button class="dropbtn">Slide</button>
                    <div class="dropdown-content">
                        <?php
                        $i=0;
                        $j=0;
                        
                        foreach($lessons as $val)
                        {		

                            if($val['current_slide']>=1 )
                            {
                                for($i=0;$i<$val['current_slide']; $i++)
                                {
                                    $j=$i+1;
                                    echo "<a data-slideno=".$i.">Slide ".$j."</a>";
                                }
                            }
                        }

                        ?>
                    </div>
                    <input type="hidden" id="slide_ccount" value="<?php echo ($current_row + 1); ?>" />
                    <?php echo '<span id="nav_slide_count">'.($current_row + 1)."</span> of ".$length; ?>
                    </div>
                    <br>
                    </div>
                <style>
                    .col-lg-8{
                        width:60%;
                        display:inline;
                        float:left;
                    }
                    .col-lg-4{
                        width:40%;
                        display:inline;
                        float:left;
                    }
                    .dropdown {
                        position: relative;
                        display: inline-block;
                        }

                        .dropdown-content {
                        display: none;
                        position: absolute;
                        background-color: #f1f1f1;
                        min-width: 160px;
                        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                        z-index: 1;
                        }

                        .dropdown-content a {
                        color: black;
                        padding: 12px 16px;
                        text-decoration: none;
                        display: block;
                        }

                        .dropdown-content a:hover {background-color: #ddd;}

                        .dropdown:hover .dropdown-content {display: block;}

                        .dropdown:hover .dropbtn {background-color: #ffa500;}
                        .dropbtn {
                            
                            color: #000;
                            /* padding: 16px; */
                            font-size: 16px;
                            border: none;
                            }
                    </style>
                    </div>
                    <div class="row">
                    <div class="col-lg-8">
                    <div class="blockClass labelAndButton">
                    <!--Left-->
                    <div class="labelContainer">
                        <span class="labelIcon">
                            <i class="fa fa-car" aria-hidden="true"></i>
                        </span>
                        <?php echo $this->session->license_type; ?>
                                            
                    </div>
                    <!--Left-->

                    <!--Right-->
                    
                    <!--Right-->
                </div>
                    </div>
                
                    
                    <div class="col-lg-4">
                <button class="blockClass fontButton " style="display:none;width:30%; float:left;margin-right:10px;" id="previous">Previous</button>
                                            <button class="blockClass fontButton " style="width:30%;float:right;  <?php  if((sizeof($result) ==1 || (sizeof($result)==$current_row+1)) && ($result[$current_row]['slide_mode'] != 'video' || $result[$current_row]['slide_mode'] != 'audio')){
                     ?>
                       display:none <?php } ?>" id="start">Start Now
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </button>
                                <?php 
                                if(sizeof($result) >=1 ){
                                    ?>
                                <button class="blockClass fontButton  c" id="next" style="display:none;width:30%; float:right">Next</button>
                                <button class="blockClass fontButton start" style="width:20%;float:right; display:none" >Reload
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </button>
                                <?php

                                }
                                
                                ?>
                            </div>
                </div>

                <div class="blockClass mainContentWrapper">
                    <!-- <h4 class="heading">Description</h4>
                    <p class="paraSmall"><?php if(sizeof($result)>=1){echo $result[0]['slide_description']; }?></p>
                    <br> -->
                    <h4 class="heading">Transcript</h4>
                    <p class="paraSmall"><?php if(sizeof($result)>=1){echo $result[0]['slide_description']; }?></p>
                </div>
            </div>
        </div>
        <!--Content Wrapper-->
    </section>
    <!--Section-->
<?php
$this->load->view('front/inner-footer');
?>