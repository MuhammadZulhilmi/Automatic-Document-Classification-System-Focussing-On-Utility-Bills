
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    Full Name:{{$data->full_name}} <br>
	                Address:{{$data->address}} <br>
                    Account Number:{{$data->account_no}} <br>
                    <iframe height="900"  width="1170" src="/assets/{{$data->file}}"></iframe> <br>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                            <a href="{{route('dashboard/showdocument')}}"> <button type="submit" class="btn btn-info" >Back</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>