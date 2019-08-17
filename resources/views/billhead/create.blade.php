
@extends('../structure')

@section('title' , 'Billhead|create')

@section('content')

<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Create Bill Head</h3>
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
                    <h2>Create Bill Head <small>sub title</small></h2>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">bill number<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                         <input type="text" id="billid" name="bill" required="required" class="form-control col-md-7 col-xs-12" value="{{ $id}}" disabled="disabled">

                         </div>
                       </div>

                      <div class="item form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="date" id="date" name="date" required="required" class="form-control col-md-7 col-xs-12" min="0">
                        </div>
                         @if ($errors->has('date'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('date') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="item form-group {{ $errors->has('client') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">clients<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select type="number" id="client" name="client" required="required" class="form-control col-md-7 col-xs-12" >
                            @foreach($users as $user)
                               <option value="{{ $user->id }}">
                                  {{ $user->name }}
                                </option>
                            @endforeach

                         </select>
                        </div>
                         @if ($errors->has('client'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('client') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="item form-group {{ $errors->has('name_st') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">store name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select id="store" name="name_st" required="required" class="form-control col-md-7 col-xs-12">
                          <option value="select store" selected="selected"> select store</option>
                          @foreach($stores as $store)
                             <option value="{{ $store->id }}">{{$store->name}}</option>
                          @endforeach

                          

                          
                         </select>
                        </div>
                         @if ($errors->has('name_st'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name_st') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="item form-group {{ $errors->has('item') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">items<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select id="item" name="item" required="required" class="form-control col-md-7 col-xs-12">
                          
                         </select>
                        </div>
                         @if ($errors->has('item'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('item') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="item form-group {{ $errors->has('sprice') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">selling price<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="number" step="0.01" id="sprice" name="sprice" required="required" class="form-control col-md-7 col-xs-12" min="0" disabled="disabled" >
                        </div>
                         @if ($errors->has('sprice'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('sprice') }}</strong>
                              </span>
                          @endif
                      </div>
                         <input type="hidden" id="tax" name="tax" value="">
                        


                       <div class="item form-group {{ $errors->has('qua') ? 'has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">quantity<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="number" step="1" id="qua" name="qua" required="required" class="form-control col-md-7 col-xs-12" min="0" max="">
                        </div>
                         @if ($errors->has('qua'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('qua') }}</strong>
                              </span>
                          @endif
                      </div>



                      <div class="form-group ">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="button" class="btn btn-success" onclick="add()" onclick="re()">add</button>
                        </div>
                      </div>
                    </form>

 <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>id</th>
                  <th>item</th>
                  <th>store</th>
                  <th>quantity</th>
                  <th>price</th>
                  <th>total</th>
                  <th>action</th>
                </tr>
              </thead>
              
              
              <tbody>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>   
              </tbody>
            </table>

            total:<input type="text" name="totalitems" disabled="disabled" id="totalitems" value="0">
            paid:<input type="number" name="paid" id="paid" value="0">
            remain:<input type="text" name="remain" disabled="disabled" id="remain" value="0">

            <button id="create" class="btn btn-success">create</button>
            <button id="createapi" class="btn btn-success">create (api)</button>
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
var totalitems = 0;

    function add()
      {

        var a=document.forms["Form"]["bill"].value;
        var b=document.forms["Form"]["date"].value;
        var c=document.forms["Form"]["client"].value;
        var d=document.forms["Form"]["name_st"].value;
        var e=document.forms["Form"]["item"].value;
        var f=document.forms["Form"]["sprice"].value;
        var g=document.forms["Form"]["qua"].value;
       

         if (b==null || b=="")
        {
            alert("Please Fill All Required Field");
            return false;
        }


         if (e==null || e=="")
        {
            alert("Please Fill All Required Field");
            return false;
        }


         if (f==null || f=="")
        {
            alert("Please Fill All Required Field");
            return false;
        }

         if (g==null || g=="" || g==0)
        {
            alert("this element not available now in this  store");
            return false;
        }
        if (a==null || a=="",c==null || c=="",d==null || d=="")
        {
            alert("Please Fill All Required Field");
            return false;
        }
         var count = $('#datatable tr').length - 2;

         var it = document.getElementById('item');
         var item= it.options[it.selectedIndex].text;
         var sel = document.getElementById('store');
         var store= sel.options[sel.selectedIndex].text;
         var qua = document.getElementById('qua').value;
         var tax = document.getElementById('tax').value;
         var price = document.getElementById('sprice').value;
         
         if (tax == '1') 
         {
          var total = qua * (parseInt(price) + ((5*parseInt(price))/100));
         }else
         {
          var total = qua * parseInt(price);
         }
           
        
         
         
        if (store == "select store") {
          alert('enter store');
          return;
         }
         if (item == "select item") {
          alert('enter item');
          return;
         }

         var table = document.getElementsByTagName('table')[0];

         var newRow = table.insertRow(table.rows.length);

         var theTbl = document.getElementById('datatable');

        if (parseInt(qua) > parseInt(document.getElementById("qua").getAttribute("max"))) 
        {
          alert("this store not contain this quantity");
          return;

        }
                
        for(var i=2;i<theTbl.rows.length;i++)
        {
            for(var j=1;j<theTbl.rows[i].cells.length-4;j++)
            {
                if(item == theTbl.rows[i].cells[j].innerHTML && store == theTbl.rows[i].cells[j+1].innerHTML)
                {

                 var itemcheck = "false";
                 var vqua = theTbl.rows[i].cells[j+2].innerHTML;
                 var vprice = theTbl.rows[i].cells[j+3].innerHTML;
                 var fqua = theTbl.rows[i].cells[j+2];
                 var ftotal = theTbl.rows[i].cells[j+4];
                 break;
                }
                 
            } 
            
        }


       if (itemcheck == "false" ) 
       {  
        if(parseInt(qua)+parseInt(vqua) > document.getElementById("qua").getAttribute("max") ) 
          {
            
            alert('this store not contain this quantity it contain ');
            return;
          }
          
          if(tax == '1')
          {
            totalitems = totalitems - parseInt(vqua) * (parseInt(vprice) + (parseInt(vprice)*5/100));
            fqua.innerHTML = parseInt(qua)+parseInt(vqua);
            ftotal.innerHTML = (parseInt(qua)+parseInt(vqua)) * (parseInt(vprice)+(parseInt(vprice)*5/100));
          }else
          {
            totalitems = totalitems - parseInt(vqua) * parseInt(vprice);
            fqua.innerHTML = parseInt(qua)+parseInt(vqua);
            ftotal.innerHTML = (parseInt(qua)+parseInt(vqua)) * parseInt(vprice);
          }
          
          
          totalitems = totalitems+ parseInt(ftotal.innerHTML);
          document.getElementById('totalitems').value = totalitems;
          document.getElementById('remain').value = totalitems;
          return;
       }else
       {

         var cel1 = newRow.insertCell(0);
         var cel2 = newRow.insertCell(1);
         var cel3 = newRow.insertCell(2);
         var cel4 = newRow.insertCell(3);
         var cel5 = newRow.insertCell(4);
         var cel6 = newRow.insertCell(5);
         var cel7 = newRow.insertCell(6);



         cel1.innerHTML = count+1;
         cel2.innerHTML = item;
         cel3.innerHTML = store;
         cel4.innerHTML = qua;
         cel5.innerHTML = price;
         
         
         cel6.innerHTML = total;
         cel7.innerHTML = "<button class='delete btn btn-danger'>delete</button>";
        
         totalitems = total + totalitems;
        document.getElementById('totalitems').value = totalitems;
        document.getElementById('remain').value = totalitems;
      }
    }


    $(document).ready(function(){
         $("#datatable tbody").on('click' ,'.delete',function()
         {  
             var col1=$(this).closest("tr").find("td:eq(5)").text(); 
             $('#totalitems').val(totalitems - col1);
             $(this).closest('tr').remove();

             totalitems = totalitems - col1;
         });

         $("#store").change(function(){
             var id = $(this).val();
            
             $.ajax({
                     url:'/billhead/item',
                     method:'get',
                     data:{id:id},
                     success:function(resp){
                        
                        $('#item').html(resp);
                      
                     },error:function(){
                         alert("enter store");
                     }
                      

                });
         });

         $("#item").change(function(){
             var item = $(this).val();
             var store = $('#store').val();
             var emps = [];
             var data = {};
             data.item = item;
             data.store = store;
             emps.push(data);

             $.ajax({
                     url:'/billhead/price',
                     method:'get',
                     data:{emps : JSON.stringify(emps) },
                     success:function(resp){
                      
                     $('#sprice').val(resp['price']);
                     $('#qua').val(resp['quantity']);
                     $('#qua').attr({"max" : resp['quantity']});
                     $('#tax').val(resp['tax']);  
                      
                     },error:function(){
                         alert("enter item");
                     }
                      

                });
         });



         $("#paid").keyup(function(){
             var paid = $(this).val();
             $('#remain').val(totalitems-paid);
         });

         $('#create').click(function(){
                
                             
                var emps  = [];
                var data1 = {};
                var data2 = {};
                
                data1.id=document.forms["Form"]["bill"].value;
                data1.date=document.forms["Form"]["date"].value;
                data1.client=document.forms["Form"]["client"].value;
                data1.total=document.getElementById('totalitems').value;
                data1.paid=document.getElementById('paid').value;
                data1.remain=document.getElementById('remain').value;
                

                if (data1.id==null || data1.id=="",data1.date==null || data1.date=="",data1.client==null || data1.client=="")
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
                     url:'/billhead/store',
                     method:'get',
                     data:{emps : JSON.stringify(emps) },
                     success:function(resp){
                      if (resp == 'false') 
                      {
                        alert("Please Fill All Required Field");
                        return false;
                      }else if(resp == "no")
                      {
                        alert("Please enter quantity correctly");
                        return;
                      }else
                      {
                        var url = '/billhead';
                      $( location ).attr("href", url);
                      }
                      
                     },error:function(){
                         alert("error");
                     }
                      

                });

        });

         $('#createapi').click(function(){
                
                             
                var emps  = [];
                var data1 = {};
                var data2 = {};
                
                data1.id=document.forms["Form"]["bill"].value;
                data1.date=document.forms["Form"]["date"].value;
                data1.client=document.forms["Form"]["client"].value;
                data1.total=document.getElementById('totalitems').value;
                data1.paid=document.getElementById('paid').value;
                data1.remain=document.getElementById('remain').value;
                

                if (data1.id==null || data1.id=="",data1.date==null || data1.date=="",data1.client==null || data1.client=="")
                {
                    alert("Please Fill All Required Field");
                    return false;
                }

                if (data1.total==null || data1.total=="")
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
                     url:'/api/bill',
                     method:'get',
                     data:{emps : JSON.stringify(emps) },
                     success:function(resp){
                      if (resp == 'false') 
                      {
                        alert("Please Fill All Required Field");
                        return false;
                      }

                      var url = '/billhead';
                      $( location ).attr("href", url);
                     },error:function(){
                         alert("error");
                     }
                      

                });

        });

     });

   </script>
@endsection