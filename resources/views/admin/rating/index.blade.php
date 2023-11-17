@extends('admin.templates.app')
@section('title', 'Rating')
@section('content')
    <div class="overflow-x-auto w-full">
        <table class="table">
            <thead>
                <tr>
                    <th class="whitespace-nowrap text-center">#</th>
                    <th class="whitespace-nowrap text-center">User</th>
                    <th class="whitespace-nowrap text-center">Rating</th>
                    <th class="whitespace-nowrap text-center">Comment</th>
                    <th class="whitespace-nowrap text-center">Book</th>
                    <th class="whitespace-nowrap text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ratings as $key => $rating)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center">{{ $rating->user->name ?? '' }}</td>
                        <td class="text-center">
                            <div class="flex items-center">
                                @for ($i = 0; $i < $rating->rating; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" icon-name="star" data-lucide="star"
                                        class="lucide lucide-star text-pending fill-pending/30 w-4 h-4 mr-1">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                @endfor
                                @for ($i = 0; $i < 5 - $rating->rating; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" icon-name="star" data-lucide="star"
                                        class="lucide lucide-star text-slate-400 fill-slate/30 w-4 h-4 mr-1">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                @endfor
                            </div>
                        </td>
                        <td class="text-center">{{ $rating->comment }}</td>
                        <td class="text-center">{{ $rating->book->title }}</td>
                        <td class="text-center">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-danger"
                                    href="{{ route('admin.rating.delete', $rating->id) }}" data-tw-toggle="modal"
                                    data-tw-target="#delete-confirmation-modal"> <svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
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
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center"
            style="margin-left: 475px; margin-top: 40px">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {{ $ratings->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    @endsection
