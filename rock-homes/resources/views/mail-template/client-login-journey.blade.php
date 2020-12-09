<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
        /* SPECIAL CLIENT STYLES */
        
        #outlook a {
            padding: 0;
        }
        /* Force Outlook to provide a "view in browser" message */
        
        .ReadMsgBody {
            width: 100%;
        }
        
        .ExternalClass {
            width: 100%;
        }
        /* Force HM to display emails at full width */
        
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }
        /* Force HM to display normal line spacing */
        
        body,
        table,
        td,
        p,
        a,
        li,
        blockquote {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        /* Prevent WebKit and Windows mobile changing default text sizes */
        
        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        /* Remove spacing between tables in Outlook 2007 and up */
        
        img {
            -ms-interpolation-mode: bicubic;
        }
        /* Allow smoother rendering of resized image in Internet Explorer */
        /* RESET STYLES */
        
        body {
            margin: 0;
            padding: 0;
        }
        
        img {
            border: 0 none;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }
        
        a img {
            border: 0 none;
        }
        
        .imageFix {
            display: block;
        }
        
        table,
        td {
            border-collapse: collapse;
        }
        
        #bodyTable {
            height: 100% !important;
            margin: 0;
            padding: 0;
            width: 100% !important;
        }
        
        #footer a {
            color: #00a4bd;
            text-decoration: none;
        }
        /* Responsive Styles */
        
        @media only screen and (max-width: 480px) {
            .responsiveRow {
                width: 100% !important;
            }
            .responsiveColumn {
                display: block !important;
                width: 100% !important;
            }
        }
    </style>
    <!--[if mso]><style type="text/css">body, table, td {
  font-family: Helvetica Neue, Avenir Next, Arial, Helvetica, sans-serif !important;
}</style><![endif]-->
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor="#f5f8fa" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 16px; height: 100%; width: 100%; min-width: 100%;">
    <table id="outerWrapper" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" bgcolor="#f5f8fa" style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 16px; color: #425b76; line-height: 1.5; width: 100%; min-width: 100%; background-color:#f5f8fa;">
        <tbody>
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellpadding="20" cellspacing="0" width="600" style="width: 600px;" class="emailContainer">
                        <tbody>
                            <tr>
                                <td align="center" valign="top" width="100%" style="width: 100%; min-width: 100%;">
                                    <table cellpadding="12" border="0" cellspacing="0" width="100%" background-color="#ff7a59" style="width: 100%; min-width:100%;">
                                        <tbody>
                                            <tr>
                                                <td align="center" valign="middle" width="100%" style="background: linear-gradient(to right,#bf958b 0%,#182644 100%); width: 100%; padding: 20px; min-width:100%; color: #ffffff">

                                                    @if ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
                                                    <img src="{!!  asset(config('app.app_logo')) !!}" alt="{!! config('app.name') !!}-logo" width="120" height="35" style="width: 120px; height: 35px; vertical-align: middle; clear: both; width: auto; max-width: 100%;"> 
                                                    
                                        @else
                                        <p>
                                            <h4 style="max-width: 150px">{!! config('app.name') !!}</h4>
                                        </p>
                                        @endif

                                                    <span style="-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; color: transparent; background: none; user-select: none; -moz-user-select: none; -ms-user-select:none; -webkit-user-select:none; text-overflow: ellipsis; opacity: 0; width:100%; min-width: 100%; height:1; overlfow:hidden; margin: -1px 0 0 0; padding:0; font-size: 0;">&nbsp;</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table id="backgroundTable" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" bgcolor="#ffffff" style="width: 100%; min-width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td align="left" valign="top" style="font-size: 16px; padding: 0 50px">
                                                    <table cellpadding="0" border="0" cellspacing="0" width="100%" style="color: #425b76; background-color: ; font-size: 20px; width: 100%; margin: initial; min-width: 100%; ">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" valign="middle" style="padding: 0; ">
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="font-size: 0; height: 50px; width: 100%; min-width: 100%; line-height: 0;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="25"><span style="-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; color: transparent; background: none; user-select: none; -moz-user-select: none; -ms-user-select:none; -webkit-user-select:none; text-overflow: ellipsis; opacity: 0; width:100%; min-width: 100%; height:1; overlfow:hidden; margin: -1px 0 0 0; padding:0; font-size: 0;"> &nbsp;</span></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <img src="https://static.hsappstatic.net/EmailNotificationSharedAssets/ex/email-forwarding.png" style="max-width: 150px">
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="font-size: 0; height: 20px; width: 100%; min-width: 100%; line-height: 0;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="10"><span style="-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; color: transparent; background: none; user-select: none; -moz-user-select: none; -ms-user-select:none; -webkit-user-select:none; text-overflow: ellipsis; opacity: 0; width:100%; min-width: 100%; height:1; overlfow:hidden; margin: -1px 0 0 0; padding:0; font-size: 0;"> &nbsp;</span></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <h4 style="font-size: 14px; font-weight: 600; margin: 0; text-align: center">
                                                                        Please validate your {{ config('app.name') }} account</h4>
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="font-size: 0; height: 30px; width: 100%; min-width: 100%; line-height: 0;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="10"><span style="-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; color: transparent; background: none; user-select: none; -moz-user-select: none; -ms-user-select:none; -webkit-user-select:none; text-overflow: ellipsis; opacity: 0; width:100%; min-width: 100%; height:1; overlfow:hidden; margin: -1px 0 0 0; padding:0; font-size: 0;"> &nbsp;</span></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <hr style="color: #eaf0f6; background-color: #eaf0f6; border: none; margin: 0px; padding: 0px;">
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="font-size: 0; height: 30px; width: 100%; min-width: 100%; line-height: 0;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="10"><span style="-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; color: transparent; background: none; user-select: none; -moz-user-select: none; -ms-user-select:none; -webkit-user-select:none; text-overflow: ellipsis; opacity: 0; width:100%; min-width: 100%; height:1; overlfow:hidden; margin: -1px 0 0 0; padding:0; font-size: 0;"> &nbsp;</span></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p style="margin: 0">
                                                        <i18n-string data-key="account.verifyUserEmailAddress.ifNewSignupText" data-locale-at-render="en-us">
                                                            Hi {!! ucfirst($full_name) !!},
                                                        </i18n-string> <br>
                                                    </p>
                                                    <p style="margin: 0">
                                                        <i18n-string data-key="account.verifyUserEmailAddress.bodyText" data-locale-at-render="en-us">
                                                            {{ str_replace('-', ' ', config('app.btn_msg')) }} {{ ' ' . str_replace('-', ' ', '"'. config('app.btn_activate') . '"') }} button below.
                                                        </i18n-string><br><br>
                                                        <i18n-string data-key="account.verifyUserEmailAddress.bodyText" data-locale-at-render="en-us">
                                                            Email: {!! $email !!}
                                                        </i18n-string><br>
                                                        <i18n-string data-key="account.verifyUserEmailAddress.bodyText" data-locale-at-render="en-us">
                                                            Password: {!! $secretKey !!}
                                                        </i18n-string><br><br>
                                                    </p>
                                                    <p style="margin: 0">
                                                        <i18n-string data-key="account.verifyUserEmailAddress.bodyText" data-locale-at-render="en-us">
                                                            {{ str_replace('-', ' ', config('app.appreciate_msg')) }}
                                                        </i18n-string>
                                                    </p>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="font-size: 0; height: 50px; width: 100%; min-width: 100%; line-height: 0;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="50"><span style="-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; color: transparent; background: none; user-select: none; -moz-user-select: none; -ms-user-select:none; -webkit-user-select:none; text-overflow: ellipsis; opacity: 0; width:100%; min-width: 100%; height:1; overlfow:hidden; margin: -1px 0 0 0; padding:0; font-size: 0;"> &nbsp;</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 4rem;">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">
                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align="center" style="border-radius: 3px;" background-color="#739cce" width="auto"><a href="{!! url('client/sign-in', Crypt::encrypt($client->clientid)) !!}" target="_blank" style="border: 1px solid #689cd6; border-radius: 3px; color: #4d4242; display: inline-block; font-size: 14px; font-weight: 500; line-height: 1; padding: 12px 20px; text-decoration: none; width: auto; min-width: 170px; white-space: nowrap; "> 
                                                                                {{ str_replace('-', ' ', config('app.btn_activate')) }}
                                                                              </a></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div itemscope itemtype="http://schema.org/EmailMessage">
                                                        <div itemprop="potentialAction" itemscope itemtype="http://schema.org/ViewAction">
                                                            <link itemprop="target" href="{!! url('client/sign-in', Crypt::encrypt($client->clientid)) !!}">
                                                            <meta itemprop="name" content="Login">
                                                        </div>
                                                        <meta itemprop="description" content="Login">
                                                    </div>
                                                    <div itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
                                                        <meta itemprop="name" content="{!! config('app.name') !!}">
                                                        <link itemprop="url" content="{!! url('client/sign-in', Crypt::encrypt($client->clientid)) !!}">
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table id="footer" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" bgcolor="#f5f8fa" style="width: 100%; min-width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td align="center" valign="top">
                                                    <table width="100%" style="color: #425b76; background-color:#f1f3f7 ; font-size: 14px; width: 100%; margin: initial; min-width: 100%; line-height: 24px">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" valign="middle" style="padding: 5px 0 10px; ">Powered By <br> {{ str_replace('-', ' ', config('app.company_name')) }}<br> {{ str_replace('-', ' ', config('app.company_address')) }} <br> {{ str_replace('-', ' ', config('app.company_region'))
                                                                    }} <br>

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>