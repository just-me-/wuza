<div id="main_contact">
    
  <h1>Über mich</h1>
  
  <div id="ich_area" class="rounded right blocked_img small-margin-left small-margin-bottom">
    <img id="ich" class="rounded" src="<?php echo $this->_['url']; ?>img/me_pixelated.png" alt="Marcel Hess">
    <span class="overlay"></span>
  </div>
  
  <p class="text-justify">
    Hallo! Ich freue mich, dass Du auf meiner Webseite vorbeischaust
    und offenbar etwas mehr über mich und meine Person erfahren möchtest.
    Mein Name ist Marcel, ich bin schon seit einiger Zeit über das 20. Lebensjahr hinweg gealtert,
    und ich lebe seit Geburt an in der Schweiz, nahe dem Bodensee. <br/>
    Nach meinem Schulabschluss, habe ich mit 
    <a href="http://www.wiss.ch/de-CH/News/2015/20150716-Abschlussfeier-GB-ZH/" target=_blank>Bravour</a>
    die Lehre als Informatiker mit eidg. Fähigkeitszeugnis
    in Fachrichtung Applikationsentwicklung gemeistert.
    <a href="https://2015.pkorg.ch/ipa2015.php?nipaid=11467&backlnk=1&nfgid=13&nberufid=0" target=_blank>Meine Abschlussarbeit</a> 
    wurde sogar als eine der 10 besten Informatik-Praxisfacharbeiten der Schweiz ausgezeichnet.
    Seither arbeite ich teilzeit weiterhin auf meinem Fachgebiet in Zürich
    und absolviere Berufsbegleitend die technische Maturität. 
  </p>
    
  <p>
    Beruflich arbeite ich serverseitig primär mit den Sprachen Perl und PHP.
    Die eingesetzten Datenbankverwaltungssysteme sind PostgreSQL sowie MySQL.
    Zu Browser-Frontententwicklung gehören nebst den klassischen HTML und CSS/LESS Codierungen
    auch das Framework Bootstrap und die JavaScript-Bibliothek jQuery.
    Aber auch Templatearbeiten mit LaTeX gehören zu meinen Berufstätigkeiten.
  </p>
  
  <p>
    In meiner Freizeit erweitere ich mein Wissen in anderen Bereichen - wie beispielsweise Swift-Applikationen für iOS 
    - oder baue bekanntes Wissen - zum Beispiel in meinen PHP Programmen - aus.
    Insofern Zeit vorhanden ist, arbeite ich an neuen Projekten oder erweitere meine bestehenden Codezeilen.
    Weitere Informationen dazu findest Du <a href="?view=projects">hier, in dem Projektebereich</a> von wuza.ch. 
  </p>
  
  <p>
    Abschliessend sei noch am Rande erwähnt: Das Bild von mir, welches Dir auf der rechten Seite angezeigt wird,
    kannst Du über einen Klick oder ein Rollover-Event scharf stellen, falls Du einen genaueren Blick darauf werfen willst. ;-)
  </p>

  
  <h2>Kontaktadresse</h2>
  <p>
    Melde Dich doch mal per E-Mail (<a href="mailto:hallo@wuza.ch?subject=WUZA.ch%20Website">hallo@wuza.ch</a>)
    oder auf klassischem Postweg an die folgende Adresse bei mir:
  </p>
  
  <div class="bs-callout bs-callout-default no-padding-top no-padding-bottom">
    Marcel Hess<br/>
    Schützlerweg 6<br/>
    8560 Märstetten
  </div>

  <p>
    Projektanfragen, sonstige Fragen, Kritik oder Lob - jegliches Feedback ist gerne gesehen und wird so bald als möglich beantwortet. 
  </p>
  
  <iframe width="100%" height="300" frameborder="0" allowfullscreen src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d184930.13937767685!2d8.92316905557091!3d47.61044417808263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479af24630fdb9b5%3A0x7860d485f4b7b4cf!2sSch%C3%BCtzlerweg+6%2C+8560+M%C3%A4rstetten!5e0!3m2!1sde!2sch!4v1451240672514"></iframe>

</div>

<script>
  // for img
  $('#ich_area').on('click touchstart',function(){
    $("#ich").attr("src","<?php echo $this->_['url']; ?>img/me_clean.png");
    setTimeout( function(){ 
      $("#ich").attr("src","<?php echo $this->_['url']; ?>img/me_pixelated.png");
    }  , 5000 );
  });
  $("#ich_area").mouseenter(function(){
      $("#ich").attr("src","<?php echo $this->_['url']; ?>img/me_clean.png");
  });
  $("#ich_area").mouseleave(function(){
      $("#ich").attr("src","<?php echo $this->_['url']; ?>img/me_pixelated.png");
  });
  // end img
</script>
