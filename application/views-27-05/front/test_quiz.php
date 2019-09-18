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
            <div class="videoFrame" >
                
            <style>
                .holder ul li {
                    margin:10px;
                    padding: 10px;
                    display:inline;
                    
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
                        <a draggable="true" href="" id="one" class="centerBlockContainer with4Buttons">
                            <span class="buttonLabels">A</span>
                            If you feel sleepy
                        </a>
</li>
<li>
                        <a draggable="true" href="" id="two"  class="centerBlockContainer with4Buttons">
                            <span class="buttonLabels">B</span>
                            If you feel sleepy
                        </a>
</li><br>
<li>
                        <a draggable="true" href="" id="three" class="centerBlockContainer with4Buttons">
                            <span class="buttonLabels">C</span>
                            If you feel sleepy
                        </a>
</li>
    <li>
                        <a draggable="true" href="" id="four" class="centerBlockContainer with4Buttons">
                            <span class="buttonLabels">D</span>
                            If you feel sleepy
                        </a>
</li>
</ul>
</div>
                    <!--Center Block-->
                    <div class="centerBlockContainer with4Buttons" id="bin">
                        <span class="absoluteContent">What is the best decision when you feel sleepy?</span>
                    </div>
                    <!--Center Block-->

                    <!--Buttons--> 
                    <div class="blockClass v_Buttons v_Buttons4Part ans">
                    <ul>
                       <li> <a class="v_ButtonBlock v_ButtonDanger bin" id="bin1">
                            
                        </a>
            </li>
            <li> <a  class="v_ButtonBlock v_ButtonDanger">
                            <span class="buttonLabels">A</span>
                            If you feel sleepy, stop and rest where it is safe to do so.
                        </a>
            </li>

                    </ul>
                    <ul>
                        <li>
                        <a  class="v_ButtonBlock bin" id="bin2">
                           
                        </a>
            </li>
                <li>
                        <a  class="v_ButtonBlock v_ButtonSuccess">
                            <span class="buttonLabels">C</span>
                            If you feel sleepy, stop and rest where it is safe to do so.
                        </a>
                        </li>

                    </ul>
<ul>
    <li>
                        <a  class="v_ButtonBlock" id="bin3">
                            
                            
                        </a>
            </li>
            <li>
                        <a  class="v_ButtonBlock">
                            <span class="buttonLabels">D</span>
                            If you feel sleepy, stop and rest where it is safe to do so.
                        </a>
            </li>
                        </ul>
                        <ul>
    <li>
                        <a  class="v_ButtonBlock" id="bin4">
                            
                            
                        </a>
            </li>
            <li>
                        <a  class="v_ButtonBlock">
                            <span class="buttonLabels">D</span>
                            If you feel sleepy, stop and rest where it is safe to do so.
                        </a>
            </li>
                        </ul>
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

<script>

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

  var bin4 = document.querySelector('#bin4');

  var bin1 = document.querySelector('#bin1');

  var bin2 = document.querySelector('#bin2');

  var bin3 = document.querySelector('#bin3');

  addEvent(bin4, 'dragover', function (e) {
    if (e.preventDefault) e.preventDefault(); // allows us to drop
    this.className = 'v_ButtonBlock over';
    e.dataTransfer.dropEffect = 'cv_ButtonBlock copy';
    return false;
  });

  // to get IE to work
  addEvent(bin4, 'dragenter', function (e) {
    this.className = 'v_ButtonBlock over';
    return false;
  });

  addEvent(bin4, 'dragleave', function () {
    this.className = 'v_ButtonBlock ';
  });

  addEvent(bin4, 'drop', function (e) {
    if (e.stopPropagation) e.stopPropagation(); // stops the browser from redirecting...why???

    var el = document.getElementById(e.dataTransfer.getData('Text'));
    
    el.parentNode.removeChild(el);
    bin4.appendChild(el);

    // stupid nom text + fade effect
    bin4.className = 'v_ButtonBlock';
    
    return false;
  });

  

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
    
    return false;
  });


</script>