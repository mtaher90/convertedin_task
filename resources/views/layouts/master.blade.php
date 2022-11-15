<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body class="bg-light">

    <div class="container">
        <main>
            @yield('content')
        </main>

    </div>
    @include('layouts.script')
</body>
</html>
