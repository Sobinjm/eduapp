<?php



$quiz_count=sizeof($result);
$quiz_type=$result[0]['quiz_type'];
$quiz=$result[0];

$q1=json_decode($quiz['right_answer']);

$d1=json_decode($quiz['drag_drop']);
$d1=(array)$d1;
$q1=(array)$q1;  
// print_r($q1);

// print_r($result);
if($quiz_type=='true_or_false')
{
$var='

                
<input type="hidden" name="edit_quiz_id" id="edit_quiz_id" value="'.$quiz['quiz_id'].'">
<input type="hidden" name="edit_quiz_type" id="edit_quiz_type" value="'.$quiz_type.'">
                <div class="col-lg-12 col-md-12 col-sm-12" id="edit_true_or_false">
								<div class="col-lg-12 col-md-12 col-sm-12 quiz_border">
									<div class="form-group">
										<h4 class="box-title padd_5e"><u>True or  False Quiz</u></h4>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label">Please Type Question</label>
										<div class="col-sm-8">
											<textarea class="textarea" id="edit_quiz_question" name="quiz_question" placeholder="Please type question"
											style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">'.$quiz['question'].'</textarea>	
										</div>
									</div>
									<div class="form-group">
										<label for="quiz_question" class="col-sm-4 control-label"></label>
                                        <div class="col-sm-8">';
                                        if($quiz['trueorfalse']=='true')
                                        {
                                            $var.='<select class="form-control" name="trf_answer" id="edit_trf_answer" >
                                            <option value="true" selected>True</option>
                                            <option value="false">False</option>
                                        </select>';
                                        }
                                        else{
                                            $var.='<select class="form-control" name="trf_answer" id="edit_trf_answer" >
                                            <option value="true" >True</option>
                                            <option value="false" selected>False</option>
                                        </select>';
                                        }
											$var.='
										</div>
									</div>
								</div>
							</div>
                
                ';


}
else if($quiz_type=='right_answer'){


$var='<!---------------Quiz type 2-------------->
<input type="hidden" name="edit_quiz_id" id="edit_quiz_id" value="'.$quiz['quiz_id'].'">
<input type="hidden" name="edit_quiz_type" id="edit_quiz_type" value="'.$quiz_type.'">
<div class="col-lg-12 col-md-12 col-sm-12" id="edit_right_answer" >
    <div class="col-lg-12 col-md-12 col-sm-12 quiz_border">
        <div class="form-group">
            <h4 class="box-title padd_5e"><u>Right Answer Quiz</u></h4>
        </div>
        <div class="form-group">
            <label for="quiz_question" class="col-sm-4 control-label">Please Type Question</label>
            <div class="col-sm-8">
                <textarea class="textarea" id="edit_ra_question" name="ra_question" placeholder="Please type question"
                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">'.$quiz['question'].'</textarea>	
            </div>
        </div>
        <div class="form-group">
            <label for="no_lessons" class="col-sm-4 control-label">Attach Media to Quiz</label>
            <div class="col-sm-8">
                <div class="radio">
                    <label>
                        <input type="radio" name="ra_media" id="edit_ra_media_one" value="video" checked="">
                        Video
                    </label>
                    <label>
                        <input type="radio" name="ra_media" id="edit_ra_media_two" value="image" checked="">
                        Image
                    </label>
                    <label>
                        <input type="radio" name="ra_media" id="edit_ra_three" value="audio" checked="">
                        Audio
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="icon_file" class="col-sm-4 control-label">Upload Media</label>
            <div class="col-sm-8">
                <input type="file" id="edit_ra_file" name="ra_file">
                <small>[Leave blank if you dont want to change existing file ]</small>
                    <img class="loader" src="'.base_url().'front/images/loader.gif"  style="height:200px; width:200px;display:none"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-7 control-label">Please type answer & select correct answer</label>
            <div class="col-sm-4"></div>
        </div>
        <div class="form-group">
            <label for="raa_answer" class="col-sm-4 control-label">"A" Answer:</label>
            <div class="col-sm-6">
                <input type="textbox" class="form-control" id="edit_raa_answer" name="raa_answer" value="'.$q1['a']->question.'" placeholder="A Answer">
            </div>
            <div class="col-sm-2">
                <input type="radio" name="ra_correct_answer" id="edit_raa_correct_answer" value="a" ';
                
                if($q1['a']->answer=='yes')
                {
                    $var.='checked>';
                }
                else{
                $var.='>';
                }
                $var.='
            </div>
        </div>
        <div class="form-group">
            <label for="rab_answer" class="col-sm-4 control-label">"B" Answer:</label>
            <div class="col-sm-6">
                <input type="textbox" class="form-control" id="edit_rab_answer" name="rab_answer" value="'.$q1['b']->question.'" placeholder="B Answer">
            </div>
            <div class="col-sm-2">
                <input type="radio" name="ra_correct_answer" id="edit_rab_correct_answer" value="b"';
                if($q1['b']->answer=='yes')
                {
                    $var.='checked>';
                }
                else{
                $var.='>';
                }
                $var.='
            </div>
        </div>
        <div class="form-group">
            <label for="rac_answer" class="col-sm-4 control-label">"C" Answer:</label>
            <div class="col-sm-6">
                <input type="textbox" class="form-control" id="edit_rac_answer" name="rac_answer" value="'.$q1['c']->question.'" placeholder="C Answer">
            </div>
            <div class="col-sm-2">
                <input type="radio" name="ra_correct_answer" id="edit_rac_correct_answer" value="c"';
                if($q1['c']->answer=='yes')
                {
                    $var.='checked>';
                }
                else{
                $var.='>';
                }
                $var.='
            </div>
        </div>
        <div class="form-group">
            <label for="rad_answer" class="col-sm-4 control-label">"D" Answer:</label>
            <div class="col-sm-6">
                <input type="textbox" class="form-control" id="edit_rad_answer" name="rad_answer" value="'.$q1['d']->question.'" placeholder="D Answer">
            </div>
            <div class="col-sm-2">
                <input type="radio" name="ra_correct_answer" id="edit_rad_correct_answer" value="d"';
                if($q1['a']->answer=='yes')
                {
                    $var.='checked>';
                }
                else{
                $var.='>';
                }
                $var.='
            </div>
        </div>
    </div>
</div>';

}
else{


$var='<div class="col-lg-12 col-md-12 col-sm-12" id="edit_draganddrop" >
<input type="hidden" name="edit_quiz_id" id="edit_quiz_id" value="'.$quiz['quiz_id'].'">
<input type="hidden" name="edit_quiz_type" id="edit_quiz_type" value="'.$quiz_type.'">
<div class="col-lg-12 col-md-12 col-sm-12 quiz_border">
    <div class="form-group">
        <h4 class="box-title padd_5e"><u>Drag & Drop Quiz</u></h4>
    </div>
    
    <div class="form-group">
        <label class="col-sm-7 control-label" style="text-align: left;">Please type the sentences in part</label>
        <div class="col-sm-4"></div>
    </div>
    <div class="form-group">
        <div class="col-sm-6">
            <input type="textbox" class="form-control" id="edit_dada_questiom" name="dada_questiom" value="'.$d1['question_one']->question.'" placeholder="Question A">
        </div>
        <div class="col-sm-6">
            <input type="textbox" class="form-control" id="edit_dada_answer" name="dada_answer"  value="'.$d1['question_one']->matching_answer.'" placeholder="Matching Answer">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6">
            <input type="textbox" class="form-control" id="edit_dadb_questiom" name="dadb_questiom" value="'.$d1['question_two']->question.'" placeholder="Question B">
        </div>
        <div class="col-sm-6">
            <input type="textbox" class="form-control" id="edit_dadb_answer" name="dadb_answer"  value="'.$d1['question_two']->matching_answer.'"  placeholder="Matching Answer">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6">
            <input type="textbox" class="form-control" id="edit_dadc_questiom" name="dadc_questiom" value="'.$d1['question_three']->question.'" placeholder="Question C">
        </div>
        <div class="col-sm-6">
            <input type="textbox" class="form-control" id="edit_dadc_answer" name="dadc_answer"  value="'.$d1['question_three']->matching_answer.'" placeholder="Matching Answer">
        </div>
    </div>
</div>
</div>';

}

echo $var;
?>