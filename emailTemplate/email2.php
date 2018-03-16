<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <title>Customer Account Application Notification</title>

        <style type="text/css" media="screen">
            /* Linked Styles */
            body { padding:0 !important; margin:0 !important; display:block !important; -webkit-text-size-adjust:none; }
            a { color:#007bc5; text-decoration:underline }
            h2 a, .h2 a { color:#1e2735; text-decoration:none }
            .footer a { color:#99a7b5; text-decoration:underline }

            /* Campaign Monitor wraps the text in editor in paragraphs. In order to preserve design spacing we remove the padding/margin */
            p { padding:0 !important; margin:0 !important } 
            #content_box{
                border: 1px solid #ccc;
                box-shadow: 0 3px 2px 0 #ccc;
                margin: auto;
                width: 50%;
            }
            #content_box p{
                text-align: left;
                padding-left: 30px;
            }
            /*mobile
            /* Portrait and Landscape */
            @media only screen
            and (min-device-width: 220px)
            and (min-device-width: 320px) 
            and (max-device-width: 480px)
            and (-webkit-min-device-pixel-ratio: 2) {
                #content_box{
                    border: 1px solid #ccc;
                    box-shadow: 0 3px 2px 0 #ccc;
                    width: 100%;
                }             
            }
            /*tablets
               /* Portrait and Landscape */
            @media only screen 
            and (min-device-width: 768px) 
            and (max-device-width: 1024px) 
            and (-webkit-min-device-pixel-ratio: 1) {
                #content_box{
                    border: 1px solid #ccc;
                    box-shadow: 0 3px 2px 0 #ccc;
                    width: 100%;
                    bottom: 0px;
                }      

            }
        </style>
    </head>
    <body class="body" style="padding:0 !important; margin:0 auto !important; display:block !important; -webkit-text-size-adjust:none; ">
        <div style=" width: 100%;">
            <!--  Header -->
            <div style="width: 100%; background-color: #741D58;">
                <div style=" padding: 1% ; color:#FFF; font-family:sans-serif; font-size:22px; line-height:26px; text-align:center"><span>  Precious Metals International, Ltd.</span></div>

            </div>
            <!-- END Header -->
            <!-- Featured Content -->
            <div style="width: 100%; ">
                <div class="h1" style="padding: 2%;color:#ffffff; color: #741D58; font-family:sans-serif; font-size:26px; line-height:26px; text-align:center; font-weight:bold">
                    <div>Customer Account Application Notification</div>
                </div> 
            </div>
            <!-- END Featured Content -->
            <!-- Content -->
            <div style=" border: solid 2px rgba(100,100,100,.45); border-color: #741D58; ">
                <div class="h2" style=" padding-top: 2%;color:#1e2735; font-family:sans-serif; font-size:19px; line-height:23px; text-align:center; font-weight:bold">
                    <div> Account documents submitted online </div>
                </div>
                <div class="text" style="color:#666666; font-family:sans-serif; font-size:16px; line-height:18px; text-align:center">
                    <div id="content_box" style=" padding: 2%; ">
                        <p>
                            Account documents submitted online for <b style='color: rgb(116,29,90)'>".$r_user['prefix'].' '.$r_user['first_name'].' '.$r_user['middle_name'].' '.$r_user['last_name'].' '.$r_user['suffix']."</b>, a new <b style='color: rgb(116,29,90)'>".$r_dealers['dealer_name']."</b> customer. <br/>
                            <a href='https://customers.pmilimited.com/account/pdf_files/".$r_user_pdfpath."'style="border-bottom: solid 1px rgb(116,29,90);padding: 0 .4em 0 .4em;color: rgb(116,29,90);text-decoration: none;font-weight:600;">
                               Download Customer's Account Documents in PDF File
                        </a><br/>
                        <a href='https://customers.pmilimited.com/admin_platform.php'style=" border-bottom: solid 1px rgb(116,29,90); padding: 0 .4em 0 .4em;color: rgb(116,29,90);text-decoration: none;font-weight:600;">Go to the Administration Panel.</a>
                    </p>
                </div>
            </div>

            <div class="img" style=" font-size:0pt; line-height:0pt; text-align:center">
                <img src="images/separator1.jpg" alt="" border="0" width="50%" height="3" />
            </div>
            <div style="width: 100%">
                <div class="img" style=" padding: 1%;font-size:0pt; line-height:0pt; text-align:center"><a href="#" target="_blank"><img src="images/adminpanelbtn.png" alt="" border="0" width="190" height="40" /></a></div>
            </div>

        </div>
        <!-- END Content -->
        <!-- Bottom Content -->
        <table style="width: 100%; text-align: center;">
            <tr>
                <td class="h1" style="padding: 2%;color:#741D58; font-family:sans-serif; font-size:18px; line-height:26px; text-align:center; font-weight:bold">
                    <div><span>  This is a Secure Application.</span></div>
                </td>
            </tr>
        </table>
        <!-- END Bottom Content -->
        <!-- Footer -->
        <div style="width: 100%; padding: 1%; background-color: #350132; text-align: center;">
            <div class="footer" style="color:#FFF; font-family: sans-serif; font-size:11px; line-height:17px; text-align:center">
                <p>This email is © 2002, " . date('Y') . " Precious Metals International, Ltd. All Rights Reserved.<br> 
                        Dr. Roys Drive, DMS House, Ground Floor | PO Box 1103 | George Town, KY1-1102, Grand Cayman, KY<br>
                            +1 866 764 2878 toll-free | +44 800 014 8806 toll-free | +1 345 749 8305 local</p>
                            </div>
                            </div>

                            <!-- END Footer -->
                            </div>
                            </body>
                            </html>