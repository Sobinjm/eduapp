 <style>
                .holder ul li {
                    margin:10px;
                    padding: 10px;
                    display:inline;
                    
                }
                .holder ul li a{
                line-height: 64px;
                }
                .ans ul li{
                    margin:10px;
                    padding: 10px;
                    display:inline;
                    /* float:left; */
                    
                    
                }
                .ans ul li a{
                    width: 40% !important;
                    margin-bottom:0px !important;
                }
                </style>


<?php
$this->load->view('front/header');
// $student_id	= $this->crc_encrypt->decode($this->session->userdata('userid'));
// $assigned_course = $this->mdashboard_model->getmycourses($student_id);
// print_r($assigned_course);
// print_r($course_info);
// print_r($result);

?>

<style>
    .correct{
        background-color:green !important;
    }
    .wrong{
        background-color:red !important;
    }
    </style>
<input type="hidden" id="score" value="0">
    <!--Section : Header Sub Section-->
    <section class="blockClass headerSubSection">
        <div class="container">
            E-Learning Slider 
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
        <div class="blockClass videoFrameWrapper">
            <div class="videoFrame" id="content_div">
            <?php

// print_r($result[$quiz_id[0]]);

$quiz_count=sizeof($result);
$quiz_type=$result[0]['quiz_type'];
$quiz=$result[0];

$q1=json_decode($quiz['right_answer']);

$d1=json_decode($quiz['drag_drop']);
$d1=(array)$d1;
$q1=(array)$q1;  
// print_r($q1);


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
else{

$var='
<!--Absolute Overlay-->
               <div class="overlay">
                   <!--Left Instruction-->
                <div class="instruction">
                       <i class="fa fa-question-circle coloredI" aria-hidden="true"></i>
                       Please select the correct answer to following question
                   </div>
                   <!--Left Instruction-->
                   <div class="holder">
                    <ul>
                        
                        <li>
                       <a draggable="true" href="" id="two"  class="centerBlockContainer with4Buttons">
                           <span class="buttonLabels">B</span>
                           '.$d1['question_two']->matching_answer.'
                       </a>
                        </li>
                        <li>
                       <a draggable="true" href="" id="one"  class="centerBlockContainer with4Buttons">
                           <span class="buttonLabels">A</span>
                           '.$d1['question_one']->matching_answer.'
                       </a>
                        </li>
                        <li>
                       <a draggable="true" href="" id="three" class="centerBlockContainer with4Buttons">
                           <span class="buttonLabels">C</span>
                           '.$d1['question_three']->matching_answer.'
                       </a>
                        </li>
                        
                    </ul>
                    </div>
                  

                   <!--Buttons--> 
                   <div class="blockClass v_Buttons v_Buttons4Part ans">
                   <ul>
                      <li> <a class="v_ButtonBlock v_ButtonDanger bin" id="bin1" data-ans="">
                         </a>
                        </li>
                        <li> <a  class="v_ButtonBlock v_ButtonDanger">
                           <span class="buttonLabels">A</span>
                           '.$d1['question_one']->question.'
                            </a>
                        </li>

                   </ul>
                   <ul>
                       <li>
                       <a  class="v_ButtonBlock bin" id="bin2" data-ans="">
                          
                       </a>
                        </li>
                        <li>
                       <a  class="v_ButtonBlock v_ButtonSuccess">
                           <span class="buttonLabels">C</span>
                           '.$d1['question_two']->question.'
                       </a>
                       </li>

                   </ul>
                   <ul>
                    <li>
                       <a  class="v_ButtonBlock" id="bin3" data-ans="">
                           
                           
                       </a>
                    </li>
                    <li>
                       <a  class="v_ButtonBlock">
                           <span class="buttonLabels">D</span>
                           '.$d1['question_three']->question.'
                       </a>
                    </li>
                       </ul>
                      
                   </div>
                   <!--Buttons-->
               </div>
               <!--Absolute Overlay-->
               <img src="'.base_url().'front/images/videoBg.jpg" />
';


}
            echo $var;

?>
            </div>
        </div>
        <!--Video Wrapper-->

        <!--Content Wrapper-->
        
        <!--Content Wrapper-->
    </section>
    <!--Section-->
