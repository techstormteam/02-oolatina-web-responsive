<div id="mask" onClick="closePopup();" style="position:fixed;display:none;top:0;left:0;width:100%;height:100%;background-color:rgba(0,0,0,0.8);z-index:10000;">
	</div>

	<div id="popupConnect">
	<a href="javascript:void(0);" onClick="closePopup();" style="float: right;font-size:14px;font: 15px/1.5em Helvetica,sans-serif;font-weight: bold;line-height: 20px;color: #000;text-shadow: 0px 1px 0px #FFF;opacity: 0.2;margin-top:5px;margin-right:10px;">X</a>

	<div id="login">
	<div style="float:left; width:247px;border:1px solid; height:100%; height:600px; background:url('images/left_image.png')">
	&nbsp;
	</div>
	<div style="float:left;">
	
	<form class="login-form" action="" method="post">
		<h3 class="form-title">Connectez-vous</h3>

<div class="form-group"   >
	<label class="boxerror" id="loginerror" style="display:none;" ></label>
	</div>


		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Nom d'utilisateur</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Nom d'utilisateur" 
				id="username" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Mot de passe</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Mot de passe" 
				id="password" name="password"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" class="btn blue pull-right" onClick="loginFun();">
			Se Connecter <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		<div class="forget-password">
			<h4>Mot de passe oublié ?</h4>
			<p>
				pas de soucis, cliquez				<a href="javascript:void(0);" onClick="loadblock('forgot');" id="forget-password">
					 ici				</a>
				 pour réinitialiser votre mot de passe.			</p>
		</div>
		<div class="create-account">
			<p>
				 Vous n'avez pas encore de compte ?&nbsp;
				<a href="javascript:void(0);" onClick="loadblock('register');" id="register-btn" class="btn blue" style="margin-top:10px;width:100%;">
					 Créer un compte ( 100% Gratuit )				</a>
			</p>
		</div>
	</form>
	</div>
	</div>






	<div id="register" style="display:none;">
	
	
	<div style="float:left; width:247px;border:1px solid; height:100%; height:600px; background:url('images/left_image.png')">
	&nbsp;
	</div>
	<div style="float:left;">
	<form class="login-form" action="" method="post" style="padding:40px;padding-top:0px;width:610px;">
		<h3 class="form-title">inscription</h3>



<div class="form-group">
	<label class="boxerror" id="registererror" style="display:none;" ></label>
	</div>



		<div class="form-group">
			
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			
			
				<div style="width:50%; float:left;">
			<label class="control-label visible-ie8 visible-ie9">Nom</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Nom" id="name" name="name"/>
			</div>
			</div>
			
				<div style="width:50%; float:left;">
					<label class="control-label visible-ie8 visible-ie9">Prénom</label>
					<div class="input-icon">
						<i class="fa fa-user"></i>
						<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Prénom" id="lastname" name="lastname"/>
					</div>
				</div>			
		</div>
		
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="email" id="email" name="email"/>
			</div>
		</div>	
	
		
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Address</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="adresse" id="address" name="address"/>
			</div>
		</div>
		
		
		
		
			<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			
				<div style="width:35%; float:left;">
			<label class="control-label visible-ie8 visible-ie9">City</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="ville" id="city" name="city"/>
			</div>
			</div>
			
				<div style="width:30%; float:left;">
			<label class="control-label visible-ie8 visible-ie9">Zip Code</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Code postal" id="zipcode" name="zipcode"/>
			</div>
			</div>
			
			<div style="width:35%; float:left;">
			<label class="control-label visible-ie8 visible-ie9">Country</label>
			<div class="input-icon">
				
			
				<i class="" id="dvFlag" style="background-repeat:no-repeat;float:left;height:24px;width:24px; color:#fff;  margin:6px 2px 4px 10px "></i>
				
				
				
    <select onchange="changeFlag()" style=" padding-left:36px; font-size:12px;" onkeypress="changeFlag()"  name="country" id="country" class="form-control placeholder-no-fix" autocomplete="off">
	
	
