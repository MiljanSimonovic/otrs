<?php
    if (isset($_GET['source'])) {show_source(__FILE__); exit();}
    /**
     * @author Stöger Florian D. M. (http://fdms.eu)
     * @license EUPL 1.1 (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf)
     * @copyright © (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf) Stöger Florian D. M. (http://fdms.eu)
     */
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Викимедијин OTRS генератор ослобађања</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="//tools-static.wmflabs.org/cdnjs/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="//tools-static.wmflabs.org/static/jquery-ui/1.11.1/jquery-ui.css">
    <style>
      p {
          background-color: white;
      }
      .hof {
          height: 100vh;
          overflow-y: auto;
      }
      .dropdown-menu li {
          cursor: pointer;
      }
    </style>
    <script type="text/javascript" src="//tools-static.wmflabs.org/cdnjs/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="//tools-static.wmflabs.org/cdnjs/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
          $("#meta").popover({
              html:true,
          });
          $("form").on("keyup keypress", function(e) {
              if (e.keyCode == 13) {
                  e.preventDefault();
              }
          });
          $(".nt").on("keydown", function(e) {
              if (e.keyCode == 9) {
                  e.preventDefault()
              }
          });
      });
        
      function v() {
          vi = 0;
          if (!$("#licensei").val().match(/\w/)) {
              if (!$("#fg0").hasClass("has-error")) {
                  $("#fg0").addClass("has-error");
              }
              vi++;
          } else {
              if ($("#fg0").hasClass("has-error")) {
                  $("#fg0").removeClass("has-error");
              }
          }
          if (!$("#namei").val().match(/\w/)) {
              if (!$("#fg1").hasClass("has-error")) {
                  $("#fg1").addClass("has-error");
              }
              vi++;
          } else {
              if ($("#fg1").hasClass("has-error")) {
                  $("#fg1").removeClass("has-error");
              }
          }
          if ($("#irep").css("display") != "none") {
              if (!$("#repi").val().match(/\w/)) {
                  if (!$("#fg2").hasClass("has-error")) {
                      $("#fg2").addClass("has-error");
                  }
                  vi++;
              } else {
                  if ($("#fg2").hasClass("has-error")) {
                      $("#fg2").removeClass("has-error");
                  }
              }
              if (!$("#authi").val().match(/\w/)) {
                  if (!$("#fg3").hasClass("has-error")) {
                      $("#fg3").addClass("has-error");
                  }
                  vi++;
              } else {
                  if ($("#fg3").hasClass("has-error")) {
                      $("#fg3").removeClass("has-error");
                  }
              }
          }
          if (vi == 0) {
              $("form").submit();
          }
      }
    </script>
  </head>
  <body style="background: url('bg.png') no-repeat fixed right bottom; overflow:hidden;">

    <?php
        date_default_timezone_set("UTC");
        $starttime = date("H:i:s");
        $name = $rep = $auth = $filer = $license = $s1 = $s2 = $s3 = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $name = test_input($_GET["name"]);
            $rep = test_input($_GET["rep"]);
            $auth = test_input($_GET["auth"]);
            $filer = test_input($_GET["file"]);
            $license = test_input($_GET["license"]);
            $s1 = test_input($_GET["s1"]);
            $s2 = test_input($_GET["s2"]);
            $s3 = test_input($_GET["s3"]);
        }
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        if ($license == "") $license = "Creative Commons Attribution-ShareAlike 4.0 International";
        if ($s1 == "") $s1 = "1";
        if ($s2 == "") $s2 = "1";
        else if ($s2 == "2") $filer = "у прилогу овог имејла";
        if ($s3 == "") $s3 = "1";
        
        switch ($s3) {
            case "1":
                $p2s = "датотека";
                break;
            case "2":
                $p2s = "дело приказано на датотеци";
                break;
            case "3":
                $p2s = "и датотека и дело приказано на њој";
                break;
        }
    ?>

    <div class="container">
      <form method="post" action="//tools.wmflabs.org/relgen/index.php">
        <input type="hidden" name="trn" value="express" />
        <input type="hidden" name="starttime" value="<?=$starttime?>" />
        <input type="hidden" name="filer" value="<?=$filer?>" />
        <input type="hidden" name="s1" value="<?=$s1?>" />
        <input type="hidden" name="s2" value="<?=$s2?>" />
        <input type="hidden" name="s3" value="<?=$s3?>" />
        <input type="hidden" name="result" value="1" />
        
        <div class="row hof">
          <div class="col-md-11">
            <h1>Викимедијин OTRS генератор ослобађања <small><a id="meta" tabindex="0" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="created and maintained by <a href='//meta.wikimedia.org/wiki/User:FDMS4' target='_blank'>FDMS</a><br />© (<a href='//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf' target='_blank'>EUPL 1.1</a>) <a href='http://fdms.eu' target='_blank'>Stöger Florian D. M.</a" style="color:#777;">express 0.3</a></small></h1>
            <br /><br />
          </div>
          <div class="col-md-7">
            <?php if ($filer != "") {
            ?>
            <p>Слажем се да објавим <?=$p2s?> <?php if ($s2 == "2") { ?><?=$filer?><?php } else if ($s2 == "3") { ?><a href="<?=$filer?>" target="_blank"><?=$filer?></a><?php } else { ?><a href="//commons.wikimedia.org/wiki/File:<?=$filer?>" target="_blank"><?=str_replace('_', ' ', $filer)?></a><?php } ?> под слободном лиценцом:</p>
            <div id="fg0" class="form-group"><div class="input-group">
              <input id="licensei" type="text" name="license" value="<?=$license?>" class="form-control" />
              <div class="input-group-btn">
                <a role="button" data-toggle="dropdown" class="btn btn-default"><span class="caret" /></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a onclick="$('#licensei').val('Creative Commons Attribution-ShareAlike 4.0 International'); $('#iawattr').show();">Creative Commons Attribution-ShareAlike 4.0 International</a></li>
                  <li><a onclick="$('#licensei').val('Creative Commons Attribution 4.0 International'); $('#iawattr').show();">Creative Commons Attribution 4.0 International</a></li>
                  <li><a onclick="$('#licensei').val('Creative Commons CC0 1.0 Universal'); $('#iawattr').hide();">Creative Commons CC0 1.0 Universal (јавно власништво)</a></li>
                </ul>
                <a role="button" href="//commons.wikimedia.org/wiki/Commons:First_steps/License_selection" target="_blank" class="btn btn-default">
                  <span class="glyphicon glyphicon-question-sign" />
                </a>
              </div>
            </div></div>
            <p>Јасно ми је да дајем право свакоме да користи материјал у комерцијалне сврхе и да га мења у складу са својим потребама.</p>
            <p>Јасно ми је да се слободна лиценца односи само на нека ауторска права и задржавам могућност да предузмем мере против било кога ко користи овај материјал на неодговарајући начин, или уз кршење моралних права, ограничења везаних за робне марке итд.</p>
            <p id="iawattr">Јасно ми је да задржавам ауторско право над делом, и задржавам право да будем наведен као аутор у складу с условима изабране лиценце. Измене које други учине над материјалом неће бити приписане мени.</p>
            <p>Јасно ми је да не могу повући ову сагласност, и да се материјал може трајно задржати на неком Викимедијином пројекту.</p>
            <br />
            <button type="button" class="btn btn-default btn-block" data-toggle="button" onclick="$('#iag').toggle();">Слажем се</button>
            <br /><br />
            <?php
              } else {
                echo "<p class='text-danger'>Грешка: није наведен садржај!</p>";
              }
            ?>
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iag">
              моје име<br /><div id="fg1" class="form-group"><input id="namei" type="text" name="name" value="<?=$name?>" placeholder="Петар Петровић (обавезно)" class="form-control" /></div>
              <div<?php if ($s1 != "2") { ?> style="display:none;"<?php } ?> id="irep">
                <br />
                носилац ауторских права<br /><div id="fg2" class="form-group"><input id="repi" type="text" name="rep" value="<?=$rep?>" placeholder="Ace Inc. / Јована Јовановић (обавезно)" class="form-control" /></div>
                <br />
                моје занимање<br /><div id="fg3" class="form-group"><input id="authi" type="text" name="auth" value="<?=$auth?>" placeholder="директор, именовани заступник, … (обавезно)" class="form-control" /></div>
              </div>
              <br /><br />
              <a role="button" class="btn btn-primary btn-block nt" onclick="v()">пређите на следећи корак</a>
            </div>
          </div>
          <br />
        </div>

      </form>
    </div>
  </body>
</html>
