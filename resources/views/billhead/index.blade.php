@extends('../structure')

@section('title' , 'billhead')

@section('css')


@endsection

@section('content')


<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Bill Head</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            @if(Session::has('msg'))
            <div class="col-md-12">
             
                
                <div class="x_content bs-example-popovers">

                  <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>{{ session('msg') }}</strong> 
                  </div>

                
              </div>
            </div>
           @endif

            @if(Session::has('msgerr'))
            <div class="col-md-12">
             
                
                <div class="x_content bs-example-popovers">

                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>{{ session('msgerr') }}</strong> 
                  </div>

                
              </div>
            </div>
           @endif

            <div class="row" style="width: 125%;">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bill Head <small>sub title</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>id</th>
                  <th>date</th>
                  <th>client name</th>
                  <th>total</th>
                  <th>paid</th>
                  <th>remain</th>
                  <td>bill details</td>
                  <th>action</th>
                </tr>
              </thead>
              
              
              <tbody>
                
                @foreach($bills as $bill)
                       
                   <tr>

                    
                   
                    
                    <td>{{ $bill->id }}</td>
                    <td>{{ $bill->billdate }}</td>
                    <td>{{ $bill->user->name }}</td>
                    <td>{{ $bill->total }}</td>
                    <td>{{ $bill->paid }}</td>
                    <td>{{ $bill->remain }}</td>
                    <td>
 
                                           <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $bill->id }}">
  details
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $bill->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">quantity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <table class="table tab2" style="margin-bottom: 0;">
        @if($bill->biild)
                        @foreach($bill->biild as $bi)
                           <tr>
                            <td> {{ $bi->id }}</td>
                            <td> {{ $bi->item->name }}</td>
                            <td> {{ $bi->store->name }}</td>
                            <td> {{ $bi->quantity }}</td>
                            <td> {{ $bi->price }}</td>
                            <td> {{ $bi->total }}</td>
                          </tr>
                        @endforeach
        @endif
        </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

                    </td>

                    </td>
                      <td>
                      <a id="send" href="{{ route('edit.head' , $bill['id']) }}" class="btn btn-success">Edit</a>
                     <a id="send" href="{{ route('destroy.head' , $bill['id']) }}" class="btn btn-danger">Delete</a>
                     <a id="send" href="{{ route('index.print' , $bill['id']) }}" class="btn btn-dark">print</a>
                    
                    </td>




                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
     </div>
</div> 
                    
                  </div>
                </div>
              
        <!-- /page content -->

@endsection

@section('script')


@endsection
