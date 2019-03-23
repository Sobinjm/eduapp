



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
$student_id	= $this->crc_encrypt->decode($this->session->userdata('userid'));
$assigned_course = $this->mdashboard_model->getmycourses($student_id);
// print_r($assigned_course);
// print_r($course_info);
?>
<input type="hidden" id="assign_id" value="<?php echo $assigned_course[0]['id'] ; ?>">
<!-- <input type="hidden" id="lesson_id" value="<?php echo $this->crc_encrypt->decode($this->uri->segment(3)); ?>"> -->
<input type="hidden" id="lesson_id" value="<?php  echo $data[0]['lesson_order']; ?>">
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
            E-Learning Slider > <?php echo $course_info[0]['course_name']; ?> > <?php echo $data[0]['lesson_name']; ?>
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
                <img src="<?php echo base_url(); ?>front/images/quiz.jpg" />
            </div>
        </div>
        <!--Video Wrapper-->

        <!--Content Wrapper-->
        <div class="blockClass contentWrapper">
            <div class="container">
                <h2 class="heading">
                <?php echo $data[0]['lesson_name'] ?>
                    <br />
                    <small class="smallFont">Lesson <?php echo $data[0]['lesson_order'] ?>
                        <!-- <span class="darkSmallFont">| Outside The City Limits</span> -->
                    </small>
                </h2>

                <div class="blockClass labelAndButton">
                    <!--Left-->
                    <div class="labelContainer">
                        <span class="labelIcon">
                            <i class="fa fa-car" aria-hidden="true"></i>
                        </span>
                        <?php echo $course_info[0]['course_name']; ?>
                    </div>
                    <!--Left-->

                    <!--Right-->
                    <button class=" next_quiz blockClass fontButton fontButtonInline">Start Questions
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </button>
                    <!--Right-->
                </div>

                <div class="blockClass mainContentWrapper">
                    <h4 class="heading">Transcript</h4>
                    <p class="paraSmall">
                        To begin the questions please click in start questions
                    </p>
                </div>
            </div>
        </div>
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
    
 $.ajax({
     type: "GET",
     url: base_url + "/index.php/quiz/next_quiz/", 
     data: {quiz_id: quiz_count, lesson_no:2},
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
alert(lessonID+'---'+assignID);
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