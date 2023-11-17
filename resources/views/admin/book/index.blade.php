@extends('admin.templates.app')
@section('title', 'Book')
@section('content')
    <a href="{{ route('admin.book.create') }}" class="btn btn-primary shadow-md mr-2 mb-3 " style="width: 200px">Add New
        book</a>
    <div class="overflow-x-auto w-full">
        <table class="table">
            <thead>
                <tr>
                    <th class="whitespace-nowrap text-center">#</th>
                    <th class="whitespace-nowrap text-center">Promiment</th>
                    <th class="whitespace-nowrap text-center">Title</th>
                    <th class="whitespace-nowrap text-center">Author</th>
                    <th class="whitespace-nowrap text-center">Genre</th>
                    <th class="whitespace-nowrap text-center">Promotion</th>
                    <th class="whitespace-nowrap text-center">Image</th>
                    <th class="whitespace-nowrap text-center">Description</th>
                    <th class="whitespace-nowrap text-center">Price</th>
                    <th class="whitespace-nowrap text-center">Quantity</th>
                    <th class="whitespace-nowrap text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $key => $book)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center">
                            @if ($book->prominent == 0)
                                <div class="flex items-center justify-center text-success"> <svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                        class="lucide lucide-check-square w-4 h-4 mr-2">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                    </svg> Active </div>
                            @else
                                <div class="flex items-center justify-center text-danger"> <svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                        class="lucide lucide-check-square w-4 h-4 mr-2">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                    </svg> Inactive </div>
                            @endif

                        </td>
                        <td class="text-center">{{ $book->title }}</td>
                        <td class="text-center">{{ $book->author->name }}</td>
                        <td class="text-center">{{ $book->genre->name }}</td>
                        <td class="text-center">{{ $book->promotion->discount ?? 'No Promotion' }}</td>
                        <td class="d-flex justify-content-center align-items-center  " width="100px"><img
                                src="{{ asset($book->image) }}" alt=""></td>
                        <td class="text-center">{{ $book->description }}</td>
                        <td class="text-center">{{ $book->price }}</td>
                        <td class="text-center">{{ $book->quantity }}</td>
                        <td class="text-center">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{ route('admin.book.edit', $book->id) }}"> <svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                        class="lucide lucide-check-square w-4 h-4 mr-1">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                    </svg> Edit </a>
                                <a class="flex items-center text-danger" href="{{ route('admin.book.delete', $book->id) }}"
                                    data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2"
                                        class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg> Delete </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center" style="margin-left: 475px; margin-top: 40px">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {{ $books->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    @endsection
