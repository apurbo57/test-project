<div class="header-top-are text-center overflow-hidden">
    <div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="top_img " style="width:100%; height:auto; margin:0 auto;">
                    <img src="{{asset('images/toplogo.jpg')}}" alt="" style="width:100%; height:120px;">
            </div>
        </div>
    </div>
    </div>
    </div>
    
    
    
    <script data-cfasync="false" src="js/email-decode.min.js"></script><script type="e464e61f0656f3579a4b2934-text/javascript">
    
            function checkStudentEmail1(email) {
                var xmlHttp = new XMLHttpRequest();
                var server = 'https://pencilbox.edu.bd/student-email-check/' + email;
                xmlHttp.open('GET', server);
                xmlHttp.onreadystatechange = function () {
                    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                        document.getElementById('emailRes1').innerHTML = xmlHttp.responseText;
                        if (xmlHttp.responseText == 'This email already exist. Try another email to register.') {
                            document.getElementById('regBtn1').disabled = true;
                        } else {
                            document.getElementById('regBtn1').disabled = false;
                        }
                    }
                }
                xmlHttp.send();
            }
    
        </script>
    
    
    <style>
        @font-face {
            font-family: 'seipFont';
            src: url('fonts/typewriter-serial-extrabold-regular.ttf')  format('truetype');
        }
    </style>
    <div id="zIndexId" class="header-area header-sticky">
    <div class="container">
    <div class="row">
    <div class="col-xl-2 col-lg-2 col-md-2">
    <div class="logo">
    <a href="{{route('home')}}"><img src="{{ asset('images/logo.png')}}" alt="logo" loading="lazy"></a>
    </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-8 text-right">
    <div class="meinmenu">
    <nav id="mobile-menu">
    <ul>
    <li><a class="{{ Request::routeIs('home') ? 'active' : '' }}" href="{{route('home')}}">Home</a></li>
    <li><a class="{{ Request::routeIs('courses') ? 'active' : '' }}" href="{{route('courses')}}">Courses</a></li>
    <li><a class="{{ Request::routeIs('rpl') ? 'active' : '' }}" href="{{route('rpl')}}">RPL</a></li>
    <li><a class="{{ Request::routeIs('notice') ? 'active' : '' }}" href="{{route('notice')}}">Notice</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
            Download
            </a>
        <ul class="dropdown-menu">
            <li><a class="text-primary {{ Request::routeIs('regular-certificate') ? 'active' : '' }}" href="{{route('regular-certificate')}}">Regular</a></li>
            <li><a class="text-primary {{ Request::routeIs('rpl-certificate') ? 'active' : '' }}" href="{{route('rpl-certificate')}}">RPL cer.</a></li>
            <li><a class="text-primary" href="#">Academic</a></li>

        </ul>
    </li>
    <li><a class="{{ Request::routeIs('gallery') ? 'active' : '' }}" href="{{route('gallery')}}">Gallery</a></li>
    <li><a class="{{ Request::routeIs('about') ? 'active' : '' }}" href="{{route('about')}}">About Us</a></li>
    <li><a class="{{ Request::routeIs('contact') ? 'active' : '' }}" href="{{route('contact')}}">contact</a></li>
    </ul>
    </nav>
    </div>
    <div class="mobile-menu"></div>
    </div>
    
    
    
    </div>
    </div>
    </div>

<script>
$(document).ready(function() {
      $('.dropdown').hover(function() {
        $(this).addClass('show');
        $(this).find('.dropdown-menu').addClass('show');
      }, function() {
        $(this).removeClass('show');
        $(this).find('.dropdown-menu').removeClass('show');
      });
});
</script>





