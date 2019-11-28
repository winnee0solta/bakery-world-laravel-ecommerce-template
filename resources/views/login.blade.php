<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bakery World</title>
    <style>
@import url(http://weloveiconfonts.com/api/?family=fontawesome);
@import url(https://meyerweb.com/eric/tools/css/reset/reset.css);
[class*="fontawesome-"]:before {
  font-family: 'FontAwesome', sans-serif;
}
* {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}
*:before, *:after {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  color: #606468;
  font: 87.5%/1.5em 'Open Sans', sans-serif;
  margin: 0;
  overflow-y:auto !important;
  overflow-x:hidden !important;
  height: 100%;
}

a {
  color: #eee;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

input {
  border: none;
  font-family: 'Open Sans', Arial, sans-serif;
  font-size: 14px;
  line-height: 1.5em;
  padding: 0;
  -webkit-appearance: none;
}

p {
  line-height: 1.5em;
}

.clearfix {
  *zoom: 1;
}
.clearfix:before, .clearfix:after {
  content: ' ';
  display: table;
}
.clearfix:after {
  clear: both;
}

.container {
  left: 50%;
  position:absolute;
   top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

/* ---------- LOGIN ---------- */
#login {
  width: 280px;
}

#login form span {
  background-color: #363b41;
  border-radius: 3px 0px 0px 3px;
  color: #606468;
  display: block;
  float: left;
  height: 50px;
  line-height: 50px;
  text-align: center;
  width: 50px;
}

#login form input {
  height: 50px;
}

#login form input[type="text"], input[type="password"] {
  background-color: #3b4148;
  border-radius: 0px 3px 3px 0px;
  color: #606468;
  margin-bottom: 1em;
  padding: 0 16px;
  width: 230px;
}

#login form input[type="submit"] {
  border-radius: 3px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  background-color: #ea4c88;
  color: #eee;
  font-weight: bold;
  margin-bottom: 2em;
  text-transform: uppercase;
  width: 280px;
}

#login form input[type="submit"]:hover {
  background-color: #d44179;
}

#login > p {
  text-align: center;
}

#login > p span {
  padding-left: 5px;
}

/*Lets start with the cloud formation rather*/

/*The container will also serve as the SKY*/

*{ margin: 0; padding: 0;}

#clouds{
	padding: 50px 0;
	background: #c9dbe9;
	background: -webkit-linear-gradient(top, #c9dbe9 0%, #fff 100%);
	background: -linear-gradient(top, #c9dbe9 0%, #fff 100%);
	background: -moz-linear-gradient(top, #c9dbe9 0%, #fff 100%);
}

/*Time to finalise the cloud shape*/
.cloud {
	width: 200px; height: 60px;
	background: #fff;

	border-radius: 200px;
	-moz-border-radius: 200px;
	-webkit-border-radius: 200px;

	position: relative;
}

.cloud:before, .cloud:after {
	content: '';
	position: absolute;
	background: #fff;
	width: 100px; height: 80px;
	position: absolute; top: -15px; left: 10px;

	border-radius: 100px;
	-moz-border-radius: 100px;
	-webkit-border-radius: 100px;

	-webkit-transform: rotate(30deg);
	-ms-transform: rotate(30deg);
	    transform: rotate(30deg);
	-moz-transform: rotate(30deg);
}

.cloud:after {
	width: 120px; height: 120px;
	top: -55px; left: auto; right: 15px;
}

/*Time to animate*/
.x1 {
	-webkit-animation: moveclouds 15s linear infinite;
	-moz-animation: moveclouds 15s linear infinite;
	-o-animation: moveclouds 15s linear infinite;
}

/*variable speed, opacity, and position of clouds for realistic effect*/
.x2 {
	left: 200px;

	-webkit-transform: scale(0.6);
	-ms-transform: scale(0.6);
	    transform: scale(0.6);
	opacity: 0.6; /*opacity proportional to the size*/

	/*Speed will also be proportional to the size and opacity*/
	/*More the speed. Less the time in 's' = seconds*/
	-webkit-animation: moveclouds 25s linear infinite;
	-moz-animation: moveclouds 25s linear infinite;
	-o-animation: moveclouds 25s linear infinite;
}

.x3 {
	left: -250px; top: -200px;

	-webkit-transform: scale(0.8);
	-ms-transform: scale(0.8);
	    transform: scale(0.8);
	opacity: 0.8; /*opacity proportional to the size*/

	-webkit-animation: moveclouds 20s linear infinite;
	-moz-animation: moveclouds 20s linear infinite;
	-o-animation: moveclouds 20s linear infinite;
}

.x4 {
	left: 470px; top: -250px;

	-webkit-transform: scale(0.75);
	-ms-transform: scale(0.75);
	    transform: scale(0.75);
	opacity: 0.75; /*opacity proportional to the size*/

	-webkit-animation: moveclouds 18s linear infinite;
	-moz-animation: moveclouds 18s linear infinite;
	-o-animation: moveclouds 18s linear infinite;
}

.x5 {
	left: -150px; top: -150px;

	-webkit-transform: scale(0.8);
	-ms-transform: scale(0.8);
	    transform: scale(0.8);
	opacity: 0.8; /*opacity proportional to the size*/

	-webkit-animation: moveclouds 20s linear infinite;
	-moz-animation: moveclouds 20s linear infinite;
	-o-animation: moveclouds 20s linear infinite;
}

@-webkit-keyframes moveclouds {
	0% {margin-left: 1000px;}
	100% {margin-left: -1000px;}
}
.bottom {
	width:100%; margin:0 auto; text-align:center; padding:10px 0; height:100px; position:absolute;
}
.bottom h3 {color:white; font-size:30px; font-weight:bold; margin-top:45px; padding-bottom:45px;}
.blue { color:#09c;}
    </style>
</head>

<body>
    <div id="clouds">
        <div class="cloud x1"></div>
        <!-- Time for multiple clouds to dance around -->
        <div class="cloud x2"></div>
        <div class="cloud x3"></div>
        <div class="cloud x4"></div>
        <div class="cloud x5"></div>
    </div>

    <div class="container">


        <div id="login">

            <form action="/login" method="post">
                {{ csrf_field() }}
                <fieldset class="clearfix">

                    <p><span class="fontawesome-user"></span>
                        <input  name="username" type="text" placeholder="Username"  required></p>
                    <p>
                        <span class="fontawesome-lock"></span>
                        <input  required name="password" type="password" placeholder="Password"></p>
                    <p><input  type="submit" value="Sign In"></p>

                </fieldset>

            </form>



        </div> <!-- end login -->

    </div>

</body>

</html>
