<x-layout>
    <div class="container d-flex flex-wrap justify-content-center my-5">
        <h2 style="color: #847577;text-align:center;">Register</h2>
    </div>

    <!--Validation erros -->
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="container d-flex flex-wrap justify-content-center my-3 text-danger">
        {{$error}}
    </div>
    @endforeach
    @endif

    <div class="container d-flex flex-wrap justify-content-center my-2">
        <x-card shadow="shadow p-3">
            <form action="/register" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Enter Username</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Enter Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Enter Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </x-card>
    </div>
</x-layout>
