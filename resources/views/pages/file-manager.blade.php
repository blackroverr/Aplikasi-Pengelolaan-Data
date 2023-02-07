@extends('../layout/' . $layout)

@section('subhead')
    <title>File Manager</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">File Manager</h2>
            <!-- BEGIN: File Manager Menu -->
            @if(session('status'))
                <div class="alert alert-success-soft">
                    {{ session('status') }}
                </div>
            @endif
            <!-- END: File Manager Menu -->
        </div>
        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <!-- BEGIN: File Manager Filter -->
            <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-slate-500" data-lucide="search"></i>
                    <input type="text" class="form-control w-full sm:w-64 box px-10" placeholder="Search files">
                    <div class="inbox-filter dropdown absolute inset-y-0 mr-3 right-0 flex items-center" data-tw-placement="bottom-start">
                        <i class="dropdown-toggle w-4 h-4 cursor-pointer text-slate-500" role="button" aria-expanded="false" data-tw-toggle="dropdown" data-lucide="chevron-down"></i>
                        <div class="inbox-filter__dropdown-menu dropdown-menu pt-2">
                            <div class="dropdown-content">
                                <div class="grid grid-cols-12 gap-4 gap-y-3 p-3">
                                    <div class="col-span-6">
                                        <label for="input-filter-1" class="form-label text-xs">File Name</label>
                                        <input id="input-filter-1" type="text" class="form-control flex-1" placeholder="Type the file name">
                                    </div>
                                    <div class="col-span-12 flex items-center mt-3">
                                        <button class="btn btn-primary w-32 ml-2">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full sm:w-auto flex">
                    <a href="file-upload-page" class="btn btn-primary shadow-md mr-2">Upload File</a>
                    <button class="btn btn-primary shadow-md mr-2" disabled>New Folder</button>
                </div>
            </div>
            <!-- END: File Manager Filter -->
            <!-- BEGIN: Directory & Files -->
            <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                @foreach ($fakers as $faker)
                    <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                        <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                            <div class="absolute left-0 top-0 mt-3 ml-3">
                                <input class="form-check-input border border-slate-500" type="checkbox" {{ $faker['true_false'][0] ? '' : 'checked' }}>
                            </div>
                            @if ($faker['files'][0]['type'] == 'Empty Folder')
                                <a href="" class="w-3/5 file__icon file__icon--empty-directory mx-auto"></a>
                            @elseif ($faker['files'][0]['type'] == 'Folder')
                                <a href="" class="w-3/5 file__icon file__icon--directory mx-auto"></a>
                            @elseif ($faker['files'][0]['type'] == 'Image')
                                <button  class="w-3/5 file__icon file__icon--image mx-auto">
                                    <div class="file__icon--image__preview image-fit">
                                        <img alt="spd" src="{{ asset('dist/images/' . strtolower($faker['files'][0]['file_name'])) }}" data-action="zoom">
                                    </div>
                                </button>
                            @else
                                <a href="" class="w-3/5 file__icon file__icon--file mx-auto">
                                    <div class="file__icon__file-name">{{ $faker['files'][0]['type'] }}</div>
                                </a>
                            @endif
                            <a href="" class="block font-medium mt-4 text-center truncate">{{ $faker['files'][0]['file_name'] }}</a>
                            <div class="text-slate-500 text-xs text-center mt-0.5">{{ $faker['files'][0]['size'] }}</div>
                            <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
                                    <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i>
                                </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="" class="dropdown-item">
                                                <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item">
                                                <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- END: Directory & Files -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-6">
                <nav class="w-full sm:w-auto sm:mr-auto">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="w-4 h-4" data-lucide="chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">...</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">...</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="w-4 h-4" data-lucide="chevron-right"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="w-4 h-4" data-lucide="chevrons-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- END: Pagination -->
        </div>
    </div>
@endsection
