@extends('users-mgmt.base')
@section('action-content')
<?php
$role=Auth::user()->role;
?>
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Update User Profile</h3>
              <?php if($role=='admin'){ ?>
              <div class="pull-right">
<a href="{{ route('user-management.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>
<?php } else{ ?>  
 <div class="pull-right">
<a href="<?php echo "/user-management/viewprofile/".Auth::user()->id; ?>" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; Back</a>
</div>             
<?php } ?>              
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($user, ['method' => 'PATCH','route' => ['user-management.update', $user->id],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                   
                   
                  <div class="form-row">
                    
                 
                  
                  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} col-md-12">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" name="username"  readonly=""  value="{{ $user->username }}" required  class="form-control"  placeholder="Enter Username" id="username" >
                 @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                  </div> 
                  </div>    
                   
                  <?php if($user->role=='guest'){ ?> 
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="first_name" class="control-label">First Name</label>
                  <input type="text" name="first_name" value="{{ $user->first_name }}" required  class="form-control" id="first_name" placeholder="Enter Fisrt Name">
                 @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="last_name" class="control-label">Last Name</label>
                  <input type="textarea" name="last_name" value="{{ $user->last_name }}" required  class="form-control" id="name" placeholder="Enter Last Name">
                 @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                 
                <div class="form-row">
                  
                <div class="form-group col-md-6 required">
                  <label for="account" class="control-label">Account for Personal or Institutional Use</label>
                  <select id="account" name="account" required="required" class="form-control">
                  <option value="">Please Select</option> 
                  <option value="personal" <?php echo ($user->account == 'personal')?'selected':''?>>Personal</option> 
                  <option value="institutional" <?php echo ($user->account == 'institutional')?'selected':''?>>Institutional</option>
                  </select>
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('institution') ? ' has-error' : '' }} col-md-6 required">
                  <label for="last_name" class="control-label">Institution/Organization/Company</label>
                  <input type="textarea" name="institution" value="{{ $user->institution }}" required  class="form-control" id="name" placeholder="Enter Institution/Organization/Company">
                 @if ($errors->has('institution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institution') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div>   
                   
                  <?php } ?>   
                  
                <div class="form-row">
                   <?php if($user->role=='guest'){ ?>   
                  <div class="form-group{{ $errors->has('institution_type') ? ' has-error' : '' }} col-md-6 ">
                  <label for="institution_type" class="control-label">Institution Type</label>
                  <input type="text" name="institution_type" value="{{ $user->institution_type }}"   class="form-control" id="institution_type" placeholder="Enter Institution Type">
                 @if ($errors->has('institution_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institution_type') }}</strong>
                                    </span>
                                @endif
                  </div>   
                    
                   <?php }else{ ?>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Name</label>
                  <input type="text" name="name" value="{{ $user->name }}" required  class="form-control" id="name" placeholder="Enter name">
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                  </div>
                   <?php } ?>  
                  
                  
                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Address</label>
                  <input type="textarea" name="address" value="{{ $user->address }}" required  class="form-control" id="name" placeholder="Enter address">
                 @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                  
                 <div class="form-row"> 
                  
                  
                  
                   <div class="form-group{{ $errors->has('mobilenumber') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Mobile Number</label>
                  <input type="text" name="mobilenumber" readonly="" value="{{ $user->mobilenumber }}" required  class="form-control" id="name" placeholder="Enter mobile">
                 @if ($errors->has('mobilenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobilenumber') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  
                  
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Email Address</label>
                  <input type="email" name="email" readonly="" value="{{ $user->email }}" required  class="form-control" id="email" placeholder="Enter email">
               @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                  
                
                 </div> 
                 
                  
                  <div class="form-row"> 
                     <?php if($user->role=='guest'){ ?>    
                   <div class="form-group col-md-6 required">
                  <label for="name" class="control-label">Country of Residence</label> 
                  

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
                        <option value="Lebanon" selected>Lebanon</option>
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
                        <option value="Uganda">Uganda</option>
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
                     <?php }else{ ?>  
                      
                  <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Department</label>
                  <input type="text" name="department" value="{{ $user->department}}" required  class="form-control" id="department" placeholder="Enter Department">
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Designation</label>
                  <input type="text" name="designation" value="{{ $user->designation}}" required  class="form-control" id="designation" placeholder="Enter Designation">
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                  </div> 
                     <?php } ?>
                  </div>
                  <?php if($user->role!='guest'){ ?>  
                  <div class="form-row">
                  <div class="form-group{{ $errors->has('photoid') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Photo ID</label>
                  <input type="file" name="photoid" accept=".pdf,.jpg,.jpeg,.png,.gif"  id="documents1" onchange="validFile(this,1)"   class="" id="photoid" >
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photoid') }}</strong>
                                    </span>
                                @endif
<!--                  <img src="{{ asset("userdocument/$user->photoid") }}" height="80px" width="80px" /> -->
                  <?php if($user->photoid!='default_document.png'){ ?>
                 <a target="_blank" href="{{ asset("userdocument/$user->photoid") }}">Document</a>
                  <?php } ?>
                  
                  </div>  
                 
                  
                  <div class="form-group{{ $errors->has('profilepicture') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Profile Picture</label>
                  <input type="file" name="profilepicture"   accept=".jpg,.jpeg,.png,.gif"  id="documents2" onchange="validFile(this,2)" class=""  >
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profilepicture') }}</strong>
                                    </span>
                                @endif
                    <img src="{{ asset("profilepicture/$user->profilepicture") }}" height="80px" width="80px" />            
                     
                   
                  </div> 
                  </div>
                  <?php } ?>
                   <input type="hidden"  name="edit_userdocument" value="{{ $user->photoid }}" />
                  <input type="hidden" name="edit_profilepicture" value="{{ $user->profilepicture }}" /> 
                  
                    
                  <div class="form-row">
                <div class=" form-group col-md-6">
                  <label for="exampleInputPassword1">Status</label>
                  
                    
                    
                 <select id="account" name="status"  class="form-control">
                     
                     <?php
                     
                     if(@$_GET['flag']==1 && $role=='admin'){
                     ?>
                     <option value="">Select Status</option> 
                     <option value="1" <?php echo ($user->status == 1)?'selected':''?>>Active</option> 
                     <option value="0" <?php echo ($user->status == 0)?'selected':''?>>Inactive</option>
                     
                     <?php }else{ ?>
                     <option readonly value="1" <?php echo ($user->status == 1)?'selected':''?>>Active</option>
                     <?php } ?>
                 </select>
                </div>
                   
<!--                 <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" id="password_confirmation" name="password_confirmation"   class="form-control" id="password_confirmation" placeholder="Password">
                </div>-->
                
              </div>
                      
                 
                  
              </div> 



                
              <!-- /.box-body -->
                
              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sub">@lang('menu.update', array(),Session::get('language_val'))</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection


