<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- The CSS stylesheet which will be inlined. -->
    <link rel="stylesheet" type="text/css" href="{{ vite('css/mail.css') }}">

    @if($asunto = $attributes->get('subject'))
        <title>{{ $asunto }}</title>
    @endif
</head>
<body>
    <div class="w-full h-full px-8 py-12">
        {{ $slot }}
    </div>
</body>
</html>
