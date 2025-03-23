@extends("layouts.default")

@section("content")
<div class="d-flex align-item-center">
    <div class="container card shadow-sm" style="margin-top:100px max-width:500px">
        <div class="fs-3 fw-bold text-center">Add New Task</div>
        <!-- Form for adding a new task with POST method and action pointing to the task.add.post route -->
        <form class="p-3" method="POST" action="{{route("task.add.post")}}">
          <!-- CSRF token for security -->
          @csrf
            <div class="mb-3 mt-1">
                <input type="text" name="title" class="form-control">
              </div>
              <div class="mb-3">
                <input type="datetime-local" class="form-control" name="deadline">
              </div>
              <div class="mb-3">
                <textarea name="description" class="form-control" rows="3"></textarea>
              </div>
              <!-- Display success message -->
              @if (session()->has("success"))
                <div class="alert alert-success">
                  {{session()->get("success")}}
                </div>
               @endif
               <!-- Display error message -->
               @if (session()->has("error"))
                <div class="alert alert-danger">
                  {{session()->get("error")}}
                </div>
               @endif
              <button class="btn btn-success rouded-pill" type="submit">Add</button>
        </form>
    </div>
</div>
@endsection