<option value="">--Pays--</option>
        <option value="AF">AFGHANISTAN</option>
        <option value="AL">ALBANIA</option>
        <option value="DZ">ALGERIA</option>
        <option value="AS">AMERICAN SAMOA</option>
        <option value="AD">ANDORRA</option>
        <option value="AO">ANGOLA</option>
        <option value="AI">ANGUILLA</option>
        <option value="AG">ANTIGUA</option>
        <option value="AG">ANTIGUA & BARBUDA</option>
        <option value="AN">ANTILLES, NETHERLANDS</option>
        <option value="AR">ARGENTINA</option>
        <option value="AM">ARMENIA</option>
        <option value="AW">ARUBA</option>
        <option value="AU">AUSTRALIA</option>
        <option value="AT">AUSTRIA</option>
        <option value="AZ">AZERBAIJAN</option>
        <option value="GN">AZORES</option>
        <option value="BS">BAHAMAS</option>
        <option value="BH">BAHRAIN</option>
        <option value="BD">BANGLADESH</option>
        <option value="BB">BARBADOS</option>
        <option value="AG">BARBUDA (ANTIGUA)</option>
        <option value="BY">BELARUS (BYELORUSSIA)</option>
        <option value="BE">BELGIUM</option>
        <option value="BZ">BELIZE</option>
        <option value="BJ">BENIN</option>
        <option value="BM">BERMUDA</option>
        <option value="BT">BHUTAN</option>
        <option value="BO">BOLIVIA</option>
        <option value="AN">BONAIRE (NETHERLAND ANTILLES)</option>
        <option value="BA">BOSNIA-HERZEGOVINA</option>
        <option value="BW">BOTSWANA</option>
        <option value="BR">BRAZIL</option>
        <option value="BN">BRUNEI</option>
        <option value="BG">BULGARIA</option>
        <option value="BF">BURKINA FASO</option>
        <option value="BI">BURUNDI</option>
        <option value="KH">CAMBODIA</option>
        <option value="CM">CAMEROON</option>
        <option value="CA">CANADA</option>
        <option value="IC">CANARY ISLANDS</option>
        <option value="CV">CAPE VERDE</option>
        <option value="KY">CAYMAN ISLANDS</option>
        <option value="CF">CENTRAL AFRICAN REPUBLIC</option>
        <option value="ES">CEUTA</option>
        <option value="TD">CHAD</option>
        <option value="CD">CHANNEL ISLANDS</option>
        <option value="CL">CHILE</option>
        <option value="CN">CHINA</option>
        <option value="CO">COLOMBIA</option>
        <option value="KM">COMOROS</option>
        <option value="CG">CONGO</option>
        <option value="CD">CONGO, DEM. REP. OF</option>
        <option value="CK">COOK ISLANDS</option>
        <option value="CR">COSTA RICA</option>
        <option value="CI">COTE DIVOIRE (IVORY COAST)</option>
        <option value="10">COUNTRY 10</option>
        <option value="12">COUNTRY 12</option>
        <option value="9">COUNTRY 9</option>
        <option value="SS">COUNTRY SY</option>
        <option value="HR">CROATIA</option>
        <option value="CU">CUBA</option>
        <option value="AN">CURACAO (NETHERLANDS ANTILLES)</option>
        <option value="CY">CYPRUS</option>
        <option value="CZ">CZECH REPUBLIC</option>
        <option value="DK">DENMARK</option>
        <option value="DJ">DJIBOUTI</option>
        <option value="DM">DOMINICA</option>
        <option value="DO">DOMINICAN REPUBLIC</option>
        <option value="TL">EAST TIMOR</option>
        <option value="EC">ECUADOR</option>
        <option value="EG">EGYPT</option>
        <option value="SV">EL SALVADOR</option>
        <option value="GB">ENGLAND</option>
        <option value="GQ">EQUATORIAL GUINEA</option>
        <option value="ER">ERITREA</option>
        <option value="EE">ESTONIA</option>
        <option value="ET">ETHIOPIA</option>
        <option value="EY">EY</option>
        <option value="FK">FALKLAND ISLANDS</option>
        <option value="FO">FAROE ISLANDS</option>
        <option value="FJ">FIJI</option>
        <option value="FI">FINLAND</option>
        <option value="FR">FRANCE</option>
        <option value="GF">FRENCH GUIANA</option>
        <option value="PF">FRENCH POLYNESIA</option>
        <option value="GA">GABON</option>
        <option value="GM">GAMBIA</option>
        <option value="IL">GAZA (WEST BANK/GAZA)</option>
        <option value="GE">GEORGIA</option>
        <option value="DE">GERMANY</option>
        <option value="GH">GHANA</option>
        <option value="GI">GIBRALTAR</option>
        <option value="GB">GREAT BRITAIN</option>
        <option value="GR">GREECE</option>
        <option value="GL">GREENLAND</option>
        <option value="GD">GRENADA</option>
        <option value="GP">GUADELOUPE</option>
        <option value="GU">GUAM</option>
        <option value="GT">GUATEMALA</option>
        <option value="GG">GUERNSEY (CHANNEL ISLANDS)</option>
        <option value="GW">GUINEA BISSAU</option>
        <option value="GN">GUINEA REPUBLIC</option>
        <option value="GY">GUYANA</option>
        <option value="HT">HAITI</option>
        <option value="NL">HOLLAND (THE NETHERLANDS)</option>
        <option value="HN">HONDURAS</option>
        <option value="HK">HONG KONG</option>
        <option value="HU">HUNGARY</option>
        <option value="IS">ICELAND</option>
        <option value="IN" selected="selected">INDIA</option>
        <option value="ID">INDONESIA</option>
        <option value="IR">IRAN</option>
        <option value="IQ">IRAQ</option>
        <option value="IE">IRELAND (REPUBLIC OF)</option>
        <option value="IL">ISRAEL</option>
        <option value="IT">ITALY</option>
        <option value="CI">IVORY COAST (COTE DIVOIRE)</option>
        <option value="JM">JAMAICA</option>
        <option value="JP">JAPAN</option>
        <option value="JE">JERSEY (CHANNEL ISLANDS)</option>
        <option value="JO">JORDAN</option>
        <option value="KZ">KAZAKHSTAN</option>
        <option value="KE">KENYA</option>
        <option value="KI">KIRIBATI</option>
        <option value="KP">KOREA, D.P.R OF</option>
        <option value="KR">KOREA, SOUTH</option>
        <option value="KR">KOREA, SOUTH </option>
        <option value="XK">KOSOVO</option>
        <option value="FM">KOSRAE (MICRONESIA, FEDERATED STATES OF)</option>
        <option value="KW">KUWAIT</option>
        <option value="KG">KYRGYZSTAN</option>
        <option value="LA">LAOS</option>
        <option value="LV">LATVIA</option>
        <option value="LB">LEBANON</option>
        <option value="LS">LESOTHO</option>
        <option value="LR">LIBERIA</option>
        <option value="LY">LIBYA</option>
        <option value="LI">LIECHTENSTEIN</option>
        <option value="LT">LITHUANIA</option>
        <option value="LU">LUXEMBOURG</option>
        <option value="MO">MACAU</option>
        <option value="MK">MACEDONIA (FORMER YUG. REP.)</option>
        <option value="MG">MADAGASCAR</option>
        <option value="PT">MADEIRA (ISLAND OF)</option>
        <option value="MW">MALAWI</option>
        <option value="MY">MALAYSIA</option>
        <option value="MV">MALDIVES</option>
        <option value="ML">MALI</option>
        <option value="MT">MALTA</option>
        <option value="MH">MARSHALL ISLANDS</option>
        <option value="MQ">MARTINIQUE</option>
        <option value="MR">MAURITANIA</option>
        <option value="MU">MAURITIUS</option>
        <option value="YT">MAYOTTE</option>
        <option value="ES">MELILLA</option>
        <option value="MX">MEXICO</option>
        <option value="FM">MICRONESIA (FEDERATED STATES OF)</option>
        <option value="MD">MOLDOVA (MOLDAVIA)</option>
        <option value="MD">MOLDOVA, REPUBLIC OF</option>
        <option value="MC">MONACO</option>
        <option value="MN">MONGOLIA</option>
        <option value="ME">MONTENEGRO</option>
        <option value="MS">MONTSERRAT</option>
        <option value="MA">MOROCCO</option>
        <option value="MZ">MOZAMBIQUE</option>
        <option value="MM">MYANMAR</option>
        <option value="NA">NAMIBIA</option>
        <option value="NR">NAURU, REPUBLIC OF</option>
        <option value="NP">NEPAL</option>
        <option value="AN">NETHERLANDS ANTILLES</option>
        <option value="NL">NETHERLANDS, THE (HOLLAND)</option>
        <option value="KN">NEVIS</option>
        <option value="NC">NEW CALEDONIA</option>
        <option value="NZ">NEW ZEALAND</option>
        <option value="NI">NICARAGUA</option>
        <option value="NE">NIGER</option>
        <option value="NG">NIGERIA</option>
        <option value="NU">NIUE</option>
        <option value="NU">NIUE ISLAND</option>
        <option value="NF">NORFOLK ISLAND</option>
        <option value="NN">NORTHERN IRELAND</option>
        <option value="MP">NORTHERN MARIANA ISLANDS</option>
        <option value="NO">NORWAY</option>
        <option value="OM">OMAN</option>
        <option value="PK">PAKISTAN</option>
        <option value="PW">PALAU</option>
        <option value="PA">PANAMA</option>
        <option value="PG">PAPUA NEW GUINEA</option>
        <option value="PY">PARAGUAY</option>
        <option value="PE">PERU</option>
        <option value="PH">PHILIPPINES</option>
        <option value="PL">POLAND</option>
        <option value="FM">PONAPE (MICRONESIA, FEDERATED STATES OF)</option>
        <option value="PT">PORTUGAL</option>
        <option value="PR">PUERTO RICO</option>
        <option value="QA">QATAR</option>
        <option value="RR">REMOTE REGION</option>
        <option value="RE">REUNION</option>
        <option value="RO">ROMANIA</option>
        <option value="MP">ROTA (NORTHERN MARIANA ISLANDS)</option>
        <option value="RU">RUSSIA</option>
        <option value="RW">RWANDA</option>
        <option value="AN">SABA (NETHERLANDS ANTILLES)</option>
        <option value="MP">SAIPAN</option>
        <option value="WS">SAMOA</option>
        <option value="SM">SAN MARINO</option>
        <option value="ST">SAO TOME & PRINCIPE</option>
        <option value="SA">SAUDI ARABIA</option>
        <option value="scotland">SCOTLAND</option>
        <option value="SN">SENEGAL</option>
        <option value="RS">SERBIA</option>
        <option value="SC">SEYCHELLES</option>
        <option value="SL">SIERRA LEONE</option>
        <option value="SG">SINGAPORE</option>
        <option value="SK">SLOVAK REPUBLIC</option>
        <option value="SI">SLOVENIA</option>
        <option value="SB">SOLOMAN ISLANDS</option>
        <option value="SO">SOMALIA</option>
        <option value="ZA">SOUTH AFRICA</option>
        <option value="ES">SPAIN</option>
        <option value="LK">SRI LANKA</option>
        <option value="GP">ST. BARTHELEMY</option>
        <option value="VI">ST. CROIX (US VIRGIN ISLANDS)</option>
        <option value="AN">ST. EUSTATIUS (NETHERLANDS ANTILLES)</option>
        <option value="VI">ST. JOHN (US VIRGIN ISLANDS)</option>
        <option value="KN">ST. KITTS (ST. CHRISTOPHER)</option>
        <option value="KN">ST. KITTS (ST. CHRISTOPHER)</option>
        <option value="LC">ST. LUCIA</option>
        <option value="MB">ST. MAARTEN</option>
        <option value="GP">ST. MARTIN (GUADELOUPE)</option>
        <option value="VI">ST. THOMAS (US VIRGIN ISLANDS)</option>
        <option value="VC">ST. VINCENT & GRENADINES</option>
        <option value="SD">SUDAN</option>
        <option value="SR">SURINAME</option>
        <option value="SZ">SWAZILAND</option>
        <option value="SE">SWEDEN</option>
        <option value="CH">SWITZERLAND</option>
        <option value="SY">SYRIA</option>
        <option value="PF">TAHITI</option>
        <option value="TW">TAIWAN</option>
        <option value="TJ">TAJIKISTAN</option>
        <option value="TZ">TANZANIA</option>
        <option value="TH">THAILAND</option>
        <option value="MP">TINIAN (NORTHERN MARIANA ISLANDS)</option>
        <option value="TG">TOGO</option>
        <option value="TO">TONGA</option>
        <option value="VG">TORTOLA (BRITISH VIRGIN ISLANDS)</option>
        <option value="TT">TRINIDAD AND TOBAGO</option>
        <option value="FM">TRUK (MICRONESIA, FEDERATED STATES OF)</option>
        <option value="TN">TUNISIA</option>
        <option value="TR">TURKEY</option>
        <option value="TM">TURKMENISTAN</option>
        <option value="TC">TURKS AND CAICOS ISLANDS</option>
        <option value="TV">TUVALU</option>
        <option value="UG">UGANDA</option>
        <option value="UA">UKRAINE</option>
        <option value="VC">UNION ISLAND (ST. VINCENT & GRENADINES)</option>
        <option value="AE">UNITED ARAB EMIRATES</option>
        <option value="US">UNITED STATES</option>
        <option value="UY">URUGUAY</option>
        <option value="UZ">UZBEKISTAN</option>
        <option value="VU">VANUATU</option>
        <option value="VY">VATICAN CITY</option>
        <option value="VE">VENEZUELA</option>
        <option value="VN">VIETNAM</option>
        <option value="VG">VIRGIN GORDA</option>
        <option value="VG">VIRGIN GORDA (BRITISH VIRGIN ISLANDS)</option>
        <option value="VI">VIRGIN ISLANDS US</option>
        <option value="WF">WALLIS AND FUTUNA ISLANDS</option>
        <option value="IL">WEST BANK (WEST BANK/GAZA)</option>
        <option value="WS">WESTERN SAMOA</option>
        <option value="FM">YAP (MICRONESIA, FEDERATED STATES OF)</option>
        <option value="YE">YEMEN, REPUBLIC OF</option>
        <option value="YU">YUGOSLAVIA</option>
        <option value="ZM">ZAMBIA</option>
        <option value="ZW">ZIMBABWE</option>
    </select>
				
			</div>
			</div>
			
		</div>
		
		
		
		
		
			
		
			<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Nom d'utilisateur" id="rusername" name="rusername"/>
			</div>
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">Profession</label>
				<div class="input-icon">
					<input type="checkbox" name="profession[]" id="profession" value="organisateur"> Organisateur
					<input type="checkbox" name="profession[]" id="profession" value="professeur"> Professeur
					<input type="checkbox" name="profession[]" id="profession" value="photographe"> Photographe
					<input type="checkbox" name="profession[]" id="profession" value="dj"> Dj
					<input type="checkbox" name="profession[]" id="profession" value="utilisateur"> Utilisateur
				</div>
			</div>
		
		<div class="form-group">
			<div style="width:50%; float:left;">
				<label class="control-label visible-ie8 visible-ie9">Password</label>
				<div class="input-icon">
					<i class="fa fa-lock"></i>
					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Mot de passe" name="rpassword" id="rpassword"/>
				</div>
			</div>		
			<div style="width:50%; float:left;">
				<label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
				<div class="input-icon">
					<i class="fa fa-lock"></i>
					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="confirmer mot de passe" name="cpassword" id="cpassword"/>
				</div>
			</div>			
		</div>
		
		<div class="form-group">
				<input type="checkbox" name="terms" id="terms"> Accepter et conditions générales du site
		</div>
		
		
		<div class="form-actions">
		
		<div style="float:right; width:100%;">
			<button type="button" class="btn blue pull-right"  style="float:left !important;
