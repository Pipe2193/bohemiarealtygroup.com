<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <meta charset="utf-8"> <!-- utf-8 works for most cases -->
            <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
                <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
                    <meta name="x-apple-disable-message-reformatting">	<!-- Disable auto-scale in iOS 10 Mail entirely -->
                        <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

                        <!-- Web Font / @font-face : BEGIN -->
                        <!-- NOTE: If web fonts are not required, lines 10 - 27 can be safely removed. -->

                        <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
                        <!--[if mso]>
                            <style>
                                * {
                                    font-family: sans-serif !important;
                                }
                            </style>
                        <![endif]-->

                        <!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
                        <!--[if !mso]><!-->
                        <!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
                        <!--<![endif]-->

                        <!-- Web Font / @font-face : END -->

                        <!-- CSS Reset -->
                        <style>

                            /* What it does: Remove spaces around the email design added by some email clients. */
                            /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
                            html,
                            body {
                                margin: 0 auto !important;
                                padding: 0 !important;
                                height: 100% !important;
                                width: 100% !important;
                            }

                            /* What it does: Stops email clients resizing small text. */
                            * {
                                -ms-text-size-adjust: 100%;
                                -webkit-text-size-adjust: 100%;
                            }

                            /* What it does: Centers email on Android 4.4 */
                            div[style*="margin: 16px 0"] {
                                margin:0 !important;
                            }

                            /* What it does: Stops Outlook from adding extra spacing to tables. */
                            table,
                            td {
                                mso-table-lspace: 0pt !important;
                                mso-table-rspace: 0pt !important;
                            }

                            /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
                            table {
                                border-spacing: 0 !important;
                                border-collapse: collapse !important;
                                table-layout: fixed !important;
                                margin: 0 auto !important;
                            }
                            table table table {
                                table-layout: auto;
                            }

                            /* What it does: Uses a better rendering method when resizing images in IE. */
                            img {
                                -ms-interpolation-mode:bicubic;
                            }

                            /* What it does: A work-around for email clients meddling in triggered links. */
                            *[x-apple-data-detectors],	/* iOS */
                            .x-gmail-data-detectors, 	/* Gmail */
                            .x-gmail-data-detectors *,
                            .aBn {
                                border-bottom: 0 !important;
                                cursor: default !important;
                                color: inherit !important;
                                text-decoration: none !important;
                                font-size: inherit !important;
                                font-family: inherit !important;
                                font-weight: inherit !important;
                                line-height: inherit !important;
                            }

                            /* What it does: Prevents Gmail from displaying an download button on large, non-linked images. */
                            .a6S {
                                display: none !important;
                                opacity: 0.01 !important;
                            }
                            /* If the above doesn't work, add a .g-img class to any image in question. */
                            img.g-img + div {
                                display:none !important;
                            }

                            /* What it does: Prevents underlining the button text in Windows 10 */
                            .button-link {
                                text-decoration: none !important;
                            }

                            /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
                            /* Create one of these media queries for each additional viewport size you'd like to fix */
                            /* Thanks to Eric Lepetit (@ericlepetitsf) for help troubleshooting */
                            @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */
                                .email-container {
                                    min-width: 375px !important;
                                }
                            }

                        </style>

                        <!-- Progressive Enhancements -->
                        <style>

                            /* What it does: Hover styles for buttons */
                            .button-td,
                            .button-a {
                                transition: all 100ms ease-in;
                            }
                            .button-td:hover,
                            .button-a:hover {
                                background: #346d21 !important;
                                border-color: #346d21 !important;
                            }

                            /* Media Queries */
                            @media screen and (max-width: 600px) {

                                .email-container {
                                    width: 100% !important;
                                    margin: auto !important;
                                }

                                /* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
                                .fluid {
                                    max-width: 100% !important;
                                    height: auto !important;
                                    margin-left: auto !important;
                                    margin-right: auto !important;
                                }

                                /* What it does: Forces table cells into full-width rows. */
                                .stack-column,
                                .stack-column-center {
                                    display: block !important;
                                    width: 100% !important;
                                    max-width: 100% !important;
                                    direction: ltr !important;
                                }
                                /* And center justify these ones. */
                                .stack-column-center {
                                    text-align: center !important;
                                }

                                /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
                                .center-on-narrow {
                                    text-align: center !important;
                                    display: block !important;
                                    margin-left: auto !important;
                                    margin-right: auto !important;
                                    float: none !important;
                                }
                                table.center-on-narrow {
                                    display: inline-block !important;
                                }

                                /* What it does: Adjust typography on small screens to improve readability */
                                .email-container p {
                                    font-size: 17px !important;
                                    line-height: 22px !important;
                                }

                            }

                        </style>

                        <!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
                        <!--[if gte mso 9]>
                        <xml>
                            <o:OfficeDocumentSettings>
                                <o:AllowPNG/>
                                <o:PixelsPerInch>96</o:PixelsPerInch>
                            </o:OfficeDocumentSettings>
                        </xml>
                        <![endif]-->

                        </head>
                        <body width="100%" bgcolor="#FFF" style="margin: 0; mso-line-height-rule: exactly;">
                            <center style="width: 100%; background: #FFF; text-align: left;">

                                <!-- Visually Hidden Preheader Text : BEGIN -->
                                <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
                                    (Optional) This text will appear in the inbox preview, but not the email body.
                                </div>
                                <!-- Visually Hidden Preheader Text : END -->

                                <!-- Email Header : BEGIN -->
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto; border-bottom: solid 5px rgb(104, 152, 67); border-color: #568c44;" class="email-container">
                                    <tr>
                                        <td style="padding: 20px 0; text-align: center">
                                            <img src="./images/logo.png" width="200" height="50" alt="alt_text" border="0" style="height: auto; background: #fffff; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                        </td>
                                    </tr>
                                </table>
                                <!-- Email Header : END -->

                                <!-- Email Body : BEGIN -->
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">

                                    <!-- Hero Image, Flush : BEGIN -->
                                    <tr>
                                        <td bgcolor="#ffffff">
                                            <img src="./images/welcome_banner.png" width="600" height="" alt="alt_text" border="0" align="center" style="width: 100%; max-width: 600px; height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
                                        </td>
                                    </tr>
                                    <!-- Hero Image, Flush : END -->

                                    <!-- 1 Column Text + Button : BEGIN -->
                                    <tr>
                                        <td bgcolor="#5a8e44" style="padding: 40px 40px 20px; text-align: center;">

                                            <h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #FFF; font-weight: normal;">Thank you for your RSVP to  </h1>
                                            <!--                    <h3 style="margin: 0; font-family: sans-serif; font-size: 20px; line-height: 27px; color: #FFF; font-weight: normal;"> </h3>-->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#ffffff" style="padding: 20px 10px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: justify; font-weight: normal;">
                                            <h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #346d21; font-weight: normal; text-align: center;">Be The Face Of Upper Manhattan</h1><br>
                                                <p style="margin: auto;">Dear, $rsvp_name </p><br>
                                                    <p style="margin: 0;">Thank you for your RSVP.</p><br>   
                                                        <p style="margin: 0;">Please bring this ticket to the event for check-in.&nbsp;</p>
                                                        <img src="https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=Hello%20world&choe=UTF-8" width="100" height="" alt="bohemia_rsvp_qr_code" border="0" align="center" style="width: 100%; max-width: 500px; height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
                                                            <h3>Confirmation Number: $ticket_number </h3>
                                                            <p style="margin: 0;">Date: $event_date_start</span><br></p>
                                                            <span style="font-family:lato,helvetica neue,helvetica,arial,sans-serif">Time: $event_time_start </span><span style="font-family:lato,helvetica neue,helvetica,arial,sans-serif"> to </span><span style="font-family:lato,helvetica neue,helvetica,arial,sans-serif"><%= time(@trainer_lead_rsvp_ticket.end_date)%></span><br>
                                                                <span style="font-family:lato,helvetica neue,helvetica,arial,sans-serif">At our Harlem office,<br>
                                                                        <a href="https://maps.google.com/?q=2101+Frederick+Douglass+Blvd&amp;entry=gmail&amp;source=g">2101 Frederick Douglass Blvd</a>.,&nbsp;between <a href="https://maps.google.com/?q=113/114+St&amp;entry=gmail&amp;source=g">113/114 St</a>.<br>
                                                                            </p><br>
                                                                                </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#ffffff" style="padding: 0 20px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #568c44;">
                                                                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto">
                                                                                            <tr>
                                                                                                <td style="border-radius: 3px; background: #568c44; text-align: center;" class="button-td">
                                                                                                    <a href="http://localhost/bohemiarealtygroup.com/web/index.php" style="background: #568c44; border: 15px solid #568c44; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a" target="_blank">
                                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#ffffff;">RSVP HERE</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                    </a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                        <!-- Button : END -->
                                                                                    </td>
                                                                                </tr>
                                                                                <!-- 1 Column Text + Button : END -->
                                                                                <tr>
                                                                                    <td bgcolor="#ffffff" style="padding: 20px 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: justify; font-weight: normal;">
                                                                                        <p style="margin: 0;">For your reference, your username is username for logging in.</p><br> 
                                                                                            <p style="margin: 0;">Thanks,</p><br>
                                                                                                <p style="margin: 0;"><b>Bohemia Realty Group Team</b></p>
                                                                                                </td>
                                                                                                </tr>
                                                                                                <!-- Clear Spacer : BEGIN -->
                                                                                                <tr>
                                                                                                    <td aria-hidden="true" height="40" style="font-size: 0; line-height: 0;">
                                                                                                        &nbsp;
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <!-- Clear Spacer : END -->

                                                                                                <!-- 1 Column Text : BEGIN -->

                                                                                                <!-- 1 Column Text : END -->

                                                                                                </table>
                                                                                                <!-- Email Body : END -->

                                                                                                <div id=":ox" class="a3s aXjCH m160755403e5046a2"><u></u>

                                                                                                    <div style="height:100%;margin:0;padding:0;width:100%;background-color:#fafafa">

                                                                                                        <center>
                                                                                                            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="m_-1243322193556901642bodyTable" style="border-collapse:collapse;height:100%;margin:0;padding:0;width:100%;background-color:#fafafa">
                                                                                                                <tbody><tr>
                                                                                                                        <td align="center" valign="top" id="m_-1243322193556901642bodyCell" style="height:100%;margin:0;padding:10px;width:100%;border-top:0">


                                                                                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642templateContainer" style="border-collapse:collapse;border:0;max-width:600px!important">
                                                                                                                                <tbody><tr>
                                                                                                                                        <td valign="top" id="m_-1243322193556901642templatePreheader" style="background:#fafafa none no-repeat center/cover;background-color:#fafafa;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:9px;padding-bottom:9px"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnTextBlock" style="min-width:100%;border-collapse:collapse">
                                                                                                                                                <tbody class="m_-1243322193556901642mcnTextBlockOuter">
                                                                                                                                                    <tr>
                                                                                                                                                        <td valign="top" class="m_-1243322193556901642mcnTextBlockInner" style="padding-top:9px">



                                                                                                                                                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:390px;border-collapse:collapse" width="100%" class="m_-1243322193556901642mcnTextContentContainer">
                                                                                                                                                                <tbody><tr>

                                                                                                                                                                        <td valign="top" class="m_-1243322193556901642mcnTextContent" style="padding-top:0;padding-left:18px;padding-bottom:9px;padding-right:18px;word-break:break-word;color:#656565;font-family:Helvetica;font-size:12px;line-height:150%;text-align:left">

                                                                                                                                                                            <a href="http://us14.forward-to-friend.com/forward?u=a928f023b5eebaebc7bbb1de1&amp;id=5d9198a6eb&amp;e=43b77f1f1a" style="text-decoration:none;color:#5a8e45;font-weight:normal" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://us14.forward-to-friend.com/forward?u%3Da928f023b5eebaebc7bbb1de1%26id%3D5d9198a6eb%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009379000&amp;usg=AFQjCNEuFiijEFpxjPet6rSYLgripUQgew">Forward this message to a friend</a>.
                                                                                                                                                                        </td>
                                                                                                                                                                    </tr>
                                                                                                                                                                </tbody></table>



                                                                                                                                                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:210px;border-collapse:collapse" width="100%" class="m_-1243322193556901642mcnTextContentContainer">
                                                                                                                                                                <tbody><tr>

                                                                                                                                                                        <td valign="top" class="m_-1243322193556901642mcnTextContent" style="padding-top:0;padding-left:18px;padding-bottom:9px;padding-right:18px;word-break:break-word;color:#656565;font-family:Helvetica;font-size:12px;line-height:150%;text-align:left">

                                                                                                                                                                            <a href="http://mailchi.mp/6e60567bcff0/last-chance-to-rsvp-for-bohemia-realty-groups-hiring-event-251505?e=43b77f1f1a" style="color:#656565;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://mailchi.mp/6e60567bcff0/last-chance-to-rsvp-for-bohemia-realty-groups-hiring-event-251505?e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009379000&amp;usg=AFQjCNFXO9ho9ovX19bfy0RHEEygwrA5nw"><span style="color:#5a8e45">View this email in your browser</span></a>
                                                                                                                                                                        </td>
                                                                                                                                                                    </tr>
                                                                                                                                                                </tbody></table>



                                                                                                                                                        </td>
                                                                                                                                                    </tr>
                                                                                                                                                </tbody>
                                                                                                                                            </table></td>
                                                                                                                                    </tr>
                                                                                                                                    <tr>
                                                                                                                                        <td valign="top" id="m_-1243322193556901642templateHeader" style="background:#ffffff none no-repeat center/cover;background-color:#ffffff;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:9px;padding-bottom:0"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnImageBlock" style="min-width:100%;border-collapse:collapse">
                                                                                                                                                <tbody class="m_-1243322193556901642mcnImageBlockOuter">
                                                                                                                                                    <tr>
                                                                                                                                                        <td valign="top" style="padding:9px" class="m_-1243322193556901642mcnImageBlockInner">
                                                                                                                                                            <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="m_-1243322193556901642mcnImageContentContainer" style="min-width:100%;border-collapse:collapse">
                                                                                                                                                                <tbody><tr>
                                                                                                                                                                        <td class="m_-1243322193556901642mcnImageContent" valign="top" style="padding-right:9px;padding-left:9px;padding-top:0;padding-bottom:0;text-align:center">

                                                                                                                                                                            <a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=f4c1059de4&amp;e=43b77f1f1a" title="" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3Df4c1059de4%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009380000&amp;usg=AFQjCNEL7aYvblxEWNPlsGgvLWfnnRATow">
                                                                                                                                                                                <img align="center" alt="" src="https://ci6.googleusercontent.com/proxy/FylFpHHSIuJTAJuT-fzKCwbblhufEUkncKwMk7bfcdP9OCs0pV-MdksHnOVRVqK3OUau2XxnrieqxG8VSx46NyPyHqS_JInNHhdSUBX8ICBAbSdnYycc5TiVVE_kcPi1llllQDPurArT38PDmAXbPasmKWq0p8cKCdUMgZI=s0-d-e1-ft#https://gallery.mailchimp.com/a928f023b5eebaebc7bbb1de1/images/f6854e4e-b8a1-4924-8ca2-4d15f8907cfe.png" width="564" style="max-width:600px;padding-bottom:0;display:inline!important;vertical-align:bottom;border:0;height:auto;outline:none;text-decoration:none" class="m_-1243322193556901642mcnImage CToWUd">
                                                                                                                                                                            </a>

                                                                                                                                                                        </td>
                                                                                                                                                                    </tr>
                                                                                                                                                                </tbody></table>
                                                                                                                                                        </td>
                                                                                                                                                    </tr>
                                                                                                                                                </tbody>
                                                                                                                                            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnImageBlock" style="min-width:100%;border-collapse:collapse">
                                                                                                                                                <tbody class="m_-1243322193556901642mcnImageBlockOuter">
                                                                                                                                                    <tr>
                                                                                                                                                        <td valign="top" style="padding:9px" class="m_-1243322193556901642mcnImageBlockInner">
                                                                                                                                                            <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="m_-1243322193556901642mcnImageContentContainer" style="min-width:100%;border-collapse:collapse">
                                                                                                                                                                <tbody><tr>
                                                                                                                                                                        <td class="m_-1243322193556901642mcnImageContent" valign="top" style="padding-right:9px;padding-left:9px;padding-top:0;padding-bottom:0;text-align:center">

                                                                                                                                                                            <a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=191cf4baa5&amp;e=43b77f1f1a" title="" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3D191cf4baa5%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009380000&amp;usg=AFQjCNHDO2530hzDrSLvMSR1tGl8LbVUhA">
                                                                                                                                                                                <img align="center" alt="" src="https://ci5.googleusercontent.com/proxy/7EPNqbC99G5jioKO_2aNNbw59ykA-aqIPoEBdKeEHoepqYN4p4l_-OvJiEt8p9ot64y5oOeQx-0MvJFRNuNzXPbeUPAON2gdZupO91DkqQ3fCGUvorBJxHlRnPYNdoAzXtgX6HGNb_dp-SkgB9hFtudpUrKcczjm2bDNIl4=s0-d-e1-ft#https://gallery.mailchimp.com/a928f023b5eebaebc7bbb1de1/images/2be0f201-abf6-4cda-9df2-323d494606ee.gif" width="564" style="max-width:600px;padding-bottom:0;display:inline!important;vertical-align:bottom;border:0;height:auto;outline:none;text-decoration:none" class="m_-1243322193556901642mcnImage CToWUd">
                                                                                                                                                                            </a>

                                                                                                                                                                        </td>
                                                                                                                                                                    </tr>
                                                                                                                                                                </tbody></table>
                                                                                                                                                        </td>
                                                                                                                                                    </tr>
                                                                                                                                                </tbody>
                                                                                                                                            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnDividerBlock" style="min-width:100%;border-collapse:collapse;table-layout:fixed!important">
                                                                                                                                                <tbody class="m_-1243322193556901642mcnDividerBlockOuter">
                                                                                                                                                    <tr>
                                                                                                                                                        <td class="m_-1243322193556901642mcnDividerBlockInner" style="min-width:100%;padding:5px 18px 0px">
                                                                                                                                                            <table class="m_-1243322193556901642mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-top:2px solid #5a8e45;border-collapse:collapse">
                                                                                                                                                                <tbody><tr>
                                                                                                                                                                        <td>
                                                                                                                                                                            <span></span>
                                                                                                                                                                        </td>
                                                                                                                                                                    </tr>
                                                                                                                                                                </tbody></table>

                                                                                                                                                        </td>
                                                                                                                                                    </tr>
                                                                                                                                                </tbody>
                                                                                                                                            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnTextBlock" style="min-width:100%;border-collapse:collapse">
                                                                                                                                                <tbody class="m_-1243322193556901642mcnTextBlockOuter">
                                                                                                                                                    <tr>
                                                                                                                                                        <td valign="top" class="m_-1243322193556901642mcnTextBlockInner" style="padding-top:9px">



                                                                                                                                                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%" class="m_-1243322193556901642mcnTextContentContainer">
                                                                                                                                                                <tbody><tr>

                                                                                                                                                                        <td valign="top" class="m_-1243322193556901642mcnTextContent" style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px;word-break:break-word;color:#202020;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">

                                                                                                                                                                            <h1 class="m_-1243322193556901642null" style="text-align:center;display:block;margin:0;padding:0;color:#202020;font-family:Helvetica;font-size:26px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:normal"><span style="font-size:24px"><span style="font-family:lato,helvetica neue,helvetica,arial,sans-serif">We're sorry we missed you<br>
                                                                                                                                                                                            &nbsp;</span></span></h1>

                                                                                                                                                                            <div style="text-align:center"><span style="font-size:16px"><span style="font-family:lato,helvetica neue,helvetica,arial,sans-serif"><em>Be The Face Of Upper </em></span><span style="font-family:lato,helvetica neue,helvetica,arial,sans-serif"><em>Manhattan</em></span></span><br>
                                                                                                                                                                            </div>

                                                                                                                                                                        </td>
                                                                                                                                                                    </tr>
                                                                                                                                                                </tbody></table>



                                                                                                                                                        </td>
                                                                                                                                                    </tr>
                                                                                                                                                </tbody>
                                                                                                                                            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnDividerBlock" style="min-width:100%;border-collapse:collapse;table-layout:fixed!important">
                                                                                                                                                <tbody class="m_-1243322193556901642mcnDividerBlockOuter">
                                                                                                                                                    <tr>
                                                                                                                                                        <td class="m_-1243322193556901642mcnDividerBlockInner" style="min-width:100%;padding:0px 18px 5px">
                                                                                                                                                            <table class="m_-1243322193556901642mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-top:2px solid #5a8e45;border-collapse:collapse">
                                                                                                                                                                <tbody><tr>
                                                                                                                                                                        <td>
                                                                                                                                                                            <span></span>
                                                                                                                                                                        </td>
                                                                                                                                                                    </tr>
                                                                                                                                                                </tbody></table>

                                                                                                                                                        </td>
                                                                                                                                                    </tr>
                                                                                                                                                </tbody>
                                                                                                                                            </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnTextBlock" style="min-width:100%;border-collapse:collapse">
                                                                                                                                                <tbody class="m_-1243322193556901642mcnTextBlockOuter">
                                                                                                                                                    <tr>
                                                                                                                                                        <td valign="top" class="m_-1243322193556901642mcnTextBlockInner" style="padding-top:9px">



                                                                                                                                                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%" class="m_-1243322193556901642mcnTextContentContainer">
                                                                                                                                                                <tbody><tr>

                                                                                                                                                                        <td valign="top" class="m_-1243322193556901642mcnTextContent" style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px;word-break:break-word;color:#202020;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">

                                                                                                                                                                            <span style="font-family:lato,helvetica neue,helvetica,arial,sans-serif">Dear <%=@absentee.first_name%>,&nbsp;<br>
                                                                                                                                                                                    <br>
                                                                                                                                                                                        Thank you again for your RSVP. We're sorry we missed you.<br>
                                                                                                                                                                                            We encourage you to RSVP for the hiring event next month.&nbsp;<br>
                                                                                                                                                                                                &nbsp; &nbsp;<br>

                                                                                                                                                                                                    <span style="font-family:lato,helvetica neue,helvetica,arial,sans-serif">It will be at our Harlem office,<br>
                                                                                                                                                                                                        <a href="https://maps.google.com/?q=2101+Frederick+Douglass+Blvd&amp;entry=gmail&amp;source=g">2101 Frederick Douglass Blvd</a>.,&nbsp;between <a href="https://maps.google.com/?q=113/114+St&amp;entry=gmail&amp;source=g">113/114 St</a>.<br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        Click<a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=be1bed01d7&amp;e=43b77f1f1a" style="color:#2baadf;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3Dbe1bed01d7%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009380000&amp;usg=AFQjCNGrRbi8a6wRl-XhVV5v_00kaeOAZA">&nbsp;</a><strong><a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=eca3490070&amp;e=43b77f1f1a" style="color:#2baadf;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3Deca3490070%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009380000&amp;usg=AFQjCNFYTMzvmeRvfl5LUiXDgFMxvtDiQA"><span style="color:#5a8e45">here to RSVP</span></a></strong></span>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>



                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody>
                                                                                                                                                                                                        </table></td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                        <td valign="top">
                                                                                                                                                                                                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" id="m_-1243322193556901642templateColumns" style="border-collapse:collapse;background-color:#ffffff;border-top:0;border-bottom:0;padding-top:0;padding-bottom:0">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td valign="top">

                                                                                                                                                                                                        <table align="right" border="0" cellpadding="0" cellspacing="0" width="400" id="m_-1243322193556901642templateBody" style="border-collapse:collapse;background-color:#ffffff;border-top:0;border-bottom:0;padding-top:0;padding-bottom:0">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td></td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>

                                                                                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="200" id="m_-1243322193556901642templateSidebar" style="border-collapse:collapse;background-color:#ffffff;border-top:0;border-bottom:0;padding-top:0;padding-bottom:0">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td valign="top"></td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>

                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                        <td valign="top" id="m_-1243322193556901642templateFooter" style="background:#fafafa none no-repeat center/cover;background-color:#fafafa;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:2px solid #eaeaea;border-bottom:0;padding-top:9px;padding-bottom:9px"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnDividerBlock" style="min-width:100%;border-collapse:collapse;table-layout:fixed!important">
                                                                                                                                                                                                        <tbody class="m_-1243322193556901642mcnDividerBlockOuter">
                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                        <td class="m_-1243322193556901642mcnDividerBlockInner" style="min-width:100%;padding:0px 18px 5px">
                                                                                                                                                                                                        <table class="m_-1243322193556901642mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-top:2px solid #5a8e45;border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td>
                                                                                                                                                                                                        <span></span>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>

                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody>
                                                                                                                                                                                                        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnTextBlock" style="min-width:100%;border-collapse:collapse">
                                                                                                                                                                                                        <tbody class="m_-1243322193556901642mcnTextBlockOuter">
                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                        <td valign="top" class="m_-1243322193556901642mcnTextBlockInner" style="padding-top:9px">



                                                                                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%" class="m_-1243322193556901642mcnTextContentContainer">
                                                                                                                                                                                                        <tbody><tr>

                                                                                                                                                                                                        <td valign="top" class="m_-1243322193556901642mcnTextContent" style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px;word-break:break-word;color:#656565;font-family:Helvetica;font-size:12px;line-height:150%;text-align:center">

                                                                                                                                                                                                        <div style="text-align:left"><br>
                                                                                                                                                                                                        <strong style="font-size:15px">About Us:</strong><br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        <span style="font-size:15px">Bohemia Realty Group is a boutique real estate firm that specializes in commercial and residential&nbsp;sales and&nbsp;leasing above 96th Street. We're&nbsp;looking for agents (currently licensed or not), so if you've ever been interested in New York real estate and want to find out more, come talk to us!</span><br>
                                                                                                                                                                                                        <span style="font-size:15px">&nbsp;</span><br>
                                                                                                                                                                                                        <strong style="font-size:15px">What We Offer:</strong></div>

                                                                                                                                                                                                        <ul>
                                                                                                                                                                                                        <li style="text-align:left"><span style="font-size:15px">Hundreds of exclusive listings</span></li>
                                                                                                                                                                                                        <li style="text-align:left"><span style="font-size:15px">Unequaled support</span></li>
                                                                                                                                                                                                        <li style="text-align:left"><span style="font-size:15px">Unrivaled training program</span></li>
                                                                                                                                                                                                        <li style="text-align:left"><span style="font-size:15px">Work hard, play hard mentality in a non-corporate environment</span></li>
                                                                                                                                                                                                        <li style="text-align:left"><span style="font-size:15px">Cutting edge systems for efficient workflow</span></li>
                                                                                                                                                                                                        </ul>

                                                                                                                                                                                                        <div style="text-align:left"><br>
                                                                                                                                                                                                        <span style="font-size:15px"><strong>Who You Are:</strong></span></div>

                                                                                                                                                                                                        <ul>
                                                                                                                                                                                                        <li style="text-align:left"><span style="font-size:15px">An organized self-starter</span></li>
                                                                                                                                                                                                        <li style="text-align:left"><span style="font-size:15px">Someone that thrives in an atmosphere that values creativity, flexibility, and autonomy</span></li>
                                                                                                                                                                                                        <li style="text-align:left"><span style="font-size:15px">Technologically and social media savvy</span></li>
                                                                                                                                                                                                        </ul>

                                                                                                                                                                                                        <div style="text-align:left"><br>
                                                                                                                                                                                                        <strong style="font-size:15px">Our Culture:</strong><br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        <a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=673a78f20b&amp;e=43b77f1f1a" style="font-size:15px;text-decoration:none;color:#5a8e45;font-weight:normal" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3D673a78f20b%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009380000&amp;usg=AFQjCNES_gQsDb4tw-qhmODupbMNJLS9RA"><strong>Bohemia Named One of NYC's Coolest Companies</strong></a><br>
                                                                                                                                                                                                        <span style="font-size:15px">From "</span><em style="font-size:15px">The New York Post</em><span style="font-size:15px">"&nbsp;</span><br>
                                                                                                                                                                                                        <span style="font-size:15px">"Why it's cool: Because of Saltzberg and Goodell's backgrounds, agents are largely comprised of realtors with non-business-or bohemian-backgrounds: actors, artists, humanities types. Most recruitment is done by former clients, whom Saltzberg finds make great agents. 'For instance, realtors and actors share a lot of the same skills,' she says. 'They have to have self-confidence, be go-getters, to communicate effectively, and to understand how to be their own boss.' "&nbsp;</span><br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        <a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=821f1972c8&amp;e=43b77f1f1a" style="font-size:15px;text-decoration:none;color:#5a8e45;font-weight:normal" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3D821f1972c8%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009380000&amp;usg=AFQjCNGbiY8V1v1ubxd_q-XXEwTQ-1iHeQ"><strong>Performers Play Starring Role at Uptown Brokerage</strong></a><br>
                                                                                                                                                                                                        <span style="font-size:15px">From "</span><em style="font-size:15px">Crain's New York Business</em><span style="font-size:15px">"&nbsp;</span><br>
                                                                                                                                                                                                        <span style="font-size:15px">"One secret to Bohemia Realty's fast growth is hiring actors, writers, directors, filmmakers and musicians who want&nbsp;to earn a steady income while following their dreams. The show-business crowd has also formed a large segment of&nbsp;the firm's client base." &nbsp;</span><br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        <a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=54ada91e1d&amp;e=43b77f1f1a" style="font-size:15px;text-decoration:none;color:#5a8e45;font-weight:normal" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3D54ada91e1d%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009381000&amp;usg=AFQjCNFWsN41GT6RJAei2rkPNRyFzgQuYw"><strong>Read about Bohemia and the Arts</strong></a><br>
                                                                                                                                                                                                        <span style="font-size:15px">From "</span><em style="font-size:15px">The Real Deal</em><span style="font-size:15px">"&nbsp;</span><br>
                                                                                                                                                                                                        <span style="font-size:15px">"When the curtains go down each night on Broadway, it's exit, stage north. That's because a rising number of New York's performers are calling Upper Manhattan home, helped by a collection of brokers [at Bohemia Realty Group] who share stage backgrounds." &nbsp;</span><br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        <strong style="font-size:15px">Meet Our Team</strong><br>
                                                                                                                                                                                                        <span style="font-size:15px">Check out our amazing agents <a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=bc30cffc45&amp;e=43b77f1f1a" style="color:#656565;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3Dbc30cffc45%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009381000&amp;usg=AFQjCNG9NXu_aKmC5swUGItBPvt6Kyt2Ug"><span style="color:#5a8e45">HERE</span></a>.</span><br>
                                                                                                                                                                                                        <span style="font-size:15px">&nbsp;&nbsp;</span><br>
                                                                                                                                                                                                        <strong><span style="font-size:15px">Please feel free to pass on to&nbsp;others who you think&nbsp;may be interested!&nbsp;</span></strong><br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        <span style="font-size:15px">Please click here to </span><u><strong style="font-size:15px"><a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=9b814b07bd&amp;e=43b77f1f1a" shape="rect" style="text-decoration:none;color:#5a8e45;font-weight:normal" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3D9b814b07bd%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009381000&amp;usg=AFQjCNFpbn7GLP0IoZqG-QNEPNq4v4jiNA">RSVP</a></strong></u><span style="font-size:15px"> if you are interested in becoming part of the team.&nbsp;</span><br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        <span style="font-size:15px">Best,</span><br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        <span style="font-size:15px">Sarah Saltzberg</span><br>
                                                                                                                                                                                                        <span style="font-size:15px">Licensed Principal Real Estate Broker</span><br>
                                                                                                                                                                                                        <span style="font-size:15px">Bohemia Realty Group, LLC</span><br>
                                                                                                                                                                                                        <span style="font-size:15px"><a href="https://maps.google.com/?q=2101+Frederick+Douglass+Blvd.+%0D+NY,+NY+10026&amp;entry=gmail&amp;source=g">2101 Frederick Douglass Blvd.</a></span><br>
                                                                                                                                                                                                        <span style="font-size:15px"><a href="https://maps.google.com/?q=2101+Frederick+Douglass+Blvd.+%0D+NY,+NY+10026&amp;entry=gmail&amp;source=g">NY, NY 10026</a></span><br>
                                                                                                                                                                                                        <span style="font-size:15px"><a href="tel:(212)%20663-6215" value="+12126636215" target="_blank">212.663.6215</a></span><br>
                                                                                                                                                                                                        <strong style="font-size:15px"><a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=69a9da3d1f&amp;e=43b77f1f1a" style="text-decoration:none;color:#5a8e45;font-weight:normal" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3D69a9da3d1f%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009381000&amp;usg=AFQjCNHIjRiHwj1jSwOJMFKcTj0Y4-1e6A">www.bohemiarealtygroup.com</a></strong></div>

                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>



                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody>
                                                                                                                                                                                                        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnFollowBlock" style="min-width:100%;border-collapse:collapse">
                                                                                                                                                                                                        <tbody class="m_-1243322193556901642mcnFollowBlockOuter">
                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                        <td align="center" valign="top" style="padding:9px" class="m_-1243322193556901642mcnFollowBlockInner">
                                                                                                                                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnFollowContentContainer" style="min-width:100%;border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td align="center" style="padding-left:9px;padding-right:9px">
                                                                                                                                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse" class="m_-1243322193556901642mcnFollowContent">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td align="center" valign="top" style="padding-top:9px;padding-right:9px;padding-left:9px">
                                                                                                                                                                                                        <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td align="center" valign="top">





                                                                                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td valign="top" style="padding-right:10px;padding-bottom:9px" class="m_-1243322193556901642mcnFollowContentItemContainer">
                                                                                                                                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnFollowContentItem" style="border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td align="left" valign="middle" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px">
                                                                                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>

                                                                                                                                                                                                        <td align="center" valign="middle" width="24" class="m_-1243322193556901642mcnFollowIconContent">
                                                                                                                                                                                                        <a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=983565425f&amp;e=43b77f1f1a" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3D983565425f%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009381000&amp;usg=AFQjCNFZrCQ7ieZF3VtYeVldz1SAMdz6Cg"><img src="https://ci5.googleusercontent.com/proxy/7Mkp5x7vnjoGT2ynGuzF3bII8G8nN9AZ8P94lSQK9u1YI3mtO9W7FJ47IvEXf-miKSuDyVsogoi3lN_ByGUbmgjPGjx-metceXGhlGdxbwFiNbGKmwGCzURgcLUOD4kCIw=s0-d-e1-ft#https://cdn-images.mailchimp.com/icons/social-block-v2/color-twitter-48.png" style="display:block;border:0;height:auto;outline:none;text-decoration:none" height="24" width="24" class="CToWUd"></a>
                                                                                                                                                                                                        </td>


                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>






                                                                                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td valign="top" style="padding-right:10px;padding-bottom:9px" class="m_-1243322193556901642mcnFollowContentItemContainer">
                                                                                                                                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnFollowContentItem" style="border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td align="left" valign="middle" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px">
                                                                                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>

                                                                                                                                                                                                        <td align="center" valign="middle" width="24" class="m_-1243322193556901642mcnFollowIconContent">
                                                                                                                                                                                                        <a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=764c2b2d03&amp;e=43b77f1f1a" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3D764c2b2d03%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009381000&amp;usg=AFQjCNEuMgxQjPD2w8vmdzlUY_-zo-NUtg"><img src="https://ci5.googleusercontent.com/proxy/THEfQ-zOr2AaMLVp_TKYp66Poy4XIPQHLLPvp3JqaDTShBZ9oZafDmhUm7hfcJbSG9vWeV4d9Esrao80PBgUGiMiifS3Dl-CqVUBIY1Qj6oJicgM-Vrdv4BVqtr98zDVKOE=s0-d-e1-ft#https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png" style="display:block;border:0;height:auto;outline:none;text-decoration:none" height="24" width="24" class="CToWUd"></a>
                                                                                                                                                                                                        </td>


                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>






                                                                                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td valign="top" style="padding-right:10px;padding-bottom:9px" class="m_-1243322193556901642mcnFollowContentItemContainer">
                                                                                                                                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnFollowContentItem" style="border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td align="left" valign="middle" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px">
                                                                                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>

                                                                                                                                                                                                        <td align="center" valign="middle" width="24" class="m_-1243322193556901642mcnFollowIconContent">
                                                                                                                                                                                                        <a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=4555474f5e&amp;e=43b77f1f1a" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3D4555474f5e%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009381000&amp;usg=AFQjCNEWKUfAMef2j-RZl7O6Zr2qDhsQXg"><img src="https://ci6.googleusercontent.com/proxy/2rpyRY0T9itQ6T_yWPPDQ4rUZtgavRC6uajPqhzBipOIcYmucGZD9ztNbUXNrxOJypzA4b028B2AgToNwnZ0G7qe-iwhce-TrVBq5-oAnN6FZwQ_V4Y-L0mNaLPhIge_PT2u=s0-d-e1-ft#https://cdn-images.mailchimp.com/icons/social-block-v2/color-instagram-48.png" style="display:block;border:0;height:auto;outline:none;text-decoration:none" height="24" width="24" class="CToWUd"></a>
                                                                                                                                                                                                        </td>


                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>






                                                                                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td valign="top" style="padding-right:0;padding-bottom:9px" class="m_-1243322193556901642mcnFollowContentItemContainer">
                                                                                                                                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnFollowContentItem" style="border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td align="left" valign="middle" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px">
                                                                                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>

                                                                                                                                                                                                        <td align="center" valign="middle" width="24" class="m_-1243322193556901642mcnFollowIconContent">
                                                                                                                                                                                                        <a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=89979aebd1&amp;e=43b77f1f1a" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3D89979aebd1%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009381000&amp;usg=AFQjCNF3GWWiowuyUN804Z27-9YMReT51g"><img src="https://ci3.googleusercontent.com/proxy/PXhKQ9u3DQ8GjJ8EPjpzP6wAul0kVgL6uYuhJpdIQtBKi71bOuUUm_BAZVv-7Y62YWgGzuxBu20TIK9Xf1kbzPwIwmFKjpnbhGayPvfE5bTXIp7Z2VHVMJnKTjXrcWI-dEk=s0-d-e1-ft#https://cdn-images.mailchimp.com/icons/social-block-v2/color-linkedin-48.png" style="display:block;border:0;height:auto;outline:none;text-decoration:none" height="24" width="24" class="CToWUd"></a>
                                                                                                                                                                                                        </td>


                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>




                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>

                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody>
                                                                                                                                                                                                        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnDividerBlock" style="min-width:100%;border-collapse:collapse;table-layout:fixed!important">
                                                                                                                                                                                                        <tbody class="m_-1243322193556901642mcnDividerBlockOuter">
                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                        <td class="m_-1243322193556901642mcnDividerBlockInner" style="min-width:100%;padding:10px 18px 25px">
                                                                                                                                                                                                        <table class="m_-1243322193556901642mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-top:2px solid #eeeeee;border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td>
                                                                                                                                                                                                        <span></span>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>

                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody>
                                                                                                                                                                                                        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnTextBlock" style="min-width:100%;border-collapse:collapse">
                                                                                                                                                                                                        <tbody class="m_-1243322193556901642mcnTextBlockOuter">
                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                        <td valign="top" class="m_-1243322193556901642mcnTextBlockInner" style="padding-top:9px">



                                                                                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%" class="m_-1243322193556901642mcnTextContentContainer">
                                                                                                                                                                                                        <tbody><tr>

                                                                                                                                                                                                        <td valign="top" class="m_-1243322193556901642mcnTextContent" style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px;word-break:break-word;color:#656565;font-family:Helvetica;font-size:12px;line-height:150%;text-align:center">

                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        If this email is not displayed properly, please click here:&nbsp;<a href="http://mailchi.mp/6e60567bcff0/last-chance-to-rsvp-for-bohemia-realty-groups-hiring-event-251505?e=43b77f1f1a" style="color:#656565;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://mailchi.mp/6e60567bcff0/last-chance-to-rsvp-for-bohemia-realty-groups-hiring-event-251505?e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009382000&amp;usg=AFQjCNHaLRLNWr4lf_kwpMpO658PWslmBw">View this email in your browser</a><br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        The following mail applications are <strong>not MailChimp mobile compatible:</strong><br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        iPhone/Android Gmail, iPhone/Android Yahoo Mail App, BlackBerry OS 5. Samsung Galaxy S3+, Windows Mobile 6.1, Windows Phone 7/8<br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        If troubleshooting issues occur with the above mail applications, <strong>switch to a different application.</strong><br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        <em>Copyright © 2017 Bohemia Realty Group, All rights reserved.</em><br>
                                                                                                                                                                                                        You're receiving this email because you're a part of Bohemia Realty Group's Marketing Team.<br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        <strong>Our mailing address is:</strong><br>
                                                                                                                                                                                                        <div class="m_-1243322193556901642vcard"><span class="m_-1243322193556901642org m_-1243322193556901642fn">Bohemia Realty Group</span><div class="m_-1243322193556901642adr"><div class="m_-1243322193556901642street-address"><a href="https://maps.google.com/?q=2101+Frederick+Douglass+BlvdNew+York,+NY+10026&amp;entry=gmail&amp;source=g">2101 Frederick Douglass Blvd</a></div><span class="m_-1243322193556901642locality"><a href="https://maps.google.com/?q=2101+Frederick+Douglass+BlvdNew+York,+NY+10026&amp;entry=gmail&amp;source=g">New York</a></span><a href="https://maps.google.com/?q=2101+Frederick+Douglass+BlvdNew+York,+NY+10026&amp;entry=gmail&amp;source=g">, </a><span class="m_-1243322193556901642region">NY</span>  <span class="m_-1243322193556901642postal-code"><a href="https://maps.google.com/?q=2101+Frederick+Douglass+BlvdNew+York,+NY+10026&amp;entry=gmail&amp;source=g">10026</a>-3469</span></div><br><a href="//bohemiarealtygroup.us14.list-manage.com/vcard?u=a928f023b5eebaebc7bbb1de1&amp;id=0f83f1f996" class="m_-1243322193556901642hcard-download" target="_blank">Add us to your address book</a></div>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        Want to change how you receive these emails?<br>
                                                                                                                                                                                                        You can <a href="https://bohemiarealtygroup.us14.list-manage.com/profile?u=a928f023b5eebaebc7bbb1de1&amp;id=0f83f1f996&amp;e=43b77f1f1a" style="color:#656565;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/profile?u%3Da928f023b5eebaebc7bbb1de1%26id%3D0f83f1f996%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009382000&amp;usg=AFQjCNHSzZWJjxLeTv_TO6kvaNqkTK5Cdg">update your preferences</a> or <a href="https://bohemiarealtygroup.us14.list-manage.com/unsubscribe?u=a928f023b5eebaebc7bbb1de1&amp;id=0f83f1f996&amp;e=43b77f1f1a&amp;c=5d9198a6eb" style="color:#656565;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/unsubscribe?u%3Da928f023b5eebaebc7bbb1de1%26id%3D0f83f1f996%26e%3D43b77f1f1a%26c%3D5d9198a6eb&amp;source=gmail&amp;ust=1515690009382000&amp;usg=AFQjCNE4hv6u3-i3x2ibVilN06_KocaFyA">unsubscribe from this list</a><br>
                                                                                                                                                                                                        <br>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>



                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody>
                                                                                                                                                                                                        </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-1243322193556901642mcnBoxedTextBlock" style="min-width:100%;border-collapse:collapse">

                                                                                                                                                                                                        <tbody class="m_-1243322193556901642mcnBoxedTextBlockOuter">
                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                        <td valign="top" class="m_-1243322193556901642mcnBoxedTextBlockInner">


                                                                                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse" class="m_-1243322193556901642mcnBoxedTextContentContainer">
                                                                                                                                                                                                        <tbody><tr>

                                                                                                                                                                                                        <td style="padding-top:9px;padding-left:18px;padding-bottom:9px;padding-right:18px">

                                                                                                                                                                                                        <table border="0" cellpadding="18" cellspacing="0" class="m_-1243322193556901642mcnTextContentContainer" width="100%" style="min-width:100%!important;background-color:#5a8e45;border-collapse:collapse">
                                                                                                                                                                                                        <tbody><tr>
                                                                                                                                                                                                        <td valign="top" class="m_-1243322193556901642mcnTextContent" style="color:#f2f2f2;font-family:Helvetica;font-size:14px;font-weight:normal;text-align:center;word-break:break-word;line-height:150%">
                                                                                                                                                                                                        <div style="text-align:center">Quick Links:</div>

                                                                                                                                                                                                        <div style="text-align:center"><a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=138afd9b76&amp;e=43b77f1f1a" style="text-align:center;color:#656565;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3D138afd9b76%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009382000&amp;usg=AFQjCNFatSd-57_Z-b5vemxM4upCZHQSKQ"><img align="none" height="30" src="https://ci6.googleusercontent.com/proxy/gp_EOhWZGKl78mrnMz78_Op54KH92VjZRjjhvgw0L2xHA5HvAZv4Yg6MpW92aE_Eh-5Omy1hKkZDb6TC_RnA6OAp8JHYhgLgvAxphmEQh57cuENnq0O19KH0476zdXkqTJ87Xd1dJeMgVqjohhbkPsbJP60umGy4XFRRzu4=s0-d-e1-ft#https://gallery.mailchimp.com/a928f023b5eebaebc7bbb1de1/images/5ee66d60-460d-4f6e-8e2d-fbd5b8bd9889.png" style="width:125px;height:30px;margin:0px;border:0;outline:none;text-decoration:none" width="125" class="CToWUd"></a><a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=e71e88df6b&amp;e=43b77f1f1a" style="text-align:center;color:#656565;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3De71e88df6b%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009382000&amp;usg=AFQjCNHTV7tJCU3-CSwPF-kbtlqdW2-zng"><img align="none" height="30" src="https://ci5.googleusercontent.com/proxy/1opNnbWIGz8JRPMqhYZAtprIwpGZPFqCtpw9sekQs8xqX4RXY1do4Y4sz7Gc3XyXO_HTlz3RDpvdH-vNjnq1ShaG6UdNzbqsGVRKhCZ7dV0u8RWG8X8ZnR2tqpb7xnE07D8zsqN1bTfroIvnjIDdS5x2GgAHLLO-R4XtErk=s0-d-e1-ft#https://gallery.mailchimp.com/a928f023b5eebaebc7bbb1de1/images/dfd2cec0-54a2-46a0-bf78-10d2cc6aedb2.png" style="width:125px;height:30px;margin:0px;border:0;outline:none;text-decoration:none" width="125" class="CToWUd"></a><a href="https://bohemiarealtygroup.us14.list-manage.com/track/click?u=a928f023b5eebaebc7bbb1de1&amp;id=cabf7bf56f&amp;e=43b77f1f1a" style="text-align:center;color:#656565;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://bohemiarealtygroup.us14.list-manage.com/track/click?u%3Da928f023b5eebaebc7bbb1de1%26id%3Dcabf7bf56f%26e%3D43b77f1f1a&amp;source=gmail&amp;ust=1515690009382000&amp;usg=AFQjCNFNavMj3ivPDdcBzUJm1xFu5l27EQ"><img align="none" height="30" src="https://ci3.googleusercontent.com/proxy/1f_IIGbIU9tjqwNejN3E0P5HUSHqkaJkyWNzpF7-Lq0CyxC8BCIJs8Zn0hvmvRB9FwwSKVIq6bgTuvFJLsLBjye5CQxUYuAiiteljYWcByTJhuW2MlLWqNkVqg7JPujkE8UQPqyUQqf-djRVViPP-g6IFBD8p6NUcKZuNyA=s0-d-e1-ft#https://gallery.mailchimp.com/a928f023b5eebaebc7bbb1de1/images/75c60f52-e802-4e9f-baa9-548dd4488320.png" style="width:125px;height:30px;margin:0px;border:0;outline:none;text-decoration:none" width="125" class="CToWUd"></a></div>

                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>



                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody>
                                                                                                                                                                                                        </table></td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>


                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </tbody></table>
                                                                                                                                                                                                        </center>
                                                                                                                                                                                                        <img src="https://ci4.googleusercontent.com/proxy/sQuCO4fW7dFS8xX_axgkRgaSSR7gegwhjXRD9BP6E8eohw7HHMFyqtLRTiJ_ni8Q4ngfL55yUYvffiR7-PSQsQYTsIdTnoVWwShtbaqQjbjUCyQIce0APxb9wHBwHLbQplrdpqsZGYCbPFiSCdl1bo8teG8aWhU_E5_iBIFnZCLVVG2LvBXHyvWSxA=s0-d-e1-ft#https://bohemiarealtygroup.us14.list-manage.com/track/open.php?u=a928f023b5eebaebc7bbb1de1&amp;id=5d9198a6eb&amp;e=43b77f1f1a" height="1" width="1" class="CToWUd"></div><div class="yj6qo"></div><div class="adL">
                                                                                                                                                                                                        </div></div>



                                                                                                                                                                                                        <!-- Full Bleed Background Section : BEGIN -->
                                                                                                                                                                                                        <table role="presentation" bgcolor="#505050" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                        <td valign="top" align="center">
                                                                                                                                                                                                        <div style="max-width: 600px; margin: auto;" class="email-container">
                                                                                                                                                                                                        <!--[if mso]>
                                                                                                                                                                                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" align="center">
                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                        <td>
                                                                                                                                                                                                        <![endif]-->
                                                                                                                                                                                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                        <td style="padding: 40px; text-align: center; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #ffffff;">
                                                                                                                                                                                                        <a href="https://bohemiarealtygroup.com/">
                                                                                                                                                                                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto; " class="email-container">
                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                        <td style="padding: 10px 0; text-align: center">
                                                                                                                                                                                                        <img src="../web/assets/img/logo/footer-logo.png" width="200" height="50" alt="alt_text" border="0" style="height: auto; background: #505050; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </table>
                                                                                                                                                                                                        </a>
                                                                                                                                                                                                        <br>Bohemia Harlem - 2101 Frederick Douglass Blvd., New York, NY 10026 <br> Phone: 212.663.6215
                                                                                                                                                                                                        <br>Bohemia Washington Heights - 3880 Broadway, New York, NY 10032 <br> Phone: 646.661.1579
                                                                                                                                                                                                        <br><br>
                                                                                                                                                                                                        <br>Email: info@bohemiarealtygroup.com
                                                                                                                                                                                                        <br>Fax: 866.598.1059.
                                                                                                                                                                                                        <br><br>Copyright © 2017 Bohemia Realty Group LLC. All Rights Reserved.
                                                                                                                                                                                                        <br><br>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </table>
                                                                                                                                                                                                        <!--[if mso]>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </table>
                                                                                                                                                                                                        <![endif]-->
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                        </table>
                                                                                                                                                                                                        <!-- Full Bleed Background Section : END -->

                                                                                                                                                                                                        </center>
                                                                                                                                                                                                        </body>
                                                                                                                                                                                                        </html>

