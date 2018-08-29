<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>注册用户</title>
    <script language="javascript" type="text/javascript"> 

    </script>
    <style>

    *{ 
     margin:0; padding:0; 
     } 

   

     .slider-item{ 
     width:100%;
     height:100%;
     position:absolute; 
     animation-timing-function: linear; 
     animation-name:fade; 
     animation-iteration-count: infinite;
     background-repeat: no-repeat; 
     background-size: 100% 100%;
     animation-duration:20s;
     }

    .slider-item1{ 
     background-image:url({{URL::asset('/images/1.jpg')}});
     animation-delay: -1s;
   
     }

     .slider-item2{ 
     background-image:url({{URL::asset('/images/2.jpg')}});
     animation-delay: 3s;
    
     }
    
    .slider-item3{ 
     background-image:url({{URL::asset('/images/3.jpg')}});
     animation-delay:7s;
  
     }

     .slider-item4{ 
     background-image:url({{URL::asset('/images/4.jpg')}});
     animation-delay: 11s;
   
     }

     .slider-item5{ 
     background-image:url({{URL::asset('/images/5.jpg')}});
     animation-delay: 15s;
   
     }

     .slider-item + .slider-item {
	 opacity: 0;
     }
     

    @keyframes 
       fade{
        0%{
        opacity:0; z-index:2; 
        }
        5%{ 
        opacity:1; z-index:1; 
        }
        20%{ 
        opacity:1; z-index:1; 
        }
        25%{ 
        opacity:0; z-index:0; 
        }
        100%{ 
        opacity:0; z-index:0; 
        } 
        }

       
       .box {
            position: absolute;
            margin: 10% auto 10% auto;
            width: 100%;
            z-index:10;
        }
        
        .loginBox {
            background-color: #F0F4F6;
            border: 1px solid #BfD6E1;
            border-radius: 5px;
            color: #444;
            font: 14px 'Microsoft YaHei', '微软雅黑';
            margin: 0 auto;
            width: 350px;
            opacity: 0.95;
            
        }
        
      .loginBoxCenter {
            border-bottom: 1px solid #DDE0E8;
            padding: 35px 35px 25px 35px;
        }
        
       .loginBoxCenter p {
            margin-bottom: 10px
        }
        
        .loginBoxButtons {
            flex-direction:column;
            display: flex;
            align-items:center;
            border-top: 0px solid #FFF;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            line-height: 28px;
            overflow: hidden;
            padding: 10px 0px;
        }
        
         .loginInput {
            border: 1px solid #D2D9dC;
            border-radius: 2px;
            color: #444;
            font: 12px 'Microsoft YaHei', '微软雅黑';
            padding: 8px 14px;
            margin-bottom: 8px;
            width: 252px;
        }
        
         .loginInput:FOCUS {
            border: 1px solid #B7D4EA;
            box-shadow: 0 0 8px #B7D4EA;
        }
        
         .Btn1 {
            width:280px;
            background-color:#25c6ff;
            border: 1px solid #98CCE7;
            border-radius: 5px;
            /*
            box-shadow: inset rgba(255, 255, 255, 0.6) 0 1px 1px, rgba(0, 0, 0, 0.1) 0 1px 1px;
            background-image: linear-gradient(to bottom, #B7D4EA, white);
            */
            color:whitesmoke;
            cursor: pointer;
            float: right;
            font: bold 13px Arial;
            text-align:center;
            padding: 10px 0 ;
            margin: 10px 0;
            
        }

        
         .Btn1:HOVER {
            background-color:#20a6d6;
            box-shadow: inset rgba(255, 255, 255, 0.6) 0 1px 1px, rgba(0, 0, 0, 0.1) 0 1px 1px;
             /*
            background-image: linear-gradient(to top, #B7D4EA, white);
            */
        }

          .Btn2 {
            width:280px;
            background-color:#385185;
            border: 1px solid #98CCE7;
            border-radius: 5px;
            /*
            box-shadow: inset rgba(255, 255, 255, 0.6) 0 1px 1px, rgba(0, 0, 0, 0.1) 0 1px 1px;
            background-image: linear-gradient(to bottom, #B7D4EA, white);
            */
            color:whitesmoke;
            cursor: pointer;
            float: right;
            font: bold 13px Arial;
            text-align:center;
            padding: 10px 0 ;
            margin: 10px 0;
            
        }

        .Btn2:HOVER {
            background-color:#293b61;
            box-shadow: inset rgba(255, 255, 255, 0.6) 0 1px 1px, rgba(0, 0, 0, 0.1) 0 1px 1px;
             /*
            background-image: linear-gradient(to top, #B7D4EA, white);
            */
        }

                a.forgetLink {
            color: #ABABAB;
            cursor: pointer;
            float: right;
            font: 11px/20px Arial;
            text-decoration: none;
            vertical-align: middle;

        }
        
        a.forgetLink:HOVER {
            color: #000000;
            text-decoration: none;

        }
        
        input#remember {
            vertical-align: middle;
        }
        
        label[for="check"] {
            font: 11px Arial;
        }
        

        .info {
            margin:10px auto 0 auto;
            color:red;
        }

        .footer{
            width: 100%;
            height: 3.3%;
            position: absolute;
            bottom: 0;
            background-color: #444;
            opacity:0.8;
            z-index:10;
            color: #ABABAB;
            text-align: right;
             
        }

        .footertext{
            margin: 0.07% 1%;
            font-size:14px;
            
        }

    </style>
</head>
    
<body>
  <div class="background"> 
    <div class="slider">
    <div class="slider-item slider-item1"></div> 
    <div class="slider-item slider-item2"></div> 
    <div class="slider-item slider-item3"></div> 
    <div class="slider-item slider-item4"></div> 
    <div class="slider-item slider-item5"></div> 
    </div>
  </div>

   <div class="box">
        @yield('content')
   </div>

    <footer class="footer">
        <p class="footertext">by michwqy</p>
    </footer>
</body>
</html>