margin-right: 5px;" onClick="loadblock('login');">
			Retour <i class="m-icon-swapright m-icon-white"></i>
			</button>
		
			<button type="button" class="btn blue pull-right" onClick="return registerFun();" style="float:left !important;">
			Créer un compte <i class="m-icon-swapright m-icon-white"></i>
			</button>
			</div>
		
		
		
		</div>
		
		
	</form>
	</div>
	</div>




	<div id="forgot" style="display:none;">
	
		<div style="float:left; width:247px;border:1px solid; height:100%; height:600px; background:url('images/left_image.png')">
	&nbsp;
	</div>
	<div style="float:left;">
	<form class="login-form" action="" method="post" style="padding:40px;width:610px;">
		<h3 class="form-title">Mot de passe oublié</h3>

	<div class="form-group"   >
	<label class="boxerror" id="forgoterror" style="display:none;" ></label>
	</div>
		
			
		
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
		
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="email" id="femail" name="femail"/>
			</div>
		</div>
		
		
		
		<div class="form-actions">
			
			<div style="float:right; width:100%;">
			<button type="button" class="btn blue pull-right"  style="float:left !important;margin-left: 300px;
margin-right: 5px;" onClick="loadblock('login');">
			Retour <i class="m-icon-swapright m-icon-white"></i>
			</button>
		
			<button type="button" class="btn blue pull-right" onClick="forgotton();" style="float:left !important;">
			Soumettre <i class="m-icon-swapright m-icon-white"></i>
			</button>
			</div>
		</div>
		
		
	</form>
	</div>
	</div>
	
	
	</div>
	
	<div id="maskReglement" onClick="closePopupReglement();" style="position:fixed;display:none;top:0;left:0;width:100%;height:100%;background-color:rgba(0,0,0,0.8);z-index:10000;">
	</div>
	<div id="popupShowMention" style="position:fixed;display:none;width:50%;left:25%;top:5%;height:80%;background-color:#ffffff;z-index:10000;overflow:auto;padding:25px;">
	</div>
	
