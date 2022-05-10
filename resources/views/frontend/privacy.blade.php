
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <title>VIDOE - Video Streaming Website HTML Template</title>
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend') }}/img/favicon.png">
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('frontend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('frontend') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('frontend') }}/css/osahan.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/owl-carousel/owl.theme.css">
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 7px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #07bf67 0%,#0cded5 100%);
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(-45deg, #07bf67 0%,#0cded5 100%);
        }
    </style>
</head>
<body class="login-main-body">
<section class="mt-5">

    <div class="container pb-0 text-center">
        <a href="{{route('index')}}">
            <img src="{{site_logo()}}" class="img-fluid" alt="LOGO"></a>
        @php($setting = getSiteSetting())
        <h5 class="mt-3 mb-3">{!! isset($setting['login_tag_line'])?$setting['login_tag_line']:'Put your musical talents to the test' !!}</h5>

    </div>
    <div class="container pb-0">
        <p class="MsoNormal" style="margin-bottom: 11.25pt; text-align: center; line-height: normal; mso-outline-level: 2;background: white; vertical-align: baseline;" align="center"><span lang="EN-US" style="font-size: 28px; font-family: Poppins;">Privacy Policy</span></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">UrbanCam, Inc. (&ldquo;us&rdquo;, &ldquo;we&rdquo;, or &ldquo;our&rdquo;) operates the PopRival website and mobile application (the &ldquo;Service&rdquo;).</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">This page informs you of our policies regarding the collection, use, and disclosure of Personal Information when you use our Service.<br />We will not use or share your information with anyone except as described in this Privacy Policy.<br /><!-- [if !supportLineBreakNewLine]--><br /><!--[endif]--></span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">We use your Personal Information for providing and improving the Service. By using the Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms of Use.</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">&nbsp;&nbsp;</span></strong></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Information Collection And Use</span></strong><span lang="EN-US" style="font-size: 16px; font-family: Poppins;"><br />While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you. Personally, identifiable information may include but is not limited to, your email address, and name (&ldquo;Personal Information&rdquo;).</span></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">&nbsp;</span></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">We collect this information for the purpose of providing the Service, identifying and communicating with you, responding to your requests/inquiries, and improving our services.</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Log Data</span></strong></p>
        <p style="margin: 0cm; vertical-align: baseline;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">When you access the Service by or through a mobile device, we may collect certain information automatically, including, but not limited to, the type of mobile device you use, your mobile device unique ID, the IP address of your mobile device, your mobile operating system, the type of mobile Internet browser you use and other statistics (&ldquo;Log Data&rdquo;).<br /><!-- [if !supportLineBreakNewLine]--><br /><!--[endif]--></span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">In addition, we may use third-party services such as Google Analytics that collect, monitor, and analyze this type of information in order to increase our Service&rsquo;s functionality. These third-party service providers have their own privacy policies addressing how they use such information.</span></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">Please see the section regarding Location Information below regarding the use of your location information and your options.</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Location information</span></strong></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">We may use and store information about your location depending on the permissions you have set on your device. We use this information to provide features of our Service and to improve and customize our Service. You can enable or disable location services when you use our Service at any time, through your mobile device settings.</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Cookies</span></strong></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">Cookies are files with a small amount of data, which may include an anonymous unique identifier. Cookies are sent to your browser from a website and transferred to your device. We use cookies to collect information in order to improve our services for you.</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. The Help feature on most browsers provides information on how to accept cookies, disable cookies, or notify you when receiving a new cookie.<br /><!-- [if !supportLineBreakNewLine]--><br /><!--[endif]--></span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">If you do not accept cookies, you may not be able to use some features of our Service and we recommend that you leave them turned on.</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">&nbsp;</span></strong></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Do Not Track Disclosure</span></strong></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">We do not support Do Not Track (&ldquo;DNT&rdquo;). Do Not Track is a preference you can set in your web browser to inform websites that you do not want to be tracked.</span></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">You can enable or disable Do Not Track by visiting the Preferences or Settings page of your web browser.</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Service Providers</span></strong></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">We may employ third-party companies and individuals to facilitate our Service, provide the Service on our behalf, perform Service-related services, and/or assist us in analyzing how our Service is used.</span></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">These third parties have access to your Personal Information only to perform specific tasks on our behalf and are obligated not to disclose or use your information for any other purpose.</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Communications</span></strong></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">We may use your Personal Information to contact you with newsletters, marketing or promotional materials, and other information that may be of interest to you. You may opt-out of receiving any, or all, of these communications from us by following the unsubscribe link or instructions provided in any email we send.</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Compliance With Laws</span></strong></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">We will disclose your Personal Information where required to do so by law or subpoena or if we believe that such action is necessary to comply with the law and the reasonable requests of law enforcement or to protect the security or integrity of our Service.</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Business Transaction</span></strong></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">If UrbanCam, Inc. is involved in a merger, acquisition, or asset sale, your Personal Information may be transferred as a business asset. In such cases, we will provide notice before your Personal Information is transferred and/or becomes subject to a different Privacy Policy.</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Security</span></strong></p>
        <p style="margin: 0cm; vertical-align: baseline;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">The security of your Personal Information is important to us, and we strive to implement and maintain reasonable, commercially acceptable security procedures and practices appropriate to the nature of the information we store, in order to protect it from unauthorized access, destruction, use, modification, or disclosure.<br /><!-- [if !supportLineBreakNewLine]--><br /><!--[endif]--></span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">However, please be aware that no method of transmission over the internet, or method of electronic storage is 100% secure and we are unable to guarantee the absolute security of the Personal Information we have collected from you.</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">&nbsp;</span></strong></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Links To Other Sites</span></strong></p>
        <p style="margin: 0cm; vertical-align: baseline;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">Our Service may contain links to other sites that are not operated by us. If you click on a third-party link, you will be directed to that third party&rsquo;s site. We strongly advise you to review the Privacy Policy of every site you visit.<br />We have no control over and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">&nbsp;</span></strong></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Children&rsquo;s Privacy</span></strong></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">Only persons age 18 or older have permission to access our Service. Our Service does not address anyone under the age of 13 (&ldquo;Children&rdquo;).</span></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">We do not knowingly collect personally identifiable information from children under 13. If you are a parent or guardian and you learn that your Children have provided us with Personal Information, please contact us. If we become aware that we have collected Personal Information from children under the age of 13 without verification of parental consent, we take steps to remove that information from our servers.</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><strong><span lang="EN-US" style="font-size: 18px; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Changes To This Privacy Policy</span></strong></p>
        <p style="margin: 0cm; vertical-align: baseline;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">This Privacy Policy is effective as of February 05, 2016, and will remain in effect except with respect to any changes in its provisions in the future, which will be in effect immediately after being posted on this page.<br /><!-- [if !supportLineBreakNewLine]--><br /><!--[endif]--></span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">We reserve the right to update or change our Privacy Policy at any time and you should check this Privacy Policy periodically. Your continued use of the Service after we post any modifications to the Privacy Policy on this page will constitute your acknowledgment of the modifications and your consent to abide and be bound by the modified Privacy Policy.</span></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">&nbsp;</span></p>
        <p style=" vertical-align: baseline; margin: 0cm 0cm 11.25pt 0cm;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">If we make any material changes to this Privacy Policy, we will notify you either through the email address you have provided us or by placing a prominent notice on our website.</span></p>
        <p style="margin: 0cm; vertical-align: baseline;"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">If you have any questions about this Privacy Policy, please contact us via email at support@urbancam.net.</span></p>
        <p class="MsoNormal" style="margin-bottom: 11.25pt; text-align: center; line-height: normal; mso-outline-level: 2; vertical-align: baseline;" align="center"><span lang="EN-US" style="font-size: 16px; font-family: Poppins;">&nbsp;</span></p>
        <p>&nbsp;</p>
        <p class="MsoNormal"><span lang="EN-US" style="font-size: 16px; line-height: 107%; font-family: Poppins;">&nbsp;</span></p>

    </div>
</section>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('frontend') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('frontend') }}/vendor/bootstrap/{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('frontend') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Owl Carousel -->
<script src="{{ asset('frontend') }}/vendor/owl-carousel/owl.carousel.js"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('frontend') }}/js/custom.js"></script>
</body>
</html>