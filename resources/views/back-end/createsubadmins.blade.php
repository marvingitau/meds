@extends('back-end.layouts.master')

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ route('admin_home') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="#" title="Here" class="tip-bottom"><i class="icon-home"></i> Creating Priveledged User</a>
        </div>
    </div>
    <!--End-breadcrumbs-->


    @if(Session::has('message'))
    <div class="alert alert-success text-center" role="alert">
        <strong></strong>{{Session::get('message')}}
    </div>
   @endif
   @if (count($errors) > 0)
   <div class="alert alert-danger">
     <strong>Whoops!</strong> There were some problems with your input.<br><br>
     <ul>
       @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
       @endforeach
     </ul>
   </div>
   @endif

    <!--Chart-box-->
    <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
            <h5>Create Role & Admin</h5>
          </div>
          <div class="widget-content" >
            <div class="row-fluid">

                <div class="span99">

                    <form action="{{ route('role.store') }}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="">ROLE</label>
                          <input type="text"
                        class="form-control form-control-sm" name="role" id="role" aria-describedby="helpId" placeholder="">

                        </div>
                        <button type="submit" class="btn btn-primary w-100 my-2" style="background-color:#f77b01; border-color: #0062cc00;
                        box-shadow: 0 0 0 .2rem rgba(38, 143, 255, 0); ">Create Role</button>
                    </form>
                  </div>

              <div class="span6">


              <form action="{{ route('admin.store') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="">NAME</label>
                      <input type="text"
                    class="form-control form-control-sm" name="name" id="name" aria-describedby="helpId" placeholder="" value="{{ old('name')}}">

                    </div>

                    <div class="form-group">
                        <label for="">EMAIL</label>
                        <input type="email"
                    class="form-control form-control-sm" name="email" id="name" aria-describedby="helpId" value="{{ old('email')}}" placeholder="">

                      </div>

                      <div class="form-group">
                        <label for="">ROLE</label>
                        <select class="form-control form-control-sm rounded-0" name="role" id="role">
                          <option value="">Choose</option>
                          @if ($roles)
                          @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{$role->name }}</option>
                          @endforeach
                          @else

                          @endif

                          {{-- <option value="4">STAFF GENERAL PURCHASE</option>
                          <option value="5">WAREHOUSE MANAGER</option>
                          <option value="6">ACCOUNTS</option>
                          <option value="7">STAFF MEDICAL SCHEME</option> --}}
                        </select>
                      </div>

                    <div class="form-group">
                        <label for="">PASSWORD</label>
                        <input type="text"
                            class="form-control form-control-sm" name="password" id="name" aria-describedby="helpId" placeholder="">

                      </div>

                      <div class="form-group">
                        <label for="">CONFIRM-PASSWORD</label>
                        <input type="text"
                            class="form-control form-control-sm" name="password_confirmation" id="name" aria-describedby="helpId" placeholder="">

                      </div>
                    <button type="submit" class="btn btn-primary w-100 my-2" style="background-color:#f77b01; border-color: #0062cc00;
                    box-shadow: 0 0 0 .2rem rgba(38, 143, 255, 0); ">Create User</button>
                </form>

              </div>
            </div>
          </div>
          <div class="widget-content" >
            <div class="row-fluid">
                <h3>Existing Admins</h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    @if ($users)
                    <tbody>
                        <?php $i=0; ?>
                        @foreach ($users as $user)
                            <tr>

                                <td> <h6><?php echo $i++; ?></h6></td>
                                <td> <h6>{{ $user->name }}</h6></td>
                                <td> <h6>{{ $user->email }}</h6></td>
                                <td> <h6>{{ App\Role::findOrFail($user->role)->name }}</h6></td>
                            </tr>
                        @endforeach
                    </tbody>
                    @else

                    @endif
                </table>


            </div>
          </div>
        </div>
      </div>
@endsection

@section('jsblock')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
jQuery(document).ready(function(){
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Wen', 'Apr', 'May', 'June'],
            datasets: [{
                label: 'Sales',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                    // 'rgba(54, 162, 235, 0.2)',
                    // 'rgba(255, 206, 86, 0.2)',
                    // 'rgba(75, 192, 192, 0.2)',
                    // 'rgba(153, 102, 255, 0.2)',
                    // 'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)'
                    // 'rgba(54, 162, 235, 1)',
                    // 'rgba(255, 206, 86, 1)',
                    // 'rgba(75, 192, 192, 1)',
                    // 'rgba(153, 102, 255, 1)',
                    // 'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
});
</script>

@endsection


