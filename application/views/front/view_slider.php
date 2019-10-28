<?php 
$slider_number=$sl_no;
if($result[$slider_number]['slide_mode'] == 'video' || $result[$slider_number]['slide_mode'] == 'audio' )
        {                                   
           $data['data']= "<video style=\"min-height:540px; max-height:550px;\" id='my-player' class='video-js vjs-big-play-centered' data-setup='{'fluid': true}' controls preload='auto' poster='".base_url()."front/images/elearnvid.png' onended='change_vid()'><source src='".base_url().$result[$slider_number]['slide_file']."' type='video/mp4'></source><p class='vjs-no-js'>To view this video please enable JavaScript, and consider upgrading to aweb browser that<a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a></p></video>";
           $data['type']='video';
        } 
        else
        {
        	 $data['data']= "<img src='".base_url().$result[$slider_number]['slide_file']."' class='img-responsive'/>";
        	 $data['type']='image';
        }
        if($result[$slider_number]['slide_mode'] == ''){
            $data['compl']=true;
        }
        $data['sl_title']=$result[$slider_number]['slide_title'];
        echo json_encode($data);

?>