<x-layout>
    <div class="container my-5 ">
        <x-card shadow="shadow p-2">
            <h4 style="color: #847577;text-align:center;">Create New Task</h4>
        </x-card>
    </div>

    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="container d-flex flex-wrap justify-content-center my-3 text-danger">
        {{$error}}
    </div>

    @endforeach
    @endif

    <div class="container">
        <x-card style="width: rem;" shadow="shadow p-3">
            <form action="/new" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter task title">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                </div>
                <button type="submit" class="btn" style="background-color: #A6A2A2;color:#E5E6E4;" type="submit">Add Task</button>
            </form>
        </x-card>
    </div>

</x-layout>
