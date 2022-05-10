
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
        <p class="MsoNormal" style="margin-bottom: 11.25pt; text-align: center; line-height: normal; mso-outline-level: 2; background: white; vertical-align: baseline;"
           align="center">
            <span lang="EN-US" style="font-size: 24pt; font-family: Poppins;">Terms of Use</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 11.25pt; line-height: normal; vertical-align: baseline;">
                    <span lang="EN-US" style="font-size: 12pt; font-family: Poppins;">
                        Please read these Terms of Use (&ldquo;Terms&rdquo;, &ldquo;Terms of Use&rdquo;) carefully before using the PopRival website and mobile application (the &ldquo;Service&rdquo;) operated by UrbanCam, Inc. (&ldquo;us&rdquo;, &ldquo;we&rdquo;, or &ldquo;our&rdquo;).</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><span lang="EN-US"
                                                                                                              style="font-size: 12pt; font-family: Poppins;">Your access to and use of the Service is conditioned upon your acceptance of and compliance with these Terms. These Terms apply to all visitors, users, and others who wish to access or use the Service.<br/>
                <!-- [if !supportLineBreakNewLine]--><br/><!--[endif]--></span></p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><span lang="EN-US"
                                                                                                              style="font-size: 12pt; font-family: Poppins;">By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you do not have permission to access the Service.</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">&nbsp;</span></strong>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Communications</span></strong><span
                    lang="EN-US" style="font-size: 12pt; font-family: Poppins;"><br/>By creating an Account on our service, you agree to subscribe to newsletters, marketing or promotional materials, and other information we may send. However, you may opt-out of receiving any, or all, of these communications from us by following the unsubscribe link or instructions provided in any email we send.</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">&nbsp;</span></strong>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Content</span></strong><span
                    lang="EN-US" style="font-size: 12pt; font-family: Poppins;"><br/>Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, videos, or other material (&ldquo;Content&rdquo;). You are responsible for the Content that you post on or through the Service, including its legality, reliability, and appropriateness.<br/>
                <!-- [if !supportLineBreakNewLine]--><br/><!--[endif]--></span></p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><span lang="EN-US"
                                                                                                              style="font-size: 12pt; font-family: Poppins;">By posting Content on or through the Service, You represent and warrant that: (i) the Content is yours (you own it) and/or you have the right to use it and the right to grant us the rights and license as provided in these Terms, and (ii) that the posting of your Content on or through the Service does not violate the privacy rights, publicity rights, copyrights, contract rights or any other rights of any person or entity. We reserve the right to terminate the account of anyone found to be infringing on a copyright.</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 11.25pt; line-height: normal; vertical-align: baseline;"><span lang="EN-US"
                                                                                                                  style="font-size: 12pt; font-family: Poppins;">&nbsp;</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 11.25pt; line-height: normal; vertical-align: baseline;"><span lang="EN-US"
                                                                                                                  style="font-size: 12pt; font-family: Poppins;">You retain any of your rights to any Content you submit, post, or display on or through the Service and you are responsible for protecting those rights. We take no responsibility and assume no liability for Content you or any third-party posts on or through the Service. However, by posting Content using the Service you grant us the right and license to use, modify, publicly perform, publicly display, reproduce, and distribute such Content on and through the Service. You agree that this license includes the right for us to make your Content available to other users of the Service, who may also use your Content subject to these Terms.</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><span lang="EN-US"
                                                                                                              style="font-size: 12pt; font-family: Poppins;">UrbanCam, Inc. has the right but not the obligation to monitor and edit all Content provided by users. In addition, Content found on or through this Service is the property of UrbanCam, Inc. or used with permission. You may not distribute, modify, transmit, reuse, download, repost, copy, or use said Content, whether in whole or in part, for commercial purposes or personal gain, without express advance written permission from us.</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">&nbsp;</span></strong>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Accounts</span></strong><span
                    lang="EN-US" style="font-size: 12pt; font-family: Poppins;"><br/>When you create an account with us, you guarantee that you are above the age of 13 and that the information you provide us is accurate, complete, and current at all times. Inaccurate, incomplete, or obsolete information may result in the immediate termination of your account on the Service.<br/>You are responsible for maintaining the confidentiality of your account and password, including but not limited to the restriction of access to your computer and/or account. You agree to accept responsibility for any activities or actions that occur under your account and/or password, whether your password is with our Service or a third-party service. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</span>
        </p>
        <p class="MsoNormal" style="line-height: normal; vertical-align: baseline;"><span lang="EN-US"
                                                                                          style="font-size: 12pt; font-family: Poppins;">&nbsp;</span>
        </p>
        <p class="MsoNormal" style="line-height: normal; vertical-align: baseline;"><span lang="EN-US"
                                                                                          style="font-size: 12pt; font-family: Poppins;">You may not use as a username the name of another person or entity or that is not lawfully available for use, a name or trademark that is subject to any rights of another person or entity other than you, without appropriate authorization. You may not use as a username any name that is offensive, vulgar, or obscene.</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">&nbsp;</span></strong>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Copyright Policy</span></strong><span
                    lang="EN-US" style="font-size: 12pt; font-family: Poppins;"><br/>We respect the intellectual property rights of others. It is our policy to respond to any claim that Content posted on the Service infringes on the copyright or other intellectual property rights (&ldquo;Infringement&rdquo;) of any person or entity.</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 11.25pt; line-height: normal; vertical-align: baseline;"><span lang="EN-US"
                                                                                                                  style="font-size: 12pt; font-family: Poppins;">If you are a copyright owner or authorized on behalf of one, and you believe that the copyrighted work has been copied in a way that constitutes copyright infringement, please submit your claim via email to support@urbancam.net, with the subject line: &ldquo;Copyright Infringement&rdquo; and include in your claim a detailed description of the alleged Infringement as detailed below, under &ldquo;DMCA Notice and Procedure for Copyright Infringement Claims&rdquo;</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><span lang="EN-US"
                                                                                                              style="font-size: 12pt; font-family: Poppins;">You may be held accountable for damages (including costs and attorneys&rsquo; fees) for misrepresentation or bad-faith claims on the infringement of any Content found on and/or through the Service on your copyright.<br/>DMCA Notice and Procedure for Copyright Infringement Claims:</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 11.25pt; line-height: normal; vertical-align: baseline;"><span lang="EN-US"
                                                                                                                  style="font-size: 12pt; font-family: Poppins;">You may submit a notification under the Digital Millennium Copyright Act (DMCA) by providing our Copyright Agent with the following information in writing (see 17 U.S.C 512(c)(3) for further detail):</span>
        </p>
        <p class="MsoNormal"
           style="text-indent: -18.0pt; line-height: normal; mso-list: l0 level1 lfo1; tab-stops: list 36.0pt; vertical-align: baseline; margin: 0cm 0cm 7.5pt 47.25pt;">
            <!-- [if !supportLists]--><span lang="EN-US" style="font-size: 10pt; font-family: Symbol;">&middot;<span
                        style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: 'Times New Roman';"> </span></span>
            <!--[endif]--><span lang="EN-US" style="font-size: 12pt; font-family: Poppins;">an electronic or physical signature of the person authorized to act on behalf of the owner of the copyright&rsquo;s interest;</span>
        </p>
        <p class="MsoNormal"
           style="text-indent: -18.0pt; line-height: normal; mso-list: l0 level1 lfo1; tab-stops: list 36.0pt; vertical-align: baseline; margin: 0cm 0cm 7.5pt 47.25pt;">
            <!-- [if !supportLists]--><span lang="EN-US" style="font-size: 10pt; font-family: Symbol;">&middot;<span
                        style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: 'Times New Roman';"> </span></span>
            <!--[endif]--><span lang="EN-US" style="font-size: 12pt; font-family: Poppins;">a description of the copyrighted work that you claim has been infringed, including the URL (i.e., web page address) of the location where the copyrighted work exists or a copy of the copyrighted work;</span>
        </p>
        <p class="MsoNormal"
           style="text-indent: -18.0pt; line-height: normal; mso-list: l0 level1 lfo1; tab-stops: list 36.0pt; vertical-align: baseline; margin: 0cm 0cm 7.5pt 47.25pt;">
            <!-- [if !supportLists]--><span lang="EN-US" style="font-size: 10pt; font-family: Symbol;">&middot;<span
                        style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: 'Times New Roman';"> </span></span>
            <!--[endif]--><span lang="EN-US" style="font-size: 12pt; font-family: Poppins;">identification of the URL or other specific location on the Service where the material that you claim is infringing is located;</span>
        </p>
        <p class="MsoNormal"
           style="text-indent: -18.0pt; line-height: normal; mso-list: l0 level1 lfo1; tab-stops: list 36.0pt; vertical-align: baseline; margin: 0cm 0cm 7.5pt 47.25pt;">
            <!-- [if !supportLists]--><span lang="EN-US" style="font-size: 10pt; font-family: Symbol;">&middot;<span
                        style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: 'Times New Roman';"> </span></span>
            <!--[endif]--><span lang="EN-US" style="font-size: 12pt; font-family: Poppins;">your address, telephone number, and email address;</span>
        </p>
        <p class="MsoNormal"
           style="text-indent: -18.0pt; line-height: normal; mso-list: l0 level1 lfo1; tab-stops: list 36.0pt; vertical-align: baseline; margin: 0cm 0cm 7.5pt 47.25pt;">
            <!-- [if !supportLists]--><span lang="EN-US" style="font-size: 10pt; font-family: Symbol;">&middot;<span
                        style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: 'Times New Roman';"> </span></span>
            <!--[endif]--><span lang="EN-US" style="font-size: 12pt; font-family: Poppins;">a statement by you that you have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law;</span>
        </p>
        <p class="MsoNormal"
           style="text-indent: -18.0pt; line-height: normal; mso-list: l0 level1 lfo1; tab-stops: list 36.0pt; vertical-align: baseline; margin: 0cm 0cm 0cm 47.25pt;">
            <!-- [if !supportLists]--><span lang="EN-US" style="font-size: 10pt; font-family: Symbol;">&middot;<span
                        style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: 'Times New Roman';"> </span></span>
            <!--[endif]--><span lang="EN-US" style="font-size: 12pt; font-family: Poppins;">a statement by you, made under penalty of perjury, that the above information in your notice is accurate and that you are the copyright owner or authorized to act on the copyright owner&rsquo;s behalf.</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Intellectual Property</span></strong><span
                    lang="EN-US" style="font-size: 12pt; font-family: Poppins;"><br/>The Service and its original content (excluding Content provided by users), features, and functionality are and will remain the exclusive property of UrbanCam, Inc. and its licensors. The Service is protected by copyright, trademark, and other laws of both the United States and foreign countries. Our trademarks and trade dress may not be used in connection with any product or service without the prior written consent of UrbanCam, Inc.</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">&nbsp;</span></strong>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Links To Other Web Sites</span></strong><span
                    lang="EN-US" style="font-size: 12pt; font-family: Poppins;"><br/>Our Service may contain links to third-party websites or services that are not owned or controlled by UrbanCam, Inc. UrbanCam, Inc. has no control over and assumes no responsibility for the content, privacy policies, or practices of any third-party websites or services. We do not warrant the offerings of any of these entities/individuals or their websites.</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><span lang="EN-US"
                                                                                                              style="font-size: 12pt; font-family: Poppins;">&nbsp;</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><span lang="EN-US"
                                                                                                              style="font-size: 12pt; font-family: Poppins;">You acknowledge and agree that UrbanCam, Inc. shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use of or reliance on any such content, goods, or services available on or through any such third-party web sites or services.<br/>We strongly advise you to read the terms and conditions and privacy policies of any third-party websites or services that you visit.</span>
        </p>
        <p class="MsoNormal" style="line-height: normal; vertical-align: baseline;"><strong><span lang="EN-US"
                                                                                                  style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">&nbsp;</span></strong>
        </p>
        <p class="MsoNormal" style="line-height: normal; vertical-align: baseline;"><strong><span lang="EN-US"
                                                                                                  style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Termination</span></strong><span
                    lang="EN-US" style="font-size: 12pt; font-family: Poppins;"><br/>We may terminate or suspend your account and bar access to the Service immediately, without prior notice or liability, under our sole discretion, for any reason whatsoever and without limitation, including but not limited to a breach of the Terms.</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><span lang="EN-US"
                                                                                                              style="font-size: 12pt; font-family: Poppins;">If you wish to terminate your account, you may simply discontinue using the Service.<br/>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity, and limitations of liability.</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">&nbsp;</span></strong>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Indemnification</span></strong><span
                    lang="EN-US" style="font-size: 12pt; font-family: Poppins;"><br/>You agree to defend, indemnify and hold harmless UrbanCam, Inc. and its licensee and licensors, and their employees, contractors, agents, officers, and directors, from and against any claims, damages, obligations, losses, liabilities, costs, or debt, and expenses (including but not limited to attorney&rsquo;s fees), resulting from or arising out of a) your use and access of the Service, by you or any person using your account and password; b) a breach of these Terms or c) Content posted on the Service.</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">&nbsp;</span></strong>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Limitation Of Liability</span></strong><span
                    lang="EN-US" style="font-size: 12pt; font-family: Poppins;"><br/>In no event shall UrbanCam, Inc., nor its directors, employees, partners, agents, suppliers, or affiliates, be liable for any indirect, incidental, special, consequential, or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from (i) your access to or use of or inability to access or use the Service; (ii) any conduct or content of any third party on the Service; (iii) any content obtained from the Service; and (iv) unauthorized access, use or alteration of your transmissions or content, whether based on warranty, contract, tort (including negligence) or any other legal theory, whether or not we have been informed of the possibility of such damage, and even if a remedy set forth herein is found to have failed of its essential purpose.</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">&nbsp;</span></strong>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">Disclaimer</span></strong><span
                    lang="EN-US" style="font-size: 12pt; font-family: Poppins;"><br/>Your use of the Service is at your sole risk. The Service is provided on an &ldquo;AS IS&rdquo; and &ldquo;AS AVAILABLE&rdquo; basis. The Service is provided without warranties of any kind, whether express or implied, including, but not limited to, implied warranties of merchantability, fitness for a particular purpose, non-infringement, or course of performance.<br/>
                <!-- [if !supportLineBreakNewLine]--><br/><!--[endif]--></span></p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><span lang="EN-US"
                                                                                                              style="font-size: 12pt; font-family: Poppins;">UrbanCam, Inc. its subsidiaries, affiliates, and its licensors do not warrant that a) the Service will function uninterrupted, secure, or available at any particular time or location; b) any errors or defects will be corrected; c) the Service is free of viruses or other harmful components, or d) the results of using the Service will meet your requirements.</span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;"><strong><span
                        lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">&nbsp;</span></strong>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;">
            <strong>
                        <span lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">
                            Exclusions
                        </span>
            </strong>
            <span lang="EN-US" style="font-size: 12pt; font-family: Poppins;"><br/>
                        Some jurisdictions do not allow the exclusion of certain warranties or the exclusion or
                        limitation of liability for consequential or incidental damages, so the limitations above may
                        not apply to you.
                    </span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;">
            <strong>
                        <span lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">
                            &nbsp;
                        </span>
            </strong>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;">
            <strong>
                        <span lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">
                            Governing Law
                        </span>
            </strong>
            <span lang="EN-US" style="font-size: 12pt; font-family: Poppins;"><br/>
                        These Terms shall be governed and construed by the laws of the United States, without regard
                        to its conflict of law provisions.<br/>Our failure to enforce any right or provision of these
                        Terms will not be considered a waiver of those rights. If any provision of these Terms is held
                        to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain
                        in effect. These Terms constitute the entire agreement between us regarding our Service, and
                        supersede and replace any prior agreements we might have had between us regarding the Service.
                    </span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;">
            <strong>
                <span lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">&nbsp;</span>
            </strong>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;">
            <strong>
                        <span lang="EN-US" style="font-size: 12pt; font-family: Poppins; border: 1pt none windowtext; padding: 0cm;">
                            Changes
                        </span>
            </strong>
            <span lang="EN-US" style="font-size: 12pt; font-family: Poppins;"><br/>
                        We reserve the right, at our sole discretion, to modify or replace these Terms at any time.
                        If a revision is material we will provide at least 30 days' notice before any new terms
                        take effect. What constitutes a material change will be determined at our sole discretion.
                        <br/>
                    </span>
        </p>
        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal; vertical-align: baseline;">
                    <span lang="EN-US" style="font-size: 12pt; font-family: Poppins;">
                        By continuing to access or use our Service after any revisions become effective,
                        you agree to be bound by the revised terms. If you do not agree to the new terms,
                        you are no longer authorized to use the Service.
                    </span>
        </p>
        <p>&nbsp;</p>
        <p class="MsoNormal" style="line-height: normal; vertical-align: baseline;">
                    <span lang="EN-US" style="font-size: 12pt; font-family: Poppins;">
                        If you have any questions about these Terms, please contact us.
                    </span>
        </p>
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


