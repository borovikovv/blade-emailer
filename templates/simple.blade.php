<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Simple Email' }}</title>
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

        body {
            font-family: 'Trade Gothic LT', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            font-family: 'Canela', serif;
            font-weight: 300;
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
        }
        .highlight {
            background: #ecf0f1;
            padding: 15px;
            border-left: 4px solid #3498db;
            margin: 20px 0;
        }
        .highlight h3 {
            font-family: 'Canela', serif;
            font-weight: 400;
        }
        .button {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
            font-family: 'Trade Gothic LT', Arial, sans-serif;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ecf0f1;
            color: #7f8c8d;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $title ?? 'Hello World' }}</h1>
        
        <p>Hello {{ $name ?? 'there' }},</p>
        
        <p>{{ $message ?? 'This is a simple email template for testing purposes.' }}</p>
        
        @if(isset($features) && is_array($features))
        <div class="highlight">
            <h3>Features:</h3>
            <ul>
                @foreach($features as $feature)
                    <li>{{ $feature }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        @if(isset($ctaUrl) && isset($ctaText))
        <p>
            <a href="{{ $ctaUrl }}" class="button">{{ $ctaText }}</a>
        </p>
        @endif
        
        @if(isset($data) && is_array($data))
        <div class="highlight">
            <h3>Additional Data:</h3>
            <ul>
                @foreach($data as $key => $value)
                    <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <div class="footer">
            <p>Best regards,<br>{{ $sender ?? 'The Team' }}</p>
        </div>
    </div>
</body>
</html>