<?php
$this->load->view('front/footer');
?>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){  
        var quiz_count=0; 
        var score=0;
var base_url='<?php echo base_url(); ?>';
$(document).on('click','.ans_btn2',function()
{
    $('.ans_btn2').attr("disabled", "disabled");
    
    if($(this).attr('data-answer')=='yes')
    {
        score= $('#score').val();
        score++;
        $('#score').val(score);
        $(this).addClass(' v_ButtonSuccess');
    }
    else{
        $(this).addClass(' v_ButtonDanger');
        $("[data-answer=yes]").addClass('v_ButtonSuccess');
    }
});
$(document).on('click','.ans_btn',function()
{
    // alert();
    $('.ans_btn').attr("disabled", "disabled");
    
    var choose=$(this).attr('data-value');
    var ans = $('#quiz1_ans').val();
    if(choose==ans)
    {   
       score= $('#score').val();
        $(this).addClass(' correct');
        score++;
        $('#score').val(score);
        // alert(score+'->'+ans);
    }
    else{
        $(this).addClass(' wrong');
        $("[data-value=true]").addClass('correct');
    }
});
$(".next_quiz").click(function()
{       
    // alert();
var lesson_no1=$('#lesson_no').val();
// alert('<?php echo $this->crc_encrypt->decode($this->uri->segment(3)); ?>');
 $.ajax({
     type: "GET",
     url: base_url + "/index.php/quiz/next_quiz/", 
     data: {quiz_id: quiz_count, lesson_no:lesson_no1},
     contentType: 'text',
     success: 
          function(result){
            //   alert(JSON.stringify(result));
              var obj=JSON.parse(result);
              $('#content_div').html(obj.data);
            //   alert(obj.data);
              if(obj.final==false)
                {
                    $(".next_quiz").html('Next Question');
                }
                else{
                    $(".next_quiz").html('Finish');
                    $(".next_quiz").attr('id','finish');
                    $(".next_quiz").removeClass("next_quiz").addClass('finish_btn');
                }
                test();
                quiz_count++;
            // alert(JSON.stringify(result));  //as a debugging message.
          },
          error:function(ex){
            alert(JSON.stringify(ex));
          }
      });// you have missed this bracket
//  return false;
// alert();
});


});
</script>

<script>
$(document).on('click','#finish',function()
{
// alert();
var base_url='<?php echo base_url(); ?>';
var lessonID=$('#lesson_id').val();
var assignID=$('#assign_id').val();
var scoreValue=$('#score').val();
// alert(lessonID+'---'+assignID);
$.ajax({
                                 type: "GET",
                                 url: base_url + "/index.php/quiz/update_score/", 
                                 data: {lesson_id : lessonID, assign_id : assignID,score:scoreValue},
                                 contentType: 'json',
                                 success: function(result){
                                    // alert(JSON.stringify(result));
                                    window.location.href =base_url +"/dashboard";
                                 },
                                 error:function(ex){
                                    alert(JSON.stringify(ex));
                                }
                            });
   

});
var addEvent = (function () {
  if (document.addEventListener) {
    return function (el, type, fn) {
      if (el && el.nodeName || el === window) {
        el.addEventListener(type, fn, false);
      } else if (el && el.length) {
        for (var i = 0; i < el.length; i++) {
          addEvent(el[i], type, fn);
        }
      }
    };
  } else {
    return function (el, type, fn) {
      if (el && el.nodeName || el === window) {
        el.attachEvent('on' + type, function () { return fn.call(el, window.event); });
      } else if (el && el.length) {
        for (var i = 0; i < el.length; i++) {
          addEvent(el[i], type, fn);
        }
      }
    };
  }
})();

(function () {

var pre = document.createElement('pre');
pre.id = "view-source"

// private scope to avoid conflicts with demos
addEvent(window, 'click', function (event) {
  if (event.target.hash == '#view-source') {
    // event.preventDefault();
    if (!document.getElementById('view-source')) {
      pre.innerHTML = ('<!DOCTYPE html>\n<html>\n' + document.documentElement.innerHTML + '\n</html>').replace(/[<>]/g, function (m) { return {'<':'&lt;','>':'&gt;'}[m]});
      document.body.appendChild(pre);      
    }
    document.body.className = 'view-source';
    
    var sourceTimer = setInterval(function () {
      if (window.location.hash != '#view-source') {
        clearInterval(sourceTimer);
        document.body.className = '';
      }
    }, 200);
  }
});
  
})();

