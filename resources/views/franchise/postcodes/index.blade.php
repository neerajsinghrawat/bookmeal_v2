@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post Code Manager
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Post Code Manager</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <div class="box-header">
                 
			         <h3 class="box-title"><a href="{{ URL::to('admin/postcodes/add') }}" class="btn float-right btn-block btn-primary">Add New</a> </h3>
                 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Post Code</th>
                  <th>Franchise Name</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php

				
				if (isset($postcodes[0]) && !empty($postcodes)) {
					
				 $index = 0;
				 foreach ($postcodes as $postcode): 
				 $index++;
				 ?>
					<tr>
					  <td><?php echo $index; ?></td>
            <td><?php echo $postcode['post_code']; ?></td>           
            <td><?php echo ucwords($postcode->franchise['name']); ?></td>           
					  				  
					  <td><?php echo ($postcode['status'] == 1) ? '<small class="label bg-green">Active</small>' : '<small class="label bg-red">Inactive</small>'; ?></td>
					  <td><?php echo (date('d-m-Y',strtotime($postcode['created_at']))); ?></td>
					  
					 <td><a href="{{ URL::to('admin/postcodes/edit/'.$postcode['id']) }}"><i class="fa fa-edit"></i></a>
  					
  					    <a href="{{ URL::to('admin/postcodes/delete/'.$postcode['id']) }}" ><i class="fa fa-trash" ></i></a>
					  </td>
            
					</tr>
               <?php endforeach; }
               ?> 

                 </tbody>

              </table>
              {!! $postcodes->render() !!}
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script type="text/javascript">$(document).ready(function(){
	$('#example1_paginate').css('display','none');
	$('#example1_info').css('display','none');
});</script>
  
@endsection



