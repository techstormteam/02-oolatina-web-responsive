<?php

include "config.php";
include "func.php";
include "panier.class.php";	

/* Newsletter */
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action == 'addnewsletter')
	{
		$email = $_REQUEST['email'];
		$reponse = VerifierAdresseMail($email);
		if($reponse == 1)
		{
			// Check si l'email existe passthru
			$SQL = "SELECT COUNT(*) FROM newsletter WHERE email = '$email'";
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
			
			if($req[0] == 0)
			{
		
				$SQL = "INSERT INTO newsletter VALUES ('','$email')";
				mysql_query($SQL);
				
				header("Location: index.php?checknewsletter=1");
			
			}
			else
			{
				header("Location: index.php?checknewsletter=-3");
			}
		}
		else if($reponse == -1)
		{
			header("Location: index.php?checknewsletter=-1");
		}
		else if($reponse == -2)
		{
			header("Location: index.php?checknewsletter=-2");
		}
	}
}

$panier = new panier();

if(isset($_REQUEST['hide']))
{
	$hide = $_REQUEST['hide'];
}

if($hide == 'full')
{

?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- Head BEGIN --><head>
  <meta charset="utf-8">
  <title>Page</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <?php
  
  include "topcss.php";
  
  ?>
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body style="background: url('images/bg.jpg') no-repeat fixed center top / cover transparent;" >

	<!-- TOP BAR -->		
	<?php

	include "topbar.php";

	?>
	<!-- END TOP BAR -->

	<?php
	
	include "popupconnect.php";
	
	?>

	<!-- MENU LEFT -->
	<?php

	include "menu.php";

	?>
    <!-- END MENU LEFT -->
	<div class="pageContainer">
		<div style="float:left;width:12.4%;">
		&nbsp;
		</div>
		<div style="float:left;width:69.60%;" id="ajax-container">
		<?php

		}

		?>
			<div class="col-md-12 sale-product">				
				<div class="def-block">
					<?php
					
					$SQL = "SELECT * FROM user WHERE username = '".$_SESSION['username']."' AND password = '".$_SESSION['password']."'";
					$reponse = mysql_query($SQL);
					$req = mysql_fetch_array($reponse);
					
					?>
					
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_1" data-toggle="tab">
										 Aperçu								
									</a>
								</li>
								<li class="">
									<a href="#tab_1_2" data-toggle="tab">
										 Compte								
									</a>
								</li>
								<li class="">
									<a href="#tab_1_3" data-toggle="tab">
										 Evenements						
									</a>
								</li>
								<li class="">
									<a href="#tab_1_4" data-toggle="tab">
										 Playlist								
									</a>
								</li>
								<li class="">
									<a href="#tab_1_5" data-toggle="tab">
										 Photo								
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1_1">
									<div class="row">
										<div class="col-md-3">
											<ul class="list-unstyled profile-nav">
												<li>
												<?php
												
												if(file_exists("images/user/".$req['id'].".jpg"))
												{
												?>
													<img src="images/user/<?php echo $req['id']; ?>.jpg" class="img-responsive" alt="">
												<?php
												}
												else
												{
												?>
													<img src="images/user/no_user.png" class="img-responsive" alt="">
												<?php
												}
												
												?>
												</li>
											</ul>
										</div>
										<div class="col-md-9">
											<div class="row">
												<div class="col-md-8 profile-info">
													<h1><?php echo utf8_encode($req['firstname'])." ".utf8_encode($req['lastname']); ?></h1>
													<p></p>
													<ul class="social-icons">
													<?php
													
														if($req['facebookpage'] != '')
														{
														?>
															<li><a href="<?php echo $req['facebookpage']; ?>" data-original-title="facebook" class="facebook" target="newpage"></a></li>
														<?php
														}
														
														if($req['twitterpage'] != '')
														{
														?>
															<li><a href="<?php echo $req['twitterpage']; ?>" data-original-title="twitter" class="twitter" target="newpage"></a></li>
														<?php
														}
														
														if($req['googlepage'] != '')
														{
														?>
															<li><a href="<?php echo $req['googlepage']; ?>" data-original-title="Google Plus" class="googleplus" target="newpage"></a></li>
														<?php
														}
													
													?>
													</ul>
													<p></p>
													<ul class="list-inline">
														<li>
															<i class="fa fa-map-marker"></i> 
															<?php
															
															if($req['pays'] == 'FR')
															{
															?>
																France
															<?php
															}
															
															?>
														</li>													
														<li>
															<i class="fa fa-briefcase"></i> 
															<?php
															
															$profession = $req['profession'];
															$profession = unserialize($profession);
															print_r($profession);
															
															?>
														</li>
													</ul>
												</div>
											</div>											
										</div>
									</div>
								</div>
								<!--tab_1_2-->
								<div class="tab-pane" id="tab_1_2">
									<div class="row profile-account">
										<div class="col-md-3">
											<ul class="ver-inline-menu tabbable margin-bottom-10">
												<li class="active">
													<a data-toggle="tab" href="#tab_1-1">
														<i class="fa fa-cog"></i> Information personnel												</a>
													<span class="after">
													</span>
												</li>
												<li class="">
													<a data-toggle="tab" href="#tab_2-2">
														<i class="fa fa-picture-o"></i> Changer votre photo												</a>
												</li>
												<li class="">
													<a data-toggle="tab" href="#tab_3-3">
														<i class="fa fa-lock"></i> Changer votre mot de passe												</a>
												</li>
											</ul>
										</div>
										<div class="col-md-9">
											<div class="tab-content">
												<div id="tab_1-1" class="tab-pane active">
													<form role="form" action="">
														<div class="form-group">
															<label class="control-label">Nom</label>
															<input name="firstname" value="<?php echo utf8_encode($req['firstname']); ?>" class="form-control" type="text">
														</div>
														<div class="form-group">
															<label class="control-label">Prénom</label>
															<input name="lastname" value="<?php echo utf8_encode($req['lastname']); ?>" class="form-control" type="text">
														</div>
														<div class="form-group">
															<label class="control-label">Email</label>
															<input name="email" value="<?php echo $req['email']; ?>" class="form-control" type="text">
														</div>
														<div class="form-group">
															<label class="control-label">Profession</label>
															<select class="form-control" name="profession">
															<option value="organisateur">Organisateur</option>
															<option value="professeur">Professeur</option>
															<option value="photographe">Photographe</option>
															<option value="dj">Dj</option>
															</select>
														</div>
														<div class="form-group">
															<label class="control-label">Adresse</label>
															<input name="adresse" value="<?php echo $req['adresse']; ?>" class="form-control" type="text">
														</div>
														<div class="form-group">
															<label class="control-label">Code postal</label>
															<input name="codepostal" value="<?php echo $req['code_postal']; ?>" class="form-control" type="text">
														</div>
														<div class="form-group">
															<label class="control-label">Ville</label>
															<input name="ville" value="Sucy en brie" class="form-control" type="text">
														</div>
														<div class="form-group">
															<label class="control-label visible-ie8 visible-ie9">Country</label>
															<select name="pays" id="select2_sample4" class="select2 form-control">
																<option value=""></option>
																<option value="AF">Afghanistan</option>
																<option value="AL">Albania</option>
																<option value="DZ">Algeria</option>
																<option value="AS">American Samoa</option>
																<option value="AD">Andorra</option>
																<option value="AO">Angola</option>
																<option value="AI">Anguilla</option>
																<option value="AQ">Antarctica</option>
																<option value="AR">Argentina</option>
																<option value="AM">Armenia</option>
																<option value="AW">Aruba</option>
																<option value="AU">Australia</option>
																<option value="AT">Austria</option>
																<option value="AZ">Azerbaijan</option>
																<option value="BS">Bahamas</option>
																<option value="BH">Bahrain</option>
																<option value="BD">Bangladesh</option>
																<option value="BB">Barbados</option>
																<option value="BY">Belarus</option>
																<option value="BE">Belgium</option>
																<option value="BZ">Belize</option>
																<option value="BJ">Benin</option>
																<option value="BM">Bermuda</option>
																<option value="BT">Bhutan</option>
																<option value="BO">Bolivia</option>
																<option value="BA">Bosnia and Herzegowina</option>
																<option value="BW">Botswana</option>
																<option value="BV">Bouvet Island</option>
																<option value="BR">Brazil</option>
																<option value="IO">British Indian Ocean Territory</option>
																<option value="BN">Brunei Darussalam</option>
																<option value="BG">Bulgaria</option>
																<option value="BF">Burkina Faso</option>
																<option value="BI">Burundi</option>
																<option value="KH">Cambodia</option>
																<option value="CM">Cameroon</option>
																<option value="CA">Canada</option>
																<option value="CV">Cape Verde</option>
																<option value="KY">Cayman Islands</option>
																<option value="CF">Central African Republic</option>
																<option value="TD">Chad</option>
																<option value="CL">Chile</option>
																<option value="CN">China</option>
																<option value="CX">Christmas Island</option>
																<option value="CC">Cocos (Keeling) Islands</option>
																<option value="CO">Colombia</option>
																<option value="KM">Comoros</option>
																<option value="CG">Congo</option>
																<option value="CD">Congo, the Democratic Republic of the</option>
																<option value="CK">Cook Islands</option>
																<option value="CR">Costa Rica</option>
																<option value="CI">Cote d'Ivoire</option>
																<option value="HR">Croatia (Hrvatska)</option>
																<option value="CU">Cuba</option>
																<option value="CY">Cyprus</option>
																<option value="CZ">Czech Republic</option>
																<option value="DK">Denmark</option>
																<option value="DJ">Djibouti</option>
																<option value="DM">Dominica</option>
																<option value="DO">Dominican Republic</option>
																<option value="EC">Ecuador</option>
																<option value="EG">Egypt</option>
																<option value="SV">El Salvador</option>
																<option value="GQ">Equatorial Guinea</option>
																<option value="ER">Eritrea</option>
																<option value="EE">Estonia</option>
																<option value="ET">Ethiopia</option>
																<option value="FK">Falkland Islands (Malvinas)</option>
																<option value="FO">Faroe Islands</option>
																<option value="FJ">Fiji</option>
																<option value="FI">Finland</option>
																<option value="FR">France</option>
																<option value="GF">French Guiana</option>
																<option value="PF">French Polynesia</option>
																<option value="TF">French Southern Territories</option>
																<option value="GA">Gabon</option>
																<option value="GM">Gambia</option>
																<option value="GE">Georgia</option>
																<option value="DE">Germany</option>
																<option value="GH">Ghana</option>
																<option value="GI">Gibraltar</option>
																<option value="GR">Greece</option>
																<option value="GL">Greenland</option>
																<option value="GD">Grenada</option>
																<option value="GP">Guadeloupe</option>
																<option value="GU">Guam</option>
																<option value="GT">Guatemala</option>
																<option value="GN">Guinea</option>
																<option value="GW">Guinea-Bissau</option>
																<option value="GY">Guyana</option>
																<option value="HT">Haiti</option>
																<option value="HM">Heard and Mc Donald Islands</option>
																<option value="VA">Holy See (Vatican City State)</option>
																<option value="HN">Honduras</option>
																<option value="HK">Hong Kong</option>
																<option value="HU">Hungary</option>
																<option value="IS">Iceland</option>
																<option value="IN">India</option>
																<option value="ID">Indonesia</option>
																<option value="IR">Iran (Islamic Republic of)</option>
																<option value="IQ">Iraq</option>
																<option value="IE">Ireland</option>
																<option value="IL">Israel</option>
																<option value="IT">Italy</option>
																<option value="JM">Jamaica</option>
																<option value="JP">Japan</option>
																<option value="JO">Jordan</option>
																<option value="KZ">Kazakhstan</option>
																<option value="KE">Kenya</option>
																<option value="KI">Kiribati</option>
																<option value="KP">Korea, Democratic People's Republic of</option>
																<option value="KR">Korea, Republic of</option>
																<option value="KW">Kuwait</option>
																<option value="KG">Kyrgyzstan</option>
																<option value="LA">Lao People's Democratic Republic</option>
																<option value="LV">Latvia</option>
																<option value="LB">Lebanon</option>
																<option value="LS">Lesotho</option>
																<option value="LR">Liberia</option>
																<option value="LY">Libyan Arab Jamahiriya</option>
																<option value="LI">Liechtenstein</option>
																<option value="LT">Lithuania</option>
																<option value="LU">Luxembourg</option>
																<option value="MO">Macau</option>
																<option value="MK">Macedonia, The Former Yugoslav Republic of</option>
																<option value="MG">Madagascar</option>
																<option value="MW">Malawi</option>
																<option value="MY">Malaysia</option>
																<option value="MV">Maldives</option>
																<option value="ML">Mali</option>
																<option value="MT">Malta</option>
																<option value="MH">Marshall Islands</option>
																<option value="MQ">Martinique</option>
																<option value="MR">Mauritania</option>
																<option value="MU">Mauritius</option>
																<option value="YT">Mayotte</option>
																<option value="MX">Mexico</option>
																<option value="FM">Micronesia, Federated States of</option>
																<option value="MD">Moldova, Republic of</option>
																<option value="MC">Monaco</option>
																<option value="MN">Mongolia</option>
																<option value="MS">Montserrat</option>
																<option value="MA">Morocco</option>
																<option value="MZ">Mozambique</option>
																<option value="MM">Myanmar</option>
																<option value="NA">Namibia</option>
																<option value="NR">Nauru</option>
																<option value="NP">Nepal</option>
																<option value="NL">Netherlands</option>
																<option value="AN">Netherlands Antilles</option>
																<option value="NC">New Caledonia</option>
																<option value="NZ">New Zealand</option>
																<option value="NI">Nicaragua</option>
																<option value="NE">Niger</option>
																<option value="NG">Nigeria</option>
																<option value="NU">Niue</option>
																<option value="NF">Norfolk Island</option>
																<option value="MP">Northern Mariana Islands</option>
																<option value="NO">Norway</option>
																<option value="OM">Oman</option>
																<option value="PK">Pakistan</option>
																<option value="PW">Palau</option>
																<option value="PA">Panama</option>
																<option value="PG">Papua New Guinea</option>
																<option value="PY">Paraguay</option>
																<option value="PE">Peru</option>
																<option value="PH">Philippines</option>
																<option value="PN">Pitcairn</option>
																<option value="PL">Poland</option>
																<option value="PT">Portugal</option>
																<option value="PR">Puerto Rico</option>
																<option value="QA">Qatar</option>
																<option value="RE">Reunion</option>
																<option value="RO">Romania</option>
																<option value="RU">Russian Federation</option>
																<option value="RW">Rwanda</option>
																<option value="KN">Saint Kitts and Nevis</option>
																<option value="LC">Saint LUCIA</option>
																<option value="VC">Saint Vincent and the Grenadines</option>
																<option value="WS">Samoa</option>
																<option value="SM">San Marino</option>
																<option value="ST">Sao Tome and Principe</option>
																<option value="SA">Saudi Arabia</option>
																<option value="SN">Senegal</option>
																<option value="SC">Seychelles</option>
																<option value="SL">Sierra Leone</option>
																<option value="SG">Singapore</option>
																<option value="SK">Slovakia (Slovak Republic)</option>
																<option value="SI">Slovenia</option>
																<option value="SB">Solomon Islands</option>
																<option value="SO">Somalia</option>
																<option value="ZA">South Africa</option>
																<option value="GS">South Georgia and the South Sandwich Islands</option>
																<option value="ES">Spain</option>
																<option value="LK">Sri Lanka</option>
																<option value="SH">St. Helena</option>
																<option value="PM">St. Pierre and Miquelon</option>
																<option value="SD">Sudan</option>
																<option value="SR">Suriname</option>
																<option value="SJ">Svalbard and Jan Mayen Islands</option>
																<option value="SZ">Swaziland</option>
																<option value="SE">Sweden</option>
																<option value="CH">Switzerland</option>
																<option value="SY">Syrian Arab Republic</option>
																<option value="TW">Taiwan, Province of China</option>
																<option value="TJ">Tajikistan</option>
																<option value="TZ">Tanzania, United Republic of</option>
																<option value="TH">Thailand</option>
																<option value="TG">Togo</option>
																<option value="TK">Tokelau</option>
																<option value="TO">Tonga</option>
																<option value="TT">Trinidad and Tobago</option>
																<option value="TN">Tunisia</option>
																<option value="TR">Turkey</option>
																<option value="TM">Turkmenistan</option>
																<option value="TC">Turks and Caicos Islands</option>
																<option value="TV">Tuvalu</option>
																<option value="UG">Uganda</option>
																<option value="UA">Ukraine</option>
																<option value="AE">United Arab Emirates</option>
																<option value="GB">United Kingdom</option>
																<option value="US">United States</option>
																<option value="UM">United States Minor Outlying Islands</option>
																<option value="UY">Uruguay</option>
																<option value="UZ">Uzbekistan</option>
																<option value="VU">Vanuatu</option>
																<option value="VE">Venezuela</option>
																<option value="VN">Viet Nam</option>
																<option value="VG">Virgin Islands (British)</option>
																<option value="VI">Virgin Islands (U.S.)</option>
																<option value="WF">Wallis and Futuna Islands</option>
																<option value="EH">Western Sahara</option>
																<option value="YE">Yemen</option>
																<option value="ZM">Zambia</option>
																<option value="ZW">Zimbabwe</option>
															</select>
														</div>
														<div class="form-group">
															<label class="control-label">Téléphone</label>
															<input name="phone" value="<?php echo $req['phone']; ?>" class="form-control" type="text">
														</div>
														<div class="form-group">
															<label class="control-label">Mobile</label>
															<input name="mobile" value="<?php echo $req['mobile']; ?>" class="form-control" type="text">
														</div>
														<div class="form-group">
															<label class="control-label">Fax</label>
															<input name="fax" value="<?php echo $req['fax']; ?>" class="form-control" type="text">
														</div>
														<div class="form-group">
															<label class="control-label">Facebook Page</label>
															<input name="facebookpage" placeholder="http://www.facebook.com/4567845151564/" value="http://www.facebook.com" class="form-control" type="text">
														</div>
														<div class="form-group">
															<label class="control-label">Twitter Page</label>
															<input name="twitterpage" placeholder="http://twitter.com/votrecompte" value="" class="form-control" type="text">
														</div>
														<div class="form-group">
															<label class="control-label">Google+ Page</label>
															<input name="googlepage" placeholder="http://plus.google.fr/454484654546546" value="www.google.fr" class="form-control" type="text">
														</div>
														<input name="action" value="1" type="hidden">
														<div class="margiv-top-10">
															<input value="Sauvegarder les modifications" class="btn green" type="submit">
														</div>
													</form>
												</div>
												<div id="tab_2-2" class="tab-pane">
													<p>
													</p>
													<form method="post" action="" enctype="multipart/form-data" role="form">
														<div class="form-group">
															<div class="fileinput fileinput-new" data-provides="fileinput">
																<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																	<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
																</div>
																<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
																</div>
																<div>
																	<span class="btn default btn-file">
																		<span class="fileinput-new">
																			 Ajouter une photo																	</span>
																		<span class="fileinput-exists">
																			 Modifier																	</span>
																		<input name="avatar" type="file">
																	</span>
																	<a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
																		 Remove
																	</a>
																</div>
															</div>
															<div class="clearfix margin-top-10">
																Seule les photos au format JPEG et PNG sont accepter.
															</div>
														</div>
														<div class="margin-top-10">
														<input name="action" value="3" type="hidden">
														<input class="btn green" value="Sauvegarder les modifications" type="submit">
														</div>
													</form>
												</div>
												<div id="tab_3-3" class="tab-pane">
													<form action="">
														<div class="form-group">
															<label class="control-label">Nouveau mot de passe</label>
															<input name="password" class="form-control" type="password">
														</div>
														<div class="form-group">
															<label class="control-label">Confirmer le mot de passe</label>
															<input name="password2" class="form-control" type="password">
														</div>
														<input name="action" value="2" type="hidden">
														<div class="margin-top-10">
														<input class="btn green" value="Modifiez le mot de passe" type="submit">														
														</div>
													</form>
												</div>
												<div id="tab_4-4" class="tab-pane">
													<form action="#">
														<table class="table table-bordered table-striped">
														<tbody><tr>
															<td>
																 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus..
															</td>
															<td>
																<label class="uniform-inline">
																<div class="radio"><span><input name="optionsRadios1" value="option1" type="radio"></span></div>
																Yes </label>
																<label class="uniform-inline">
																<div class="radio"><span class="checked"><input name="optionsRadios1" value="option2" checked="" type="radio"></span></div>
																No </label>
															</td>
														</tr>
														<tr>
															<td>
																 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
															</td>
															<td>
																<label class="uniform-inline">
																<div class="checker"><span><input value="" type="checkbox"></span></div> Yes </label>
															</td>
														</tr>
														<tr>
															<td>
																 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
															</td>
															<td>
																<label class="uniform-inline">
																<div class="checker"><span><input value="" type="checkbox"></span></div> Yes </label>
															</td>
														</tr>
														<tr>
															<td>
																 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
															</td>
															<td>
																<label class="uniform-inline">
																<div class="checker"><span><input value="" type="checkbox"></span></div> Yes </label>
															</td>
														</tr>
														</tbody></table>
														<!--end profile-settings-->
														<div class="margin-top-10">
															<a href="#" class="btn green">
																 Save Changes
															</a>
															<a href="#" class="btn default">
																 Cancel
															</a>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!--end col-md-9-->
									</div>
								</div>
								<div class="tab-pane" id="tab_1_3" style="padding:10px;">
									<div class="labelFormConnect">Titre :</div>
									<input type="text" name="titre" value="" placeholder="Titre" class="form-control">
									<div class="labelFormConnect">Description : </div>
									<textarea class="form-control"></textarea>
									<div class="labelFormConnect">Image de l'evenement :</div>
									<div class="labelFormConnect">Genre :</div>
									<div id="errorgenre"></div>
									<div><input id="concert" value="concert" name="genre[]" type="checkbox"><span>Concert</span></div>
									<input id="cours" value="cours" name="genre[]" type="checkbox"> Cours
									<input id="festival" value="festival" name="genre[]" type="checkbox"> Festival
									<input id="soiree" value="soiree" name="genre[]" type="checkbox"> Soirée
									<input id="stage" value="stage" name="genre[]" type="checkbox"> Stage
									<input id="concours" value="concours" name="genre[]" type="checkbox"> Concours
									<br>
									<hr>
									<div class="labelFormConnect">Musique :</div>
									<div id="errormusic"></div>
									<label><div id="uniform-salsa" class="checker"><span><input id="salsa" value="salsa" name="musique[]" type="checkbox"></span></div> Salsa</label>
									<label><div id="uniform-salsacubaine" class="checker"><span><input id="salsacubaine" value="salsa_cubaine" name="musique[]" type="checkbox"></span></div> Salsa Cubaine</label>
									<label><div id="uniform-salsaportoricaine" class="checker"><span><input id="salsaportoricaine" value="salsa_portoricaine" name="musique[]" type="checkbox"></span></div> Salsa Portoricaine</label>
									<label><div id="uniform-bachata" class="checker"><span><input id="bachata" value="bachata" name="musique[]" type="checkbox"></span></div> Bachata</label>
									<label><div id="uniform-kizomba" class="checker"><span><input id="kizomba" value="kizomba" name="musique[]" type="checkbox"></span></div> Kizomba</label>																
									<label><div id="uniform-semba" class="checker"><span><input id="semba" value="semba" name="musique[]" type="checkbox"></span></div> Semba</label>
									<label><div id="uniform-chachacha" class="checker"><span><input id="chachacha" value="chachacha" name="musique[]" type="checkbox"></span></div> Cha Cha Cha</label>
									<label><div id="uniform-merengue" class="checker"><span><input id="merengue" value="merengue" name="musique[]" type="checkbox"></span></div> Merengue</label>
									<label><div id="uniform-rock" class="checker"><span><input id="rock" value="rock" name="musique[]" type="checkbox"></span></div> Rock'n'Roll</label>
									<label><div id="uniform-reggaetton" class="checker"><span><input id="reggaetton" value="reggaetton" name="musique[]" type="checkbox"></span></div> Reggaetton</label>
									<label><div id="uniform-zumba" class="checker"><span><input id="zumba" value="zumba" name="musique[]" type="checkbox"></span></div> Zumba</label>
									<div class="labelFormConnect">Date de debut l'évenement :</div>
									<div class="input-icon">
										<i class="fa fa-calendar"></i>
										<input class="form-control date-picker" size="16" style="width:400px;margin-right:10px;" value="2014-07-04" data-date="2014-07-04" data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="datedebut" type="text">
									</div>
									<div class="labelFormConnect">Date de fin de l'évenement :</div>
									<div class="input-icon">
										<i class="fa fa-calendar"></i>
										<input class="form-control date-picker" size="16" style="width:400px;" value="2014-07-04" data-date="2014-07-04" data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="datefin" type="text">
									</div>
									<div class="labelFormConnect">Devise : </div>
									<select class="form-control" name="currency">
									<option>EUR (€)</option>
									<option>USD ($)</option>																
									</select>
									<input class="form-control" name="price" placeholder="Prix..." type="text">
									<hr>
									<div class="labelFormConnect">Site Internet :</div>
									<input name="site" value="" class="form-control" placeholder="http://<URL du site internet>" type="text"><br>
	
								</div>
								<div class="tab-pane" id="tab_1_4">
								<center>Prochainement</center>
								</div>
								<div class="tab-pane" id="tab_1_5">
								<center>Prochainement</center>
								</div>
								
							</div>
							<!--end tab-pane-->
						</div>			
				</div>
			</div>
		<?php

		if($hide == 'full')
		{

		?>
		</div>
		<div style="float:left;width:18%;padding-top:36px;text-align:center;">
		<?php
		
		include "rightcolumns.php";
		
		?>
		</div>
	</div>

    <!-- BEGIN STEPS -->
    <?php
	
	include "counter.php";
	
	?>
    <!-- END STEPS -->

    <!-- BEGIN PRE-FOOTER -->
    <?php

	include "prefooter.php";

	?>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <?php

	include "footer.php";

	?>
	
	<?php
	
	include "player.php";
	
	?>
    <!-- END FOOTER -->

    <!-- BEGIN fast view of a product -->
    <div id="product-pop-up" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="assets/temp/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive">
                  </div>
                  <div class="product-other-images">
                    <a href="#" class="active"><img alt="Berry Lace Dress" src="assets/temp/products/model3.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="assets/temp/products/model4.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="assets/temp/products/model5.jpg"></a>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h1>Cool green dress with red bell</h1>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>$</span>47.00</strong>
                      <em>$<span>62.00</span></em>
                    </div>
                    <div class="availability">
                      Availability: <strong>In Stock</strong>
                    </div>
                  </div>
                  <div class="description">
                    <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat
Nostrud duis molestie at dolore.</p>
                  </div>
                  <div class="product-page-options">
                    <div class="pull-left">
                      <label class="control-label">Size:</label>
                      <select class="form-control input-sm">
                        <option>L</option>
                        <option>M</option>
                        <option>XL</option>
                      </select>
                    </div>
                    <div class="pull-left">
                      <label class="control-label">Color:</label>
                      <select class="form-control input-sm">
                        <option>Red</option>
                        <option>Blue</option>
                        <option>Black</option>
                      </select>
                    </div>
                  </div>
                  <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                    </div>
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                    <button class="btn btn-default" type="submit">More details</button>
                  </div>
                </div>

                <div class="sticker sticker-sale"></div>
              </div>
            </div>
    </div>
    <!-- END fast view of a product -->
	<?php
	
	include "javascript.php";
	
	?>


</body>
<!-- END BODY -->
</html>
<?php

}

?>
