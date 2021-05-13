<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {!! SEO::generate(true) !!}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased text-gray-600 relative">
<div class="grid justify-center content-center min-h-screen">
    <div class="relative">
        <div class="text-center font-semibold text-xl" id="version">
            {{ $trackerData->version }}
        </div>
        <div class="text-9xl md:text-[300px] font-light" id="percent">
            {{ $trackerData->percent }}
        </div>
        <div class="text-center font-bold text-sm text-gray-500" id="time">

        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    const timeDom = document.getElementById('time');

    function getTimeString() {
        return luxon.DateTime.now().toLocaleString(luxon.DateTime.DATETIME_MED_WITH_SECONDS);
    }

    timeDom.innerText = getTimeString();
    setInterval(() => {
        timeDom.innerText = getTimeString();
    }, 1000);

    setInterval(() => {
        fetch(`/refresh`).then(res => res.json()).then(res => {
            document.getElementById('version').innerText = res.data.version;
            document.getElementById('percent').innerText = res.data.percent;
        });
    }, 10000);

</script>
</body>
</html>
