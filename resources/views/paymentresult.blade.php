<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
  <link href="{{ asset('bo/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c6da8951b2.js" crossorigin="anonymous"></script>
    <style>
      ._failed{ border-bottom: solid 4px red !important; }
		._failed i{  color:red !important;  }

		._pending{ border-bottom: solid 4px #FFA500 !important; }
		._pending i{  color:#FFA500 !important;  }

		._success {
		    box-shadow: 0 15px 25px #00000019;
		    padding: 45px;
		    width: 100%;
		    text-align: center;
		    margin: 40px auto;
		    border-bottom: solid 4px #28a745;
		}

		._success i {
		    font-size: 55px;
		    color: #28a745;
		}

		._success h2 {
		    margin-bottom: 12px;
		    font-size: 40px;
		    font-weight: 500;
		    line-height: 1.2;
		    margin-top: 10px;
		}

		._success p {
		    margin-bottom: 0px;
		    font-size: 18px;
		    color: #495057;
		    font-weight: 500;
		}

    </style>
    <body>
      <div class="container">
      	@if($result =='S')  
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="message-box _success">
                     <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <h2> Your payment was successful </h2>
                   <p> Thank you for your payment. we will <br>
		be in contact with more details shortly </p> 
					<p>Please check your mail box or spam box</p>     
		            </div> 
		        </div> 
		    </div> 
		  
		@elseif($result =='F')  
		  <div class="row justify-content-center">
		            <div class="col-md-5">
		                <div class="message-box _success _failed">
		                     <i class="fa fa-times-circle" aria-hidden="true"></i>
		                    <h2> Your payment failed </h2>
		             <p>  Try again later </p> 
		         
		            </div> 
		        </div> 
		    </div>
		 @elseif($result =='P')
		 <div class="row justify-content-center">
		            <div class="col-md-5">
		                <div class="message-box _success _pending">
		                     <i class="fa-solid fa-clock"></i>
		                    <h2>Pending Authorization</h2>
		             <p>Please wait for a moment</p> 
		         
		            </div> 
		        </div> 
		    </div>
		 @endif 
		  
		</div> 
    </body>
    <script src="https://kit.fontawesome.com/c6da8951b2.js" crossorigin="anonymous"></script>
</html>