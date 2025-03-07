<x-layout>
      <div class="container my-5 ">
        <x-card shadow="shadow p-2">
            <h4 style="color: #847577;text-align:center;">Edit Task</h4>
        </x-card>
    </div>

     <div class="container">
        <x-card style="width: rem;" shadow="shadow p-3">
            <form action="/update/{{$task->id}}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$task->title}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" >{{$task->description}}</textarea>
                </div>
                <button type="submit" class="btn" style="background-color: #A6A2A2;color:#E5E6E4;" type="submit">Update Task</button>
            </form>
        </x-card>
    </div>
</x-layout>