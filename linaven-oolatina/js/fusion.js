(function(){
  var fusion = document.createElement('script');
  fusion.src = window.location.protocol + '//adn.fusionads.net/api/1.0/ad.js?zoneid=283&rand=' + Math.floor(Math.random()*9999999);
  fusion.async = true;
  (document.head || document.getElementsByTagName('head')[0]).appendChild(fusion);
})();