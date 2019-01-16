<?php
error_reporting(0);
//Incluye código 
include("../model/PersonModel.php");
include("../control/ctrPerson.php");
include("../model/HealthModel.php");
include("../control/ctrHealth.php");
include("../model/TalentModel.php");
include("../control/ctrTalent.php");
include("../model/InterestModel.php");
include("../control/ctrInterest.php");
include("../model/ContactModel.php");
include("../control/ctrContact.php");
include("../control/ctrConnection.php");
//Variables

//Listar entidades de salud
$oHealth = new HealthModel(null, null);
$oCtrHealth = new ctrHealth($oHealth);
$health = $oCtrHealth->health_list();
$h_lenght = count($health);

//listar talentos
$oTalent = new TalentModel(null, null);
$oCtrTalent = new ctrTalent($oTalent, $oPerson);
$talents = $oCtrTalent->talent_list();
$t_lenght = count($talents);

//Listar ocupaciones
$oInterest = new InterestModel(null, null);
$oCtrInterest = new ctrInterest($oInterest, $oPerson);
$interest = $oCtrInterest->interest_list();
$i_lenght = count($interest);

$i = 0;

  //delete
if ($_POST['edit'] == 'edit') {
  try {
    //Listar personas
    $oPerson = new PersonModel(null, null, null, null, null, null, null, null, null, null, null, null, null, null);
    $oCtrPerson = new ctrPerson($oPerson);
    $id_personas = $oCtrPerson->id_personas();
    $id_lenght = count($id_personas);

    $id = $_POST['id_update'];
    $oPerson = new PersonModel($id, null, null, null, null, null, null, null, null, null, null, null, null, null);
    $oCtrPerson = new ctrPerson($oPerson);

    $oTalent = new TalentModel(null, null);
    $oCtrTalent = new ctrTalent($oTalent, $oPerson);
    $pertalent = $oCtrTalent->pertal_list();
    $pt_lenght = count($pertalent);

    $oInterest = new InterestModel(null, null);
    $oCtrInterest = new ctrInterest($oInterest, $oPerson);
    $perint = $oCtrInterest->perint_list();
    $pi_lenght = count($perint);

    $oContact = new ContactModel(null);
    $oCtrContact = new ctrContact($oContact, $oPerson);
    $contacts = $oCtrContact->contact_list();
    $tel_lenght = count($contacts);

    $familiar = $oCtrPerson->familiar_detail();
    $f_lenght = count($familiar);
  } catch (Exception $exp) {
    echo "ERROR ....R " . $exp->getMessage() . "\n";
  }
}

if ($_POST['addHobby'] == 'addHobby') {
  try {
    $id_familiar = $_POST['id_familiar'];
    $id_hobby = $_POST['id_hobby'];

    $oPerson = new PersonModel($id_familiar, null, null, null, null, null, null, null, null, null, null, null, null, null);
    $oCtrPerson = new ctrPerson($oPerson);

    $oTalent = new TalentModel($id_hobby, null);
    $oCtrTalent = new ctrTalent($oTalent, $oPerson);

    $oCtrTalent->addHobby();

    $pertalent = $oCtrTalent->pertal_list();
    $pt_lenght = count($pertalent);

    $oInterest = new InterestModel(null, null);
    $oCtrInterest = new ctrInterest($oInterest, $oPerson);
    $perint = $oCtrInterest->perint_list();
    $pi_lenght = count($perint);

    $oContact = new ContactModel(null);
    $oCtrContact = new ctrContact($oContact, $oPerson);
    $contacts = $oCtrContact->contact_list();
    $tel_lenght = count($contacts);

    $familiar = $oCtrPerson->familiar_detail();
    $f_lenght = count($familiar);
  } catch (Exception $exp) {
    echo "ERROR ....R " . $exp->getMessage() . "\n";
  }
}

