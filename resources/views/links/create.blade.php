<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create short link</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-dark color-white">
<main>
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('link.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="full-link" class="form-label">Enter full link</label>
                        <input type="text" class="form-control" id="full-link" name="full_link">
                    </div>
                    <button type="submit" class="btn btn-primary">Short it!</button>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>
