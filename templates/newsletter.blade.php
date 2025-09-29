<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'Newsletter' }}</title>
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
        .article { margin: 20px 0; padding: 15px; border-left: 3px solid #007cba; }
        .article h3 { margin-top: 0; color: #007cba; font-family: 'Canela', serif; font-weight: 400; }
        .button { display: inline-block; background: #007cba; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-family: 'Trade Gothic LT', Arial, sans-serif; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $title ?? 'Newsletter' }}</h1>
            <p>{{ $date ?? date('F j, Y') }}</p>
        </div>
        
        <div class="content">
            <p>Hello {{ $name ?? 'there' }},</p>
            
            <p>{{ $intro ?? 'Here are the latest updates and news from our team.' }}</p>
            
            @if(isset($articles) && is_array($articles))
                @foreach($articles as $article)
                    <div class="article">
                        <h3>{{ $article['title'] ?? 'Article Title' }}</h3>
                        <p>{{ $article['summary'] ?? 'Article summary...' }}</p>
                        @if(isset($article['url']))
                            <p><a href="{{ $article['url'] }}" class="button">Read More</a></p>
                        @endif
                    </div>
                @endforeach
            @endif
            
            @if(isset($highlights) && is_array($highlights))
                <h2>Highlights</h2>
                <ul>
                    @foreach($highlights as $highlight)
                        <li>{{ $highlight }}</li>
                    @endforeach
                </ul>
            @endif
            
            @if(isset($ctaUrl) && isset($ctaText))
                <p style="text-align: center; margin: 30px 0;">
                    <a href="{{ $ctaUrl }}" class="button">{{ $ctaText }}</a>
                </p>
            @endif
            
            <p>Thank you for being part of our community!</p>
            
            <p>Best regards,<br>
            The {{ $company ?? 'Our Service' }} Team</p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ $company ?? 'Our Service' }}. All rights reserved.</p>
            @if(isset($unsubscribeUrl))
                <p><a href="{{ $unsubscribeUrl }}">Unsubscribe</a> | <a href="{{ $preferencesUrl ?? '#' }}">Update Preferences</a></p>
            @endif
        </div>
    </div>
</body>
</html>