if ($_POST['rmHobby'] == 'rmHobby') {
  try {
    $id_familiar = $_POST['id_familiar'];
    $id_hobby = $_POST['id_hobby'];

    $oPerson = new PersonModel($id_familiar, null, null, null, null, null, null, null, null, null, null, null, null, null);
    $oCtrPerson = new ctrPerson($oPerson);

    $oTalent = new TalentModel($id_hobby, null);
    $oCtrTalent = new ctrTalent($oTalent, $oPerson);

    $oCtrTalent->rmHobby();

    $pertalent = $oCtrTalent->pertal_list();
    $pt_lenght = count($pertalent);

    $oInterest = new InterestModel(null, null);
    $oCtrInterest = new ctrInterest($oInterest, $oPerson);
    $perint = $oCtrInterest->perint_list();
    $pi_lenght = count($perint);

    $oContact = new ContactModel(null);
    $oCtrContact = new ctrContact($oContact, $oPerson);
    $contacts = $oCtrContact->contact_list();
    $tel_lenght = count($contacts);

    $familiar = $oCtrPerson->familiar_detail();
    $f_lenght = count($familiar);
  } catch (Exception $exp) {
    echo "ERROR ....R " . $exp->getMessage() . "\n";
  }
}

if ($_POST['addInterest'] == 'addInterest') {
  try {
    $id_familiar = $_POST['id_familiar'];
    $id_int = $_POST['id_interest'];

    $oPerson = new PersonModel($id_familiar, null, null, null, null, null, null, null, null, null, null, null, null, null);
    $oCtrPerson = new ctrPerson($oPerson);

    $oInterest = new InterestModel($id_int, null);
    $oCtrInterest = new ctrInterest($oInterest, $oPerson);

    $oCtrInterest->addInterest();

    $oTalent = new TalentModel(null, null);
    $oCtrTalent = new ctrTalent($oTalent, $oPerson);
    $pertalent = $oCtrTalent->pertal_list();
    $pt_lenght = count($pertalent);

    $perint = $oCtrInterest->perint_list();
    $pi_lenght = count($perint);

    $oContact = new ContactModel(null);
    $oCtrContact = new ctrContact($oContact, $oPerson);
    $contacts = $oCtrContact->contact_list();
    $tel_lenght = count($contacts);

    $familiar = $oCtrPerson->familiar_detail();
    $f_lenght = count($familiar);
  } catch (Exception $exp) {
    echo "ERROR ....R " . $exp->getMessage() . "\n";
  }
}

if ($_POST['rmInterest'] == 'rmInterest') {
  try {
    $id_familiar = $_POST['id_familiar'];
    $id_interest = $_POST['id_interest'];

    $oPerson = new PersonModel($id_familiar, null, null, null, null, null, null, null, null, null, null, null, null, null);
    $oCtrPerson = new ctrPerson($oPerson);

    $oInterest = new InterestModel($id_interest, null);
    $oCtrInterest = new ctrInterest($oInterest, $oPerson);

    $oCtrInterest->rmInterest();

    $oTalent = new TalentModel(null, null);
    $oCtrTalent = new ctrTalent($oTalent, $oPerson);
    $pertalent = $oCtrTalent->pertal_list();
    $pt_lenght = count($pertalent);

    $perint = $oCtrInterest->perint_list();
    $pi_lenght = count($perint);

    $oContact = new ContactModel(null);
    $oCtrContact = new ctrContact($oContact, $oPerson);
    $contacts = $oCtrContact->contact_list();
    $tel_lenght = count($contacts);

    $familiar = $oCtrPerson->familiar_detail();
    $f_lenght = count($familiar);
  } catch (Exception $exp) {
    echo "ERROR ....R " . $exp->getMessage() . "\n";
  }
}

if ($_POST['addContact'] == 'addContact') {
  try {
    $id_familiar = $_POST['id_familiar'];
    $tel_phone = $_POST['tel_phone'];

    $oPerson = new PersonModel($id_familiar, null, null, null, null, null, null, null, null, null, null, null, null, null);
    $oCtrPerson = new ctrPerson($oPerson);

    $oContact = new ContactModel($tel_phone);
    $oCtrContact = new ctrContact($oContact, $oPerson);

    $oCtrContact->addContact();

    $oTalent = new TalentModel(null, null);
    $oCtrTalent = new ctrTalent($oTalent, $oPerson);
    $pertalent = $oCtrTalent->pertal_list();
    $pt_lenght = count($pertalent);

    $oInterest = new InterestModel(null, null);
    $oCtrInterest = new ctrInterest($oInterest, $oPerson);
    $perint = $oCtrInterest->perint_list();
    $pi_lenght = count($perint);

    $contacts = $oCtrContact->contact_list();
    $tel_lenght = count($contacts);

    $familiar = $oCtrPerson->familiar_detail();
    $f_lenght = count($familiar);
  } catch (Exception $exp) {
    echo "ERROR ....R " . $exp->getMessage() . "\n";
  }
}