<script>
function showReglement()
{
	$('#maskReglement').css('display','block');
	$('#popupShowMention').css('display','block');
	$('#popupShowMention').load('reglement.php');
}

function closePopupReglement()
{
	$('#popupShowMention').css('display','none');
	$('#maskReglement').css('display','none');
}

function showCGV()
{
	$('#maskReglement').css('display','block');
	$('#popupShowMention').css('display','block');
	$('#popupShowMention').load('cgv.php');
}

function showCookie()
{
	$('#maskReglement').css('display','block');
	$('#popupShowMention').css('display','block');
	$('#popupShowMention').load('cookie.php');
}

function showPlandusite()
{
	$('#maskReglement').css('display','block');
	$('#popupShowMention').css('display','block');
	$('#popupShowMention').load('plandusite.php');
}
</script>
	
<script>
  function showConnect()
  {
  
  
			document.getElementById('loginerror').style.display='none';
  	 $( "#login" ).show();
	 $( "#register" ).hide();
	 $( "#forgot" ).hide();
	 
	 $( "#mask" ).fadeIn( "slow", function()
	 {
		$("#popupConnect").css("display","block");
		$("#popupConnect").animate({
			height:'600px'
		  });
	});
  }

  function closePopup()
  {
	$( "#mask" ).fadeOut( "slow", function()
	{
		$("#popupConnect").css("display","none");
	});
  }
