<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome to {{ $company ?? 'Our Service' }}</title>
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

        body { font-family: 'Trade Gothic LT', Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #f4f4f4; padding: 20px; text-align: center; }
        .header h1 { font-family: 'Canela', serif; font-weight: 300; }
        .content { padding: 20px; }
        .footer { background: #f4f4f4; padding: 20px; text-align: center; font-size: 12px; }
        .button { display: inline-block; background: #007cba; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-family: 'Trade Gothic LT', Arial, sans-serif; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to {{ $company ?? 'Our Service' }}!</h1>
        </div>
        
        <div class="content">
            <p>Hello {{ $name ?? 'there' }},</p>
            
            <p>Thank you for joining {{ $company ?? 'our service' }}! We're excited to have you on board.</p>
            
            @if(isset($features) && is_array($features))
                <h2>Here's what you can do:</h2>
                <ul>
                    @foreach($features as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            @endif
            
            @if(isset($nextSteps) && is_array($nextSteps))
                <h2>Next Steps:</h2>
                <ol>
                    @foreach($nextSteps as $step)
                        <li>{{ $step }}</li>
                    @endforeach
                </ol>
            @endif
            
            @if(isset($ctaUrl) && isset($ctaText))
                <p style="text-align: center; margin: 30px 0;">
                    <a href="{{ $ctaUrl }}" class="button">{{ $ctaText }}</a>
                </p>
            @endif
            
            <p>If you have any questions, feel free to reach out to our support team.</p>
            
            <p>Best regards,<br>
            The {{ $company ?? 'Our Service' }} Team</p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ $company ?? 'Our Service' }}. All rights reserved.</p>
            @if(isset($unsubscribeUrl))
                <p><a href="{{ $unsubscribeUrl }}">Unsubscribe</a></p>
            @endif
        </div>
    </div>
</body>
</html>
