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
          color:  #212529;
          text-align: left;
          font-family: 'Canela';
          font-size: 32px;
          font-style: normal;
          font-weight: 300;
          line-height: 130%;
          letter-spacing: 0.6px;
        }

        .info-text {
          color:  #495057;
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
            <table align="center" role="presentation" cellpadding="0" cellspacing="0" border="0" width="530" 
                   style="width: 530px; max-width: 530px; background:#ffffff;">
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
                         style="background:#F2F6FC; padding:0px 24px; border-top-left-radius:12px; border-top-right-radius:12px; text-align:center;">
                    <tr>
                      <td>
                        <h1 style="text-align: center;">
                          Flight booking request<br>
                          {{ $data['request_id'] ?? 'N/A' }} {{ $data['trip_type'] ?? 'N/A' }}
                        </h1>
                      </td>
                    </tr>
                    <div style="height:28px; line-height:28px; font-size:0;">&nbsp;</div>
                    <tr>
                      <td>
                        <p>
                          <span style="text-align: center; font-weight: 400; font-color: #212529; font-size: 18px;">Hello Air Team,<br></span>
                          <span style="margin-top: 8px;" class="info-text">Agent {{ $data['agent']['name'] ?? 'N/A' }} ({{ $data['agent']['email'] ?? 'N/A' }}) has been submitting
                          a new air request. Here is a detailed resume of the needs.</span>
                        </p>
                      </td>
                    </tr>
                    @if(isset($data['is_urgent']))
                    <tr>
                      <td>
                        <div style="height:16px; line-height:16px; font-size:0;">&nbsp;</div>
                        <table align="center" role="presentation" width="250px" cellpadding="0" cellspacing="0" style="max-width: 250px;">
                          <tr>
                            <td style="border-radius: 6px; border: 1px solid #FFC107; background: #FFF3CD; padding: 8px 12px;" align="center">
                              <img src="urgent.png" width="20" height="20" alt="Urgent" style="display:inline-block; vertical-align:middle; margin-right:8px;">
                              <span style="font-family:'Inter', Arial, sans-serif; font-size:16px; line-height:150%; color:#212529; margin:0; font-weight:700; vertical-align:middle;">URGENT REQUEST</span>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    @endif
                  </table>
                  <!-- Passenger information -->
                  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" align="center"
                    style="background:#F2F6FC; padding: 0px 24px 24px 24px; text-align:center;">
                    <tr>
                      <td colspan="2">
                        <p style="color: #212529; font-family: 'Inter', sans-serif; font-size: 18px; font-style: normal; font-weight: 500; line-height: 150%; letter-spacing: 0px; margin: 30px 0 10px 0; text-align: left;">Passenger information</p>
                      </td>
                    </tr>
                    <tr>
                      <td  width="40%">
                        <p style="float: left; color: #212529; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 500; letter-spacing: 0px; margin: 12px 0 0 0;">Passenger name:</p>
                      </td>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 12px 0 0 0;">{{ $data['passenger']['name'] ?? 'N/A' }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p style="float: left; color: #212529; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 500; letter-spacing: 0px; margin: 12px 0 0 0;">Document:</p>
                      </td>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 12px 0 0 0;">{{ $data['passenger']['document'] ?? 'N/A' }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p style="float: left; color: #212529; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 500; letter-spacing: 0px; margin: 12px 0 0 0;">Date of birth:</p>
                      </td>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 12px 0 0 0;">{{ $data['passenger']['date_of_birth'] ?? 'N/A' }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p style="float: left; color: #212529; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 500; letter-spacing: 0px; margin: 12px 0 0 0;">Email:</p>
                      </td>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 12px 0 0 0;">{{ $data['passenger']['email'] ?? 'N/A' }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td> 
                        <p style="float: left; color: #212529; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 500; letter-spacing: 0px; margin: 12px 0 0 0;">Phone:</p>
                      </td>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 12px 0 0 0;">{{ $data['passenger']['phone'] ?? 'N/A' }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <div style="height:1px; line-height:1px; background: #E9ECEF; width: 100%; margin: 20px 0 0 0;">&nbsp;</div>
                      </td>
                    </tr>
                  </table>
                  <!-- Trip overview  -->
                  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" align="center"
                    style="background:#F2F6FC; padding: 24px; text-align:center;">
                    <tr>
                      <td colspan="2">
                        <p style="color: #212529; font-family: 'Inter', sans-serif; font-size: 18px; font-style: normal; font-weight: 500; line-height: 150%; letter-spacing: 0px; margin: -30px 0 10px 0; text-align: left;">Trip overview</p>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <p style="text-align: left;">
                          <span style="color: #062060; font-family: 'Inter', sans-serif; font-size: 18px; font-style: normal; font-weight: 600; line-height: 150%; letter-spacing: 0px; ">Flight 1</span><span style="margin-left: 10px; color: #062060;">|</span>
                          <span style="font-weight: 400;">{{ isset($data['trip_overview'][0]['from']) ? implode(', ', $data['trip_overview'][0]['from']) : 'N/A' }} → {{ isset($data['trip_overview'][0]['to']) ? implode(', ', $data['trip_overview'][0]['to']) : 'N/A' }}</span>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td width="40%">
                        <p style="float: left; color: #212529; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 500; letter-spacing: 0px; margin: 12px 0 0 0;">From:</p>
                      </td>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 12px 0 0 0;">{{ isset($data['trip_overview'][0]['from']) ? implode(', ', $data['trip_overview'][0]['from']) : 'N/A' }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p style="float: left; color: #212529; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 500; letter-spacing: 0px; margin: 12px 0 0 0;">To:</p>
                      </td>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 12px 0 0 0;">{{ isset($data['trip_overview'][0]['to']) ? implode(', ', $data['trip_overview'][0]['to']) : 'N/A' }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p style="float: left; color: #212529; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 500; letter-spacing: 0px; margin: 12px 0 0 0;">Date:</p>
                      </td>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 12px 0 0 0;">{{ $data['trip_overview'][0]['date'] ?? 'N/A' }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p style="float: left; color: #212529; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 500; letter-spacing: 0px; margin: 12px 0 0 0;">Departure time:</p>
                      </td>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 12px 0 0 0;">{{ $data['trip_overview'][0]['departure_time_range'] ?? 'N/A' }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td> 
                        <p style="float: left; color: #212529; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 500; letter-spacing: 0px; margin: 12px 0 0 0;">Preferred cabin:</p>
                      </td>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 12px 0 0 0;">{{ isset($data['trip_overview'][0]['preferred_cabin']) ? implode(', ', $data['trip_overview'][0]['preferred_cabin']) : 'N/A' }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p style="float: left; color: #212529; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 500; letter-spacing: 0px; margin: 12px 0 0 0;">Trip type:</p>
                      </td>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 12px 0 0 0;">{{ $data['trip_overview'][0]['trip_type'] ?? 'N/A' }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <div style="height:1px; line-height:1px; background: #E9ECEF; width: 100%; margin: 20px 0 0 0;">&nbsp;</div>
                      </td>
                    </tr>
                  </table>
                  <!-- Travel preferences -->
                  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" align="center"
                    style="background:#F2F6FC; padding: 24px; text-align:center;">
                    <tr>
                      <td colspan="2">
                        <p style="color: #212529; font-family: 'Inter', sans-serif; font-size: 18px; font-style: normal; font-weight: 500; line-height: 150%; letter-spacing: 0px; margin: -30px 0 10px 0; text-align: left;">Travel preferences</p>
                      </td>
                    </tr>
                    <tr>
                      <td width="40%">
                        <p style="float: left; color: #212529; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 500; letter-spacing: 0px; margin: 12px 0 0 0;">Pricing quote:</p>
                      </td>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 12px 0 0 0;">{{ $data['travel_preferences']['pricing_quote'] ?? 'N/A' }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p style="float: left; color: #212529; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 500; letter-spacing: 0px; margin: 12px 0 0 0;">Airlines:</p>
                      </td>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 12px 0 0 0;">{{ isset($data['travel_preferences']['airlines']) ? implode(', ', $data['travel_preferences']['airlines']) : 'N/A' }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p style="float: left; color: #212529; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 500; letter-spacing: 0px; margin: 12px 0 0 0;">Aircraft:</p>
                      </td>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 12px 0 0 0;">{{ isset($data['travel_preferences']['aircraft']) ? implode(', ', $data['travel_preferences']['aircraft']) : 'N/A' }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p style="float: left; color: #212529; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 500; letter-spacing: 0px; margin: 12px 0 0 0;">Requests:</p>
                      </td>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 12px 0 0 0;">{{ isset($data['travel_preferences']['requests']) ? implode(', ', $data['travel_preferences']['requests']) : 'N/A' }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <div style="height:1px; line-height:1px; background: #E9ECEF; width: 100%; margin: 20px 0 0 0;">&nbsp;</div>
                      </td>
                    </tr>
                  </table>

                  <!-- Special requests -->
                  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" align="center"
                    style="background:#F2F6FC; padding: 24px; text-align:center; min-width: 400px; width: 100%;">
                    <tr>
                      <td colspan="2">
                        <p style="color: #212529; font-family: 'Inter', sans-serif; font-size: 18px; font-style: normal; font-weight: 500; line-height: 150%; letter-spacing: 0px; margin: -30px 0 10px 0; text-align: left;">Special requests</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 0;">{{ isset($data['special_requests']) ? implode(', ', $data['special_requests']) : 'N/A' }}</p>
                      </td>
                      <td>
                        <p />
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <div style="height:1px; line-height:1px; background: #E9ECEF; width: 100%; margin: 20px 0 0 0;">&nbsp;</div>
                      </td>
                    </tr>
                  </table>

                  <!-- Documents -->
                  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" align="center"
                    style="background:#F2F6FC; padding: 24px; border-bottom-left-radius:12px; border-bottom-right-radius:12px; text-align:center;">
                    <tr>
                      <td colspan="2">
                        <p style="color: #212529; font-family: 'Inter', sans-serif; font-size: 18px; font-style: normal; font-weight: 500; line-height: 150%; letter-spacing: 0px; margin: -30px 0 10px 0; text-align: left;">Documents</p>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding: 10px; border-bottom: 1px solid #D9E2F3;">
                        <img src="https://icons.iconarchive.com/icons/praveen/minimal-outline/256/file-icon.png" width="20" height="20" alt="Document" style="display:inline-block; vertical-align:middle; margin-right:8px;">
                      </td>
                      <td style="padding: 10px; border-bottom: 1px solid #D9E2F3;">
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 0; vertical-align: bottom;">{{ $data['documents'][0]['name'] ?? 'N/A' }}</p>
                      </td>
                      <td style="padding: 10px; border-bottom: 1px solid #D9E2F3;">
                        <p style="text-align: left; color: #495057; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 0; vertical-align: bottom;">
                          @if(isset($data['documents']) && is_array($data['documents']))
                            @foreach($data['documents'] as $document)
                              @if(isset($document['primary']) && $document['primary'])
                                Primary
                                @break
                              @endif
                            @endforeach
                          @endif
                        </p>
                      </td>
                      <td style="padding: 10px; border-bottom: 1px solid #D9E2F3;">
                        <a href="{{ $data['documents'][0]['url'] ?? '#' }}" download style="text-align: right; color: #0F3D8B; font-family: 'Inter', sans-serif; font-size: 16px; font-style: normal; font-weight: 400; letter-spacing: 0px; margin: 0; text-decoration: none; display: inline-flex; align-items: flex-end; vertical-align: bottom;">
                          <img src="https://www.citypng.com/public/uploads/preview/download-downloading-save-black-icon-button-png-701751694964960mnimcmxgyh.png" width="20" height="20" alt="Document" style="display:inline-block; vertical-align:middle; margin-right:8px;">
                        </a>
                      </td>
                    </tr>
                  </table>


                  <div style="height:40px; line-height:40px; font-size:0;">&nbsp;</div>
                  <p style="font-family:'Inter', Arial, sans-serif; font-size:16px; line-height:150%; color:#212529; margin:0; text-align:left;">
                    Hello {{ $data['passenger']['name'] ?? 'Guest' }} from {{ $data['passenger']['email'] ?? 'Unknown Company' }},<br>
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