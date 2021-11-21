<div>
   <div class="container">
      @if($selectData == true)
        <div class="mt-5">
           <div class="card">
              <div class="card-header">
                 <div class="d-flex justify-content-between">
                     <h3>Users (5)</h3>
                     <button wire:click = 'showForm' class="btn btn-success"> Create </button>
                 </div>
              </div>
           </div>
        </div>

        <div class="table-responsive mt-5">
           <table class="table table-bordered">
               <thead>
               <tr class="bg-dark text-white">
                  <td>ID</td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Country</td>
                  <td>Edit</td>
                  <td>Delete</td>
               </tr>
               </thead>
               <tbody>
                  @forelse ($students as $student)
                     <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->country }}</td>
                        <td><button wire:click="edit({{ $student->id }})" class="btn btn-success">Edit</button></td>
                        <td><button class="btn btn-danger">Delete</button></td>
                     </tr>
                  @empty
                     <h1>Record not found</h1>
                  @endforelse
               </tbody>
            </table>
            {{-- <div class="text-center">
               {{ $students->links() }}
            </div> --}}
        </div>       
      @endif

      @if($createData == true)
      <!-- Create Data -->
      <div class="row">
            <div class="col-xl-6 col-md-8 col-sm-12 offset-xl-3 offset-md-2 offset-sm-0">
               <div class="card">
                  <div class="card-header">
                     <h1 class="text-center">Add Data</h1>

                     <form class="mt-5" wire:submit.prevent="create">
                        @csrf
                        <div class="card-body">

                           <div class="form-group">
                                <label for="examplename"><b>Enter Name</b></label>
                                <input wire:model="name" type="text" id="examplename" class="form-control form-control-lg">
                           </div>
                           <div class="text-danger">
                              @error('name')
                                 {{ $message }}
                              @enderror
                           </div>

                           <div class="form-group">
                              <label for="email"><b>Enter Email</b></label>
                              <input wire:model="email" type="email" id="email" class="form-control form-control-lg">
                           </div>
                           <div class="text-danger">
                              @error('email')
                                 {{ $message }}
                              @enderror
                           </div>

                           <div class="form-group">
                              <label for="country"><b>Enter Country</b></label>
                              <input wire:model="country" type="text" id="country" class="form-control form-control-lg">
                           </div> 
                           <div class="text-danger">
                              @error('country')
                                 {{ $message }}
                              @enderror
                           </div>

                        </div>

                        <div class="card-footer">
                           <div class="form-group">
                              <button type="submit" class="btn btn-primary form-control">Save</button>
                           </div>
                        </div>

                     </form>
                  </div>
               </div>
            </div>   
      </div> 
      @endif

      @if($updateData == true)
      <!-- Update Data -->
      <div class="row mt-5">
         <div class="col-xl-6 col-md-8 col-sm-12 offset-xl-3 offset-md-2 offset-sm-0">
            <div class="card">
               <div class="card-header">
                  <h1 class="text-center">Update Data</h1>

                  <form action="" class="mt-5" wire:submit.prevent="update({{ $ids }})">
                     <div class="card-body">
                        @csrf

                        <div class="form-group">
                             <label for=""><b>Enter Name</b></label>
                             <input type="text" wire:model="edit_name" name="edit_name" id="name" class="form-control form-control-lg">
                        </div>

                        <div class="form-group">
                           <label for=""><b>Enter Email</b></label>
                           <input type="email" wire:model="edit_email" name="edit_email" id="email" class="form-control form-control-lg">
                        </div>

                        <div class="form-group">
                           <label for=""><b>Enter Country</b></label>
                           <input type="text" wire:model="edit_country" name="edit_country" id="country" class="form-control form-control-lg">
                        </div> 

                     </div>

                     <div class="card-footer">
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary form-control">Update</button>
                        </div>
                     </div>

                  </form>
               </div>
            </div>
         </div>   
      </div>  
      @endif

   </div>
</div>