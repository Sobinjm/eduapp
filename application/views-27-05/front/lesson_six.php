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
                    <!--Left Instruction-->
                    <div class="instruction">
                        <i class="fa fa-question-circle coloredI" aria-hidden="true"></i>
                        Please select the correct answer to following question
                    </div>
                    <!--Left Instruction-->

                    <!--Center Block-->
                    <div class="centerBlockContainer with4Buttons">
                        <span class="absoluteContent">What is the best decision when you feel sleepy?</span>
                    </div>
                    <!--Center Block-->

                    <!--Buttons-->
                    <div class="blockClass v_Buttons v_Buttons4Part">
                        <button class="v_ButtonBlock v_ButtonDanger">
                            <span class="buttonLabels">A</span>
                            If you feel sleepy, stop and rest where it is safe to do so.
                        </button>
                        <button class="v_ButtonBlock">
                            <span class="buttonLabels">B</span>
                            If you feel sleepy, stop and rest where it is safe to do so.
                        </button>
                        <button class="v_ButtonBlock v_ButtonSuccess">
                            <span class="buttonLabels">C</span>
                            If you feel sleepy, stop and rest where it is safe to do so.
                        </button>
                        <button class="v_ButtonBlock">
                            <span class="buttonLabels">D</span>
                            If you feel sleepy, stop and rest where it is safe to do so.
                        </button>
                    </div>
                    <!--Buttons-->
                </div>
                <!--Absolute Overlay-->

                <img src="<?php echo base_url(); ?>front/images/videoBg.jpg" />
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
                    <button onclick="javascript:window.location.href='seven'" class="blockClass fontButton fontButtonInline">Next Questions
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