<!-- untuk button dan table -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All List of Submitted Document') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
<table class="table table-bordered table-striped table-hover">

	<thead>
        <tr>
            <th scope="col">Full Name</th>
            <th scope="col">Address</th>
            <th scope="col">Account Number</th>
            <th scope="col">File</th>
            <th scope="col" colspan="4">Actions</th>
            
        </tr>
	</thead>

	@foreach($data as $data)

    <tbody>
	<tr>
		<td>{{$data->full_name}}</td>
		<td>{{$data->address}}</td>
        <td>{{$data->account_no}}</td>
        <td>{{$data->file}}</td>
		<td><a href="{{route('/view',$data->id)}}">View</a></td>
		<td><a href="{{route('/download',$data->file)}}">Download</a></td>
        <td><a href="{{route('/editdoc', $data->id)}}">Edit</a></td>
        <td><a href="{{route('/deletedoc', $data->id)}}">Delete</a></td>
	</tr>
</tbody>
    @endforeach
   
	 </table>
     
            <!--<div class="container">
                <div class="row">
                    <div class="col text-center">
                        <a href="{{route('dashboard.submitdoc')}}"> <button type="submit" class="btn btn-info" >Submit New Document</button>
                    </div>
                </div>
            </div> -->

                </div>
            </div>
        </div>        
    </div>
   
</x-app-layout>