function test()
{
    var mark=0;
// alert();
  var eat = ['yum!', 'gulp', 'burp!', 'nom'];
  var yum = document.createElement('p');
  var msie = /*@cc_on!@*/0;
  yum.style.opacity = 1;

  var links = document.querySelectorAll('li > a'), el = null;
  for (var i = 0; i < links.length; i++) {
    el = links[i];
  
    el.setAttribute('draggable', 'true');
  
    addEvent(el, 'dragstart', function (e) {
      e.dataTransfer.effectAllowed = 'copy'; // only dropEffect='copy' will be dropable
      e.dataTransfer.setData('Text', this.id); // required otherwise doesn't work
    });
  }


  var bin1 = document.querySelector('#bin1');

  var bin2 = document.querySelector('#bin2');

  var bin3 = document.querySelector('#bin3');

  
  

  addEvent(bin1, 'dragover', function (e) {
    if (e.preventDefault) e.preventDefault(); // allows us to drop
    this.className = 'v_ButtonBlock over';
    e.dataTransfer.dropEffect = 'cv_ButtonBlock copy';
    return false;
  });

  // to get IE to work
  addEvent(bin1, 'dragenter', function (e) {
    this.className = 'v_ButtonBlock over';
    return false;
  });

  addEvent(bin1, 'dragleave', function () {
    this.className = 'v_ButtonBlock ';
  });

  addEvent(bin1, 'drop', function (e) {
    if (e.stopPropagation) e.stopPropagation(); // stops the browser from redirecting...why???
   
    var el = document.getElementById(e.dataTransfer.getData('Text'));
    
    el.parentNode.removeChild(el);
    bin1.appendChild(el);

    // stupid nom text + fade effect
    bin1.className = 'v_ButtonBlock';
    if(el.id=='one')
    {
        
        mark++;
        if(mark==3)
        {
            score();
        }
    }
    return false;
  });

  
  addEvent(bin2, 'dragover', function (e) {
    if (e.preventDefault) e.preventDefault(); // allows us to drop
    this.className = 'v_ButtonBlock over';
    e.dataTransfer.dropEffect = 'v_ButtonBlock copy';
    return false;
  });

  // to get IE to work
  addEvent(bin2, 'dragenter', function (e) {
    this.className = 'v_ButtonBlock over';
    return false;
  });

  addEvent(bin2, 'dragleave', function () {
    this.className = 'v_ButtonBlock ';
  });

  addEvent(bin2, 'drop', function (e) {
    if (e.stopPropagation) e.stopPropagation(); // stops the browser from redirecting...why???

    var el = document.getElementById(e.dataTransfer.getData('Text'));
    
    el.parentNode.removeChild(el);
    bin2.appendChild(el);

    // stupid nom text + fade effect
    bin2.className = 'v_ButtonBlock';
    if(el.id=='two')
    {
        
        mark++;
        if(mark==3)
        {
            score();
        }
    }
    return false;
  });

  
  addEvent(bin3, 'dragover', function (e) {
    if (e.preventDefault) e.preventDefault(); // allows us to drop
    this.className = 'v_ButtonBlock over';
    e.dataTransfer.dropEffect = 'v_ButtonBlock copy';
    return false;
  });

  // to get IE to work
  addEvent(bin3, 'dragenter', function (e) {
    this.className = 'v_ButtonBlock over';
    return false;
  });

  addEvent(bin3, 'dragleave', function () {
    this.className = 'v_ButtonBlock ';
  });

  addEvent(bin3, 'drop', function (e) {
    if (e.stopPropagation) e.stopPropagation(); // stops the browser from redirecting...why???

    var el = document.getElementById(e.dataTransfer.getData('Text'));
    
    el.parentNode.removeChild(el);
    bin3.appendChild(el);

    // stupid nom text + fade effect
    bin3.className = 'v_ButtonBlock';
    if(el.id=='three')
    {
        
        mark++;
        
        if(mark==3)
        {
            score();
        }
    }
    return false;
  });
}
function score()
{
    var score=$('#score').val();
    score++;
        $('#score').val(score);
        // alert($('#score').val());
}

</script>