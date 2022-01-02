@extends('layouts.app')
@section('title', 'Home')

@section('content')
<section class="text-center m-5">

<div class="mx-20 font-bold underline">My sweet TODO app</div>

<div class="m-4 border-solid border-grey-500 shadow-lg">
    <form action="{{route('todo.save')  }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="block">
            <input type="text" placeholder="Title..." id="title" value="" name="title" class="placeholder-gray-400">
            <input type="text" placeholder="Description..." id="desc" value="" name="desc" class="placeholder-gray-400">
            <input type="date" placeholder="Deadline..." id="deadline" value="" name="deadline" class="placeholder-gray-400">
            <input type="submit" class="btn btn-primary" value="Submit">
            
        </div>
    </form>
       <div class="flex text-center mt-5 p-4 justify-content-center align-items-center">
            <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Deadline</th>
            </tr>    
            @foreach ($todos as $todo)
            <tr>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->description}}</td>
                @if ($todo->deadline)
                    <td>{{ $todo->deadline }}</td>
                @else
                    <td>None</td>
                @endif
                <td>
                <a href="{{ route('todo.edit', $todo->id) }}">
                    <button class="btn btn-primary">
                        Edit
                    </button>
                </a>
                </td>    
                <td>
                <form action="{{ route('todo.destroy', $todo->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-primary" type="submit">
                        Delete
                    </button>
                </form>
                </td>    
            </tr>    
            @endforeach
            </table>   
       </div>
</div>


</section>

@stop