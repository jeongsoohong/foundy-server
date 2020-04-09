

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
	height: 50px;
	width: 50px;
	margin-top: -25px;
	margin-left: -25px;
   -ms-transform: rotate(45deg); 
   	-webkit-transform: rotate(45deg);
    transform: rotate(45deg); 
	-webkit-animation: loading-center-absolute 1.5s infinite;
	animation: loading-center-absolute 1.5s infinite;

}
.object{
	width: 25px;
	height: 25px;
	background-color: rgba(255,255,255,1);
	float: left;
}




#object_one {
	-webkit-animation: object_one 1.5s infinite;
	animation: object_one 1.5s infinite;
	}
#object_two {
	-webkit-animation: object_two 1.5s infinite;
	animation: object_two 1.5s infinite;
	}
#object_three {
	-webkit-animation: object_three 1.5s infinite;
	animation: object_three 1.5s infinite;
	}
#object_four {
	-webkit-animation: object_four 1.5s infinite;
	animation: object_four 1.5s infinite;
	}
	

@-webkit-keyframes loading-center-absolute {
  100% { -webkit-transform: rotate(-45deg); }

}

@keyframes loading-center-absolute {
  100% { 
    transform:  rotate(-45deg);
    -webkit-transform:  rotate(-45deg);
  }
}



@-webkit-keyframes object_one {
  25% { -webkit-transform: translate(0,-50px) rotate(-180deg); }
  100% { -webkit-transform: translate(0,0) rotate(-180deg); }

}

@keyframes object_one {
  25% { 
    transform: translate(0,-50px) rotate(-180deg);
    -webkit-transform: translate(0,-50px) rotate(-180deg);
  } 
  100% { 
    transform: translate(0,0) rotate(-180deg);
    -webkit-transform: translate(0,0) rotate(-180deg);
  }
}


@-webkit-keyframes object_two {
  25% { -webkit-transform: translate(50px,0) rotate(-180deg); }
  100% { -webkit-transform: translate(0,0) rotate(-180deg); }
}

@keyframes object_two {
  25% { 
    transform: translate(50px,0) rotate(-180deg);
    -webkit-transform: translate(50px,0) rotate(-180deg);
  } 
  100% { 
    transform: translate(0,0) rotate(-180deg);
    -webkit-transform: translate(0,0) rotate(-180deg);
  }
}

@-webkit-keyframes object_three {
  25% { -webkit-transform: translate(-50px,0) rotate(-180deg); }
  100% { -webkit-transform: translate(0,0) rotate(-180deg); }
}

@keyframes object_three {
  25% { 
    transform:  translate(-50px,0) rotate(-180deg);
    -webkit-transform:  translate(-50px,0) rotate(-180deg);
  } 
  100% { 
    transform: translate(0,0) rotate(-180deg);
    -webkit-transform: rtranslate(0,0) rotate(-180deg);
  }
}


@-webkit-keyframes object_four {
  25% { -webkit-transform: translate(0,50px) rotate(-180deg); }
  100% { -webkit-transform: translate(0,0) rotate(-180deg); }
}

@keyframes object_four {
  25% { 
    transform: translate(0,50px) rotate(-180deg); 
    -webkit-transform: translate(0,50px) rotate(-180deg);  
  } 
  100% { 
    transform: translate(0,0) rotate(-180deg);
    -webkit-transform: translate(0,0) rotate(-180deg);
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
</div>
</div>
 
</div>


