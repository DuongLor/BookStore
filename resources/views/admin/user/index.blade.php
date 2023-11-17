@extends('admin.templates.app')
@section('title', 'User')
@section('content')
    <div class="overflow-x-auto w-full">
        <table class="table">
            <thead>
                <tr>
                    <th class="whitespace-nowrap text-center">#</th>
                    <th class="whitespace-nowrap text-center">Name</th>
                    <th class="whitespace-nowrap text-center">Email</th>
                    <th class="whitespace-nowrap text-center">Password</th>
                    <th class="whitespace-nowrap text-center">Phone</th>
                    <th class="whitespace-nowrap text-center">Address</th>
                    <th class="whitespace-nowrap text-center">Image</th>
                    <th class="whitespace-nowrap text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">{{ $user->password }}</td>
                        <td class="text-center">{{ $user->phone ?? '0326259983' }}</td>
                        <td class="text-center">{{ $user->address ?? 'Lê Quý Dương PH24274' }}</td>
                        <td class="d-flex justify-content-center align-items-center  " width="100px"><img
                                src="{{ asset($user->image) }}" alt=""></td>
                        <td class="text-center">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-danger" href="{{ route('admin.user.delete', $user->id) }}"
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
    @endsection
