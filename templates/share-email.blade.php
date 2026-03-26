
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link defer href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Air request {{ $data['request_id'] ?? 'N/A' }}</title>
    <style>
        @font-face {
            font-family: 'Canela';
            src: url('./fonts/Cenela/Canela-Regular.woff2') format('woff2'),
                url('./fonts/Cenela/Canela-Regular.woff') format('woff'),
                url('./fonts/Cenela/Canela-Regular.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Canela';
            src: url('./fonts/Cenela/canela-Light.woff2') format('woff2'),
                url('./fonts/Cenela/canela-Light.woff') format('woff'),
                url('./fonts/Cenela/canela-Light.ttf') format('truetype');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Canela';
            src: url('./fonts/Cenela/canela-Bold.woff2') format('woff2'),
                url('./fonts/Cenela/canela-Bold.woff') format('woff'),
                url('./fonts/Cenela/canela-Bold.ttf') format('truetype');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Canela Deck Trial';
            src: url('./fonts/Cenela/Canela-Regular.woff2') format('woff2'),
                url('./fonts/Cenela/Canela-Regular.woff') format('woff'),
                url('./fonts/Cenela/Canela-Regular.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Canela Deck Trial';
            src: url('./fonts/Cenela/canela-Light.woff2') format('woff2'),
                url('./fonts/Cenela/canela-Light.woff') format('woff'),
                url('./fonts/Cenela/canela-Light.ttf') format('truetype');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Canela Deck Trial';
            src: url('./fonts/Cenela/canela-Bold.woff2') format('woff2'),
                url('./fonts/Cenela/canela-Bold.woff') format('woff'),
                url('./fonts/Cenela/canela-Bold.ttf') format('truetype');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Trade Gothic LT';
            src: url('./fonts/TradeGothic/TradeGothicLT.woff2') format('woff2'),
                url('./fonts/TradeGothic/TradeGothicLT.woff') format('woff');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Trade Gothic LT';
            src: url('./fonts/TradeGothic/TradeGothicLT-Light.woff2') format('woff2'),
                url('./fonts/TradeGothic/TradeGothicLT-Light.woff') format('woff');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Trade Gothic LT';
            src: url('./fonts/TradeGothic/TradeGothicLT-Bold.woff2') format('woff2'),
                url('./fonts/TradeGothic/TradeGothicLT-Bold.woff') format('woff');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }

        /* Extended width */
        @font-face {
            font-family: 'Trade Gothic LT Extended';
            src: url('./fonts/TradeGothic/TradeGothicLT-Extended.woff2') format('woff2'),
                url('./fonts/TradeGothic/TradeGothicLT-Extended.woff') format('woff');
            font-weight: 400;
            font-style: normal;
            font-stretch: expanded; /* some clients ignore */
            font-display: swap;
        }

        /* Pro set (keep separate families so you can target them if needed) */
        @font-face {
            font-family: 'Trade Gothic LT Pro';
            src: url('./fonts/TradeGothic/TradeGothicLTPro_1.woff2') format('woff2'),
                url('./fonts/TradeGothic/TradeGothicLTPro_1.woff') format('woff');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Trade Gothic LT Pro';
            src: url('./fonts/TradeGothic/TradeGothicLTPro-Light_1.woff2') format('woff2'),
                url('./fonts/TradeGothic/TradeGothicLTPro-Light_1.woff') format('woff');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Trade Gothic LT Pro Condensed';
            src: url('./fonts/TradeGothic/TradeGothicLTPro-BdCn20.woff2') format('woff2'),
                url('./fonts/TradeGothic/TradeGothicLTPro-BdCn20.woff') format('woff'),
                url('./fonts/TradeGothic/TradeGothicLTPro-BdCn20.ttf') format('truetype');
            font-weight: 700;
            font-style: normal;
            font-stretch: condensed; /* some clients ignore */
            font-display: swap;
        }
        * {
            box-sizing: border-box;
        }

        .body-container {
            width: 530px;
            max-width: 530px;
            margin: 0 auto;
            padding: 32px 24px;
            font-family: 'Canela Deck Trial', serif;
            background-color: #F2F6FC;
        }

        @media screen and (max-width: 600px) {
            .body-container {
                width: 100%;
                padding: 28px 24px;
                max-width: 100%;
            }
        }

        h1 {
            color: #212529;
            text-align: left;
            font-family: 'Canela';
            font-size: 32px;
            font-style: normal;
            font-weight: 300;
            line-height: 130%;
            letter-spacing: 0.6px;
        }

        .info-text {
            color: #495057;
            font-family: 'Inter', sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
            letter-spacing: 0px;
        }
    </style>
</head>

<body style="-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;">
    <meta name="x-apple-disable-message-reformatting">

    <center style="width:100%; table-layout:fixed;" role="article" aria-roledescription="email">
        <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
                <td>
                    <table align="center" role="presentation" cellpadding="0" cellspacing="0" border="0" width="530" style="width: 530px; max-width: 530px; background:#ffffff;">
                        <tr>
                            <td style="padding:40px 35px; font-family:'Inter', Arial, sans-serif; color:#212529;">

                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td align="center">
                                            <img src="https://smartflyer-cdn.s3.us-east-1.amazonaws.com/emails/society/images/sf-logo.png"
                                                width="36" height="36" alt="SF" style="display:block; text-align:center; float:center; width:36px; height:36px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <div style="height:10px; line-height:10px; font-size:0;">&nbsp;</div>
                                            <p style="font-family:'Canela Deck Trial', serif; font-size:16px; line-height:1; color:#0F3D8B; text-align:center; margin:0;">
                                                SMARTFLYER
                                            </p>
                                            <div style="height:4px; line-height:4px; font-size:0;">&nbsp;</div>
                                            <p style="font-family:'Canela Deck Trial', serif; font-size:16px; line-height:1; color:#0F3D8B; text-align:center; margin:0;">
                                                SOCIETY
                                            </p>
                                        </td>
                                    </tr>
                                </table>


                                <div style="height:40px; line-height:40px; font-size:0;">&nbsp;</div>

                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" align="center"
                                    style="background:#F2F6FC; padding:0px 24px; border-top-left-radius:12px; border-top-right-radius:12px;">
                                    <tr>
                                        <td>
                                            <h1 style="text-align:center; font-family:'Canela Deck Trial', serif; font-size:28px; font-weight:300;">
                                                Please complete your client profile and payment details.
                                            </h1>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="text-align:center;">
                                                <span style="text-align:center; font-weight:400; font-color: #212529; font-size:18px;">Hi [Client Name],<br></span>
                                            </p>
                                            <p>
                                                <span style="text-align:left; margin-top:8px;" class="info-text">
                                                    Thank you in advance for completing this form — this will help me take care of everything for your trip.
                                                    If you have any questions, feel free to reach out anytime.
                                                    Best,
                                                    <strong>[Advisor Name]</strong>
                                                </span>
                                            </p>
                                        </td>
                                    </tr>
                                </table>

                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; background-color:#F2F6FC; border-bottom-left-radius:12px; border-bottom-right-radius:12px; margin:0; padding:0px 24px; width:100%;">
                                    <tr>
                                        <td align="center" style="padding:40px 16px;">
                                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; width:100%; max-width:480px;">
                                                <tr>
                                                    <td style="padding:0 0 8px 0;">
                                                        <p style="margin:0; font-family:'Inter', Arial, sans-serif; font-size:14px; font-weight:500; font-style:normal; line-height:150%; color:#212529;">
                                                            Please use the following password to access the forms:
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:0 0 24px 0;">
                                                        <table
                                                            role="presentation"
                                                            width="100%"
                                                            cellpadding="0"
                                                            cellspacing="0"
                                                            border="0"
                                                            style="
                                                                border-collapse:separate;
                                                                width:100%;
                                                                background:#F8F9FA;
                                                                border:1px solid #CED4DA;
                                                            "
                                                        >
                                                            <tr>
                                                                <td
                                                                    align="center"
                                                                    valign="middle"
                                                                    style="
                                                                        padding:20px 12px;
                                                                        font-family:Inter, Arial, sans-serif;
                                                                        font-size:18px;
                                                                        font-weight:600;
                                                                        line-height:20px;
                                                                        color:#212529;
                                                                        white-space:nowrap;
                                                                    "
                                                                >
                                                                    <span>PASSWORD</span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; width:100%;">
                                                            <tr>
                                                                <td
                                                                    align="center"
                                                                    valign="middle"
                                                                    height="42"
                                                                    style="
                                                                        height:42px;
                                                                        background:#0F3D8B;
                                                                        border-radius:6px;
                                                                        mso-padding-alt:9px 22px;
                                                                    "
                                                                >
                                                                    <a
                                                                        href="#"
                                                                        style="
                                                                            display:inline-block;
                                                                            font-family:Arial, Helvetica, sans-serif;
                                                                            font-size:14px;
                                                                            line-height:24px;
                                                                            font-weight:400;
                                                                            color:#ffffff;
                                                                            text-decoration:none;
                                                                            padding:9px 22px;
                                                                        "
                                                                    >
                                                                        Complete Profile &rarr;
                                                                    </a>
                                                                </td>
                                                                <td width="16" style="width:16px; font-size:0; line-height:0;">
                                                                    &nbsp;
                                                                </td>
                                                                <td
                                                                    align="center"
                                                                    valign="middle"
                                                                    height="42"
                                                                    style="
                                                                        height:42px;
                                                                        background:#0F3D8B;
                                                                        border-radius:6px;
                                                                        mso-padding-alt:9px 22px;
                                                                    "
                                                                >
                                                                    <a
                                                                        href="#"
                                                                        style="
                                                                            display:inline-block;
                                                                            font-family:Arial, Helvetica, sans-serif;
                                                                            font-size:14px;
                                                                            line-height:24px;
                                                                            font-weight:400;
                                                                            color:#ffffff;
                                                                            text-decoration:none;
                                                                            padding:9px 22px;
                                                                        "
                                                                    >
                                                                        Enter Card Details &rarr;
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <div style="height:40px; line-height:40px; font-size:0;">&nbsp;</div>
                                <p style="font-family:'Inter', Arial, sans-serif; font-size:16px; line-height:150%; color:#212529; margin:0; text-align:left;">
                                    This secure form link is valid for <strong>1 week.</strong> <br />
                                    Please complete and submit the form within this time frame. <br /> 
                                    Thank you, <br /> 
                                    The Society Team
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>