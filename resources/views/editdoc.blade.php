<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for Edit Document') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as a User <br>
                    Edit your document Here!
                    <br>
                    Under this form!

<form class="form-horizontal" action="{{route('/updatedoc', $file->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label class="control-label col-sm-2" for="full_name">Full Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter Full Name" value="{{$file->full_name}}" required>
    </div>
  </div>
  <br>
  <div class="form-group">
    <label class="control-label col-sm-2" for="address">Address:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="address" name="address"  placeholder="Enter Address" value="{{$file->address}}" required>
    </div>
  </div>
  <br>
  <div class="form-group">
    <label class="control-label col-sm-2" for="account_no">Account Number:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="account_no" name="account_no" placeholder="Enter Account Number" value="{{$file->account_no}}" required>
    </div>
  </div>
  <br>
  <div class="form-group">
    <label class="control-label col-sm-2" for="file">Insert Document Here:</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="file" name="file">
      <input type="hidden" name="old_file" value="{{$file->file}}">
    </div>
  </div>
  <br>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <!--<button type="cancel" class="btn btn-secondary">Cancel</button> -->
    <button type="submit" class="btn btn-primary">Update</button>
    <button type="reset" class="btn btn-light">Reset</button>
    <a href="{{route('dashboard/showdocument')}}"><button type="submit" class="btn btn-info">Cancel</button>
    </div>
  </div>
</form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>