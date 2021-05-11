<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <livewire:styles />
    <title>Task Manager</title>
</head>
<body class="antialiased bg-purple-50">
<div class="w-full p-4 max-w-lg mx-auto mt-2">
    <!-- Start Logo -->
    <div class="flex justify-center items-center">
        <svg class="fill-current w-6 h-6 text-purple-500" viewBox="0 0 512 512">
            <path d="M139.61 35.5a12 12 0 00-17 0L58.93 98.81l-22.7-22.12a12 12 0 00-17 0L3.53 92.41a12 12 0 000 17l47.59 47.4a12.78 12.78 0 0017.61 0l15.59-15.62L156.52 69a12.09 12.09 0 00.09-17zm0 159.19a12 12 0 00-17 0l-63.68 63.72-22.7-22.1a12 12 0 00-17 0L3.53 252a12 12 0 000 17L51 316.5a12.77 12.77 0 0017.6 0l15.7-15.69 72.2-72.22a12 12 0 00.09-16.9zM64 368c-26.49 0-48.59 21.5-48.59 48S37.53 464 64 464a48 48 0 000-96zm432 16H208a16 16 0 00-16 16v32a16 16 0 0016 16h288a16 16 0 0016-16v-32a16 16 0 00-16-16zm0-320H208a16 16 0 00-16 16v32a16 16 0 0016 16h288a16 16 0 0016-16V80a16 16 0 00-16-16zm0 160H208a16 16 0 00-16 16v32a16 16 0 0016 16h288a16 16 0 0016-16v-32a16 16 0 00-16-16z"/>
        </svg>
        <h1 class="ml-2 text-2xl font-semibold text-gray-700">Task Manager</h1>
    </div>
    <!-- End Logo -->

    @error('title')
        <div class="mt-4 text-red-600 bg-red-200 px-2 py-1 rounded-lg text-sm"> {{ $message }} </div>
    @enderror

    <!-- Start Create -->
    <form action="{{route('task.store')}}" method="POST" class="mt-4">
        @csrf
        <label for="task" class="text-lg">Create Task</label>
        <div class="flex items-stretch mt-2">
            <input type="text" id="task" name="title" class="w-full rounded-lg shadow-lg px-2 py-2 outline-none
                @error('title') border-2 border-red-200 @enderror">
            <button type="submit" class="bg-purple-500 shadow-lg text-white px-6 py-2 rounded-lg ml-2">
                <svg class="fill-current w-5 h-5" viewBox="0 0 448 512">
                    <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                </svg>
            </button>
        </div>
    </form>

    <!-- End Create -->



    <!-- Start all tasks -->
    <div class="my-6">
        <h5 class="text-lg">Tasks</h5>
        <hr class="border-2 mt-2 border-purple-300"/>
        @foreach($tasks as $task)
            <div class="bg-white mt-4 rounded-lg shadow-lg px-2 py-2 flex justify-between items-center">
                {{ $task->title }}
                <div class="ml-2">
                    <!-- edit button -->
                    <button class="mr-2">
                        <svg class="fill-current text-purple-500 w-4 h-4"  viewBox="0 0 512 512">
                            <path d="M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z"/>
                        </svg>
                    </button>

                    <!-- delete button -->
                    <form action="{{route('task.destroy',$task->id)}}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mt-1">
                            <svg class="fill-current text-red-500 w-4 h-4" viewBox="0 0 448 512">
                                <path d="M432 32H312l-9.4-18.7A24 24 0 00281.1 0H166.8a23.72 23.72 0 00-21.4 13.3L136 32H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16zM53.2 467a48 48 0 0047.9 45h245.8a48 48 0 0047.9-45L416 128H32z"/>
                            </svg>
                        </button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>
    <!-- End all tasks -->


</div>
<!-- End Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<livewire:scripts />
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
<!-- End Scripts -->
@include('sweet::alert')
</body>
</html>
