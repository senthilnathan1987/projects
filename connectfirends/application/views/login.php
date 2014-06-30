<body class="login">

    <div class="top-part"> <div class="gradient"></div> <div class="white"></div> <div class="shadow"></div> </div>
    <div class="content"> 
    	<h1 class="welcome-txt">Welcome to Connect Friends</h1>
    	<div class="background"></div> 
    	  <div class="login-wrapper"> 
    		<div class="box"> 
    			<div class="header grey"> 
    				<i class="icon-signin"></i>Login
    		    </div> 
    		    
    		   <?php echo form_open('login/process'); ?>
    		    	<div class="content no-padding with-actions grey"> 
    		    		<div class="section _100"> 
    		    			<label> Username </label> 
    		    			   <div> <input name="email" class="required"> </div> 
    		    	    </div> 
    		    	    
    		    	    <div class="section _100"> 
    		    	    	<label> Password </label> 
    		    	    	<div> <input name="password" type="password" class="required"> </div> 
    		    	    </div> 
    		        </div> 
    		        
    		        <div class="actions"> 
    		        	<div class="actions-left" style="margin-top: 8px;"> 
    		        		
    		            </div> 
    		            
    		            <div class="actions-right"> 
    		            	<input type="submit" class="btn btn-primary btn-sm login" value="Login"> 
    		            </div>
    		            <div class="login-or">Or</div> 
    		            <div class="actions-right"> 
    		            	<input type="button" class="btn  btn-warning btn-sm signup" value="Sign up for Connect Friends" >
    		            </div> 
    		        </div> 
    		    </form> 
    		    
    		  </div> 
       <div class="shadow"></div> 
     </div> 
     
     
     <!-- register --->
       <div class="signup-wrapper" style="display: none;"> 
    		<div class="box"> 
    			<div class="header grey"> 
    				<i class="icon-signin"></i>Sign up
    		    </div> 
    		    
    		  <form method="post" id="registration_form">
    		    	<div class="content no-padding with-actions grey"> 
    		    		<div class="section _100"> 
    		    			<label> Name </label> 
    		    			   <div> <input id="fname" name="fname" class="fname-txt required" placeholder="First name"><input id="lname" name="lname" placeholder="Last name" class="lname-txt required"> </div> 
    		    	    </div> 
    		    	    
    		    	    <div class="section _100"> 
    		    	    	<label> Email </label> 
    		    	    	<div> <input id="email" name="email" type="text" placeholder="Email" class="required"> </div> 
    		    	    </div>
    		    	    <div class="section _100"> 
    		    			<label> Re-type Email </label> 
    		    			   <div> <input id="re_email" name="re_email" class="required" placeholder="Re-type Email"> </div> 
    		    	    </div> 
    		    	    <div class="section _100"> 
    		    			<label> New Password </label> 
    		    			   <div> <input id="password" type='password' name="password" class="required" placeholder="New password"> </div> 
    		    	    </div>  
    		    	    <div class="section _100"> 
    		    			<label> Birthday </label> 
    		    			   <div> 
    		    			   	<div class="controls">
	                                    <select id="month" name="month" class="validate[required] styled" data-prompt-position="topLeft:-1,-5">
	                                        <option value="">Month</option>
	                                        <option value="01">January</option>
	                                        <option value="02">February</option>
	                                        <option value="03">March</option>
	                                        <option value="04">April</option>
	                                        <option value="05">May</option>
	                                        <option value="06">June</option>
	                                        <option value="07">July</option>
	                                        <option value="08">August</option>
	                                         <option value="09">September</option>
	                                          <option value="10">October</option>
	                                           <option value="11">November</option>
	                                            <option value="12">December</option>
	                                    </select>
	                                </div>
	                                	<div class="controls">
	                                    <select id="day" name="day" class="validate[required] styled" data-prompt-position="topLeft:-1,-5">
	                                        <option value="">Day</option>
	                                        <option value="1">1</option>
	                                        <option value="2">2</option>
	                                        <option value="3">3</option>
	                                        <option value="4">4</option>
	                                        <option value="5">5</option>
	                                        <option value="6">6</option>
	                                        <option value="7">7</option>
	                                        <option value="7">8</option>
	                                        <option value="7">9</option>
	                                        <option value="7">10</option>
	                                        <option value="7">11</option>
	                                        <option value="7">12</option>
	                                        <option value="7">13</option>
	                                        <option value="7">14</option>
	                                        <option value="7">15</option>
	                                        <option value="7">16</option>
	                                        <option value="7">17</option>
	                                        <option value="7">18</option>
	                                        <option value="7">19</option>
	                                        <option value="7">20</option>
	                                        <option value="7">21</option>
	                                        <option value="7">22</option>
	                                        <option value="7">23</option>
	                                        <option value="7">24</option>
	                                        <option value="7">25</option>
	                                        <option value="7">26</option>
	                                        <option value="7">27</option>
	                                        <option value="7">28</option>
	                                        <option value="7">29</option>
	                                        <option value="7">30</option>
	                                        <option value="7">31</option>
	                                      
	                                    </select>
	                                </div>
	                                	<div class="controls">
	                                    <select id="year" name="year" class="validate[required] styled" data-prompt-position="topLeft:-1,-5">
	                                        <option value="">Year</option>
	                                        <option value="1987">1978</option>
	                                        <option value="1987">1979</option>
	                                        <option value="1987">1980</option>
	                                        <option value="1987">1981</option>
	                                        <option value="1987">1982</option>
	                                        <option value="1987">1983</option>
	                                        <option value="1987">1984</option>
	                                        <option value="1987">1985</option>
	                                        <option value="1987">1986</option>
	                                        <option value="1987">1987</option>
	                                        <option value="1988">1988</option>
	                                        <option value="1989">1989</option>
	                                        <option value="1990">1990</option>
	                                        <option value="1991">1991</option>
	                                        <option value="1992">1992</option>
	                                        <option value="1993">1993</option>
	                                        
	                                    </select>
	                                </div>
    		    			   	
    		    			   	</div> 
    		    	    </div> 
    		    	    <div class="section _100"> 
    		    			<label> Gender </label> 
    		    			   <div> 
    		    			   <label class="radio inline">
														<input type="radio" id="gender" class="styled" name="gender" value="male">
														Male
													</label>
								<label class="radio inline">
														<input type="radio" id="gender" class="styled" name="gender" value="female">
														Female
													</label>
    		    			   	</div> 
    		    	    </div> 
    		        </div> 
    		        
    		        <div class="actions"> 
    		        	
    		            
    		            <div class="actions-right"> 
    		            	<input type="submit" class="btn btn-primary btn-sm Signupbtn" value="Sign up"> 
    		            	<input type="button" class="btn  btn-warning btn-sm existing_account" value="Login to existing account" >
    		            </div>
    		           
    		           
    		        </div> 
    		    </form> 
    		    
    		  </div> 
       <div class="shadow"></div> 
     </div> 
     
     
     
     <?php if(isset($_REQUEST['e'])){ ?>
     <div class="login-error-message alert alert-danger">
     	<p>The email you entered does not belong to any account.</p>
        <p>You can login using any email, username or mobile phone number associated with your account. Make sure that it is typed correctly.</p>
     	
     </div>
     <?php } ?>
     
     <div class="alert alert-success success-register" style="display: none;">
        <strong>Well done!</strong> You successfully registered with connect friends.A mail has been sent to activate your account.
      </div>
     
     
   </div>
    

</body>