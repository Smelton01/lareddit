@extends('layouts.app')
@section('title', 'Home')

@section('content')
<section class="text-center m-5">

<div class="mx-20 font-bold underline">Edit TODO</div>

<div class="m-4 border-solid border-grey-500 shadow-lg">
    <div class="p-40 border-solid border-color-black">
        <h3>Edit Todo: {{ $todo->title }}</h3>
    <form action="{{route('todo.update', $todo->id)  }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="block">
            <input type="text" placeholder="Title..." id="title" value="{{ $todo->title }}" name="title" class="placeholder-gray-400">
            <input type="text" placeholder="Description..." id="desc" value="{{ $todo->description }}" name="desc" class="placeholder-gray-400">
            <input type="date" placeholder="Deadline..." id="deadline" value="{{ $todo->deadline }}" name="deadline" class="placeholder-gray-400">
            <input type="submit" class="btn btn-primary" value="Submit">
            
        </div>
    </form>
    </div>
</div>
@stop