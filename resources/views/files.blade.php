<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>WSF</title>
    </head>
    <body class="bg-dark text-white">
        <div class="container vh-100 w-100">
            <div class="row justify-content-center h-100">
                <div class="col-8 order-2 col-md-3 offset-md-1 my-md-auto text-center text-md-start">
                    <p class="mb-0">Views : <strong>{{ $file->views }}</strong></p>
                    <p class="mb-0">Download : <strong>{{ $file->downloads }}</strong></p>
                    <p>File : <strong>{{ $file->filename }}</strong></p>
                    <a href="{{ route('downloads', [$file->id]) }}" class="btn btn-primary mb-3">DOWNLOAD</a>
                    <div class="input-group input-group-sm">
                        <input readonly type="text" class="form-control" id="copyUrl" value="{{ route('files', [$file->id]) }}">
                        <button class="btn btn-outline-secondary" id="copyBtn" type="button">Copy</button>
                    </div>
                </div>
                <div class="col-md-6 order-1 order-md-2 my-auto mb-4 my-md-auto text-center">
                    <img src="{{ asset('images/wsf-logo.svg') }}" alt="logo wsf">
                    <p>Wegodev Sharing Files</p>
                </div>
            </div>
        </div>
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
</html>