</script>
	
<script>
function loadblock(blockid)
{

		if(blockid=='register')
		{	
			
			
				document.getElementById('name').value='';
				document.getElementById('cpassword').value='';
				document.getElementById('email').value='';
				document.getElementById('address').value='';
				document.getElementById('city').value='';
				document.getElementById('zipcode').value='';
				document.getElementById('country').value='';
				document.getElementById('rusername').value='';
				document.getElementById('rpassword').value='';
				document.getElementById('cpassword').value='';
				document.getElementById('terms').checked=false;
				
				
				document.getElementById('registererror').className='boxerror';
				document.getElementById('registererror').style.display='none';
				
				
				
			document.getElementById('forgot').style.display='none';
			document.getElementById('login').style.display='none';
			document.getElementById('register').style.display='block';
		}
		
		if(blockid=='forgot')
		{	
		
			document.getElementById('forgoterror').style.display='none';
				
			
			document.getElementById('femail').value='';
			document.getElementById('register').style.display='none';
			document.getElementById('login').style.display='none';
			
			document.getElementById('forgot').style.display='block';
		}
		
		
		if(blockid=='login')
		{	
		
			document.getElementById('loginerror').style.display='none';
		
			document.getElementById('username').value='';
			document.getElementById('password').value='';
			document.getElementById('forgot').style.display='none';
			document.getElementById('register').style.display='none';
			document.getElementById('login').style.display='block';
		}
		
}



