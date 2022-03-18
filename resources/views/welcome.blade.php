<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>JAE ShortURL</title>
    </head>
    <body>
        <div class="container my-5">
            <div class="row">
                <h1 class="my-4 fs-4 fw-bold text-center">JAE Shortener</h1>
                
                <div class="input-group mb-3">
                    <input type="text" name="url" class="form-control" placeholder="URL Shortener">                
                </div>
                <div class="text-center">
                    <a class="btn btn-outline-secondary btn-lg me-1" href="{{ route('login') }}">Shorten</a>
                    <a class="btn btn-outline-primary btn-lg ms-1" href="{{ route('register') }}">Register</a>
                </div>
                                
            </div>
            <br />

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>@2022/03/15-18</strong> | Created by Udornpit Saengdee (Jae).
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>