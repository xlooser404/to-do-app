@extends('layouts.default')

@section('content')
<main class="flex-shrink-0">
    <div class="container" style="max-width: 600px">
        <!-- Display success message -->
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Display error message -->
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="border-bottom pb-2 mb-0">List Of Tasks</h6>
                <a href="{{ route('task.add') }}" class="btn btn-outline-success">Add Task</a>
            </div>      
            
            <!-- Loop through each task and display its details -->
            @foreach ($tasks as $task)
                <div class="d-flex text-body-secondary pt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l14 0" />
                        <path d="M13 18l6 -6" />
                        <path d="M13 6l6 6" />
                    </svg>
                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">{{ $task->title }} | {{ $task->deadline }}</strong>

                            <!-- Button to mark the task as completed -->
                            <a href="{{ route('task.status.update', $task->id) }}" class="btn btn-success">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-checks">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M7 12l5 5l10 -10" />
                                <path d="M2 12l5 5m5 -5l5 -5" />
                              </svg>
                            </a>

                            <!-- Button to delete the task -->
                            <a href="{{ route('task.delete', $task->id) }}" class="btn btn-danger">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M4 7l16 0" />
                                <path d="M10 11l0 6" />
                                <path d="M14 11l0 6" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                              </svg>
                            </a>
                        </div>
                        <span class="d-block">{{ $task->description }}</span>
                    </div>
                </div>
            @endforeach
            
            <!-- Pagination links for the task list -->
            <div class="d-flex justify-content-center mt-3">
              {{ $tasks->links('pagination::bootstrap-4') }}
          </div>

          <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('logout') }}" class="btn btn-outline-danger">Log-out</a>
          </div>
        </div>
    </div>
</main>
@endsection
