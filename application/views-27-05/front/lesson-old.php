<?php
$this->load->view('front/header');
?>

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
            <div class="videoFrame">
                <!--Absolute Overlay-->
                <div class="overlay">
                    <button class="blockClass fontButton fontButtonAbsolute">Start Now
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </button>
                </div>
                <!--Absolute Overlay-->

                <img src="<?php echo base_url(); ?>front/images/videoImage.jpg" />
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
                    <!-- <button onclick="javascript:window.location.href='<?php echo base_url(); ?>quiz/view'" class="blockClass fontButton fontButtonInline">Next Slide
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </button> -->
                    <button id="send" class="next_quiz blockClass fontButton fontButtonInline">Next Slide
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){  
        var quiz_count=0; 
var base_url='<?php echo base_url(); ?>';
$(".next_quiz").click(function()
{       
    quiz_count++;
 $.ajax({
     type: "GET",
     url: base_url + "/index.php/quiz/next_quiz/", 
     data: {quiz_id: quiz_count, lesson_no:2},
     contentType: 'text',
     success: 
          function(data){
            alert(JSON.stringify(data));  //as a debugging message.
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