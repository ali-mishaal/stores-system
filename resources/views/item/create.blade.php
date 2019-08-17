
@extends('../structure')

@section('title' , 'item|create')

@section('content')

<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Create item</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            @if(Session::has('msg'))
            <div class="col-md-12">
             
                
                <div class="x_content bs-example-popovers">

                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>{{ session('msg') }}</strong> 
                  </div>

                
              </div>
            </div>
           @endif

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                  <div class="x_title">
                    <h2>create item <small>sub title</small></h2>
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

                    <form class="form-horizontal form-label-left" novalidate name="Form">
                   

                      <div class="item form-group {{ $errors->has('name_it') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">item name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" step="0.01" id="item" name="name_it" required="required" class="form-control col-md-7 col-xs-12" min="0">
                        </div>
                         @if ($errors->has('name_it'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name_it') }}</strong>
                              </span>
                          @endif
                      </div>


                      <div class="item form-group {{ $errors->has('pprice') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Purchasing price<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="number" step="0.01" id="pprice" name="pprice" required="required" class="form-control col-md-7 col-xs-12" min="0">
                        </div>
                         @if ($errors->has('pprice'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('pprice') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="item form-group {{ $errors->has('sprice') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">selling price<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="number" step="0.01" id="sprice" name="sprice" required="required" class="form-control col-md-7 col-xs-12" min="0">
                        </div>
                         @if ($errors->has('sprice'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('sprice') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="item form-group {{ $errors->has('name_st') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">store name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select id="store" name="name_st" required="required" class="form-control col-md-7 col-xs-12">
                          @foreach($stores as $store)
                             <option value="{{ $store->name }}">{{$store->name}}</option>
                          @endforeach
                         </select>
                        </div>
                         @if ($errors->has('name_st'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name_st') }}</strong>
                              </span>
                          @endif
                      </div>

                       <div class="item form-group {{ $errors->has('qua') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">quantity<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="number" step="0.01" id="qua" name="qua" required="required" class="form-control col-md-7 col-xs-12" min="0">
                        </div>
                         @if ($errors->has('qua'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('qua') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="item form-group {{ $errors->has('qua') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">tax<span class="required">*</span>
                        </label>
                        <div class="col-md-1 col-sm-1 col-xs-1">
                         <input type="checkbox" id="tax" name="tax" class="form-control col-md-7 col-xs-12" value="0">
                        </div>
                         @if ($errors->has('qua'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('qua') }}</strong>
                              </span>
                          @endif
                      </div>



                      <div class="form-group ">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="button" class="btn btn-success" onclick="add()">add</button>
                        </div>
                      </div>
                    </form>


 <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>id</th>
                  <th>store name</th>
                  <th>quantity</th>
                  <th>action</th>
                </tr>
              </thead>
              
              
              <tbody>
                        
                <tr>
                    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
               
              </tbody>
            </table>

            <button id="create" class="btn btn-success">create</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

@endsection

@section('script')
   
   <script>

    function add()
      {

        var a=document.forms["Form"]["name_it"].value;
        var b=document.forms["Form"]["pprice"].value;
        var c=document.forms["Form"]["sprice"].value;
        var d=document.forms["Form"]["name_st"].value;
        var e=document.forms["Form"]["qua"].value;

        if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="",e==null || e=="")
        {
            alert("Please Fill All Required Field");
            return false;
        }
         var count = $('#datatable tr').length - 2;
         var store = document.getElementById('store').value;
         var qua = document.getElementById('qua').value;


         var table = document.getElementsByTagName('table')[0];

         var newRow = table.insertRow(table.rows.length);

         var theTbl = document.getElementById('datatable');
                
        for(var i=2;i<theTbl.rows.length;i++)
        {
            for(var j=1;j<theTbl.rows[i].cells.length-2;j++)
            {
                if(store == theTbl.rows[i].cells[j].innerHTML)
                {

                 alert('must be enter store once time'); 
                 return;
                }
                 
            } 
            
        }

         var cel1 = newRow.insertCell(0);
         var cel2 = newRow.insertCell(1);
         var cel3 = newRow.insertCell(2);
         var cel4 = newRow.insertCell(3);



         cel1.innerHTML = count+1;
         cel2.innerHTML = store;
         cel3.innerHTML = qua;
         cel4.innerHTML = "<button class='delete btn btn-danger'>delete</button>";

       
      }

    $(document).ready(function(){
      
         $(".table tbody").on('click' ,'.delete',function()
         {

             $(this).closest('tr').remove();
         });

         $('#create').click(function(){
                
                             
                var emps  = [];
                var data1 = {};
                var data2 = {};

                data1.item=document.forms["Form"]["name_it"].value;
                data1.pprice=document.forms["Form"]["pprice"].value;
                data1.sprice=document.forms["Form"]["sprice"].value;
                
                if ($('#tax').is(":checked"))
                {
                  data1.tax = 1;
                }else
                {
                  data1.tax = 0;
                }

                if (data1.item==null || data1.item=="",data1.pprice==null || data1.pprice=="",data1.sprice==null || data1.sprice=="")
                {
                    alert("Please Fill All Required Field");
                    return false;
                }

                emps.push(data1);

           

                var theTbl = document.getElementById('datatable');
                
                for(var i=2;i<theTbl.rows.length;i++)
                {
                    for(var j=1;j<theTbl.rows[i].cells.length-1;j++)
                    {
                         
                         emps[emps.length] = theTbl.rows[i].cells[j].innerHTML;
                         
                    } 
                    
                }
                 
                $.ajax({
                     url:'/item/store',
                     method:'get',
                     data:{emps : JSON.stringify(emps) },
                     success:function(resp){
                      if (resp == 'false') 
                      {
                        alert("Please Fill All Required Field");
                        return false;
                      }
                      // console.log(resp);
                      var url = '/item';
                      $( location ).attr("href", url);
                     },error:function(){
                         alert("you can't add item with the same name ");
                     }
                      

                });

        });

     });

   </script>
@endsection