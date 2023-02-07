@extends('../layout/' . $layout)

@section('subhead')
    <title>File Manager | Upload</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">File Upload Page</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Multiple File Upload -->
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">File Upload</h2>
                </div>
                <form name="save-multiple-files" method="POST"  action="{{ route('upload.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                             
                      <div class="row">
           
                          <div class="col-md-12">
                              <div class="form-group">
                                  <input type="file" name="files[]" placeholder="Choose files" multiple >
                              </div>
                              @error('files')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                          </div>
                             
                          <div class="text-right mt-5 mr-2">
                              <button type="submit" class="btn btn-primary w-14" id="submit">Submit</button>
                          </div>
                      </div>     
                  </form>
                {{-- <div id="multiple-file-upload" class="p-5">
                    <div class="preview">
                        <form action="{{ route('upload.store') }}" method="POST" class="dropzone" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="fallback">
                                <input name="filename" type="file" multiple/>
                            </div>
                            <div class="dz-message" data-dz-message>
                                <div class="text-lg font-medium">Drop files here or click to upload.</div>
                            </div>
                            <div class="text-left mt-2">
                                <button type="submit" class="btn btn-primary w-24">Upload</button>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
            <!-- END: Multiple File Upload -->
        </div>
    </div>
@endsection
