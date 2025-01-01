
@extends('dashboard.layouts.master')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('successAddUser') }}
        </div>
    @endif

     <!-- Container -->
     <div class="container-fixed">
      <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
       <div class="flex flex-col justify-center gap-2">
        <h1 class="text-xl font-medium leading-none text-gray-900">
            Students
        </h1>
       </div>
       <div class="flex items-center gap-2.5">
        <button class="btn btn-sm btn-light" data-modal-toggle="#modal_6_1">
         Add New Student
        </button>
       </div>
      </div>
     </div>
     <!-- End of Container -->
     <!-- Container -->

     @livewire('student.search-student')

     <!-- End of Container -->
    <!-- End of Content -->
    <!-- Footer -->


    {{-- Modal --}}

    <div class="modal" data-modal="true" id="modal_6_1">
        <div class="modal-content modal-center max-w-[600px] p-4">
            <div class="modal-header">
                <h3 class="modal-title">Add New Student</h3>
                <button class="btn btn-xs btn-icon btn-light" data-modal-dismiss="true" aria-label="Close">
                    <i class="ki-outline ki-cross"></i>
                </button>
            </div>
            {{-- Include Livewire component --}}
            @livewire('student.add-new-student')
        </div>
    </div>



    @endsection
