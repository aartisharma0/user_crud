<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Leave Type</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4 text-danger text-center">Manage Leave Type</h6>
                    <div class="mb-4 text-end">
                            <a class="btn btn-primary mt-4 " href="{{ route('type.create') }}">Add <i class=" fa-fa plus"></i></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S.No.</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $leave)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td scope="row">{{ $leave->type }}</td>
                                        <td scope="row" class="d-flex">
                                            @if($leave->trashed())
                                            <!-- Restore icon when the record is trashed -->
                                            <a href="{{ route('type.restore', $leave->id) }}" data-bs-toggle="tooltip" title="Restore Leave Type" class="text-success btn">
                                                <i class="fas fa-trash-restore"></i>
                                            </a>
                                        @else
                                            <!-- Edit and Delete icons when the record is not trashed -->
                                            <a href="{{ route('type.edit', $leave->id) }}" data-bs-toggle="tooltip" title="Edit Leave Type"
                                               class="text-primary btn"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('type.destroy', $leave->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn  text-danger" data-bs-toggle="tooltip" title="Move to Trash">
                                                    <i class="fas fa-trash-alt" ></i>
                                                </button>
                                            </form>
                                        @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
