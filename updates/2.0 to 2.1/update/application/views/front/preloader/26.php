

<style>

#loading-center{
	width: 100%;
	height: 100%;
	position: relative;
	}
#loading-center-absolute {
	position: absolute;
	left: 50%;
	top: 50%;
	height: 118px;
	width: 118px;
	margin-top: -59px;
	margin-left: -59px;

}

.object{
	width: 20px;
	height: 20px;
	background-color: <?php echo $preloader_obj; ?>;
	margin-right: 20px;
	float: left;
	margin-bottom: 20px;
	}
.object:nth-child(3n+0) {
	margin-right: 0px;
}


#object_one {
	-webkit-animation: animate 1s -0.9s ease-in-out infinite ;
	animation: animate 1s -0.9s ease-in-out infinite ;
	}
#object_two {
    -webkit-animation: animate 1s -0.8s ease-in-out infinite ;
	animation: animate 1s -0.8s ease-in-out infinite ;
	}
#object_three {
    -webkit-animation: animate 1s -0.7s ease-in-out infinite ;
	animation: animate 1s -0.7s ease-in-out infinite ;
	}
#object_four {
    -webkit-animation: animate 1s -0.6s ease-in-out infinite ;
	animation: animate 1s -0.6s ease-in-out infinite ;
	}
#object_five {
    -webkit-animation: animate 1s -0.5s ease-in-out infinite ;
	animation: animate 1s -0.5s ease-in-out infinite ;
	}
#object_six {
    -webkit-animation: animate 1s -0.4s ease-in-out infinite ;
	animation: animate 1s -0.4s ease-in-out infinite ;
	}
#object_seven {
    -webkit-animation: animate 1s -0.3s ease-in-out infinite ;
	animation: animate 1s -0.3s ease-in-out infinite ;
	}
#object_eight {
    -webkit-animation: animate 1s -0.2s ease-in-out infinite ;
	animation: animate 1s -0.2s ease-in-out infinite ;
	}
#object_nine {
    -webkit-animation: animate 1s -0.1s ease-in-out infinite ;
	animation: animate 1s -0.1s ease-in-out infinite ;
	}

@-webkit-keyframes animate {
 

  50% {
	-ms-transform: scale(1.5,1.5); 
   	-webkit-transform: scale(1.5,1.5); 
    transform: scale(1.5,1.5); 
	  }
 
  100% {
	-ms-transform: scale(1,1); 
   	-webkit-transform: scale(1,1); 
    transform: scale(1,1); 
	  }

}

@keyframes animate {
  50% {
	-ms-transform: scale(1.5,1.5); 
   	-webkit-transform: scale(1.5,1.5); 
    transform: scale(1.5,1.5); 
	  }
 
  100% {
	-ms-transform: scale(1,1); 
   	-webkit-transform: scale(1,1); 
    transform: scale(1,1); 
	  }
  
}

</style>
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_four"></div>
            <div class="object" id="object_five"></div>
            <div class="object" id="object_six"></div>
            <div class="object" id="object_seven"></div>
            <div class="object" id="object_eight"></div>
            <div class="object" id="object_nine"></div>
        </div>
    </div>
</div>


