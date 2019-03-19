






<?php
$this->load->view('front/header');
?>
<style>
    .correct{
        background-color:green !important;
    }
    .wrong{
        background-color:red !important;
    }
    </style>
<input type="hidden" id="score">
    <!--Section : Header Sub Section-->
    <section class="blockClass headerSubSection">
        <div class="container">
            E-Learning Slider > Light Vehicle > Lesson Three - Outside The City Limits
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
                    Safety check before setting out
                    <br />
                    <small class="smallFont">Lesson Three
                        <span class="darkSmallFont">| Outside The City Limits</span>
                    </small>
                </h2>

                <div class="blockClass labelAndButton">
                    <!--Left-->
                    <div class="labelContainer">
                        <span class="labelIcon">
                            <i class="fa fa-car" aria-hidden="true"></i>
                        </span>
                        LIGHT VEHICLE
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
                }
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