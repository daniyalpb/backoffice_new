<?php $__env->startSection('content'); ?>




       <div id="message_toggle">
        <?php if($message = Session::get('msg')): ?>
         <div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <strong><?php echo e($message); ?></strong> 
      </div>
       <?php endif; ?>
       </div>

       <div class="container-fluid white-bg">
       <div class="col-md-12"><h3 class="mrg-btm">Menu Mapping</h3></div>
        <form class="form-horizontal" method="post" action="<?php echo e(url('menu-mapping-save')); ?>"    > <?php echo e(csrf_field()); ?>

        <div class="form-group">
            <label  for="inputEmail" class="control-label col-xs-2"> Menu Group</label>
   
 
           
            <div class="col-xs-6">
            <select class="form-control" name="menu_group_id" id="menu_group_id">
               <?php $__currentLoopData = $menu_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $le): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php if($menu_group_id==$le->id): ?>
                   <option value="<?php echo e($le->id); ?>" selected="" ><?php echo e($le->name); ?></option>
               <?php endif; ?>    
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </select>

               <?php if($errors->has('menu_group_id')): ?><label class="control-label" for="inputError"> <?php echo e($errors->first('menu_group_id')); ?></label>  <?php endif; ?>
                  
            </div>
        </div>





 
         <div class="form-group"   id="Menu_Mapping">
            <label for="inputEmail" class="control-label col-xs-2"> Menu Mapping</label>
            <div class="col-xs-6" id="mapping_select_id">

           <!--  <ul class='menu'>
        <?php  echo $recfn; ?>
             </ul> -->

             <ul class="nav nav-list" style="overflow: hidden; width: auto; height: 95%;" id="Decor">

              <?php  echo $recfn; ?>  
                

             </ul>
    
 
            </div>
        </div>
          
        

     <div class="col-md-12 col-xs-12">
       
        <div class="center-obj center-multi-obj">
       
         <button id="btnsubmit" onclick="Validate()" class="common-btn">Submit</button>

         </div>
        </div>

</form>
     
 
 
      </div>

 
            
 <script type="text/javascript">$(document).ready(function(){
 
window.setTimeout(function() {
    $("#message_toggle").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
 

 });

  

   $(function () {
            // $('#Decor ul')
            //     .hide(400)
            //     .parent()
            //     .prepend('<span class="icon plus"></span>');
                
            $('.icon_1').prepend('<span class="icon plus"></span>');

            $('#Decor li').on('click', function (e) {
                e.stopPropagation();
                $(this).children('ul').slideToggle('slow', function () {
                    if ($(e.target).is("span")) {
                        $(e.target)
                            .toggleClass('minus', $(this).is(':visible'));                        
                    }
                    else {
                        $(e.target).children('span')
                            .toggleClass('minus', $(this).is(':visible'));                        
                    }
                });
            });

            $('#Decor a').not('[href="#"]').attr('target', '_blank');
        });

</script>

<style type="text/css">#Decor, #Decor ul {
  list-style-type: none;
  margin-left:15px;
  margin-bottom:5px;
  padding-left:20px;
    cursor:pointer;
}

.icon { 
  background: 
        transparent 
        url('../images/plus-minus.png' )
        no-repeat left top; 
  display:block; 
    height:12px;
    width:12px; 
  float:left;
    cursor:pointer;
}

.plus { 
    background-position: left top; 
    margin-top:3px;
}

.minus { 
    background-position: left -10px;
    margin-top:3px;
}</style>
 
 

<?php $__env->stopSection(); ?>




<?php echo $__env->make('include.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>