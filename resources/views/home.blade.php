<body>
<div class="container">
    <div class="content">
        <div class="title">Laravel 5</div>
        Your are logged in
        <div>
            <h4>Your name is {{ Auth::user()->name }}</h4>
            <h4>Your name is {{ Auth::user()->email }}</h4>
            <img src="{{ Auth::user()->avatar }}" height="200" width="200" />
        </div>

    </div>
</div>
</body>