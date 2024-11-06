<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- MDB Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
</head>
<body style="background-color: #123451;">
    <div class="container w-35 mt-5">
        <div class="card shadow-sm">
            <h3 class="card-header text-center">TO DO LIST</h3>
            <form action="{{ route('store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="input-group p-3">
                    <input type="text" name="content" class="form-control" placeholder="Tambahkan List Anda" />
                    <button type="submit" class="btn btn-dark btn-sm px-4">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </form>
            <!-- If Task List Code Starts -->
            @if(count($todolists))
                <ul class="list-group list-group-flush mt-4">
                    @foreach($todolists as $todolist)
                        <li class="list-group-item">
                            <form action="{{ route('update', $todolist->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <input type="text" name="content" value="{{ $todolist->content }}" class="form-control d-inline" style="width: 70%;" />
                                <button type="submit" class="btn btn-pink btn-sm">
                                    <i style="color: blue;" class="fas fa-save"></i>
                                </button>
                            </form>
                            <form action="{{ route('destroy', $todolist->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-white btn-sm float-end">
                                    <i style="color: red;" class="fas fa-trash"></i>
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center mt-3">No Tasks!</p>
            @endif
            <!-- If Task List Code Ends -->
        </div>
        @if(count($todolists))
            <div class="card-footer text-center">
                You have {{ count($todolists) }} pending Tasks
            </div>
        @endif
    </div>  
</body>
</html>
