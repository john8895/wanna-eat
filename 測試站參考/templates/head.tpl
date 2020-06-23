<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
{* {if !$Seo.title} {$Seo.title = $Config->Seo.title} {else} {$Seo.title = $Seo.title|cat:" - "|cat:$Config->Company.company_name} {/if} *}
{if !$Seo.title} {$Seo.title = ''} {/if}
{if !$Seo.keywords} {$Seo.keywords = ''} {/if}
{if !$Seo.description} {$Seo.description = ''} {/if}
<title>{$Seo.title}</title>
<meta name="keywords" content="{$Seo.keywords}">
<meta name="description" content="{$Seo.description}">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href="{$Config->wwwfile}/img/logo.ico" rel="shortcut icon"/>
<link href="{$Config->wwwfile}/js/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<link href="{$Config->wwwfile}/css/font-awesome.min.css" rel="stylesheet"/>
<link href="{$Config->wwwfile}/css/simple-line-icons.css" rel="stylesheet"/>
<link href="{$Config->wwwfile}/css/magnific-popup.css" rel="stylesheet"/>
<link href="{$Config->wwwfile}/css/owl.carousel.css" rel="stylesheet"/>
<link href="{$Config->wwwfile}/css/flexslider.css" rel="stylesheet"/>
<link href="{$Config->wwwfile}/css/animate.min.css" rel="stylesheet"/>
<link href="{$Config->wwwfile}/css/vertical.min.css" rel="stylesheet"/>
<link href="{$Config->wwwfile}/css/style.css" rel="stylesheet"/>

{if $module == 'travel' || $module == 'daytrip' || $module == 'custom'}
    <link rel="stylesheet" href="{$Config->wwwfile}/css/slick.css"/>
    <link rel="stylesheet" href="{$Config->wwwfile}/css/lightcase.css"/>
{/if}

<!-- jQuery fancybox CSS -->
<link rel="stylesheet" href="{$Config->wwwhome}/system/js/fancybox2/source/jquery.fancybox.css?v=2.1.5" type="text/css"
      media="screen">
<link rel="stylesheet" href="{$Config->wwwhome}/system/js/fancybox2/source/helpers/jquery.fancybox-buttons.css?v=2.1.5"
      type="text/css" media="screen">
<link rel="stylesheet" href="{$Config->wwwhome}/system/js/fancybox2/source/helpers/jquery.fancybox-thumbs.css?v=2.1.5"
      type="text/css" media="screen">
<!-- jQuery Upload File CSS -->
<link rel="stylesheet" href="{$Config->wwwhome}/system/js/fileupload/uploadfile.css">
<!--datetimepicker CSS -->
<link rel="stylesheet" href="{$Config->wwwhome}/system/js/datetimepicker/jquery.datetimepicker.css" type="text/css">
<!-- sweetalert2 CSS -->
<link rel="stylesheet" href="{$Config->wwwhome}/system/js/sweetalert2/sweetalert2.min.css" type="text/css">

<script>
    $module = "{$module}";
    $controller = "{$controller}";
    $action = "{$action}";
    $uploadSize = "{$Config->uploadSize}";
    $wwwhome = "{$Config->wwwhome}";
    $wwwroot = "{$Config->wwwroot}";
    $wwwfile = "{$Config->wwwfile}";
    $url = "{$url}";
    $urlCurrent = "{$urlCurrent}";
    $messages = "{$smarty.session.messages}";
    $warnings = "{$smarty.session.warnings}";
</script>

{$Config->Company.company_analytics|unescape}

{if $Config->Active->recaptchaType == 2}
    <script src="https://www.google.com/recaptcha/api.js?render=6Lenn58UAAAAAFh5sL_WRHdRG99LhcWL095XpDHU"></script>
    <script>
        function onRecaptchaV3Submit(token) {
            document.getElementById("i-recaptcha").submit();
        }
    </script>
{/if}