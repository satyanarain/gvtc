
       foreach($sql as $k=>$v){
           ?>
          <select class="form-control" required="required" id="species_record" name="method_id">
          <option selected="selected" value="">Select Species</option>
          <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
          </select> 
           
      <?php }
      \
      
      <div class="form-group col-md-2 required" id="displ" style="display:none;">
                  {!! Form::label('Species','Species',['class'=>'control-label']) !!}
                  {!! Form::select('method_id',$methodrecodsql,null,['class'=>'form-control','placeholder'=>'Select Species','required'=>'required','id' => 'method_id']) !!}
                  </span>
              </div>    