function forgotton()
{
	
	if(document.getElementById('femail').value=='')
	{
		document.getElementById('femail').focus();
		document.getElementById('forgoterror').style.display='block';
		document.getElementById('forgoterror').innerHTML="S'il vous plaît entrer email";
		return false;
	}
	else if(document.getElementById('femail').value!='')
	{
				
				var xx = document.getElementById('femail').value;
				
				if(!ValidateEmail(xx))
				{
					
					document.getElementById('femail').focus();
					document.getElementById('forgoterror').innerHTML="Pas une adresse e-mail valide";
					return false;
				}
				else
				{
					
						$.ajax({
						type:'GET',
						cache: false,
            			dataType: "html",
						url:"forgot.php?email="+xx,
						success:function(data){
					
						if(data==1){
					document.getElementById('forgoterror').className='boxsucess';
					document.getElementById('forgoterror').style.display='block';
					document.getElementById('forgoterror').innerHTML="Connexion détail enverra dans votre courrier";
					}
					else
					{
						document.getElementById('loginerror').style.display='block';
						document.getElementById('loginerror').innerHTML="N'existe pas Email";
			
					
					}
					
										}
										
										
										
					
						
			});
	
	
	
	}
	
	

}

}

function loginFun()
{

	if(document.getElementById('username').value=='')
	{
		document.getElementById('username').focus();
		document.getElementById('loginerror').style.display='block';
		document.getElementById('loginerror').innerHTML="S'il vous plaît entrer nom d'utilisateur";
		return false;
	}
	else if(document.getElementById('password').value=='')
	{
		document.getElementById('password').focus();
		document.getElementById('loginerror').style.display='block';
		document.getElementById('loginerror').innerHTML="S'il vous plaît entrez le mot de passe";
		return false;
	}
	
	else
	{
		var username=document.getElementById('username').value;
		var password=document.getElementById('password').value;
		
			
			$.ajax({
			type:'GET',
            cache: false,
            dataType: "html",
			url:"logincheck.php?username="+username+'&password='+password,
			success:function(data){
			
			if(data==1)
			{
			
				document.getElementById('loginerror').className='boxsucess';
				document.getElementById('loginerror').style.display='block';
				document.getElementById('loginerror').innerHTML="Succès connecter";
				location.reload();
			}
			else
			{
			
			
			
				//document.getElementById('loginerror').className='boxsucess';
				document.getElementById('loginerror').style.display='block';
				document.getElementById('loginerror').innerHTML="L'utilisateur n'existe pas";
			
			
			}
			
			}
			
			});
			
	
	}
	


}







