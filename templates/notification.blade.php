<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'Notification' }}</title>
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
        .header { background: #{{ $color ?? 'f4f4f4' }}; padding: 20px; text-align: center; }
        .header h1 { font-family: 'Canela', serif; font-weight: 300; }
        .content { padding: 20px; }
        .footer { background: #f4f4f4; padding: 20px; text-align: center; font-size: 12px; }
        .alert { background: #fff3cd; border: 1px solid #ffeaa7; padding: 15px; border-radius: 5px; margin: 15px 0; }
        .success { background: #d4edda; border-color: #c3e6cb; }
        .warning { background: #fff3cd; border-color: #ffeaa7; }
        .error { background: #f8d7da; border-color: #f5c6cb; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $title ?? 'Notification' }}</h1>
        </div>
        
        <div class="content">
            <p>Hello {{ $name ?? 'there' }},</p>
            
            <div class="alert {{ $type ?? '' }}">
                <p>{{ $message ?? 'You have a new notification.' }}</p>
            </div>
            
            @if(isset($details) && is_array($details))
                <h3>Details:</h3>
                <ul>
                    @foreach($details as $key => $value)
                        <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</li>
                    @endforeach
                </ul>
            @endif
            
            @if(isset($actionUrl) && isset($actionText))
                <p style="text-align: center; margin: 30px 0;">
                    <a href="{{ $actionUrl }}" style="display: inline-block; background: #007cba; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">{{ $actionText }}</a>
                </p>
            @endif
            
            @if(isset($timestamp))
                <p><small>Time: {{ $timestamp }}</small></p>
            @endif
            
            <p>Best regards,<br>
            {{ $sender ?? 'System' }}</p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ $company ?? 'Our Service' }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
