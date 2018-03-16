<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> 
<!--<![endif]--> 
<html class="" lang="<?php echo \mvc\config\configClass::getDefaultCulture() ?>">
    <head>
        <?php echo \mvc\view\viewClass::genTitle(); ?>
        <?php echo \mvc\view\viewClass::genMetas(); ?>
        <?php echo \mvc\view\viewClass::genFavicon(); ?>
        <!--External libraries -->

        <?php echo \mvc\view\viewClass::genStylesheetLibrary(); ?>
        <?php echo \mvc\view\viewClass::genStylesheet(); ?>
        <?php echo \mvc\view\viewClass::genJavascriptLibrary(); ?>

<!--        <script>
          (function () {

              var scripts = ["/static/general/bf-core.min.js", "/static/containers/IED857.js", "/static/general/push-init-code.js"];
              for (var i = 0; i < scripts.length; i++) {
                  var script = document.createElement("script");
                  script.src = "//brandflow.net" + scripts[i] + "?ts=" + Date.now() + "#";
                  script.async = false;
                  document.head.appendChild(script);
              }
          })();
        </script>-->

        <?php if (mvc\session\sessionClass::getInstance()->isUserAuthenticated()) { ?>
          <script type="text/javascript">
            (function (global) {

                if (typeof (global) === "undefined") {
                    throw new Error("window is undefined");
                }

                var _hash = "!";
                var noBackPlease = function () {
                    global.location.href += "#";

                    // making sure we have the fruit available for juice (^__^)
                    global.setTimeout(function () {
                        global.location.href += "!";
                    }, 50);
                };

                global.onhashchange = function () {
                    if (global.location.hash !== _hash) {
                        global.location.hash = _hash;
                    }
                };

                global.onload = function () {
                    noBackPlease();

                    // disables backspace on page except on input fields and textarea..
                    document.body.onkeydown = function (e) {
                        var elm = e.target.nodeName.toLowerCase();
                        if (e.which === 8 && (elm !== 'input' && elm !== 'textarea')) {
                            e.preventDefault();
                        }
                        // stopping event bubbling up the DOM tree..
                        e.stopPropagation();
                    };
                };

            })(window);
          </script>
        <?php } ?>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="nav-md">
        <?php
//        echo substr(\mvc\request\requestClass::getInstance()->getServer('PHP_SELF'), 14);
//        
//        echo  '<br>'.\mvc\request\requestClass::getInstance()->getServer('PATH_INFO');
//        phpinfo();
//
//exit();
//
//?>