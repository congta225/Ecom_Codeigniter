<div class="container">
<div class="card">
  <div class="card-header">
    List Brand
  </div>
  <div class="card-body">
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php 
     foreach($brand as $key=> $bra){
    ?>
    <tr>
      <th scope="row"><?php echo $key ?></th>
      <td><?php echo $bra->title ?></td>
      <td><?php echo $bra->description ?></td>
      <td><?php echo $bra->slug ?></td>
      <td>
        <?php
          if($bra-> status ==1){
            echo 'Hiển thị';
          }else{
            echo 'Không hiển thị';
          }
        ?>  
      </td>
      <td><img src="<?php echo base_url('uploads/brand/'.$bra->image)  ?>" alt="" width="150" height="150"></td>
      <td>
        <a href="<?php echo base_url('brand/delete/'.$bra->id) ?>" class="btn btn-danger">Delete</a>
        <a href="<?php echo base_url('brand/edit/'.$bra->id) ?>" class="btn btn-primary">Edit</a>
      </td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
  </div>
</div>
</div>