function registerFun()
{

	var flag=0;
	if(document.getElementById('name').value=='')
	{
		document.getElementById('name').focus();
		document.getElementById('registererror').style.display='block';
		document.getElementById('registererror').innerHTML="S'il vous plaît entrez le nom";
		return false;
	}
	else if(document.getElementById('lastname').value=='')
	{
		document.getElementById('lastname').focus();
		document.getElementById('registererror').style.display='block';
		document.getElementById('registererror').innerHTML="S'il vous plaît entrez le prénom";
		return false;
	}
	else if(document.getElementById('email').value=='')
	{
		document.getElementById('email').focus();
		document.getElementById('registererror').style.display='block';
		document.getElementById('registererror').innerHTML="S'il vous plaît entrer email";
		return false;
	}
	else if(document.getElementById('email').value!='')
	{
				
				var x = document.getElementById('email').value;
				if(!ValidateEmail(x))
				{
					document.getElementById('email').focus();
					document.getElementById('registererror').innerHTML="Pas une adresse e-mail valide";
					return false;
				}
				else
				{
				flag=1;
						
				
				}
	
	
	
	}
		var rpassword=	document.getElementById('rpassword').value;
	var cpassword=	document.getElementById('cpassword').value;
	var st=0;
	
	if(flag==1){
	
	if(document.getElementById('address').value=='')
	{
		document.getElementById('address').focus();
		document.getElementById('registererror').style.display='block';
		document.getElementById('registererror').innerHTML="S'il vous plaît entrez l'adresse";
		return false;
	}
	
	else if(document.getElementById('city').value=='')
	{
		document.getElementById('city').focus();
		document.getElementById('registererror').style.display='block';
		document.getElementById('registererror').innerHTML="S'il vous plaît entrer ville";
		return false;
	}
	
	
	else if(document.getElementById('zipcode').value=='')
	{
		document.getElementById('zipcode').focus();
		document.getElementById('registererror').style.display='block';
		document.getElementById('registererror').innerHTML="S'il vous plaît entrer code postal";
		return false;
	}
	
	else if(document.getElementById('country').value=='')
	{
		document.getElementById('country').focus();
		document.getElementById('registererror').style.display='block';
		document.getElementById('registererror').innerHTML="S'il vous plaît entrez pays";
		return false;
	}
	
	else if(document.getElementById('rusername').value=='')
	{
		document.getElementById('rusername').focus();
		document.getElementById('registererror').style.display='block';
		document.getElementById('registererror').innerHTML="S'il vous plaît entrer nom d'utilisateur";
		return false;
	}
	
	else if(document.getElementById('rpassword').value=='')
	{
		document.getElementById('rpassword').focus();
		document.getElementById('registererror').style.display='block';
		document.getElementById('registererror').innerHTML="S'il vous plaît entrez le mot de passe";
		return false;
	}
	
	else if(document.getElementById('cpassword').value=='')
	{
		document.getElementById('cpassword').focus();
		document.getElementById('registererror').style.display='block';
		document.getElementById('registererror').innerHTML="S'il vous plaît entrez le mot de passe de confirmation";
		return false;
	}
	
	else if(rpassword!='' && cpassword!='')
	{
			

	
		if(rpassword!=cpassword){
		document.getElementById('cpassword').focus();
		document.getElementById('registererror').style.display='block';
		document.getElementById('registererror').innerHTML="Confirmez le mot de passe ne correspond pas";
		return false;
		}
		else
		{
			st=1;
		
		}
	}
	
	if(st==1){
	
	 if(!document.getElementById('terms').checked)
	{
		document.getElementById('terms').focus();
		document.getElementById('registererror').style.display='block';
		document.getElementById('registererror').innerHTML="S'il vous plaît cliquer tearm et condtion";
		return false;
	}
	
	
	else
	{
	
	
	
		var name=	document.getElementById('name').value
		var lastname = document.getElementById('lastname').value
		var email=	document.getElementById('email').value
		var address=	document.getElementById('address').value
		var city=	document.getElementById('city').value
		var zipcode=	document.getElementById('zipcode').value
		var country=	document.getElementById('country').value
		var rusername=	document.getElementById('rusername').value
		var rpassword=	document.getElementById('rpassword').value
		

		var profession = []
		$("input[name='profession[]']:checked").each(function ()
		{
			profession.push($(this).val());
		});


			
				//ajax
				
			$.ajax({
			type:'GET',
            cache: false,
            dataType: "html",
			url:"registersave.php?name="+name+'&lastname='+lastname+'&profession='+profession+'&email='+email+'&address='+address+'&city='+city+'&zipcode='+zipcode+'&country='+country+'&rusername='+rusername+'&rpassword='+rpassword,
			success:function(data){
			
			if(data==1)
			{
			
			document.getElementById('registererror').className='boxsucess';
			document.getElementById('registererror').style.display='block';
			var html='';
			html ='Réussir regsiter </br> <a href="javascript:void(0);" onClick="loadblock(\'login\');">Retour à connecter</a>';
		
			loadblock('login');
			document.getElementById('registererror').innerHTML=html;
			
			
			}
			else
			{
				
				document.getElementById('registererror').style.display='block';
				document.getElementById('registererror').innerHTML="L'utilisateur n'existe pas";
			
			
			}
				
				//ajax
	
	
					}
			});
	
	}
	
	}

}


}



function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
   }
</script>

<div id="fullPopup" style="position:fixed;top:0px;display:none;opacity:0.0;width:100%;height:100%;background-color:#000000;z-index:10000;">
	<div style="float:left;width:75%;height:100%;background-color:#000000;" id="fullpopupLeft">
	</div>
	<div id="fullPopupRight" style="position:absolute;right:-25%;width:25%;height:100%;background-color:#ffffff;">
		
	</div>
</div>	

