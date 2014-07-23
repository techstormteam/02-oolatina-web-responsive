<div class="pre-footer">
  <div class="container">
	<div class="row">
	  <!-- BEGIN BOTTOM ABOUT BLOCK -->
	  <div class="col-md-3 col-sm-6 pre-footer-col">
		<h2>Oolatina</h2>
		<p>Oolatina est un site dédié de danse latine, Salsa, bachata, Kizomba, reggaeton…. Vous pouvez retrouver les Radio Salsa, Radio Bachata… Les derrières video salsa des plus grands festivals en Europe. </p>
		<p>Edité par <a href="http://www.linaven.fr" target="newpage" class="linkURL">Linaven Agency</a>.</p>
		<H2>Newsletters</H2>
		<div id="erroremailnewsletter"></div>
		<div class="pre-footer-subscribe-box">
			<div class="input-group">
			  <input type="text" id="emailnewsletter" placeholder="Votre adresse email" name="email" class="form-control">
			  <input type="hidden" name="action" value="addnewsletter">
			  <span class="input-group-btn">
				<button class="btn btn-primary btchange" type="submit" onclick="addnewsletter();">S'inscrire</button>
			  </span>
			</div>
		</div>
	  </div>
	  <!-- END BOTTOM ABOUT BLOCK -->
	  <!-- BEGIN BOTTOM INFO BLOCK -->
	  <div class="col-md-3 col-sm-6 pre-footer-col">
		<h2>Qui sommes-nous ?</h2>
		<ul class="list-unstyled">
		  <li><i class="fa fa-angle-right"></i> <a href="javascript:void(0);" onclick="showReglement();">Règlement du site</a></li>
		  <li><i class="fa fa-angle-right"></i> <a href="javascript:void(0);" onclick="showCGV();">Mentions Légales</a></li>
		  <li><i class="fa fa-angle-right"></i> <a href="javascript:void(0);" onclick="showCookie();">Cookie</a></li>
		  <li><i class="fa fa-angle-right"></i> <a href="javascript:void(0);" onclick="loadpage('sitemap.php');">Plan du site</a></li>
		  <li><i class="fa fa-angle-right"></i> <a href="javascript:void(0);" onclick="showPopupContact();">Contactez nous </a></li>
		</ul>
	  </div>
	  <!-- END INFO BLOCK -->
	  <!-- BEGIN TWITTER BLOCK --> 
	  <div class="col-md-3 col-sm-6 pre-footer-col">
		<h2>Latest Tweets</h2>
		  <?php
		  
		  include "class/twitter-feed-parser.php";
		  
		  
		  ?>      
	  </div>
	  <div class="col-md-6 col-sm-6" style="margin-top: -38px;">
		<ul class="social-icons">
			<li><a class="facebook" data-original-title="facebook" href="https://www.facebook.com/pages/Oolatina/274182136044370?fref=ts" target="newpage"></a></li>
			<li><a class="twitter" data-original-title="twitter" href="https://twitter.com/fabricerubino" target="newpage"></a></li>
			<li><a class="googleplus" data-original-title="googleplus" href="https://plus.google.com/108175598159585618970/posts" target="newpage"></a></li>
			<li><a class="youtube" data-original-title="youtube" href="https://www.youtube.com/channel/UC3J0bG_vdWq9i1I1IK6HI5w" target="newpage"></a></li>
		</ul>
		</div>
	  <!-- END TWITTER BLOCK -->
	</div>
  </div>
    </div>