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
          $("a.smsc").on("click", function(event) {
              event.preventDefault();
              var hash = this.hash;
              $("html, body").animate({
                  scrollTop: $(hash).offset().top
              }, 400);
          });
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
      
      function s1v() {
          s1vi = 0;
          if (!$("#namei").val().match(/\S/)) {
              if (!$("#s1fg1").hasClass("has-error")) {
                  $("#s1fg1").addClass("has-error");
              }
              s1vi++;
          } else {
              if ($("#s1fg1").hasClass("has-error")) {
                  $("#s1fg1").removeClass("has-error");
              }
          }
          if ($("#irep").css("display") != "none") {
              if (!$("#repi").val().match(/\S/)) {
                  if (!$("#s1fg2").hasClass("has-error")) {
                      $("#s1fg2").addClass("has-error");
                  }
                  s1vi++;
              } else {
                  if ($("#s1fg2").hasClass("has-error")) {
                      $("#s1fg2").removeClass("has-error");
                  }
              }
              if (!$("#authi").val().match(/\w/)) {
                  if (!$("#s1fg3").hasClass("has-error")) {
                      $("#s1fg3").addClass("has-error");
                  }
                  s1vi++;
              } else {
                  if ($("#s1fg3").hasClass("has-error")) {
                      $("#s1fg3").removeClass("has-error");
                  }
              }
          }
          if (s1vi == 0) {
              $("html, body").animate({
                  scrollTop: $(s2).offset().top
              }, 400);
          }
      }
      function s4v() {
          if (!$("#licensei").val().match(/\w/)) {
              if (!$("#s4fg").hasClass("has-error")) {
                  $("#s4fg").addClass("has-error");
              }
          } else {
              $("form").submit();
          }
      }
    </script>
  </head>
  <body style="background: url('bg.png') no-repeat fixed right bottom; overflow:hidden;">

    <?php
        $relgen = "0.9.10";
        date_default_timezone_set("UTC");
        $starttime = date("H:i:s");
        $trn = $name = $rep = $auth = $filer = $license = $s1 = $s2 = $s3 = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $starttime = test_input($_POST["starttime"]);
            $trn = test_input($_POST["trn"]);
            $name = test_input($_POST["name"]);
            $rep = test_input($_POST["rep"]);
            $auth = test_input($_POST["auth"]);
            $filer = test_input($_POST["filer"]);
            $license = test_input($_POST["license"]);
            $s1 = test_input($_POST["s1"]);
            $s2 = test_input($_POST["s2"]);
            $s3 = test_input($_POST["s3"]);
        }
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        if ($_POST["result"] == "1") {
            ?>
            <script type="text/javascript">
            $(function() {
                $("html, body").animate({
                    scrollTop: $(result).offset().top
                }, 400);
            });
            </script>
            <?php
        }
    ?>

    <div class="container">
      <h1>Викимедијин OTRS генератор ослобађања <small><a id="meta" tabindex="0" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="created and maintained by <a href='//meta.wikimedia.org/wiki/User:FDMS4' target='_blank'>FDMS</a><br />© (<a href='//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf' target='_blank'>EUPL 1.1</a>) <a href='http://fdms.eu' target='_blank'>Stöger Florian D. M.</a>" style="color:#777;"><?=$relgen?></a></small></h1>
  
      <form method="post" action="//tools.wmflabs.org/relgen/index.php">

        <div id="s0" class="row hof"> <!-- step 0 -->
          <br /><br />
          <div class="col-md-7">
          <a role="button" href="#s1" class="btn btn-primary btn-lg btn-block smsc nt">start</a>
          <input type="hidden" name="starttime" value="<?=$starttime?>" />
          <input type="hidden" name="result" value="1" />
          </div><br />
        </div>

        <div id="s1" class="row hof"> <!-- step 1 -->
          <br />
          корак 1 од 5 [ <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+1" target="_blank">помоћ</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">фидбек</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').hide();$('#idk').hide();"><input type="radio" id="s11" name="s1" value="1" />Ја сам носилац ауторских права</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').show();$('#idk').hide();"><input type="radio" id="s12" name="s1" value="2" />Заступам носиоца ауторских права</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').hide();$('#irep').hide();$('#idk').show();"><input type="radio" id="s13" name="s1" value="" />Не познајем носиоца ауторских права</label>
            </div>
            <br />
            <p>Носилац ауторских права над делом је <b>особа која га је створила</b> (фотограф, дизајнер, сликар, …), осим ако је ауторско право изричито пренесено путем закона или уговора.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iam">
              моје име<br /><div id="s1fg1" class="form-group"><input id="namei" type="text" name="name" value="<?php echo $name;?>" placeholder="Петар Петровић (обавезно)" class="form-control" /></div>
              <div style="display:none;" id="irep">
                <br />
                носилац ауторских права<br /><div id="s1fg2" class="form-group"><input id="repi" type="text" name="rep" value="<?php echo $rep;?>" placeholder="Ace Inc. / Јована Јовановић (обавезно)" class="form-control" /></div>
                <br />
                моје занимање<br /><div id="s1fg3" class="form-group"><input id="authi" type="text" name="auth" value="<?php echo $auth;?>" placeholder="директор, именовани заступник, … (обавезно)" class="form-control" /></div>
              </div>
              <br /><br />
              <a role="button" class="btn btn-primary btn-block nt" onclick="s1v()">пређите на следећи корак</a>
            </div>
            <div style="display:none;" id="idk">
              <p class="text-danger">Викимедија OTRS не може да прихвати ослобађање од Вас - молимо Вас <a href="//commons.wikimedia.org/wiki/Commons:OTRS#notch">обратите се носиоцу ауторских права</a>.</p>
            </div>
          </div>
          <br />
        </div>

        <div id="s2" class="row hof"> <!-- step 2 -->
          <br />
          корак 2 од 5 [ <a href="#s1" class="smsc">назад</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+2" target="_blank">помоћ</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">фидбек</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iup').show();$('#iatt').show();"><input type="radio" id="s21" name="s2" value="1" />Ја сам или неко је други већ отпремио датотеку на Викимедијину оставу</label>
              <label class="btn btn-default btn-block" onclick="$('#iup').hide();$('#iatt').show();"><input type="radio" id="s22" name="s2" value="2" />Приложићу датотеку у имејлу</label>
            </div>
            <br />
            <p>Користите <a href="//commons.wikimedia.org/wiki/Special:UploadWizard" target="_blank"><b>Чаробњак за отпремање</b></a> како бисте отпремили датотеку на Викимедијину оставу, уколико то већ нисте.</p>
            <p>Да бисте спречили да се датотека обрише док Викимедијин OTRS тим обрађује Ваш имејл, можете поставити <b><samp>{{subst:OP}}</samp></b> на страницу описа датотеке.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iatt">
              <div style="display:none;" id="iup">
                Име датотеке на Викимедијиној остави<br /><input type="text" name="filer" placeholder="Example.jpg (required)" class="form-control" />
                <br /><br />
              </div>
              <a role="button" href="#s3" class="btn btn-primary btn-block smsc nt">пређите на следећи корак</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s3" class="row hof"> <!-- step 3 -->
          <br />
          корак 3 од 5 [ <a href="#s2" class="smsc">назад</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+3" target="_blank">помоћ</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">фидбекк</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s31" name="s3" value="1" />Желим да ослободим датотеку</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s32" name="s3" value="2" />Желим да ослободим дело приказано на датотеци</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s33" name="s3" value="3" />Желим да ослободим и датотеку и дело приказано на њој</label>
            </div>
            <br />
            <p>Ако датотека приказује или на неки други начин укључује туђа уметничка дела на нетривијалан начин, она је <a href="//commons.wikimedia.org/wiki/Commons:Derivative_works" target="_blank"><b>изведено дело</b></a> и стога је обично потребно да носилац ауторских права укљученог дела да посебну дозволу.</p>
            <p>У неким земљама, захваљујући <a href="//commons.wikimedia.org/wiki/Commons:Freedom_of_panorama" target="_blank"><b>слободи панораме</b></a>, архитектонска и друга стално јавно приказана дела су изузета од овог захтева. У Србији важи слобода панораме.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="i3">
              <a role="button" href="#s4" class="btn btn-primary btn-block smsc nt">пређите на следећи корак</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s4" class="row hof"> <!-- step 4 -->
          <br />
          корак 4 од 5 [ <a href="#s3" class="smsc">назад</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+4" target="_blank">помож</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">фидбек</a> ]
          <br /><br />
          <div class="col-md-7">
            <p>Слажем се да објавим горе наведени садржај под следећом слободном лиценцом:</p>
            <div id="s4fg" class="form-group"><div class="input-group">
              <input id="licensei" type="text" name="license" value="Creative Commons Attribution-ShareAlike 4.0 International" class="form-control" />
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
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iag">
              <a role="button" class="btn btn-primary btn-block nt" onclick="s4v()">пређите на следећи корак</a>
            </div>
          </div>
          <br />
        </div>

      </form> <!-- result -->
      <div id="result" class="row hof">
        <br />
        корак 5 од 5 [ <a href="#s1" class="smsc">Почните испочетка</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+5" target="_blank">помоћ</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">фидбек</a> ]
        <br /><br />
        <?php if (($s1 != "") && ($name != "") && !(($s1 == "2") && (($rep == "") || ($auth == ""))) && ($s2 != "") && !(($s2 != "2") && ($filer == "")) && ($s3 != "") && ($license != "")) {
          $stats = fopen("stats/" . date('Y') . ".csv", "a");
          fputcsv($stats, array (date("m-d"), $starttime, date("H:i:s"), $trn), ";");
          fclose($stats);
        ?>
        <div class="col-md-7">
          <p>Уколико имате инсталиран клијент електронске поште, само <b>кликните на дугме</b> како бисте креирали имејл за ослобађање. Уместо тога, можете копирати и налепити текст из зеленог оквира испод у имејл који ћете послати на <a href="mailto:permissions-commons@wikimedia.org" style="white-space:nowrap;">permissions-commons@wikimedia.org</a>.</p>
          <p>Овај имејл треба да буде послат са <b>имејл адресе која се може повезати са садржајем који се ослобађа</b>. На пример, ако ослобађате слике које се налазе на веб-сајту, Ваша имејл адреса би требало да буде повезана са веб-сајтом или наведена на страници за контакт веб-сајта; уколико ослобађате слике у име организације, Ваша имејл адреса би требало да буде званична имејл адреса организације.</p>
          <br />
          <?php
            switch ($s1) {
                case "1":
                    $p1s = ", $name, am";
                    break;
                case "2":
                    $p1s = " represent $rep,";
                    $p1s_ = "<br />$auth of $rep";
                    $p1s_m = "%0A$auth of $rep";
                    break;
            }
            switch ($s2) {
                case "1":
                    $file = preg_replace("/(File:|(http|https):\/\/(commons|en).wiki(m|p)edia.org\/(wiki\/|w\/index\.php\?title=)File:)/", "", $filer);
                    $p3s = "<a href='//commons.wikimedia.org/wiki/File:" . rawurlencode(str_replace(" " , "_", str_replace("&amp;", "&", $file))) . "' target='_blank'>https://commons.wikimedia.org/wiki/File:" . str_replace(" " , "_", $file) . "</a>";
                    $p3sm = "https:%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile:" . rawurlencode(str_replace(" " , "_", str_replace("&amp;", "&", $file)));
                    $subj = "release of " . str_replace("&amp;", "%26", $file);
                    break;
                case "2":
                    $p3s = $p3sm = "attached to this email";
                    $subj = "release of content attached to this email";
                    break;
                case "3":
                    $file = $filer;
                    $p3s = "<a href='" . str_replace("&amp;", "&", $file) . "' target='_blank'>" . $file . "</a>";
                    $p3sm = rawurlencode(str_replace("&amp;", "&", $file));
                    $subj = "release of " . str_replace("&amp;", "%26", $file);
                    break;
            }
            switch ($s3) {
                case "1":
                    $p2s = "датотека";
                    break;
                case "2":
                    $p2s = "дело приказано на датотеци";
                    break;
                case "3":
                    $p2s = "и датотеку и дело приказано на њој";
                    break;
            }
            $b1 = "Овим потврђујем да сам ја$p1s креатор и/или једини власник ауторских права над $p2s $p3s.";
            $b1m = "Овим потрврђујем да сам ја$p1s креатор и/или једини власник ауторских права над $p2s $p3sm.";
            $b2 = "Слажем се да објавим горе поменуту датотеку под $license.";
            $b3 = "Јасно ми је да дајем право свакоме да користи материјал у комерцијалне сврхе и да га мења у складу са својим потребама.";
            $b4 = "Јасно ми је да се слободна лиценца односи само на нека ауторска права и задржавам могућност да предузмем мере против било кога ко користи овај материјал на неодговарајући начин, или уз кршење моралних права, ограничења везаних за робне марке итд.";
            if ($license != "Creative Commons CC0 1.0 Universal") {
                $b5 = "<br />Јасно ми је да задржавам ауторско право над делом, и задржавам право да будем наведен као аутор у складу с условима изабране лиценце. Измене које други учине над материјалом неће бити приписане мени.";
                $b5m = "%0AЈасно ми је да задржавам ауторско право над делом, и задржавам право да будем наведен као аутор у складу с условима изабране лиценце. Измене које други учине над материјалом неће бити приписане мени.";
            }
            $b6 = "Јасно ми је да не могу повући ову сагласност, и да се материјал може трајно задржати на неком Викимедијином пројекту.";
            $tracking = "[generated using relgen]";
            echo "<div class='bg-success' style='padding:8px;'>$b1<br />$b2<br />$b3<br />$b4$b5<br />$b6<br /><br />$name$p1s_<br />" . date("Y-m-d") . "<br /><br />$tracking</div>";
          ?>
          <br /><br />
        </div>
        <div class="col-md-4">
          <a role="button" href="mailto:permissions-commons@wikimedia.org?subject=<?=$subj?>&amp;body=<?=$b1m?>%0A<?=$b2?>%0A<?=$b3?>%0A<?=$b4?><?=$b5m?>%0A<?=$b6?>%0A%0A<?=$name?><?=$p1s_m?>%0A<?=date('Y-m-d')?>%0A%0A<?=$tracking?>" class="btn btn-default btn-block" style="width:100%;">креирајте имејл за ослобађање</a>
        </div>
        <?php
            } else {
                if ($name == "") echo "<p class='text-danger'>Грешка: није наведено име!</p>";
                if (($s1 == "2") && (($rep == "") || ($auth == ""))) echo "<p class='text-danger'>Грешка: није наведен власник ауторских права и/или извор!</p>";
                if (($s2 != "2") && ($filer == "")) echo "<p class='text-danger'>Грешка: није наведено име датотеке!</p>";
                if ($license == "") echo "<p class='text-danger'>Грешка: није наведена лиценца!</p>";
            }
        ?>
        <br />
      </div>
    </div>
  </body>
</html>