if ($_POST['rmContact'] == 'rmContact') {
  try {
    $id_familiar = $_POST['id_familiar'];
    $tel_phone = $_POST['tel_phone'];

    $oPerson = new PersonModel($id_familiar, null, null, null, null, null, null, null, null, null, null, null, null, null);
    $oCtrPerson = new ctrPerson($oPerson);

    $oContact = new ContactModel($tel_phone);
    $oCtrContact = new ctrContact($oContact, $oPerson);

    $oCtrContact->rmContact();

    $oTalent = new TalentModel(null, null);
    $oCtrTalent = new ctrTalent($oTalent, $oPerson);
    $pertalent = $oCtrTalent->pertal_list();
    $pt_lenght = count($pertalent);

    $oInterest = new InterestModel(null, null);
    $oCtrInterest = new ctrInterest($oInterest, $oPerson);
    $perint = $oCtrInterest->perint_list();
    $pi_lenght = count($perint);

    $contacts = $oCtrContact->contact_list();
    $tel_lenght = count($contacts);

    $familiar = $oCtrPerson->familiar_detail();
    $f_lenght = count($familiar);
  } catch (Exception $exp) {
    echo "ERROR ....R " . $exp->getMessage() . "\n";
  }
}

if ($_POST["update"] == "update") {
  try {
    //setting values
    $id = $_POST['id'];
    $id_type = $_POST['id_type'];
    $fullname = $_POST['fullname'];
    $birth_date = $_POST['birth_date'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $cod_gender = $_POST['cod_gender'];
    $cod_health = $_POST['cod_health'];
    $cod_thealth = $_POST['cod_thealth'];
    $cod_committee = null;
    $cod_knowledge = $_POST['cod_knowledge'];
    $id_familiar = $_POST['id_person'];

    $oPerson = new PersonModel(
      $id,
      $id_type,
      $fullname,
      2,
      $birth_date,
      $address,
      $email,
      $cod_gender,
      $cod_health,
      $cod_thealth,
      $cod_committee,
      $cod_knowledge,
      $id_familiar
    );
    $oCtrPerson = new ctrPerson($oPerson);

    $oCtrPerson->update();

    $oTalent = new TalentModel(null, null);
    $oCtrTalent = new ctrTalent($oTalent, $oPerson);
    $pertalent = $oCtrTalent->pertal_list();
    $pt_lenght = count($pertalent);

    $oInterest = new InterestModel(null, null);
    $oCtrInterest = new ctrInterest($oInterest, $oPerson);
    $perint = $oCtrInterest->perint_list();
    $pi_lenght = count($perint);

    $oContact = new ContactModel(null);
    $oCtrContact = new ctrContact($oContact, $oPerson);
    $contacts = $oCtrContact->contact_list();
    $tel_lenght = count($contacts);

    $familiar = $oCtrPerson->familiar_detail();
    $f_lenght = count($familiar);

  } catch (Exception $exp) {
    echo "ERROR ....R " . $exp->getMessage() . "\n";
  }
}



if ($_POST['delete'] == 'delete') {
  try {

    $id = $_POST['id_update'];
    $oPerson = new PersonModel($id, null, null, null, null, null, null, null, null, null, null, null, null, null);
    $oCtrPerson = new ctrPerson($oPerson);

    if ($oCtrPerson->delete()) {
      echo ("<script>alert('¡La persona con identificación: " . $id . " ha sido eliminado exitosamente!');</script>");
      header('Location: FamiliarsView.php');
    } else {
      echo ("<script>alert('¡La acción no se pudo realizar satisfactoriamente!');</script>");
    }

  } catch (Exception $exp) {
    echo "ERROR ....R " . $exp->getMessage() . "\n";
  }
}

echo "
  <!DOCTYPE html>
  <html lang='es'>
  
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='msapplication-tap-highlight' content='no'>
    <meta name='description' content=''>
    <title>Familiares - JAC</title>
    <link href='https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css' rel='stylesheet'>
    <link href='//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/jqvmap.css?7221760363237152919' rel='stylesheet'>
    <link href='//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/flag-icon.min.css?7221760363237152919' rel='stylesheet'>
    <!-- Fullcalendar-->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.css' rel='stylesheet'>
    <!-- Materialize-->
    <link href='//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/admin-materialize.min.css?7221760363237152919' rel='stylesheet'>
    <!-- Material Icons-->
    <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
    <!-- Materialize -->
    <link type='text/css' rel='stylesheet' href='../materialize/css/materialize.min.css' media='screen,projection' />
    <!--Fontawesome-->
    <link href='../fontawesome-free-5.5.0-web/css/all.min.css' rel='stylesheet'>
    <!--load all styles -->
    <link rel='shortcut icon' href='../Util/images/puerta-del-sol.jpg'>
    <meta id='shopify-digital-wallet' name='shopify-digital-wallet' content='/17758583/digital_wallets/dialog'>
    <meta name='shopify-checkout-api-token' content='6aacc581eb2b41d74f03c38d3c985dba'>
  
    <style media='all'>.additional-checkout-button{border:0 !important;border-radius:5px !important;display:inline-block;margin:0 0 10px;padding:0 24px !important;max-width:100%;min-width:150px !important;line-height:44px !important;text-align:center !important}.additional-checkout-button+.additional-checkout-button{margin-left:10px}.additional-checkout-button:last-child{margin-bottom:0}.additional-checkout-button span{font-size:14px !important}.additional-checkout-button img{display:inline-block !important;height:1.3em !important;margin:0 !important;vertical-align:middle !important;width:auto !important}@media (max-width: 500px){.additional-checkout-button{display:block;margin-left:0 !important;padding:0 10px !important;width:100%}}.additional-checkout-button--apple-pay{background-color:#000 !important;color:#fff !important;display:none;font-family:-apple-system, Helvetica Neue, sans-serif !important;min-width:150px !important;white-space:nowrap !important}.additional-checkout-button--apple-pay:hover,.additional-checkout-button--apple-pay:active,.additional-checkout-button--apple-pay:visited{color:#fff !important;text-decoration:none !important}.additional-checkout-button--apple-pay .additional-checkout-button__logo{background:-webkit-named-image(apple-pay-logo-white) center center no-repeat !important;background-size:auto 100% !important;display:inline-block !important;vertical-align:middle !important;width:3em !important;height:1.3em !important}@media (max-width: 500px){.additional-checkout-button--apple-pay{display:none}}.additional-checkout-button--google-pay{line-height:0 !important;padding:0 !important;border-radius:unset !important;width:80px !important}@media (max-width: 500px){.additional-checkout-button--google-pay{width:100% !important}}.gpay-iframe{height:44px !important;width:100%  !important;cursor:pointer;vertical-align:middle !important}.additional-checkout-button--paypal-express{background-color:#ffc439 !important}.additional-checkout-button--paypal,.additional-checkout-button--venmo{vertical-align:top;line-height:0 !important;padding:0 !important}.additional-checkout-button--amazon{background-color:#fad676 !important;position:relative !important}.additional-checkout-button--amazon .additional-checkout-button__logo{-webkit-transform:translateY(4px) !important;transform:translateY(4px) !important}.additional-checkout-button--amazon .alt-payment-list-amazon-button-image{max-height:none !important;opacity:0 !important;position:absolute !important;top:0 !important;left:0 !important;width:100% !important;height:100% !important}.additional-checkout-button-visually-hidden{border:0 !important;clip:rect(0, 0, 0, 0) !important;clip:rect(0 0 0 0) !important;width:1px !important;height:1px !important;margin:-2px !important;overflow:hidden !important;padding:0 !important;position:absolute !important}</style>
    <style>
      .shopify-payment-button__button--hidden {
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
    <script id='apple-pay-shop-capabilities' type='application/json'>{'shopId':17758583,'countryCode':'US','currencyCode':'USD','merchantCapabilities':['supports3DS'],'merchantId':'gid:\/\/shopify\/Shop\/17758583','merchantName':'Materialize Themes','requiredBillingContactFields':['postalAddress','email'],'requiredShippingContactFields':['postalAddress','email'],'shippingType':'shipping','supportedNetworks':['visa','masterCard','amex','discover'],'total':{'type':'pending','label':'Materialize Themes','amount':'1.00'}}</script>
    <script id='shopify-features' type='application/json'>{'accessToken':'6aacc581eb2b41d74f03c38d3c985dba','betas':[],'domain':'themes.materializecss.com','shopId':17758583,'smart_payment_buttons_url':'https:\/\/cdn.shopifycloud.com\/payment-sheet\/assets\/latest\/spb.js'}</script>
    <script>var Shopify = Shopify || {};
      Shopify.shop = 'materialize-themes.myshopify.com';
      Shopify.currency = { 'active': 'USD' };
      Shopify.theme = { 'name': 'debut', 'id': 133945025, 'theme_store_id': 796, 'role': 'main' };
      Shopify.theme.handle = 'null';
      Shopify.theme.style = { 'id': null, 'handle': null };</script>
    <script>window.ShopifyPay = window.ShopifyPay || {};
      window.ShopifyPay.apiHost = 'pay.shopify.com';
      window.ShopifyPay.crossStoreEnabled = true;</script>
    <script id='__st'>var __st = { 'a': 17758583, 'offset': -28800, 'reqid': '8a6c0350-2d41-4fe3-ac26-a263469d9094', 'pageurl': 'themes.materializecss.com\/pages\/admin-grid', 's': 'pages-18650398809', 'u': '2655572de7ab', 'p': 'page', 'rtyp': 'page', 'rid': 18650398809 };</script>
    <script>window.ShopifyPaypalV4VisibilityTracking = true;</script>
    <script>window.Shopify = window.Shopify || {};
      window.Shopify.Checkout = window.Shopify.Checkout || {};
      window.Shopify.Checkout.apiHost = 'materialize-themes.myshopify.com';</script>
    <script>window.ShopifyAnalytics = window.ShopifyAnalytics || {};
      window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
      window.ShopifyAnalytics.meta.currency = 'USD';
      var meta = { 'page': { 'pageType': 'page', 'resourceType': 'page', 'resourceId': 18650398809 } };
      for (var attr in meta) {
        window.ShopifyAnalytics.meta[attr] = meta[attr];
      }</script>
    <script>window.ShopifyAnalytics.merchantGoogleAnalytics = function () {
  
      };
    </script>
    <script crossorigin='anonymous' defer='defer' src='//cdn.shopify.com/s/assets/shopify_pay/storefront-fe31d6a6f8b299bf1d018618c066f4704f961ac0b1939d90d804f157451c6312.js?v=20181030'></script>
    <script integrity='sha256-LSSd/irVbp++ejYsk3vd86UUqmyUoHsKhsADtERDioA=' defer='defer' src='//cdn.shopify.com/s/assets/storefront/express_buttons-2d249dfe2ad56e9fbe7a362c937bddf3a514aa6c94a07b0a86c003b444438a80.js'
      crossorigin='anonymous'></script>
    <script integrity='sha256-03brKlGJkFluEWuVU2bbMkmqtPMYe/svhru01Sq7y9E=' defer='defer' src='//cdn.shopify.com/s/assets/storefront/features-d376eb2a518990596e116b955366db3249aab4f3187bfb2f86bbb4d52abbcbd1.js'
      crossorigin='anonymous'></script>
    <script defer='defer' src='//cdn.shopify.com/s/assets/themes_support/ga_urchin_forms-68ca1924c495cfc55dac65f4853e0c9a395387ffedc8fe58e0f2e677f95d7f23.js'></script>
  
    <link rel='canonical' href='https://themes.materializecss.com/pages/admin-grid'>
  </head>
  
  <body>
    <header>
      <div class='navbar-fixed'>
        <nav class='navbar white'>
          <div class='nav-wrapper'><a href='index.html' class='brand-logo grey-text text-darken-4'>Familiares</a>
            <ul id='nav-mobile' class='right'>
              <li class='hide-on-med-and-down'>
                <a class='dropdown-trigger waves-effect' href='#' data-target='people'>Personas</a>
              </li>
              <li class='hide-on-med-and-down'>
                <a class='dropdown-trigger waves-effect' href='#' data-target='administration'>Administración</a>
              </li>
              <li class='hide-on-med-and-down'>
                <a class='dropdown-trigger waves-effect' href='#' data-target='reports'>Reportería</a>
              </li>
          </div>
        </nav>
      </div>
      <!--PERSONAS-->
      <div id='people' class='dropdown-content'>
        <ul>
          <li><a href='AfiliadosView.php'>Gestión Afiliados</a></li>
          <li><a href='FamiliarsView.php'>Gestión Familiares</a></li>
        </ul>
      </div>
      <!-- ADMINISTRACIÓN -->
      <div id='administration' class='dropdown-content'>
        <ul>
          <li><a href='CommitteeView.php'>Gestión Comités</a></li>
          <li><a href='HealthView.php'>Gestión EPS-Sisbén</a></li>
          <li><a href='TalentView.php'>Talentos</a></li>
          <li><a href='InterestView.php'>Ocupaciones</a></li>
        </ul>
      </div>
      <!-- REPORTERÍA -->
      <div id='reports' class='dropdown-content'>
        <ul>
  
        </ul>
      </div>
    </header>
    <main>
  
    <div class='container'>
      <br>
      <div class='card card-metrics card-metrics-toggle card-metrics-centered'>
        <br>
        <div class='row'>
            <h5 style='text-align:center'>Familiar " . $familiar[$i][1] . "</h5>
        </div>
        <div class='row'>
          <form id='updateFamiliar' class='col s12' action='UpdateFamiliarView.php' method='POST'>
            <div style='text-align: center' class='container input-field col s12'>
              <button title='Actualizar información' class='btn waves-effect waves-light' type='submit' value='update' name='update'>Actualizar
                <i class='material-icons right'>edit</i>
              </button>
            </div>
            <div class='row'>
              <div class='input-field col s6'>
                <input id='id' name='id' type='text' value='" . $familiar[$i][1] . "' autocomplete='off' readonly>
                <label for='id'>Número Identificación</label>
              </div>
              <div class='input-field col s6'>
                  <select name='id_type'>
                    <option value='" . $familiar[$i][2] . "' selected>" . $familiar[$i][3] . "</option>
                    <option value='1'>Registro Civil</option>
                    <option value='2'>Tarjeta de Identidad</option>
                    <option value='3'>Cédula de Ciudadanía</option>
                    <option value='4'>Cédula de Extranjería</option>
                  </select>
                  <label>Tipo de Identificación</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input id='fullname' name='fullname' type='text' value='" . $familiar[$i][4] . "' autocomplete='off'>
                <label for='fullname'>Nombre Completo</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s6'>
                <input id='birth_date' name='birth_date' type='date' value='" . $familiar[$i][5] . "'>
                <label for='birth_date'>Fecha de Nacimiento</label>
              </div>
              <div class='input-field col s6'>
                  <select name='cod_gender'>
                    <option value='" . $familiar[$i][9] . "' selected>" . $familiar[$i][10] . "</option>
                    <option value='1'>Masculino</option>
                    <option value='2'>Femenino</option>
                  </select>
                  <label>Género</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s6'>
                <input id='address' name='address' type='text' value='" . $familiar[$i][7] . "' autocomplete='off'>
                <label for='address'>Dirección</label>
              </div>
              <div class='input-field col s6'>
                <input id='email' name='email' type='email' value='" . $familiar[$i][8] . "' autocomplete='off'>
                <label for='email'>Correo Electrónico</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s6'>
                  <select name='cod_health'>
                    <option value='" . $familiar[$i][11] . "' selected> " . $familiar[$i][12] . "</option>";
for ($n = 0; $n < $h_lenght; $n++) {
  echo "<option value='" . $health[$n][1] . "'>" . $health[$n][2] . "</option>";
}
echo "</select>
                  <label>EPS</label>
              </div>
              <div class='input-field col s6'>
                  <select name='cod_thealth'>
                    <option value='" . $familiar[$i][13] . "' selected>" . $familiar[$i][14] . " </option>
                    <option value='1'>Cotizante</option>
                    <option value='2'>Beneficiario</option>
                    <option value='3'>Subsidiado</option>
                  </select>
                  <label>Tipo persona EPS</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s6'>
                  <select name='cod_knowledge'>
                    <option value='" . $familiar[$i][15] . "' selected>" . $familiar[$i][16] . "</option>
                    <option value='1'>Preescolar</option>
                    <option value='2'>Primaria</option>
                    <option value='3'>Secundaria</option>
                    <option value='4'>Bachiller</option>
                    <option value='5'>Media Técnica</option>
                    <option value='6'>Técnica</option>
                    <option value='7'>Tecnología</option>
                    <option value='8'>Profesional</option>
                    <option value='9'>Especialización</option>
                    <option value='10'>Maestría</option>
                    <option value='11'>Doctorado</option>
                    <option value='12'>Ninguno</option>
                  </select>
                  <label>Nivel Académico</label>
              </div>
              <div class='input-field col s6'>
                  <select name='id_person'>
                    <option value='" . $familiar[$i][17] . "' selected>" . $familiar[$i][18] . "</option>";
for ($m = 0; $m < $id_lenght; $m++) {
  echo "<option value='" . $id_personas[$m][1] . "'>" . $id_personas[$m][2] . "</option>";//Lista de Comité
}
echo "</select>
                  <label>Familiar</label>
              </div>
            </div>";
echo "<br><div class='divider'></div><br>";
      //HOBBY
echo "<div class='row'>
              <form id='FamiliarHobby' action='UpdateFamiliarView.php' method='POST'>
                <div class='input-field col s4'>
                    <select name='id_hobby'>
                      <option value='' disabled selected>Agregue un talento</option>";
for ($j = 0; $j < $t_lenght; $j++) {
  echo "<option value='" . $talents[$j][1] . "'>" . $talents[$j][2] . "</option>";
}
echo "<input name='id_familiar' value='" . $familiar[$i][1] . "' type='text' hidden>";
echo "</select>
                    <label>Talentos</label>
                </div>
                <div class='input-field col s2'>
                    <button class='btn btn-block waves-effect waves-light btn-small blue darken-4' type='submit' value='addHobby' name='addHobby'>Agregar
                      <i class='material-icons right'>add_circle</i>
                    </button>
                </div>
              </form>
              <div class='input-field col s6'>
                    <div class='row' style='height: 30vh;
                    overflow-y: scroll;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    margin-bottom: 10px;
                    padding: 10px;'>
                    <table class='small striped bordered centered responsive-table'>
                    <thead>
                      <tr>
                        <th>Talento</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>";

if ($pt_lenght > 0) {
  for ($n = 0; $n < $pt_lenght; $n++) {
    echo
      "
                        <tr>
                          
                            <td>" . $pertalent[$n][2] . "</td> 
                            <td style='text-align:center;'>
                              <form id='rmFamiliarHobby' action='UpdateFamiliarView.php' method='POST'>
                                  <div class='row'>
                                      <input name='id_familiar' value='" . $familiar[$i][1] . "' type='text' hidden>
                                      <input name='id_hobby' value='" . $pertalent[$n][1] . "' type='text' hidden>
                                      <button title='Eliminar talento' class='btn btn-small waves-effect waves-light red' type='submit' value='rmHobby' name='rmHobby'>
                                        <i class='material-icons'>delete</i>
                                      </button>
                                  </div>
                                </form>
                            </td>
                        </tr>";
  }
}
echo "</tbody>
                  </table>
                </div>
            </div>
          </div>";
          //FIN HOBBY
echo "<br><div class='divider'></div><br>";
          //OCUPACION
echo "<div class='row'>
              <form id='FamiliarInterest' action='UpdateFamiliarView.php' method='POST'>
                <div class='input-field col s4'>
                    <select name='id_interest'>
                      <option value='' disabled selected>Agregue una ocupación</option>";
for ($k = 0; $k < $i_lenght; $k++) {
  echo "<option value='" . $interest[$k][1] . "'>" . $interest[$k][2] . "</option>";
}
echo "<input name='id_familiar' value='" . $familiar[$i][1] . "' type='text' hidden>";
echo "</select>
                    <label>Ocupaciones</label>
                </div>
                <div class='input-field col s2'>
                    <button class='btn btn-block waves-effect waves-light btn-small blue darken-4' type='submit' value='addInterest' name='addInterest'>Agregar
                      <i class='material-icons right'>add_circle</i>
                    </button>
                </div>
              </form>
              <div class='input-field col s6'>
                    <div class='row' style='height: 30vh;
                    overflow-y: scroll;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    margin-bottom: 10px;
                    padding: 10px;'>
                    <table class='small striped bordered centered responsive-table'>
                    <thead>
                      <tr>
                        <th>Ocupación</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>";

if ($pi_lenght > 0) {
  for ($n = 0; $n < $pi_lenght; $n++) {
    echo
      "
                        <tr>
                          
                            <td>" . $perint[$n][2] . "</td> 
                            <td style='text-align:center;'>
                              <form id='rmFamiliarInterest' action='UpdateFamiliarView.php' method='POST'>
                                <input name='id_familiar' value='" . $familiar[$i][1] . "' type='text' hidden>
                                <input name='id_interest' value='" . $perint[$n][1] . "' type='text' hidden>
                                  <div class='row'>
                                      <button title='Eliminar ocupación' class='btn btn-small waves-effect waves-light red' type='submit' value='rmInterest' name='rmInterest'>
                                        <i class='material-icons'>delete</i>
                                      </button>
                                  </div>
                              </form>
                            </td>

                        </tr>";
  }
}
echo "</tbody>
                  </table>
                </div>
              
            </div>
          </div>";
          //FIN OCUPACION
echo "<br><div class='divider'></div><br>";
          //Contacto
echo "<div class='row'>
              <form id='FamiliarInterest' action='UpdateFamiliarView.php' method='POST'>
                <div class='input-field col s4'>
                  <input id='tel_phone' name='tel_phone' type='text' autocomplete='off'>
                  <label for='tel_phone'>Teléfonos de Contacto</label>
                  <input name='id_familiar' value='" . $familiar[$i][1] . "' type='text' hidden>
                </div>
                <div class='input-field col s2'>
                    <button class='btn btn-block waves-effect waves-light btn-small blue darken-4' type='submit' value='addContact' name='addContact'>Agregar
                      <i class='material-icons right'>add_circle</i>
                    </button>
                </div>
              </form>
              <div class='input-field col s6'>
                    <div class='row' style='height: 30vh;
                    overflow-y: scroll;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    margin-bottom: 10px;
                    padding: 10px;'>
                    <table class='small striped bordered centered responsive-table'>
                    <thead>
                      <tr>
                        <th>Teléfonos</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>";

if ($tel_lenght > 0) {
  for ($k = 0; $k < $tel_lenght; $k++) {
    echo
      "
                        <tr>
                          
                            <td>" . $contacts[$k][2] . "</td> 
                            <td style='text-align:center;'>
                              <form id='rmFamiliarInterest' action='UpdateFamiliarView.php' method='POST'>
                                <input name='id_familiar' value='" . $familiar[$i][1] . "' type='text' hidden>
                                <input name='tel_phone' value='" . $contacts[$k][2] . "' type='text' hidden>
                                  <div class='row'>
                                      <button title='Eliminar teléfono' class='btn btn-small waves-effect waves-light red' type='submit' value='rmContact' name='rmContact'>
                                        <i class='material-icons'>delete</i>
                                      </button>
                                  </div>
                              </form>
                            </td>

                        </tr>";
  }
}
echo "</tbody>
                  </table>
                </div>
              
            </div>
          </div>";
          //FIN Contacto


echo "</div>
        </div>
      </div>
    </main>
    <!--JavaScript at end of body for optimized loading-->
    <script type='text/javascript' src='../materialize/js/materialize.min.js'></script>
    <!-- Scripts -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.min.js'></script>
  
    <!-- External libraries -->
  
    <!-- jqvmap -->
    <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
  
    <script type='text/javascript' src='//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/jquery.vmap.min.js?7221760363237152919'></script>
    <script type='text/javascript' src='//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/jquery.vmap.world.js?7221760363237152919'
      charset='utf-8'></script>
    <script type='text/javascript' src='//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/jquery.vmap.sampledata.js?7221760363237152919'></script>
  
    <!-- ChartJS -->
  
    <script type='text/javascript' src='//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/Chart.js?7221760363237152919'></script>
    <script type='text/javascript' src='//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/Chart.Financial.js?7221760363237152919'></script>
  
  
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.js'></script>
    <script type='text/javascript' src='https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js'></script>
    <script src='//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/imagesloaded.pkgd.min.js?7221760363237152919'></script>
    <script src='//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/masonry.pkgd.min.js?7221760363237152919'></script>
  
  
    <!-- Initialization script -->
    <script src='//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/dashboard.min.js?7221760363237152919'></script>
  </body>
  
  </html>";

?>