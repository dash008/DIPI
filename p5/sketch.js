var x =0; 
var y =0; 
var speedX, speedY,col_bar,col_scn,rand;
var diam = 10;
var rectSize = 200;
var pg;
var timer;
var color_r,color_g,color_b,t1,t2,t3,t4,finish,index,imagen_decodificada,img,showbar,sound
var positions = new Array();


function loadImagen(img_data){
	
	imagen_decodificada = "data:image/png;base64," + img_data;
	imagen_decodificada.crossOrigin = 'Anonymous';
	img = createImg(imagen_decodificada,"test").hide();
	console.log(imagen_decodificada);
  
	setup();
		
}

function preload(){
  sound = loadSound('assets/plop.wav');
}

function setup() {
	showbar =true;
  
    	
  	if(imagen_decodificada == undefined){
  		noLoop();
  		console.log("carga sin imagen!");
	  	var canvas = createCanvas(600, 400);
	  	canvas.parent('game_container');
	  	pg = createGraphics(600, 40)
	  	x = width/2;
	  	y = 1;
     
	  	speedX = 1;
		speedY = random(-2,5);
		col_bar = 0;
		col_scn = 0;
		timer = 1;
		color_r = random(255);
		color_g = random(255);
		color_b = random(255);
		finish = false;
		index =0;
  	}else{
  		noLoop();
	  	var canvas = createCanvas(600, 400);
	  	canvas.parent('game_container');
	  	pg = createGraphics(600, 40);
	  	console.log("carga con imagen!");	  	
	  	x = width/2;
	  	y = 1;
    
	  	speedX = random(-2,4);
		speedY = random(-2,4);;
		col_bar = 0;
		col_scn = 0;
		timer = 1;
		color_r = random(255);
		color_g = random(255);
		color_b = random(255);
		finish = false;
		index =0;
		image(img,0,0);
  	}
  
}






function draw() {
  if(!finish){
    
  	fill(255,0,0);
  	if(col_scn > 60){
  		color_r = map(timer,0,5,0,255);	
  		color_g = map(timer,5,25,0,255);  	
  		color_b = map(timer,25,30,0,255);
  	}
  	else if(col_scn > 50 && col_scn < 60){
  		color_r = map(timer,0,15,0,255);	
  		color_b = map(timer,5,20,0,255);  	
  		color_g = map(timer,0,30,0,255);
  	}  	
  	else if(col_scn > 40 && col_scn < 50){
  		color_r = map(timer,0,12,0,255);	
  		color_g = map(timer,12,15,0,255);  	
  		color_b = map(timer,15,30,0,255);
  	}
  	else if(col_scn > 30 && col_scn < 40){
  		color_r = map(timer,0,3,0,255);	
  		color_g = map(timer,10,20,0,255);  	
  		color_b = map(timer,5,10,0,255);
  	}
  	else if(col_scn > 20 && col_scn < 30){
  		color_r = map(timer,0,10,0,255);	
  		color_b = map(timer,10,20,0,255);  	
  		color_g = map(timer,20,30,0,255);
  	}
  	else if(col_scn > 10 && col_scn < 20){
  		color_b = map(timer,0,10,0,255);	
  		color_g = map(timer,10,20,0,255);  	
  		color_r = map(timer,20,30,0,255);
  	}
  	else if(col_scn < 10){
  		color_b = map(timer,0,5,0,255);	
  		color_r = map(timer,6,24,0,255);  	
  		color_g = map(timer,25,30,0,255);
      console.log("R: " + color_r +" G: "+color_g+" B: "+color_b);
  	}
  	

  	fill(color_r,color_g,color_b);
  	
  	noStroke();
  	

	  		if(col_bar < 6){
	  			ellipse(x, y, diam, diam);	
	  		}
	  		else if(col_bar >= 6 && col_bar <12){
	  			rect(x,y,diam,diam);
	  		}
	  		else{
	  			for(var i = 1; i < 50; i++){
              		var xr = random(-diam,diam) * cos(random(360)-90);
              		var yr = random(-diam,diam) * sin(random(360)-90);
              		ellipse(x+xr,y+yr,diam/5,diam/5);
            	}
	  		}
	  		
	  	 		x += speedX;
	  			y += speedY;
	  			
  	
  			// if ball hits movable bar, invert X direction
  			if ( x <= mouseX+80 &&  x >= mouseX-80 && y > 350 ) {
  	  			col_bar++;
  	  			if(col_bar === 24){ col_bar = 0}
  	  		  	console.log("Bar collision: "+col_bar);	
  	  			speedY *= -1;
  	  			speedX = random(-5,5);
  	  			sound.play();
  			}
  			if(y > 360 && y < 365 ){
  				showbar = false;
          pg.remove();
  			}
  			if(y > 370){
  				saveCustomCanvas();
          finish = true;
  			}
  	

  			// if ball hits wall, change direction of X
  			if (x < 0 || x > width) {
  	  			speedX *= -1.1;
  	  			speedY *= 1.1;
  	  			x += speedX;
  	  			col_scn++;
  	  			console.log("Scene collision: "+col_scn);
  	  			if(col_scn == 70){col_scn = 0}
            sound.play();  
  			}


  		// if ball hits up or down, change direction of Y   
  			if ( y < 0 ) {
  	  			speedY *= -1;
  	  			col_scn++;
  	  			console.log(col_scn);
            sound.play();
  			}

  		if(showbar){
        positions.forEach(function(){
           pg.background(255);
           //pg.noFill();
           pg.fill(0);
           pg.rect(mouseX-80, 10, 160, 20);
        }) 
	  	}

	  	//Draw the offscreen buffer to the screen with image()
	  	image(pg, 0, 360);

	  	if (frameCount % 60 == 0 && timer > 0) { // if the frameCount is divisible by 60, then a second has passed. it will stop at 0
	  	  	timer++;
	  	}
	  	
	  	if(color_r = 0){
	  		color_r = 255;
	  	}
	  	if(color_g= 0){
	  		color_g = 255;
	  	}
	  	if(color_b = 0){
	  		color_b = 255;
	  	}

	  	if(timer>30){
	  		 timer = 1; 	 
	  	}
  }
}

function saveCustomCanvas(){
	console.log(index);
	var custom_canvas = $('canvas')[0];
	var data = canvas.toDataURL('image/png').replace(/data:image\/png;base64,/,'');
	var filename= 'canvas_'+index +'.png';

	$('canvas').remove();
	$.post('save.php',{data:data,filename});
	index++;
	console.log(index);
}

function mouseMoved(){
  positions.push(new p5.Vector(mouseX-80,10));
  if(positions.length > 300){
    positions.shift();
  }
}

