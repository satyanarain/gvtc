
<!DOCTYPE html>
<html lang="en"> 
<head>
 <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>GVTC Admin Panel</title>
<link rel="stylesheet" href={{ asset("/bower_components/bootstrap/dist/css/bootstrap.min.css") }}>
<link rel="icon" href="{{ asset('/front/img/favicon.ico') }}" type="image/x-icon" />
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>   
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="{{ asset ("/bower_components/jquery/dist/jquery.min.js") }}"></script>
</head>

<body>
 
    

<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row">
        <div class="span12">
    		<div class="" id="loginModal">
              
              <div class="modal-body tab-body">
                  <div class="text-center"><a href="{{ url('/')}}"><img src="{{ asset('images/logo.jpg') }}" class="login-logo"/></a></div>
                  <ul class="nav nav-tabs login-tabs">
                    <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                    <li><a href="#create" data-toggle="tab">Guest User Registration</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in text-center well" id="login">
                       
                       @if(Session::has('success'))
<div class="alert alert-success" style='color:#a94442'>{{Session::get('success')}}</div>
@elseif(Session::has('fail'))
<div class="alert alert-danger"style='color:#a94442'>{{Session::get('fail')}}</div>
@endif

<form class="form-horizontal user-login-from"  method="POST" action="{{ url('/login')}}" >
{{ csrf_field() }}   
<!--    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
@if ($errors->has('email'))
<span class="help-block" style="color:#a94442">
<strong>{{ $errors->first('email') }}</strong>
</span>
@endif
<div class="col-sm-10">
<input id="email" type="email" class="form-control" placeholder="E-Mail Address"  name="email" value="{{ old('email') }}" required autofocus>
</div>
</div>--> 
<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
@if ($errors->has('username'))
<span class="help-block" style="color:#a94442">
<strong>{{ $errors->first('username') }}</strong>
</span>
@endif
<div class="col-md-12">
<input  type="text" autocomplete="off"  class="form-control" placeholder="User Name"  name="username" value="{{ old('username') }}" required autofocus>
</div>
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<div class="col-md-12">
<input id="password" type="password" autocomplete="off" placeholder="Password" class="form-control" name="password" required>
@if ($errors->has('password'))
<span class="help-block">
<strong>{{ $errors->first('password') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group">
<div class="col-md-12">
<div class="checkbox">  
<!--<input type="checkbox" class="customInput" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me-->
<select id="lanuage" name="lanuage" class="form-control lanuage-select">
<option value="en">English</option>
<option value="fr">French</option>
</select> 
    
</div>
</div>
</div>
<div class="form-group">
<div class="col-md-12">
<button type="submit" class="btn btn-primary sumbitBtn">Login</button>
<a class="btn btn-link forget-password" style="" href="{{ route('password.request') }}">Forgot Password?</a>

</div>
</div> 
<!--<p class="message">Not registered? <a href="#">Create an account</a></p>-->
<!--       <select name='language'required >
   <option value='' >Plaese Select</option>
   <option value='en'>English</option>
   <option value='fr'>French</option>
</select>-->
             
</form>
                      
                    </div>
                    <div class="tab-pane fade well" id="create" style="width:650px;">
                       
                       <div class="row">
        <div class="col-md-12">
            
                

                
                
                  @if (Session::has('success'))
                  <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                {!! Session::get('success') !!}
              </div>
                @else
              
                    
                    <form class="form-horizontal" method="POST" action="{{ route('guest_register.store') }}">
                        {{ csrf_field() }}
                         <input id="role" type="hidden" class="form-control" name="role" value="guest">
                         <input id="status" type="hidden" class="form-control" name="status" value="0">
                         <div class="col-md-6">
                     <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} required">
                            <label for="first_name" class="col-sm-12 symbol">First Name</label>

                            <div class="col-sm-12">
                                <input id="first_name" type="text" placeholder="First Name" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="custom form-group{{ $errors->has('last_name') ? ' has-error' : '' }} required">
                            <label for="name" class="col-sm-12 symbol">Last Name</label>

                            <div class="col-sm-12">
                                <input id="last_name" type="text" placeholder="Last Name" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                          <div class="custom form-group{{ $errors->has('username') ? ' has-error' : '' }} required">
                            <label for="first_name" class="col-sm-12 symbol">Username</label>
                            <div id="usermessage" class="col-sm-12"></div>

                            <div class="col-sm-12">
                                <input id="username" type="text" placeholder="Username" class="form-control username" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         
                         <div id="div_order"></div>
                        <div class="custom form-group{{ $errors->has('email') ? ' has-error' : '' }} required">
                            <label for="email" class="col-sm-12 symbol" >E-Mail Address</label>

                            <div class="col-sm-12">
                                <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         
                         
                        
                        <div class="custom form-group required" >
                         <label for="name" class="col-sm-12 symbol">Purpose of Account</label>    
                        <div class="col-sm-12">

                            <select id="account" name="account" required="" class="form-control">
                         <option value="" >Please Select</option>    
                        <option value="personal">Personal</option>
                        <option value="institutional">Institutional</option>
                        </select> 
                        </div>
                        </div>
                        
                        
                         
                         <div class="custom form-group required">
                            <label for="ioc" class="col-sm-12 symbol">Institution Type</label>

                            <div class="col-sm-12">
                                
                                
                                <select name="institution_type" class="form-control" required="">
                                <option value="">Please Select</option>
                                <option value="Govermment">Government</option>
                                <option value="Education">Education</option>
                                <option value="Meda">Meda</option>
                                <option value="Research">Research</option>
                                <option value="Commerical">Commerical</option>
                                <option value="Other">Other</option>
                                </select>   
                                
                                
<!--                                <input id="institution_type" placeholder="Institution Type" type="text" class="form-control" name="institution_type" value="{{ old('institution_type') }}"  autofocus>

                                @if ($errors->has('institution_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institution_type') }}</strong>
                                    </span>
                                @endif-->
                            </div>
                        </div>
                        </div>
                         <div class="col-md-6">
                        <div class="custom form-group{{ $errors->has('institution') ? ' has-error' : '' }} required">
                            <label for="institution" class="col-sm-12 symbol">Institution / Organization / Company</label>

                            <div class="col-sm-12">
                                <input id="institution" type="text" placeholder="Institution / Organization / Company" class="form-control" name="institution" value="{{ old('institution') }}" required autofocus>

                                @if ($errors->has('institution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institution') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        
                        
                        <div class="custom form-group{{ $errors->has('mobilenumber') ? ' has-error' : '' }} required">
                            <label for="ioc" class="col-sm-12">Phone Number</label>

                            <div class="col-sm-12">
                                <input id="mobilenumber" type="number"  placeholder="Phone Number" class="form-control" name="mobilenumber" value="{{ old('mobilenumber') }}"  autofocus>

                                @if ($errors->has('mobilenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobilenumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="custom form-group{{ $errors->has('address') ? ' has-error' : '' }} required ">
                            <label for="ioc" class="col-sm-12 symbol">Address</label>

                            <div class="col-sm-12">
                                <input id="address" type="text" placeholder="Address" class="form-control" name="address" value="{{ old('address') }}"  autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="custom form-group required" >
                         <label for="name" class="col-sm-12 symbol">Country of Residence</label>    
                        <div class="col-sm-12">

                            <select id="country" name="country" required="" class="form-control">
                         <option value="">Please Select</option>   
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antartica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Congo">Congo, the Democratic Republic of the</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                        <option value="Croatia">Croatia (Hrvatska)</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="East Timor">East Timor</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="France Metropolitan">France, Metropolitan</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Territories">French Southern Territories</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                        <option value="Holy See">Holy See (Vatican City State)</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran">Iran (Islamic Republic of)</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                        <option value="Korea">Korea, Republic of</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao">Lao People's Democratic Republic</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macau">Macau</option>
                        <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia">Micronesia, Federated States of</option>
                        <option value="Moldova">Moldova, Republic of</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn">Pitcairn</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russian Federation</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                        <option value="Saint LUCIA">Saint LUCIA</option>
                        <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia (Slovak Republic)</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                        <option value="Span">Spain</option>
                        <option value="SriLanka">Sri Lanka</option>
                        <option value="St. Helena">St. Helena</option>
                        <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syrian Arab Republic</option>
                        <option value="Taiwan">Taiwan, Province of China</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania, United Republic of</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda"selected>Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Viet Nam</option>
                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                        <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                        <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Yugoslavia">Yugoslavia</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                        </select> 
                        </div>
                        </div>

                        
                         
                         
                        <div class="custom form-group{{ $errors->has('password') ? ' has-error' : '' }} required">
                            <label for="password" class="custom col-sm-12 symbol">Password</label>

                            <div class="col-sm-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="custom form-group">
                            <label for="password-confirm" class="col-sm-12 symbol">Confirm Password</label>

                            <div class="col-sm-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                         </div>
                         
                        <div class="form-group ">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary registerBtn">
                                    Register
                                </button>
                            </div>
                        </div>
                         
                         
                      
                         
                         
                    </form>
                   @endif  
               
           
        </div>
    </div>
                      
<!--                      <form id="tab">
                        <label>Username</label>
                        <input type="text" value="" class="input-xlarge">
                        <label>First Name</label>
                        <input type="text" value="" class="input-xlarge">
                        <label>Last Name</label>
                        <input type="text" value="" class="input-xlarge">
                        <label>Email</label>
                        <input type="text" value="" class="input-xlarge">
                        <label>Address</label>
                        <textarea value="Smith" rows="3" class="input-xlarge">
                        </textarea>
     
                        <div>
                          <button class="btn btn-primary">Create Account</button>
                        </div>
                      </form>-->
                    </div>
                </div>
         
            </div>
        </div>
	</div>
</div>   
</div>


</body>
</html>

<?php
$rt=Config::get('app.locales');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.1.0/bootstrap.min.js"></script> 
<script>
$(document).ready(function(){
  $("#lanuage").change(function(){
   // location.href = login.jQuery(this).val();
   var thisval = $(this).val(); 
   
    //var thisval = $(this).val();    
    //$("#selectedval").val(thisval);
     //$("html").attr("lang", thisval);
    // alert(thisval);
     //var html = document.getElementsByTagName("html")[0].getAttribute("lang");
     //alert(html);
  });
});
$(function(){
  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');

  $('.nav-tabs a').click(function (e) {
    $(this).tab('show');
    //var scrollmem = $('body').scrollTop();
    window.location.hash = this.hash;
   // $('html,body').scrollTop(scrollmem);
  });
});
</script>
<script src="{{ asset ("/js/custom.js") }}"></script>
<style>
    .form .thumbnail {
  background: #FFFFFF;
  width: 150px;
  height: 150px;
  margin: 0 auto 30px;
  
  border-top-left-radius: 100%;
  border-top-right-radius: 100%;
  border-bottom-left-radius: 100%;
  border-bottom-right-radius: 100%;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.form .thumbnail img {
  display: block;
  width: 100%;
}
.form input {
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
  border-bottom-left-radius: 3px;
  border-bottom-right-radius: 3px;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  outline: 0;
  background: #1b6b36;
  width: 100%;
  border: 0;
  padding: 15px;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
  border-bottom-left-radius: 3px;
  border-bottom-right-radius: 3px;
  color: #FFFFFF;
  font-size: 18px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  margin-bottom:15px;
}
.btn-link{ text-decoration: none;}
</style>    