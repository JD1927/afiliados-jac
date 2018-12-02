<?php 
//Para evitar la muestra de errores
error_reporting(0);
//Inicia la sesión del usuario
session_start();
//Valida si existe un usuario en sesión lo manda al home.
if ($_SESSION['username']) {
  header('Location: MainMenu.php');
}
//Importa el controlador y el modelo de usuarios
include("../control/ctrUser.php");
include("../model/UserModel.php");
include("../control/ctrConnection.php");

$username = "";
$password = "";
try {
  //Valida que el botón contenga el valor necesario para validar usuario y contraseña
  if ($_POST["login"] == "login") {
    //Recibe los valores del HTTP Post
    $password = $_POST["password"];
    $username = $_POST["username"];
    //Envía usuario y contraseña al modelo de usuario
    $objUserModel = new UserModel(null, $username, $password);
    $ctrUser = new ctrUser($objUserModel);
    //Validar usuario
    $ctrUser->validate_user();
    //Obtiene los valores de los campos
    $USERNAME = $objUserModel->getName();
    $PASSWORD = $objUserModel->getPassword();
    //Valida que los valores coincidad exactamente para ingresar
    $username === $USERNAME ? $username = $USERNAME : $username = null;
    $password === $PASSWORD ? $password = $PASSWORD : $password = null;
    //Valida si el usuario y la contraseñas son diferentes de nulo y vacío
    if ((isset($username) && (!empty($username))) && ((!empty($password)) && (isset($password)))) {
      //Agrega al array de sesión el usuario y la contraseña
      $_SESSION["username"] = $username;
      $_SESSION["password"] = $password;
      //Envía al usuario a home de la aplicación
      header('Location: MainMenu.php');
    } else {
      //Muestra un mensaje de error en caso que no cumpla las condiciones anteriores
      echo "<center> <h1>DATOS INVALIDOS.</h1><br><br></center>";
    }
  }
} catch (Exception $exp) {
  echo "ERROR ....R " . $exp->getMessage() . "\n";
}
?>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta username="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta username="msapplication-tap-highlight" content="no">
  <meta username="description" content="">
  <title>Iniciar sesión - JAC</title>
  <link href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css" rel="stylesheet">
  <link href="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/jqvmap.css?7221760363237152919" rel="stylesheet">
  <link href="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/flag-icon.min.css?7221760363237152919" rel="stylesheet">
  <!-- Fullcalendar-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.css" rel="stylesheet">
  <!-- Materialize-->
  <link href="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/admin-materialize.min.css?7221760363237152919" rel="stylesheet">
  <!-- Material Icons-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <meta id="shopify-digital-wallet" username="shopify-digital-wallet" content="/17758583/digital_wallets/dialog">
  <meta username="shopify-checkout-api-token" content="6aacc581eb2b41d74f03c38d3c985dba">
  <meta id="in-context-paypal-metadata" data-shop-id="17758583" data-environment="production" data-locale="en_US"
    data-paypal-v4="true" data-currency="USD">
  <style media="all">.additional-checkout-button{border:0 !important;border-radius:5px !important;display:inline-block;margin:0 0 10px;padding:0 24px !important;max-width:100%;min-width:150px !important;line-height:44px !important;text-align:center !important}.additional-checkout-button+.additional-checkout-button{margin-left:10px}.additional-checkout-button:last-child{margin-bottom:0}.additional-checkout-button span{font-size:14px !important}.additional-checkout-button img{display:inline-block !important;height:1.3em !important;margin:0 !important;vertical-align:middle !important;width:auto !important}@media (max-width: 500px){.additional-checkout-button{display:block;margin-left:0 !important;padding:0 10px !important;width:100%}}.additional-checkout-button--apple-pay{background-color:#000 !important;color:#fff !important;display:none;font-family:-apple-system, Helvetica Neue, sans-serif !important;min-width:150px !important;white-space:nowrap !important}.additional-checkout-button--apple-pay:hover,.additional-checkout-button--apple-pay:active,.additional-checkout-button--apple-pay:visited{color:#fff !important;text-decoration:none !important}.additional-checkout-button--apple-pay .additional-checkout-button__logo{background:-webkit-usernamed-image(apple-pay-logo-white) center center no-repeat !important;background-size:auto 100% !important;display:inline-block !important;vertical-align:middle !important;width:3em !important;height:1.3em !important}@media (max-width: 500px){.additional-checkout-button--apple-pay{display:none}}.additional-checkout-button--google-pay{line-height:0 !important;padding:0 !important;border-radius:unset !important;width:80px !important}@media (max-width: 500px){.additional-checkout-button--google-pay{width:100% !important}}.gpay-iframe{height:44px !important;width:100%  !important;cursor:pointer;vertical-align:middle !important}.additional-checkout-button--paypal-express{background-color:#ffc439 !important}.additional-checkout-button--paypal,.additional-checkout-button--venmo{vertical-align:top;line-height:0 !important;padding:0 !important}.additional-checkout-button--amazon{background-color:#fad676 !important;position:relative !important}.additional-checkout-button--amazon .additional-checkout-button__logo{-webkit-transform:translateY(4px) !important;transform:translateY(4px) !important}.additional-checkout-button--amazon .alt-payment-list-amazon-button-image{max-height:none !important;opacity:0 !important;position:absolute !important;top:0 !important;left:0 !important;width:100% !important;height:100% !important}.additional-checkout-button-visually-hidden{border:0 !important;clip:rect(0, 0, 0, 0) !important;clip:rect(0 0 0 0) !important;width:1px !important;height:1px !important;margin:-2px !important;overflow:hidden !important;padding:0 !important;position:absolute !important}
</style>
  <style>.shopify-payment-button__button--hidden {
  visibility: hidden;
}

.shopify-payment-button__button {
  border-radius: 4px;
  border: none;
  box-shadow: 0 0 0 0 transparent;
  color: white;
  cursor: pointer;
  display: block;
  font-size: 1em;
  font-weight: 500;
  line-height: 1;
  text-align: center;
  width: 100%;
  transition: background 0.2s ease-in-out;
}

.shopify-payment-button__button[disabled] {
  opacity: 0.6;
  cursor: default;
}

.shopify-payment-button__button--unbranded {
  background-color: #1990c6;
  padding: 1em 2em;
}

.shopify-payment-button__button--unbranded:hover:not([disabled]) {
  background-color: #136f99;
}

.shopify-payment-button__more-options {
  background: transparent;
  border: 0 none;
  cursor: pointer;
  display: block;
  font-size: 1em;
  margin-top: 1em;
  text-align: center;
  width: 100%;
}

.shopify-payment-button__more-options:hover:not([disabled]) {
  text-decoration: underline;
}

.shopify-payment-button__more-options[disabled] {
  opacity: 0.6;
  cursor: default;
}

.shopify-payment-button__button--branded {
  display: flex;
  flex-direction: column;
  min-height: 44px;
  position: relative;
  z-index: 1;
}

.shopify-payment-button__button--branded .shopify-cleanslate {
  flex: 1 !important;
  display: flex !important;
  flex-direction: column !important;
}
</style>
  <script id="apple-pay-shop-capabilities" type="application/json">{"shopId":17758583,"countryCode":"US","currencyCode":"USD","merchantCapabilities":["supports3DS"],"merchantId":"gid:\/\/shopify\/Shop\/17758583","merchantusername":"Materialize Themes","requiredBillingContactFields":["postalAddress","email"],"requiredShippingContactFields":["postalAddress","email"],"shippingType":"shipping","supportedNetworks":["visa","masterCard","amex","discover"],"total":{"type":"pending","label":"Materialize Themes","amount":"1.00"}}</script>
  <script id="shopify-features" type="application/json">{"accessToken":"6aacc581eb2b41d74f03c38d3c985dba","betas":[],"domain":"themes.materializecss.com","shopId":17758583,"smart_payment_buttons_url":"https:\/\/cdn.shopifycloud.com\/payment-sheet\/assets\/latest\/spb.js"}</script>
  <script>var Shopify = Shopify || {};
    Shopify.shop = "materialize-themes.myshopify.com";
    Shopify.currency = { "active": "USD" };
    Shopify.theme = { "username": "debut", "id": 133945025, "theme_store_id": 796, "role": "main" };
    Shopify.theme.handle = "null";
    Shopify.theme.style = { "id": null, "handle": null };</script>
  <script>window.ShopifyPay = window.ShopifyPay || {};
    window.ShopifyPay.apiHost = "pay.shopify.com";
    window.ShopifyPay.crossStoreEnabled = true;</script>
  <script id="__st">var __st = { "a": 17758583, "offset": -28800, "reqid": "c145babe-b0f1-4671-924a-426d28f7f15a", "pageurl": "themes.materializecss.com\/pages\/admin-log-in", "s": "pages-18650988633", "u": "24d918e63852", "p": "page", "rtyp": "page", "rid": 18650988633 };</script>
  <script>window.ShopifyPaypalV4VisibilityTracking = true;</script>
  <script>window.Shopify = window.Shopify || {};
    window.Shopify.Checkout = window.Shopify.Checkout || {};
    window.Shopify.Checkout.apiHost = "materialize-themes.myshopify.com";</script>
  <script>window.ShopifyAnalytics = window.ShopifyAnalytics || {};
    window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
    window.ShopifyAnalytics.meta.currency = 'USD';
    var meta = { "page": { "pageType": "page", "resourceType": "page", "resourceId": 18650988633 } };
    for (var attr in meta) {
      window.ShopifyAnalytics.meta[attr] = meta[attr];
    }</script>
  <script>window.ShopifyAnalytics.merchantGoogleAnalytics = function () {

    };
  </script>
  <script class="analytics">(window.gaDevIds = window.gaDevIds || []).push('BwiEti');


    (function () {
      var customDocumentWrite = function (content) {
        var jquery = null;

        if (window.jQuery) {
          jquery = window.jQuery;
        } else if (window.Checkout && window.Checkout.$) {
          jquery = window.Checkout.$;
        }

        if (jquery) {
          jquery('body').append(content);
        }
      };

      var trekkie = window.ShopifyAnalytics.lib = window.trekkie = window.trekkie || [];
      if (trekkie.integrations) {
        return;
      }
      trekkie.methods = [
        'identify',
        'page',
        'ready',
        'track',
        'trackForm',
        'trackLink'
      ];
      trekkie.factory = function (method) {
        return function () {
          var args = Array.prototype.slice.call(arguments);
          args.unshift(method);
          trekkie.push(args);
          return trekkie;
        };
      };
      for (var i = 0; i < trekkie.methods.length; i++) {
        var key = trekkie.methods[i];
        trekkie[key] = trekkie.factory(key);
      }
      trekkie.load = function (config) {
        trekkie.config = config;
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.onerror = function (e) {
          (new Image()).src = '//v.shopify.com/internal_errors/track?error=trekkie_load';
        };
        script.async = true;
        script.src = 'https://cdn.shopify.com/s/javascripts/tricorder/trekkie.storefront.min.js?v=2017.09.05.1';
        var first = document.getElementsByTagusername('script')[0];
        first.parentNode.insertBefore(script, first);
      };
      trekkie.load(
        { "Trekkie": { "appusername": "storefront", "development": false, "defaultAttributes": { "shopId": 17758583, "isMerchantRequest": null, "themeId": 133945025, "themeCityHash": 11956486666485001981 } }, "Performance": { "navigationTimingApiMeasurementsEnabled": true, "navigationTimingApiMeasurementsSampleRate": 1.0 }, "Google Analytics": { "trackingId": "UA-56218128-1", "domain": "auto", "siteSpeedSampleRate": "10", "enhancedEcommerce": true, "doubleClick": true, "includeSearch": true }, "Session Attribution": {} }
      );

      var loaded = false;
      trekkie.ready(function () {
        if (loaded) return;
        loaded = true;

        window.ShopifyAnalytics.lib = window.trekkie;

        ga('require', 'linker');
        function addListener(element, type, callback) {
          if (element.addEventListener) {
            element.addEventListener(type, callback);
          }
          else if (element.attachEvent) {
            element.attachEvent('on' + type, callback);
          }
        }
        function decorate(event) {
          event = event || window.event;
          var target = event.target || event.srcElement;
          if (target && (target.getAttribute('action') || target.getAttribute('href'))) {
            ga(function (tracker) {
              var linkerParam = tracker.get('linkerParam');
              document.cookie = '_shopify_ga=' + linkerParam + '; ' + 'path=/';
            });
          }
        }
        addListener(window, 'load', function () {
          for (var i = 0; i < document.forms.length; i++) {
            var action = document.forms[i].getAttribute('action');
            if (action && action.indexOf('/cart') >= 0) {
              addListener(document.forms[i], 'submit', decorate);
            }
          }
          for (var i = 0; i < document.links.length; i++) {
            var href = document.links[i].getAttribute('href');
            if (href && href.indexOf('/checkout') >= 0) {
              addListener(document.links[i], 'click', decorate);
            }
          }
        });


        var originalDocumentWrite = document.write;
        document.write = customDocumentWrite;
        try { window.ShopifyAnalytics.merchantGoogleAnalytics.call(this); } catch (error) { };
        document.write = originalDocumentWrite;


        window.ShopifyAnalytics.lib.page(
          null,
          { "pageType": "page", "resourceType": "page", "resourceId": 18650988633 }
        );


      });


      var eventsListenerScript = document.createElement('script');
      eventsListenerScript.async = true;
      eventsListenerScript.src = "//cdn.shopify.com/s/assets/shop_events_listener-76ce6d7f3e50d4b8c05874c34d2ea1340c45e5babba61276dadcaeed488ca16a.js";
      document.getElementsByTagusername('head')[0].appendChild(eventsListenerScript);

    })();</script>
  <script crossorigin="anonymous" defer="defer" src="//cdn.shopify.com/s/assets/shopify_pay/storefront-fe31d6a6f8b299bf1d018618c066f4704f961ac0b1939d90d804f157451c6312.js?v=20181030"></script>
  <script integrity="sha256-LSSd/irVbp++ejYsk3vd86UUqmyUoHsKhsADtERDioA=" defer="defer" src="//cdn.shopify.com/s/assets/storefront/express_buttons-2d249dfe2ad56e9fbe7a362c937bddf3a514aa6c94a07b0a86c003b444438a80.js"
    crossorigin="anonymous"></script>
  <script integrity="sha256-03brKlGJkFluEWuVU2bbMkmqtPMYe/svhru01Sq7y9E=" defer="defer" src="//cdn.shopify.com/s/assets/storefront/features-d376eb2a518990596e116b955366db3249aab4f3187bfb2f86bbb4d52abbcbd1.js"
    crossorigin="anonymous"></script>
  <script defer="defer" src="//cdn.shopify.com/s/assets/themes_support/ga_urchin_forms-68ca1924c495cfc55dac65f4853e0c9a395387ffedc8fe58e0f2e677f95d7f23.js"></script>

  <link rel="canonical" href="https://themes.materializecss.com/pages/admin-log-in">
</head>

<body>
  <main>
    <div class="container" style="margin-top: 15%">
      <div class="row">
        <div class="col s8 offset-s2">

          <div class="card card-login">
            <div class="card-login-splash">
              <img src="../Util/images/puerta-del-sol.jpg" width="50%" height="50%">
            </div>
            <div class="card-content">
              <span class="card-title">Iniciar sesión</span>
              <form action="index.php" method="POST">
                <div class="input-field">
                  <input id="username" type="text" name="username" class="validate" autocomplete="off" autofocus>
                  <label for="username">Usuario</label>
                </div>
                <div class="input-field">
                  <input id="password" type="password" name="password" class="validate" autocomplete="off" autofocus>
                  <label for="password">Contraseña</label>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="login" value="login">Ingresar
                  <i class="material-icons right">send</i>
                </button>
              </form>
            </div>
          </div>

        </div>
      </div>

    </div>

  </main><!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.min.js"></script>

  <!-- External libraries -->

  <!-- jqvmap -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script type="text/javascript" src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/jquery.vmap.min.js?7221760363237152919"></script>
  <script type="text/javascript" src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/jquery.vmap.world.js?7221760363237152919"
    charset="utf-8"></script>
  <script type="text/javascript" src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/jquery.vmap.sampledata.js?7221760363237152919"></script>

  <!-- ChartJS -->

  <script type="text/javascript" src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/Chart.js?7221760363237152919"></script>
  <script type="text/javascript" src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/Chart.Financial.js?7221760363237152919"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
  <script src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/imagesloaded.pkgd.min.js?7221760363237152919"></script>
  <script src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/masonry.pkgd.min.js?7221760363237152919"></script>


  <!-- Initialization script -->
  <script src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/admin-materialize.min.js?7221760363237152919"></script>
</body>

</html>