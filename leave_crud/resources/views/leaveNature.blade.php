<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leave Nature</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ $url }}" method="post">
                    @if ($method === 'put')
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <h3>{{ $title }}</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nature" id="floatingInput"
                                value="{{ $leaves->nature ?? null }}" placeholder="Leave Nature" required>
                            <label for="floatingInput">Leave Nature</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" name="deduction"
                                value="{{ $leaves->deduction ?? null }}" id="floatingInput" placeholder="Deduction"
                                required>
                            <label for="floatingPassword">Deduction</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <button type="submit"
                                class="btn btn-primary justify-content-center py-3 w-25 mb-4">{{ $button }}</button>
                            <div class="d-flex align-items-center justify-content-center mb-3">

                            </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
