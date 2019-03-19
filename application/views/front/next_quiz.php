<?php

// print_r($result[$quiz_id[0]]);

$quiz_count=sizeof($result);
$quiz_type=$result[$quiz_id[0]]['quiz_type'];
$quiz=$result[$quiz_id[0]];

$q1=json_decode($quiz['right_answer']);

$q1=(array)$q1;  
// print_r($q1);
if($quiz_count==$quiz_id[0]+1)
{
$data['final']=true;
}
else
{
    $data['final']=false;
}

$data['quiz']=$quiz_count.'->'.$quiz_id[0];
if($quiz_type=='true_or_false')
{
$var='
<!--Absolute Overlay-->
<div class="overlay">
                    <!--Left Instruction-->
                    <div class="instruction">
                        <i class="fa fa-question-circle coloredI" aria-hidden="true"></i>
                        Please choose the correct answer:
                    </div>
                    <!--Left Instruction-->

                    <!--Center Block-->
                    <input type="hidden" id="quiz1_ans" value="'.$quiz['trueorfalse'].'">
                    <div class="centerBlockContainer with2Buttons">
                        <span class="absoluteContent">'.$quiz['question'].'</span>
                    </div>
                    <!--Center Block-->

                    <!--Buttons-->
                    <div class="blockClass v_Buttons v_Buttons2Part">
                        <button class="fontButton ans_btn" data-quizid="'.$quiz['quiz_id'].'" data-value="true">True</button>
                        <button class="fontButton ans_btn" data-quizid="'.$quiz['quiz_id'].'" data-value="false">False</button>
                    </div>
                    <!--Buttons-->
                </div>
                <!--Absolute Overlay-->

                <img src="'. base_url().'front/images/videoBg.jpg" />';


}
else if($quiz_type=='right_answer'){
// if($quiz['media_type']!='')
// {
    $var=' 
    <!--Absolute Overlay-->
    <div class="overlay">
        <!--Left Instruction-->
        <div class="instruction">
            <i class="fa fa-question-circle coloredI" aria-hidden="true"></i>
            Please select the correct answer to following question
        </div>
        <!--Left Instruction-->

        <!--Center Block-->
        <div class="centerBlockContainer with4ButtonsCapsules">
            <span class="absoluteContent">';
            if($quiz['mediatype']!='')
            {
            $var.=' <img src="'.base_url().$quiz['upload_media'].'" />
                <br />'.$quiz['question'];
            }
            else{
                $var.=$quiz['question'];
            }
                $var.=' </span>
        </div>
        <!--Center Block-->

        <!--Buttons-->
        <div class="blockClass v_Buttons v_Buttons4Part">
            <button class="v_ButtonBlockCapsules  ans_btn2" data-answer="'.$q1['a']->answer.'">
                <span class="buttonLabels">A</span>
                '.$q1['a']->question.'
            </button>
            <button class="v_ButtonBlockCapsules ans_btn2"  data-answer="'.$q1['b']->answer.'">
                <span class="buttonLabels">B</span>
                '.$q1['b']->question.'
            </button>
            <button class="v_ButtonBlockCapsules  ans_btn2"  data-answer="'.$q1['c']->answer.'">
                <span class="buttonLabels">C</span>
                '.$q1['c']->question.'
            </button>
            <button class="v_ButtonBlockCapsules ans_btn2"  data-answer="'.$q1['d']->answer.'">
                <span class="buttonLabels">D</span>
                '.$q1['d']->question.'
            </button>
        </div>
        <!--Buttons-->
    </div>
    <!--Absolute Overlay-->

    <img src="'.base_url().'front/images/videoBg.jpg" />
';

}
            $data['data']=$var;
            echo json_encode($data);

?>