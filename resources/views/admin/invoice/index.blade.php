@extends('admin.templates.app')
@section('title', 'Invoice')
@section('content')
    <div class="overflow-x-auto w-full">
        <table class="table">
            <thead>
                <tr>
                    <th class="whitespace-nowrap text-center">#</th>
                    <th class="whitespace-nowrap text-center">Id_User</th>
                    <th class="whitespace-nowrap text-center">Name</th>
                    <th class="whitespace-nowrap text-center">Phone</th>
                    <th class="whitespace-nowrap text-center">Address</th>
                    <th class="whitespace-nowrap text-center">Total</th>
                    <th class="whitespace-nowrap text-center">Status</th>
                    <th class="whitespace-nowrap text-center">Data</th>
                    <th class="whitespace-nowrap text-center">Invoice</th>
                    <th class="whitespace-nowrap text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $key => $invoice)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center">{{ $invoice->id_user }}</td>
                        <td class="text-center">{{ $invoice->name }}</td>
                        <td class="text-center">{{ $invoice->phone }}</td>
                        <td class="text-center">{{ $invoice->address }}</td>
                        <td class="text-center">{{ $invoice->total }}</td>
                        <td class="text-center">{{ $invoice->status }}</td>
                        <td class="text-center">{{ $invoice->created_at }}</td>
                        <td class="text-center">{{ $invoice->invoice }}</td>
                        <td class="text-center">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{ route('admin.invoice.edit', $invoice->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" icon-name="check-square"
                                        data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                    </svg> Edit </a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center" style="margin-left: 475px; margin-top: 40px">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {{ $invoices->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    @endsection
