﻿<!DOCTYPE html> <html class=no-js> 
<!-- Mirrored from urban.nyasha.me/html/extras-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Feb 2016 05:11:52 GMT -->
<head> <meta charset=utf-8> 
    <title>Currency Mngmnt</title> 
    <meta name=description content=""> 
    <meta name=viewport content="width=device-width"> 
    <script type="text/javascript">
//<![CDATA[
try{if (!window.CloudFlare) {var CloudFlare=[{verbose:0,p:0,byc:0,owlid:"cf",bag2:1,mirage2:0,oracle:0,paths:{cloudflare:"/cdn-cgi/nexp/dok3v=1613a3a185/"},atok:"a130311581747a98ba6ff289bb1e5d73",petok:"717ae6460eae182559156978ede6e2c79de6f3e5-1455685782-1800",zone:"nyasha.me",rocket:"0",apps:{"ga_key":{"ua":"UA-50530436-1","ga_bs":"2"}},sha2test:0}];!function(a,b){a=document.createElement("script"),b=document.getElementsByTagName("script")[0],a.async=!0,a.src="../../ajax.cloudflare.com/cdn-cgi/nexp/dok3v%3db3137422b2/cloudflare.min.js",b.parentNode.insertBefore(a,b)}()}}catch(e){};
//]]>
</script>
<link rel="shortcut icon" href="<?=site_url('urban.nyasha.me/favicon.ec0f3a1b.ico')?>">       
<link rel=stylesheet href="<?=site_url('assets/styles/app.min.df5e9cc9.css')?>">
<body> 
    <div class="app layout-fixed-header bg-white usersession page-login"> 
        <div class=full-height> 
            <div class=center-wrapper> 
                <div class=center-content> 
                    <div class="row no-margin"> 
                        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4"> 
                            <form role=form action="<?=$action?>" class=form-layout style="margin-left:40px" method="post"> 
                                <div class="text-center mb15 my-title"> 
                                    <h1 align="center"><b>Shah Trading Company</b></h1> 
                                </div> 
                                <p class="text-center mb30" style="color: white; font-family: Verdana">Please sign in to your account</p> 
                                <div class=form-inputs> 
                                    <input type=email class="form-control input-lg" placeholder="Email Address" name="email"> 
                                    <input type=password class="form-control input-lg" placeholder=Password name="password"> </div> 
                                <button class="btn btn-primary btn-block btn-lg mb15" type=submit> 
                                    <span>Sign in</span> 
                                </button> 
                                
                                <?php if($this->session->userdata('login_msg')): ?>
            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <strong><?=$this->session->userdata('login_msg')?></strong>
            </div>
            <?php $this->session->unset_userdata('login_msg'); endif; ?>
                            </form>
                            <center><a href="<?=site_url('auth/forgot_do')?>"> forgot Password? </a></center>
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
    <style>
    .page-login{
        background: url("<?=site_url('assets/pics/backgroun.jpg')?>"); 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;}
    .my-title{
        font-size:30px;
        font-family:Verdana;
        position:absolute;
        bottom:270px;
        color: white;
        padding-left: 74px;
        font-weight:bolder;
    }
      </style>
    <script src=scripts/app.min.4fc8dd6e.js></script> 
    <script type="text/javascript">
/* <![CDATA[ */
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-50530436-1']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

(function(b){(function(a){"__CF"in b&&"DJS"in b.__CF?b.__CF.DJS.push(a):"addEventListener"in b?b.addEventListener("load",a,!1):b.attachEvent("onload",a)})(function(){"FB"in b&&"Event"in FB&&"subscribe"in FB.Event&&(FB.Event.subscribe("edge.create",function(a){_gaq.push(["_trackSocial","facebook","like",a])}),FB.Event.subscribe("edge.remove",function(a){_gaq.push(["_trackSocial","facebook","unlike",a])}),FB.Event.subscribe("message.send",function(a){_gaq.push(["_trackSocial","facebook","send",a])}));"twttr"in b&&"events"in twttr&&"bind"in twttr.events&&twttr.events.bind("tweet",function(a){if(a){var b;if(a.target&&a.target.nodeName=="IFRAME")a:{if(a=a.target.src){a=a.split("#")[0].match(/[^?=&]+=([^&]*)?/g);b=0;for(var c;c=a[b];++b)if(c.indexOf("url")===0){b=unescape(c.split("=")[1]);break a}}b=void 0}_gaq.push(["_trackSocial","twitter","tweet",b])}})})})(window);
/* ]]> */
</script>