<div id="popoverRadio" class="popOverRadio">
	<div class="popOverRadioBlockRadio">
		<a href="javascript:void(0);" onclick="playRadio('bachata');">
			<img id="coverThumb1" src="http://webradio.oolatina.com/images/no_cover.png" class="thumbnailCoverPopOverRadio">
			<img src="images/player/model_radio.png">
			<div class="titleWebRadio"><img src="http://dev.oolatina.com/ecommerce/images/player/icon_radio.png" style="width:13px;height:13px;margin-top:-4px;">&nbsp;&nbsp;Bachata</div>
			<div class="TitleActually" id="TitleActually1"></div>
		</a>
	</div>
	<div class="popOverRadioBlockRadio">
		<a href="javascript:void(0);" onclick="playRadio('kizomba');">
			<img id="coverThumb2" src="http://webradio.oolatina.com/images/no_cover.png" class="thumbnailCoverPopOverRadio">
			<img src="images/player/model_radio.png">
			<div class="titleWebRadio"><img src="http://dev.oolatina.com/ecommerce/images/player/icon_radio.png" style="width:15px;height:15px;margin-top:-4px;">&nbsp;&nbsp;Kizomba</div>
			<div class="TitleActually" id="TitleActually2"></div>
		</a>
	</div>
	<div class="popOverRadioBlockRadio">
		<a href="javascript:void(0);" onclick="playRadio('oolatina');">
			<img id="coverThumb3" src="http://webradio.oolatina.com/images/no_cover.png" class="thumbnailCoverPopOverRadio">
			<img src="images/player/model_radio.png">
			<div class="titleWebRadio"><img src="http://dev.oolatina.com/ecommerce/images/player/icon_radio.png" style="width:15px;height:15px;margin-top:-4px;">&nbsp;&nbsp;OOLatina</div>
			<div class="TitleActually" id="TitleActually3"></div>
		</a>
	</div>
	<div class="popOverRadioBlockRadio">
		<a href="javascript:void(0);" onclick="playRadio('salsa_cubaine');">
			<img id="coverThumb4" src="http://webradio.oolatina.com/images/no_cover.png" class="thumbnailCoverPopOverRadio">
			<img src="images/player/model_radio.png">
			<div class="titleWebRadio"><img src="http://dev.oolatina.com/ecommerce/images/player/icon_radio.png" style="width:15px;height:15px;margin-top:-4px;">&nbsp;&nbsp;Salsa Cubaine</div>
			<div class="TitleActually" id="TitleActually4"></div>
		</a>
	</div>
	<div class="popOverRadioBlockRadio">
		<a href="javascript:void(0);" onclick="playRadio('salsa_portoricaine');">
			<img id="coverThumb5" src="http://webradio.oolatina.com/images/no_cover.png" class="thumbnailCoverPopOverRadio">
			<img src="images/player/model_radio.png">
			<div class="titleWebRadio"><img src="http://dev.oolatina.com/ecommerce/images/player/icon_radio.png" style="width:15px;height:15px;margin-top:-4px;">&nbsp;&nbsp;Salsa Portoricaine</div>
			<div class="TitleActually" id="TitleActually5"></div>
		</a>
	</div>
</div>
<div id="popOverRadioCorner" style="position:fixed;display:none;width: 0;height: 0;bottom:122px;right:40px;border-style: solid;border-width: 8px 8px 0 8px;border-color: #272727 transparent transparent transparent;z-index:10010;"></div>

<div class="popup_contact">
	<div class="popup_contact_form">
	<div class="popup_contact_close"><a href="javascript:void(0);" onclick="closePopupContact();">X</a></div>
	<div style="margin:20px;">
		<div id="errormail_contact"></div>
		<label style="font-weight:bold;margin-bottom:10px;margin-top:10px;">Email</label>
		<input type="text" name="email" id="email_contact" placeholder="Votre adresse email" class="form-control">
		<label style="font-weight:bold;margin-bottom:10px;margin-top:10px;">Sujet</label>
		<input type="text" name="sujet" id="subject_contact" placeholder="Sujet du message" class="form-control">
		<label style="font-weight:bold;margin-bottom:10px;margin-top:10px;">Message</label>
		<textarea class="form-control" placeholder="Votre message" name="message" id="message_contact"></textarea>
		<br><button class="btn blue" onclick="sendContactForm();">Envoyez</button>
		</div>
	</div>
</div>

<div class="popup_box" style="display:none;">
<div class="popup_header"><span class="popup_heading">Tell us what is happening.</span><span class="close_popup_pos"><input class="close_popup" type="button" value="&#10006;" /></span></div>
<form name="report" action="#" enctype="multipart/form-data" method="post">
<textarea name="message" class="text_area" placeholder="Describe report within 1000 words... (this is a required field)" required>
</textarea><br>
<div class="popup_input_box"><label for="url">URL (optional) : </label><input class="popup_input" type="url" name="url" placeholder="eg. http://www.example.com"></div><br>
<div class="popup_input_box"><label for="email">Email (required) : </label><input class="popup_input" type="email" name="email" placeholder="eg. john@example.com" required></div><br><br>
<div class="popup_input_box"><label for="file">Attach File : </label><input type="file" name="file" size="40"></div><br>
<p class="q_dtl">This is a example for the query.This is a example for the query.This is a example for the query.This is a example for the query.This is a example for the query.This is a example for the query.This is a example for the query.This is a example for the query.</p>
<div class="buttons"><input type="button" class="btn_cncl close_popup" value="Cancel" />&nbsp;<input type="submit" name="submit" class="btn_snd" value="Send Feedback" /></div>
</form>
</div>