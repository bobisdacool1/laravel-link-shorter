<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create short link</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-dark text-white">
<main>
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-6">
                <h1 class="mb-5">The best link shorter service</h1>
                <form action="{{route('link.store')}}" method="post" id="create-shortened-link"
                      name="create-shortened-link">
                    @csrf
                    <div class="mb-3">
                        <label for="full_link" class="form-label">Enter full link</label>
                        <input type="text" class="form-control" id="full_link" name="full_link" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Short it!</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal text-dark" id="modal-link-created" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close">Cool</button>
                    </div>
                @endif
            </div>
        </div>
    </div>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
</body>
</html>
